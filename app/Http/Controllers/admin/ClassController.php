<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\batchstudentmapping;
use App\Models\students\studentattendance;
use App\Models\batches;
use App\Models\classes;
use App\Models\subjects;
use App\Models\zoom_classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\status;
class ClassController extends Controller
{
    public function index(){
        $classes = classes::select('*')->paginate(10);

        return view('admin.class',compact('classes'));
    }

    public function store(Request $request){
        $request->validate([
            'classname'=> 'required'
        ]);
        if($request->id){
            $data = classes::find($request->id);
            $msg = 'Class updated successfully';
        }
        else{
            $data = new classes();
            $msg = 'Class added successfully';
        }
        $data->name = $request->classname;
        $res = $data->save();

        if($res){
            return back()->with('success',$msg);
        }
        else{
            return back()->with('fail','Something went wrong. Please try again later');
        }
    }
    public function status(Request $request){
        // echo 'Test';
        // echo $request->id;
        // echo $request->status;
        // dd();
        $data = classes::find($request->id);
        if($request->status == 1){
            $status = 0;
        }
        if($request->status == 0){
            $status = 1;
        }
        $data->is_active = $status;

       $res = $data->save();
     return json_encode(array('statusCode'=>200));
    }

    public function tutorclasses(){
        $liveclasses = zoom_classes::select('zoom_classes.*','classes.id as class_id','subjects.id as subject_id','subjects.name as subjects','studentregistrations.name as student','classes.name as class','slot_bookings.date as slotdate','slot_bookings.slot as slottime')
        ->join('slot_bookings','slot_bookings.meeting_id','zoom_classes.id')
        ->join('studentregistrations','studentregistrations.id','slot_bookings.student_id')
        ->join('subjects','subjects.id','slot_bookings.subject_id')
        ->join('classes','subjects.class_id','classes.id')
        ->where('zoom_classes.is_completed',1)
        ->where('zoom_classes.is_active',1)
        ->where('zoom_classes.tutor_id',session('userid')->id)
        ->get();
        $classes = (new CommonController)->classes();
        // dd($liveclasses);
        return view('tutor.classes', compact('liveclasses','classes'));
    }

    public function studentclass(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('zoom_classes.*','zoom_classes.id as class_id','zoom_classes.topic_name as topics','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects',)
        ->join('slot_bookings','slot_bookings.meeting_id','zoom_classes.id')
        // ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        // ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','slot_bookings.subject_id')
        // ->join('topics','topics.id','zoom_classes.topic_id')
        // ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        ->where('slot_bookings.student_id',session('userid')->id)
        // ->where('zoom_classes.status','like', '%waiting%')
        ->where('zoom_classes.is_completed',0)
        ->get();
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();
// dd($classes);
        return view('student.classes',get_defined_vars());

    }
    public function studentclassParent(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        // ->where('zoom_classes.status','like', '%waiting%')
        ->where('zoom_classes.is_completed',0)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();

        return view('parent.classes',get_defined_vars());

    }
    public function studentCompletedclass(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('zoom_classes.*','zoom_classes.id as class_id','zoom_classes.topic_name as topics','zoom_classes.tutor_id as tutor_id')
        // ->join('slot_bookings','slot_bookings.meeting_id','zoom_classes.id')
        // ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        // ->join('batches','batches.id','zoom_classes.batch_id')
        // ->join('subjects','subjects.id','slot_bookings.subject_id')
        // ->join('topics','topics.id','zoom_classes.topic_id')
        // ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        ->where('zoom_classes.student_id',session('userid')->id)
        // ->where('zoom_classes.status','like', '%waiting%')
        ->where('zoom_classes.is_completed',1)
        ->paginate(10000);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();

        return view('student.completed-classes',get_defined_vars());

    }

    public function studentCompletedclassParent(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        ->where('zoom_classes.status','like', '%completed%')
        ->where('zoom_classes.is_completed',1)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();

        return view('parent.completed-classes',get_defined_vars());

    }


