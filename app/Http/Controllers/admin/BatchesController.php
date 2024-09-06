<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\batches;
use App\Models\batchstudentmapping;
use App\Models\classes;
use App\Models\classschedule;
use App\Models\studentprofile;
use App\Models\studentregistration;
use App\Models\subjects;
use App\Models\tutorregistration;
use App\Models\zoom_classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchesController extends Controller
{

    public function index()
    {
        $classes = classes::select('*')->where('is_active', 1)->get();
        $tutors = tutorregistration::select('*')->get();
        $subjects = subjects::where('is_active', 1)->get();
        $batches = batches::select('batches.id as batch_id', 'batches.name as batch_name', 'batches.description as batch_description', 'batches.is_active as batch_status', 'subjects.name as subject_name', 'subjects.id as subject_id', 'classes.id as class_id', 'classes.name as class_name', 'tutorregistrations.id as tutor_id', 'tutorregistrations.name as tutor_name')
            ->join('subjects', 'subjects.id', '=', 'batches.subject_id')
            ->join('tutorregistrations', 'tutorregistrations.id', '=', 'batches.tutor_id')
            ->join('classes', 'classes.id', '=', 'subjects.class_id')->paginate(10);
        //  dd($batches);
        return view('admin.batch', get_defined_vars());
    }

    // search functionality
    public function batchSearch(Request $request)
    {
        // return $request->all();
        $classes = classes::select('*')->where('is_active', 1)->get();
        $subjects = subjects::where('is_active', 1)->get();
        $tutors = tutorregistration::select('*')->get();
        $query = batches::select('batches.id as batch_id', 'batches.name as batch_name', 'batches.description as batch_description', 'batches.is_active as batch_status', 'subjects.name as subject_name', 'subjects.id as subject_id', 'classes.id as class_id', 'classes.name as class_name', 'tutorregistrations.id as tutor_id', 'tutorregistrations.name as tutor_name')
            ->join('subjects', 'subjects.id', '=', 'batches.subject_id')
            ->join('tutorregistrations', 'tutorregistrations.id', '=', 'batches.tutor_id')
            ->join('classes', 'classes.id', '=', 'subjects.class_id');
        // ->where('batches.tutor_id',1)->get();
        // dd($request->tutor_name);

        if ($request->class_name) {
            $query->where('subjects.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('batches.subject_id', $request->subject_name);
        }
        if ($request->tutor_name) {
            $query->where('batches.tutor_id', $request->tutor_name);
        }

        $batches = $query->paginate(10);
        $viewTable = view('admin.partials.batches-search', compact('batches'))->render();
        $viewPagination = $batches->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'classname' => 'required',
            'subject' => 'required',
            'tutor' => 'required',
            'batchname' => 'required',
            // 'description'=> 'required'
        ]);
        if ($request->id) {
            $data = batches::find($request->id);
            $msg = 'Batch updated successfully';
        } else {
            $data = new batches();
            $msg = 'Batch added successfully';
        }

        $data->name = $request->batchname;
        $data->description = $request->description;
        $data->subject_id = $request->subject;
        $data->tutor_id = $request->tutor;
        $res = $data->save();

        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }
    public function status(Request $request)
    {
        // echo 'Test';
        // echo $request->id;
        // echo $request->status;
        // dd();
        $data = batches::find($request->id);
        if ($request->status == 1) {
            $status = 0;
        }
        if ($request->status == 0) {
            $status = 1;
        }
        $data->is_active = $status;

        $res = $data->save();
        return json_encode(array('statusCode' => 200));
    }

    public function mapping(Request $request)
    {
        $datachk = batchstudentmapping::select('*')->where('batch_id', $request->batchid)->first();
        if ($datachk) {
            $data = batchstudentmapping::find($datachk->id);
            $msg = 'Batch updated successfully';
        }
        // if ($request->mappingid) {
        //
        else {
            $data = new batchstudentmapping();
            $msg = 'Students added to batch';
            $data->batch_id = $request->batchid;
        }
        $data->student_data = json_encode($request->studentsdata);
        $data->tutor_id = $request->tutorid;
        $res = $data->save();

        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }

    public function viewrecord($id)
    {

        // Fetch student details based on batches -> Using jQuerry
        $data['subjects'] = batchstudentmapping::where("batch_id", $id)->first();
        return response()->json($data);
    }

    public function tutorbatches()
    {
        $batches = batches::select('batches.id as batch_id', 'batches.name as batch_name', 'batches.description as batch_description', 'subjects.id as subject_id', 'subjects.name as subject_name', 'classes.name as class_name')

            ->join('subjects', 'subjects.id', 'batches.subject_id')
            ->join('classes', 'classes.id', 'subjects.class_id')

        // ->join('classschedules','classschedules.batch_id','batches.id')
        // ->join('classschedules','classschedules.batch_id','batches.id')
        //
            ->where('batches.tutor_id', session('userid')->id)
            ->where('batches.is_active', 1)
            ->get();
        $classessch = classschedule::select('*')->get();
        return view('tutor.batches', compact('batches', 'classessch'));

        // ->has('classschedules','classschedules.id')->get();

    }

    public function tstudentlists()
    {
        $students = studentprofile::select(
            'studentprofiles.name as studentname',
            'studentprofiles.student_id as studentid',
            'studentprofiles.profile_pic as profilepic',
            'classes.name as class',
            'subjects.name as subject'
        )
            ->join('studentregistrations', 'studentregistrations.id', '=', 'studentprofiles.student_id')
            ->join('paymentstudents', 'paymentstudents.student_id', '=', 'studentregistrations.id')
            ->join('classes', 'classes.id', '=', 'paymentstudents.class_id')
            ->join('subjects', 'subjects.id', '=', 'paymentstudents.subject_id')
            ->where('paymentstudents.tutor_id', session('userid')->id)
            ->where('studentregistrations.is_active', 1)
            ->distinct()
            ->get();

        return view('tutor.mystudents', get_defined_vars());
    }

    public function tutorbatchesstudents($id)
    {
        $data = batchstudentmapping::select('student_data')->where("batch_id", $id)->first();
        $explode_id = json_decode($data['student_data'], true);
        $student = studentregistration::select('name')->whereIn('id', $explode_id)->get();
        return response()->json($student);

    }

    public function tutorbatchesattendance(Request $request, $id)
    {
        // dd($request->all());
        $data = batchstudentmapping::select('student_data')->where("batch_id", $id)->where("tutor_id", session('userid')->id)->first();
        $explode_id = json_decode($data['student_data'], true);
        // $students = studentregistration::select('studentregistrations.name','studentattendances.status')->leftjoin('studentattendances','studentattendances.student_id','studentregistrations.id')

        //             ->whereIn('studentregistrations.id',$explode_id)
        //             ->where('studentattendances.class_id',$request->class_id)
        //             ->where('studentattendances.subject_id',$request->id)
        //             ->where('studentattendances.batch_id',$request->batch_id)
        //             ->where('studentattendances.topic_id',$request->topic_id)
        //             ->where('studentattendances.tutor_id',session('userid')->id)
        //             ->get();

        $students = studentregistration::select('studentregistrations.name', 'studentregistrations.id as student_id', DB::raw('COALESCE(studentattendances.status, 0) as status'))
            ->leftJoin('studentattendances', function ($join) use ($request) {
                $join->on('studentattendances.student_id', '=', 'studentregistrations.id')
                    ->where('studentattendances.class_id', $request->class_id)
                    ->where('studentattendances.subject_id', $request->subject_id)
                    ->where('studentattendances.batch_id', $request->batch_id)
                    ->where('studentattendances.topic_id', $request->topic_id)
                    ->where('studentattendances.meeting_id', $request->meeting_id)
                    ->where('studentattendances.tutor_id', session('userid')->id);
            })
            ->whereIn('studentregistrations.id', $explode_id)
            ->get();

        return response()->json([
            'students' => $students,
            'subject_id' => $request->subject_id,
            'class_id' => $request->class_id,
            'topic_id' => $request->topic_id,
            'batch_id' => $request->batch_id,
            'start_time' => $request->start_time,
            'meeting_id' => $request->meeting_id,
        ]);
    }

    public function tutorBatcheUpdateattendance(Request $request)
    {

        if ($request->ispresent == 'on') {
            $presence = 1;
        } else {
            $presence = 0;
        }
        $attendance = zoom_classes::find($request->post_meeting_id);
        $attendance->student_present = $presence;

        $res = $attendance->update();
        if ($res) {
            return back()->with('success', 'Attendance Successfully Submitted');

        } else {
            return back()->with('fail', 'Something went wrong!, try again later');

        }
    }

    public function updaterecording(Request $request){
        $data = zoom_classes::find($request->recording_link_id);
        $data->recording_link = $request->recording_link;
        $data->topic_name = $request->class_topic;
        $res = $data->update();
        if ($res) {
            return back()->with('success', 'Recording Link Successfully Submitted');
        } else {
            return back()->with('fail', 'Something went wrong!, try again later');

        }
    }

    public function zoomapi()
    {
        // dd();
        // $client = new Client();

        // $response = $client->get('https://zoom.us/oauth/token', [
        //     'form_params' => [
        //         'grant_type' => 'authorization_code',
        //         'client_id' => 'oFed_e_zQi6wE8183XRI0A',
        //         'client_secret' => '1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu',
        //     ],
        // ]);

        // $accessToken = json_decode($response);

        // $response2 = $client->get('https://api.zoom.us/v2/users', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . $accessToken,
        //         'Content-Type' => 'application/json',
        //     ],
        // ]);

        // $users = json_decode($response2->getBody()->getContents())->users;

        // return $users;

        // try {
        // $client = new Client();

        // $response = $client->get('https://zoom.us/oauth/token', [
        //     "headers" => [
        //         "Authorization" => "Basic ". base64_encode('oFed_e_zQi6wE8183XRI0A'.':'.'1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu')
        //     ],
        //     'form_params' => [
        //         "grant_type" => "authorization_code",
        //         "code" => $_GET['code'],
        //         "redirect_uri" => 'http://127.0.0.1:8000/student/demolist'
        //     ],
        // ]);

        // $token = json_decode($response->getBody()->getContents(), true);

        // $db = new DB();
        // $db->update_access_token(json_encode($token));
        //     echo "Access token inserted successfully.";
        // } catch(Exception $e) {
        //     echo $e->getMessage();
        // }

        // echo "<pre>";
        // dd($response);
    }

}
