<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\payments\paymentdetails;
use App\Models\payments\paymentstudents;
use App\Models\subjects;
use App\Models\classes;
use App\Models\teacherclassmapping;
use App\Models\tutorachievements;
use App\Models\tutorprofile;
use App\Models\tutorregistration;
use App\Models\tutorreviews;
use App\Models\tutorsubjectmapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorSearchController extends Controller
{
    public function index()
    {

        // $tutorlist = tutorprofile::select('tutorprofiles.*','subjects.name as subject','subjects.name as subject','tutorreviews.*',DB::raw('SUM(ratings) AS sum_of_1'))
        $tutorlist = tutorprofile:: select('tutorprofiles.id','classes.name as class_name','tutorprofiles.name',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating,  COUNT(DISTINCT topics.name) as total_topics'),'tutorsubjectmappings.id as sub_map_id')
            ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
            ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
            ->join('topics', 'topics.subject_id', '=', 'subjects.id')
            // ->where('teacherclassmappings.class_id', '=', session('userid')->class_id)
            ->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name',  'classes.name','tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','rate','sub_map_id')
            ->get();
        // echo "<pre>";
        // dd($tutorlist);
        $subjectlist = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $countrylist = country::select('*')->get();
        if (!$tutorlist) {
            return view('student.searchtutor')->with('fail', 'No tutor found');
        }
        return view('student.searchtutor', get_defined_vars());
    }

    public function sorttutor($sort_value,$sort_type)
    {

        // $tutorlist = tutorprofile::select('tutorprofiles.*','subjects.name as subject','subjects.name as subject','tutorreviews.*',DB::raw('SUM(ratings) AS sum_of_1'))
        $query = tutorprofile:: select('tutorprofiles.id','classes.name as class_name','tutorprofiles.experience','tutorprofiles.name',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating,  COUNT(DISTINCT topics.name) as total_topics'),'tutorsubjectmappings.id as sub_map_id')
            ->leftjoin('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->leftjoin('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
            ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
            ->leftjoin('topics', 'topics.subject_id', '=', 'subjects.id')
            ->groupby('tutorprofiles.id', 'subjects.id', 'tutorprofiles.experience','subjects.name',  'classes.name','tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','rate','sub_map_id');
            // ->where('teacherclassmappings.class_id', '=', session('userid')->class_id)

            if($sort_value == "pricing"){
                if($sort_type=="asc"){
                    $query->orderBy( 'rate','ASC');
                }
                if($sort_type=="desc"){
                    $query->orderBy( 'rate','DESC');
                }
            }
            if($sort_value == "class"){
                if($sort_type=="asc"){
                    $query->orderBy( 'class_name','ASC');
                }
                if($sort_type=="desc"){
                    $query->orderBy( 'class_name','DESC');
                }
            }
            if($sort_value == "rating"){
                if($sort_type=="asc"){
                    $query->orderBy( 'starrating','ASC');
                }
                if($sort_type=="desc"){
                    $query->orderBy( 'starrating','DESC');
                }
            }
            if($sort_value == "experience"){
                if($sort_type=="asc"){
                    $query->orderByRaw("CAST(SUBSTRING_INDEX(tutorprofiles.experience, ' ', 1) AS UNSIGNED) ASC");
                }
                if($sort_type=="desc"){
                    $query->orderByRaw("CAST(SUBSTRING_INDEX(tutorprofiles.experience, ' ', 1) AS UNSIGNED) DESC");
                }
            }

          $tutorlist =    $query->get();
        // echo "<pre>";
        // dd($tutorlist);
        $subjectlist = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $countrylist = country::select('*')->get();
        if (!$tutorlist) {
            return view('student.searchtutor')->with('fail', 'No tutor found');
        }
        return view('student.searchtutor', get_defined_vars());
    }

    public function yourtutor()
    {
        $tutorlist = tutorprofile::select('tutorprofiles.id','classes.name as class_name', 'classes.id as class_id','tutorprofiles.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), DB::raw('SUM(    paymentstudents.classes_purchased) as total_classes_purchased'),'tutorsubjectmappings.id as sub_map_id')
            ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->join('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
            ->join('topics', 'topics.subject_id', '=', 'subjects.id')
            ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
            ->join('paymentstudents', 'paymentstudents.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('paymentdetails', 'paymentdetails.transaction_id', '=', 'paymentstudents.transaction_id')
            ->where('teacherclassmappings.class_id', '=', session('userid')->class_id)
            ->where('paymentstudents.subject_id', '1')  // Need to implement subject Id currently passed 1 for testing purpose
            ->where('paymentdetails.status', '1')
            // ->where('paymentdetails.id', '=', 'paymentstudents.subject_id' )
            ->groupby('tutorprofiles.id', 'subjects.id','classes.id', 'classes.name','subjects.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','sub_map_id')
            ->get();


        return view('student.yourtutor', compact('tutorlist'));
    }
    public function tutorprofile($id)
    {

        $tutorpd = tutorprofile::select('tutorprofiles.*', 'subjects.name as subject', 'subjects.name as subject',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'))
        ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
            ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->where('tutorsubjectmappings.id', '=', $id)
            ->first();
        if($tutorpd){
            $achievement = tutorachievements::select('*')->where('tutor_id', '=', $tutorpd->id)->get();


            $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
                ->join('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
                ->where('tutorreviews.tutor_id', '=', $tutorpd->id)->get();
        }



        if (!$tutorpd) {
            return view('student.tutorprofile')->with('fail', 'Something went wrong');
        }
        // echo $tutorpd;
        //     dd();
        return view('student.tutorprofile', compact('tutorpd', 'achievement', 'reviews'));
    }

    public function tutoradvs(Request $request)
    {
        // dd($request->all());
        // If min rate is null
        if ($request->minrate) {
            $minrate = $request->minrate;
        } else {
            $minrate = 0;
        }
        // If max rate is null
        if ($request->maxrate) {
            $maxrate = $request->maxrate;
        } else {
            $maxrate = 1000000;
        }
        // If min exp is null
        if ($request->minexp) {
            $minexp = $request->minexp;
        } else {
            $minexp = 0;
        }
        // If max exp is null
        if ($request->maxexp) {
            $maxexp = $request->maxexp;
        } else {
            $maxexp = 1000000;
        }
        $query = tutorprofile::select('tutorprofiles.id','classes.name as class_name','tutorprofiles.name',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating,  COUNT(DISTINCT topics.name) as total_topics'),'tutorsubjectmappings.id as sub_map_id')
        // select('tutorprofiles.id', 'tutorprofiles.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating, COUNT(topics.name) as total_topics'))
            ->leftjoin('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->leftjoin('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
            ->leftjoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
            ->leftjoin('topics', 'topics.subject_id', '=', 'subjects.id');
            if($request->class_name){
                $query->where('teacherclassmappings.class_id',$request->class_name);
            }
            if($request->subject){
                $query->where('tutorsubjectmappings.subject_id',$request->subject);
            }
            if($request->country){
                $query->where('tutorprofiles.country_id',$request->country);
            }
            if($request->minrate || $request->maxrate){
                // dd('test');
                $query->whereBetween('tutorsubjectmappings.rate', [$minrate, $maxrate]);
            }
            if($request->minexp || $request->maxexp){
                $query->whereBetween('tutorprofiles.experience', [$minexp, $maxexp]);
            }
            if($request->keywords) {
                // dd('test');
                $inputSkills = explode(',', $request->keywords);
                foreach ($inputSkills as $skill) {
                    $query->orwhere('tutorprofiles.keywords', 'LIKE', '%' . trim($skill) . '%');
                }
            }
            $tutorlist=  $query->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name',  'classes.name','tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','rate','sub_map_id')
            ->get();
        // dd($tutorlist);
        $subjectlist = subjects::select('*')->get();
        $classes = classes::where('is_active',1)->get();
        $countrylist = country::select('*')->get();
        if (!$tutorlist) {
            return view('student.searchtutor')->with('fail', 'No tutor found');
        }
        return view('student.searchtutor', get_defined_vars());
    }

    public function purchaseclass(Request $request)
    {

        $request->validate([
            'tutorenrollid' => 'required',
            'subjectenrollid' => 'required',
            'availableclassenroll' => 'required',
            'requiredclassenroll' => 'required',
            'rateperhourenroll' => 'required',
            'totalamountenroll' => 'required'
        ]);

        // Temp. Order Id
        $order_id = '1234-5678-qqyz-aspa-zqkp1o2';
        // Payment Details
        $paymentdetails = new paymentdetails();
        $paymentdetails->transaction_id = $order_id;
        $paymentdetails->payment_mode = 'Credit Card';
        $paymentdetails->amount = $request->totalamountenroll;
        $paymentdetails->status = 1;
       $test= $paymentdetails->save();

        // Student Payment Details
        $studentpayment = new paymentstudents();
        $studentpayment->transaction_id = $order_id;
        $studentpayment->student_id = session('userid')->id;
        $studentpayment->class_id = session('userid')->class_id;
        $studentpayment->subject_id = $request->subjectenrollid;
        $studentpayment->tutor_id = $request->tutorenrollid;
        $studentpayment->classes_purchased = $request->requiredclassenroll;
        $studentpayment->rate_per_hr = $request->rateperhourenroll;
        $spdres = $studentpayment->save();



        if($spdres){

            return back()->with('success','Enrolled successfully. You can check the details in Your Tutor section.');
        }
        else{
            return back()->with('fail','Something Went Wrong. Try Again Later');

        }

    }


    public function tutorslist(){
        $ttrlists = tutorregistration::select('*','tutorregistrations.id as tutor_id', 'classes.name as class_name','tutorregistrations.name as tutor_name','tutorregistrations.mobile as tutor_mobile','tutorregistrations.email as tutor_email','tutorregistrations.is_active as tutor_status','subjects.name as subject_name','tutorsubjectmappings.rate as rate','tutorsubjectmappings.admin_commission as admin_commission','tutorsubjectmappings.id as rate_id')
        ->join('tutorsubjectmappings','tutorsubjectmappings.tutor_id','=','tutorregistrations.id')
        ->join('subjects','subjects.id','=','tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','subjects.class_id')
        ->paginate(10);
        $classes = classes::where('is_active',1)->get();
        return view('admin.tutors', get_defined_vars());

    }
    //  tutors search
    public function tutorslistsearch(Request $request){
        // return $request->all();
        $query = tutorregistration::select('*','tutorregistrations.id as tutor_id','classes.name as class_name','tutorregistrations.name as tutor_name','tutorregistrations.mobile as tutor_mobile','tutorregistrations.email as tutor_email','tutorregistrations.is_active as tutor_status','subjects.name as subject_name','tutorsubjectmappings.rate as rate','tutorsubjectmappings.admin_commission as admin_commission','tutorsubjectmappings.id as rate_id')
        ->join('tutorsubjectmappings','tutorsubjectmappings.tutor_id','=','tutorregistrations.id')
        ->join('subjects','subjects.id','=','tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','subjects.class_id');
        // ->get();
        if ($request->tutor_name) {
            $query->where('tutorregistrations.name','like', '%' . $request->tutor_name . '%');
        }
        if ($request->tutor_mobile) {
            $query->where('tutorregistrations.mobile','like', '%' . $request->tutor_mobile . '%');
        }
        if ($request->class_name) {
            $query->where('subjects.class_id', $request->class_name);
        }
        if ($request->status_field) {
            if($request->status_field=='2'){
                $request->status_field = '0';
            }
            $query->where('tutorregistrations.is_active',$request->status_field);
        }
        $ttrlists = $query->paginate(10);
        $type = 'tutors';
        $viewTable = view('admin.partials.students-tutor-search', compact('ttrlists','type'))->render();
        $viewPagination = $ttrlists->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);

    }
    public function status(Request $request){
        $data = tutorregistration::find($request->id);
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

    public function commissionupdate(Request $request){
        $data = tutorsubjectmapping::find($request->id);
        // echo $data;
        // dd();

        $data->admin_commission = $request->commission;

       $res = $data->save();
     return json_encode(array('statusCode'=>200));
    }
}