    // search functionality
    public function studentclassSearch(Request $request){

        // echo "Test";
        // dd();
        // return $request->all();

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $query = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1);
        // ->get();
        if ($request->subject_name) {
            $query->where('batches.subject_id', $request->subject_name);
        }
        if ($request->batch) {
            $query->where('zoom_classes.batch_id', $request->batch);
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.start_time)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.start_time)'), '<=', $request->end_date);
        }
        if ($request->status) {
            $query->where('zoom_classes.status','like', '%' . $request->status . '%');
        }
        $classes = $query->paginate();
        $type = "student-classes";
        $viewTable = view('admin.partials.common-search', compact('classes','type'))->render();
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();
        // $viewPagination = $classes->links()->render();

        // return response()->json([
        //     'table' => $viewTable,
        //     'pagination' => $viewPagination
        // ]);

        // dd();

return view('student.classes',get_defined_vars());

    }



    public function student_attendance_report(){

        $attend = studentattendance::select('studentattendances.*','tutorregistrations.name as tutor_name','subjects.name as subject_name')
        // ->join('classes','classes.id','studentattendances.class_id')
        // ->join('subjects','subjects.id','studentattendances.subject_id')
        // ->join('tutorprofiles','tutorprofiles.tutor_id','studentattendances.tutor_id')
        ->join('tutorregistrations','tutorregistrations.id','studentattendances.tutor_id')
        ->join('subjects','subjects.id','studentattendances.subject_id')
        ->where('studentattendances.student_id', session('userid')->id)


        ->get();
        // dd($attend);

        return view('student.attendance-report',compact('attend'));
    }
    public function student_class_report(){
        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics','tutorprofiles.name as tutor')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->join('tutorprofiles','tutorprofiles.tutor_id','zoom_classes.tutor_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        // ->where('zoom_classes.status','like', '%waiting%')
        ->where('zoom_classes.is_completed',0)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();
// dd($classes);
        // return view('student.classes',get_defined_vars());
        return view('student.class-report',get_defined_vars());
    }
    public function student_class_reportParent(){
        return view('parent.class-report');
    }


    public function student_attendance_reportParent(){
        return view('parent.attendance-report');
    }

    public function tutorattendance(){
        $studentAttendances =  studentattendance::select("studentattendances.class_starts_at","studentattendances.status",'studentregistrations.name as student_name','subjects.name as subject_name','classes.name as class_name','batches.name as batch_name')
            ->leftjoin('studentregistrations','studentregistrations.id','studentattendances.student_id')
            ->leftjoin('subjects', 'subjects.id', '=', 'studentattendances.subject_id')
            ->leftjoin('batches', 'batches.id', '=', 'studentattendances.batch_id')
            ->leftjoin('classes', 'classes.id', '=', 'studentattendances.class_id')->where('studentattendances.tutor_id',session('userid')->id)->paginate(10);
        return view('tutor.attendance',get_defined_vars());
    }

    public  function tutorattendanceSearch(Request $request){
        // dd($request->all());
        $query =  studentattendance::select("studentattendances.class_starts_at","studentattendances.status",'studentregistrations.name as student_name','subjects.name as subject_name','classes.name as class_name','batches.name as batch_name')
        ->leftjoin('studentregistrations','studentregistrations.id','studentattendances.student_id')
        ->leftjoin('subjects', 'subjects.id', '=', 'studentattendances.subject_id')
        ->leftjoin('batches', 'batches.id', '=', 'studentattendances.batch_id')
        ->leftjoin('classes', 'classes.id', '=', 'studentattendances.class_id')
        ->where('studentattendances.tutor_id',session('userid')->id);
        // ->paginate(10);
        if ($request->student_name) {
            $query->where('studentregistrations.name','like', '%' . $request->student_name . '%');
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(studentattendances.class_starts_at)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(studentattendances.class_starts_at)'), '<=', $request->end_date);
        }
        if ($request->status) {
            if($request->status==2){
                $status = 0;
            }elseif($request->status==1){
                $status = 1;
            }
            $query->where('studentattendances.status',$status );
        }
        $studentAttendances = $query->paginate(10);
        $type = "tutor-attendances";
        $viewTable = view('admin.partials.common-search', compact('studentAttendances','type'))->render();
        $viewPagination = $studentAttendances->links()->render();
        return view('tutor.attendance',get_defined_vars());

    }
    // Scheduled Classes in Admin Panel
    public function scheduledclasses(){
        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $statuses = status::select('*')->get();
        $scheduledclasses = zoom_classes::select('zoom_classes.id as class_id','zoom_classes.meeting_id as meeting_id','zoom_classes.topic_name as topic_name','zoom_classes.status as meeting_status','zoom_classes.start_time as meeting_start_time','zoom_classes.is_completed as is_completed','zoom_classes.recording_link as recording_link','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name','tutorregistrations.mobile as tutor_mobile','studentregistrations.id as student_id','studentregistrations.name as student_name','studentregistrations.mobile as student_mobile','topics.name as topic_name','subjects.name as subject_name','classes.name as class_name')
        ->leftjoin('tutorregistrations','tutorregistrations.id','=','zoom_classes.tutor_id')
        ->leftjoin('studentregistrations','studentregistrations.id','=','zoom_classes.student_id')
        ->leftjoin('topics','topics.id','=','zoom_classes.topic_id')
        ->leftjoin('subjects','subjects.id','=','topics.subject_id')
        ->leftjoin('classes','classes.id','=','subjects.class_id')
        ->orderby('zoom_classes.created_at','desc')
        ->paginate(100);

        // dd($scheduledclasses);
        return view('admin.scheduledclasses',get_defined_vars());
    }
    // Scheduled Class Search
    public function scheduledsearch(Request $request){

        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $statuses = status::select('*')->get();
        $query = zoom_classes::select('zoom_classes.id as class_id','zoom_classes.meeting_id as meeting_id','zoom_classes.topic_name as topic_name','zoom_classes.status as meeting_status','zoom_classes.start_time as meeting_start_time','zoom_classes.is_completed as is_completed','zoom_classes.recording_link as recording_link','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name','tutorregistrations.mobile as tutor_mobile','studentregistrations.id as student_id','studentregistrations.name as student_name','studentregistrations.mobile as student_mobile','topics.name as topic_name','subjects.name as subject_name','classes.name as class_name')
        ->leftjoin('tutorregistrations','tutorregistrations.id','=','zoom_classes.tutor_id')
        ->leftjoin('studentregistrations','studentregistrations.id','=','zoom_classes.student_id')
        ->leftjoin('topics','topics.id','=','zoom_classes.topic_id')
        ->leftjoin('subjects','subjects.id','=','topics.subject_id')
        ->leftjoin('classes','classes.id','=','subjects.class_id');
        // ->where('democlasses.student_id','=', session('userid')->id)
        // ->get();


        if ($request->student_name) {
            $query->where('studentregistrations.name','like', '%' . $request->student_name . '%');
        }
        if ($request->student_mobile) {
            $query->where('studentregistrations.mobile','like', '%' . $request->student_mobile . '%');
        }
        if ($request->tutor_name) {
            $query->where('tutorregistrations.name','like', '%' . $request->tutor_name . '%');
        }
        if ($request->tutor_mobile) {
            $query->where('tutorregistrations.mobile','like', '%' . $request->tutor_mobile . '%');
        }
        if ($request->class_name) {
            $query->where('classes.id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('democlasses.subject_id', $request->subject_name);
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.created_at)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.created_at)'), '<=', $request->end_date);
        }
        // if ($request->status) {
        //     $query->where('zoom_classes.status',$request->status );
        // }
        $scheduledclasses = $query->get();
        return view('admin.scheduledclasses',get_defined_vars());
    }
    // Completed Classes in Admin Panel
    public function completedclasses(){
        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $statuses = status::select('*')->get();
        return view('admin.completedclasses',get_defined_vars());
    }
}

