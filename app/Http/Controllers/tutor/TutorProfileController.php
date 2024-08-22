<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\payments\paymentdetails;
use App\Models\payments\paymentstudents;
use App\Models\subjects;
use App\Models\teacherclassmapping;
use App\Models\tutorachievements;
use App\Models\tutorprofile;
use App\Models\tutorregistration;
use App\Models\tutorreviews;
use App\Models\tutorsubjectmapping;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TutorProfileController extends Controller
{

    public function index()
    {

    }


    public function tutorprofile()
    {

         $id = session('userid')->id;
        $classes = (new CommonController)->classes();
        $tutorpd = tutorprofile::select('tutorprofiles.*', 'subjects.name as subject', 'subjects.name as subject')
            ->leftJoin('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->leftJoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->where('tutorprofiles.tutor_id','=',$id)
            ->first();

        // dd($tutorpd);
        $achievement = tutorachievements::select('*')
            ->where('tutor_id', '=', $id)->get();

        // dd($achievement);

            if($tutorpd){
                $achievement = tutorachievements::select('*')->where('tutor_id', '=', session('userid')->id)->get();


                $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings','studentprofiles.name as student_name','studentprofiles.profile_pic as student_pic', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
                    ->leftjoin('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
                    ->leftjoin('studentprofiles','studentprofiles.student_id', '=', 'tutorreviews.student_id')
                    ->where('tutorreviews.tutor_id', '=', session('userid')->id)->get();
            }
            if(!$tutorpd){
                $tutorpd = TutorRegistration::select('*')->where('id',session('userid')->id)->first();
            }
        $tutorsub = tutorsubjectmapping::select('*','subjects.name as subject')
        ->join('subjects','subjects.id','tutorsubjectmappings.subject_id')
                    ->where('tutor_id', $id)->get();
        if (!$tutorpd) {
            return view('tutor.tutorprofile')->with('fail', 'Something went wrong');
        }
        // echo $tutorpd;
        //     dd();
        if($tutorpd){
            $skillsArray = explode(',', $tutorpd->keywords);
        }

        return view('tutor.tutorprofile',get_defined_vars());
    }

    public function edit()
    {
        $id = session('userid')->id;
        $classes = (new CommonController)->classes();
        $tutorpd = tutorprofile::select('tutorprofiles.*')
            // ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            // ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            // ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->where('tutorprofiles.tutor_id', '=', $id)
            ->first();
        // dd($tutorpd);
        $achievement = tutorachievements::select('*')
            ->where('tutor_id', '=', $id)->get();


        $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
            ->join('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
            ->where('tutorreviews.tutor_id', '=', $id)->get();

        $tutorsub = tutorsubjectmapping::select('*','tutorsubjectmappings.id as id','subjects.name as subject','classes.name as class')
        ->join('subjects','subjects.id','tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','subjects.class_id')
                    ->where('tutor_id', $id)->get();
        // if (!$tutorpd) {
        //     return view('tutor.tutorprofile')->with('fail', 'Something went wrong');
        // }
        if($tutorpd){
            $skillsArray = explode(',', $tutorpd->keywords);
        }

        return view('tutor.profileupdate', get_defined_vars());
    }

    public function updateprofiledata(Request $request)
    {
        // echo $request->profileid;
        // dd($request);
        $tutor = tutorprofile::select('*')->where('tutor_id', '=', session('userid')->id)->first();
        // dd($tutor);
        if ($tutor) {

            $ppic = $tutor;
            // if(!$ppic->admin_commission)
            // dd($ppic);

        } else {

            $ppic = new tutorprofile();
            $ppic->email = session('userid')->email;
            $ppic->mobile = session('userid')->mobile;
            $ppic->admin_commission = 0;
        }

        $ppic->name = session('userid')->name;

        $ppic->secondary_mobile = $request->secmobile;

        $ppic->goal = $request->goals;
        $ppic->qualification = $request->qualification ?? ' ';
        $ppic->intro_video_link = $request->introvideolink;
        // $ppic->expertise = $request->expertise;
        $ppic->experience = $request->experience;
        $ppic->certification = $request->certification;
        $ppic->headline = $request->headline;
        $ppic->detail_1 = $request->details1;
        $ppic->detail_2 = $request->details2;
        $ppic->detail_3 = $request->details3;
        $ppic->tutor_id = session('userid')->id;
        $ppic->gender = $request->gender;
        // $ppic->rateperhour = $request->rateperhour;
        // $ppic->country_id = $request->country;

        if($request->file){
        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images/tutors/profilepics'), $imageName);
        $ppic->profile_pic = $imageName;
    }
    // dd($ppic);
    $res = $ppic->save();
        if ($res) {
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function tutoracadd(Request $request){

        $request->validate([
            'achievementName'=>'required',
            'achievementDesc'=>'required',
        ]);
        $achv = new tutorachievements();
        $achv->name = $request->achievementName;
        $achv->description = $request->achievementDesc;
        $achv->date = $request->achDate;
        $achv->tutor_id = session('userid')->id;
        $res = $achv->save();
        if ($res) {
            return back()->with('success', 'Achievement added successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
    public function tutoracdel($id){

        $achv =  DB::delete('delete from tutorachievements where id = ?',[$id]);
        if ($achv) {
            return back()->with('success', 'Achievement deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
public function classmapping(Request $request){

    $request->validate([
        'classname'=>'required',
        'subject'=>'required',
    ]);
    $datachk = tutorsubjectmapping::select('id')->where('tutor_id',session('userid')->id)->where('subject_id',$request->subject)->where('class_id',$request->classname)->first();
    if ($datachk) {
        return back()->with('fail', 'Subject already added');
    }
    else{
    $trmapping = new tutorsubjectmapping();
    $tcmapping = new teacherclassmapping();
    $trmapping->tutor_id = session('userid')->id;
    $tcmapping->teacher_id = session('userid')->id;
    $trmapping->subject_id = $request->subject;
    $tcmapping->class_id = $request->classname;
    $trmapping->class_id = $request->classname;
    $res = $trmapping->save();
    $data = tutorsubjectmapping::select('id')->where('tutor_id',session('userid')->id)->where('subject_id',$request->subject)->where('class_id',$request->classname)->first();
    $tcmapping->subject_mapping_id = $data->id;

    $tcmapping->save();
    if ($res) {
        return back()->with('success', 'Subject added successfully');
    } else {
        return back()->with('fail', 'Something went wrong, please try again later');
    }
}

}
public function classmappingdelete($id){
    $submp =  DB::delete('delete from tutorsubjectmappings where id = ?',[$id]);
    $classmp =  DB::delete('delete from teacherclassmappings where subject_mapping_id = ?',[$id]);
    if ($submp) {
        return back()->with('success', 'Class Mapping deleted successfully');
    } else {
        return back()->with('fail', 'Something went wrong, please try again later');
    }
}

    public function updateSkills(Request $request){
       $request->validate([
         'skills'=>'required'
       ]);
        $tutor = tutorprofile::select('*')->where('tutor_id', '=', session('userid')->id)->first();
        if($tutor){
            $tutor->keywords = $request->skills;
            $tutor->save();
            return back()->with('success', 'Skills Added successfully');
        }
    }
}
