<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\payments\paymentdetails;
use App\Models\payments\paymentstudents;
use App\Models\subjects;
use App\Models\classes;
use App\Models\SlotBooking;
use App\Models\teacherclassmapping;
use App\Models\tutorachievements;
use App\Models\tutorprofile;
use App\Models\tutorregistration;
use App\Models\tutorreviews;
use App\Models\tutorsubjectmapping;
use App\Models\studentprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\RealTimeMessage;
use App\Models\Notification;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class TutorSearchController extends Controller
{
    public function index()
    {

        $tutorlist = tutorprofile::select('tutorprofiles.tutor_id as tutor_id', 'classes.name as class_name', 'tutorprofiles.name', 'tutorprofiles.headline', 'tutorprofiles.qualification as tutor_qualification','tutorprofiles.intro_video_link','tutorprofiles.experience', DB::raw('(tutorprofiles.rateperhour + (tutorprofiles.rateperhour * tutorprofiles.admin_commission / 100)) as rateperhour'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings) / COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), 'tutorsubjectmappings.id as sub_map_id',
    DB::raw('(SELECT COUNT(*) FROM classschedules WHERE classschedules.tutor_id = tutorprofiles.id) AS total_classes_done')
)
    ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
    ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
    ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
    ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
    ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
    ->join('topics', 'topics.subject_id', '=', 'subjects.id')
    ->join('tutorregistrations', 'tutorregistrations.id', '=', 'tutorprofiles.tutor_id')
    ->where('tutorregistrations.is_active','1')
    ->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name','tutorprofiles.tutor_id', 'classes.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic','tutorprofiles.intro_video_link', 'tutorprofiles.qualification', 'tutorprofiles.name','tutorprofiles.rateperhour','tutorprofiles.admin_commission', 'sub_map_id', 'experience', 'headline', 'total_classes_done')
    ->get();

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
            ->leftjoin('tutorregistrations','tutorregistrations.id','tutorprofiles.tutor_id')
            ->where('tutorregistrations.is_active','1')
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
        $tutorlist = tutorprofile::select('tutorprofiles.id','tutorprofiles.tutor_id as tutor_id','classes.name as class_name', 'classes.id as class_id','tutorprofiles.name', 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), DB::raw('SUM(    paymentstudents.classes_purchased) as total_classes_purchased'),'tutorsubjectmappings.id as sub_map_id',\DB::raw('(tutorprofiles.rateperhour * tutorprofiles.admin_commission / 100) + tutorprofiles.rateperhour as rate'))
            ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
            ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('topics', 'topics.subject_id', '=', 'subjects.id')
            ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
            ->join('paymentstudents', 'paymentstudents.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->join('paymentdetails', 'paymentdetails.transaction_id', '=', 'paymentstudents.transaction_id')
            // ->where('teacherclassmappings.class_id', '=', session('userid')->class_id)
            // ->where('paymentstudents.subject_id', '1')  // Need to implement subject Id currently passed 1 for testing purpose
            ->where('paymentdetails.status', '1')
            ->where('paymentstudents.student_id',session('userid')->id)
            // ->where('paymentdetails.id', '=', 'paymentstudents.subject_id' )
            ->groupby('tutorprofiles.id', 'subjects.id','classes.id','tutorprofiles.tutor_id', 'classes.name','subjects.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','sub_map_id','tutorprofiles.rateperhour','tutorprofiles.admin_commission')
            ->get();

            // dd($tutorlist);

        return view('student.yourtutor', compact('tutorlist'));
    }
    public function tutorprofile($id)
    {

        $tutorpd = tutorprofile::select(
            'tutorprofiles.*',
            'subjects.id as subjectid',
            'subjects.name as subject',
            \DB::raw('(tutorprofiles.rateperhour * tutorprofiles.admin_commission / 100) + tutorprofiles.rateperhour as rate')
        )
        ->leftJoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->leftJoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        ->leftJoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->where('tutorsubjectmappings.id', '=', $id)
        ->first();


            if($tutorpd){
                $achievement = tutorachievements::select('*')->where('tutor_id', '=', $tutorpd->tutor_id)->get();


                $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings','studentprofiles.name as student_name','studentprofiles.profile_pic as student_pic', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
                    ->leftjoin('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
                    ->leftjoin('studentprofiles','studentprofiles.student_id', '=', 'tutorreviews.student_id')
                    ->where('tutorreviews.tutor_id', '=', $tutorpd->id)->get();
            }


        if (!$tutorpd) {
            return view('student.tutorprofile')->with('fail', 'Something went wrong');
        }
        // echo $tutorpd;
        //     dd();
        return view('student.tutorprofile', compact('tutorpd', 'achievement', 'reviews'));
    }
    public function admintutorprofile($id)
    {
        // dd($id);
        $tutorpd = tutorprofile::select('tutorprofiles.*', 'subjects.name as subject', 'subjects.name as subject',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'))
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
            ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->where('tutorsubjectmappings.tutor_id', '=', $id)
            ->first();

// dd($tutorpd);
            if($tutorpd){
                $achievement = tutorachievements::select('*')->where('tutor_id', '=', $tutorpd->tutor_id)->get();


                $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings','studentprofiles.name as student_name','studentprofiles.profile_pic as student_pic', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
                    ->leftjoin('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
                    ->leftjoin('studentprofiles','studentprofiles.student_id', '=', 'tutorreviews.student_id')
                    ->where('tutorreviews.tutor_id', '=', $tutorpd->id)->get();
            }



        if (!$tutorpd) {
            return view('admin.tutorprofile')->with('fail', 'Something went wrong');
        }
        // echo $tutorpd;
        //     dd();
        return view('admin.tutorprofile', compact('tutorpd', 'achievement', 'reviews'));
    }

    public function tutoradvs(Request $request)
    {


        $classes = classes::all('id', 'name');

        $tutors = tutorprofile::select(
            'tutorsubjectmappings.id as submapid','tutorprofiles.name','tutorprofiles.profile_pic',
            'subjects.name as subject',
            'classes.name as className',
            'my_favourites.status as myfav',
            DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'),
            DB::raw('AVG(tutorreviews.ratings) as avg_rating')
        )
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','tutorsubjectmappings.class_id')
        ->leftJoin('my_favourites', function ($join) {
            $join->on('my_favourites.tutor_id', '=', 'tutorprofiles.tutor_id')
                ->where('my_favourites.student_id', session('userid')->id);
        })
        ->leftjoin('tutorreviews', function($join) {
            $join->on('tutorreviews.tutor_id', '=', 'tutorprofiles.tutor_id')
                 ->on('tutorreviews.subject_id', '=', 'tutorsubjectmappings.subject_id');
        })
        ->groupBy('tutorsubjectmappings.id','my_favourites.status', 'tutorprofiles.name', 'subjects.name', 'tutorsubjectmappings.rate','tutorsubjectmappings.admin_commission','classes.name','tutorprofiles.profile_pic')
        ->get();


    // Get form data
    $subjectIds = $request->input('subjectlistid');
    $gradeId = $request->input('gradelistid');
    $minPrice = $request->input('tminprice');
    $maxPrice = $request->input('tmaxprice');
    $ratings = $request->input('ratings');
    $locations = $request->input('locations');
    $tutorName = $request->input('ttsearch');

    // Tutors List
    $tutorlist = tutorprofile::select('tutorprofiles.tutor_id as tutor_id','my_favourites.status as myfav', 'classes.name as class_name', 'tutorprofiles.name', 'tutorprofiles.headline', 'tutorprofiles.experience', DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings) / COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), 'tutorsubjectmappings.id as sub_map_id',
        DB::raw('(SELECT COUNT(*) FROM classschedules WHERE classschedules.tutor_id = tutorprofiles.id) AS total_classes_done')
    )
        ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
        ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
        ->join('tutorregistrations','tutorregistrations.id','=','tutorprofiles.tutor_id')
        ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
        ->join('topics', 'topics.subject_id', '=', 'subjects.id')
        ->leftJoin('my_favourites', function ($join) {
            $join->on('my_favourites.tutor_id', '=', 'tutorprofiles.tutor_id')
                ->where('my_favourites.student_id', session('userid')->id);
        })
        ->where('tutorregistrations.is_active',1)
        ->when($subjectIds, function ($query) use ($subjectIds) {
            return $query->whereIn('tutorsubjectmappings.subject_id', $subjectIds);
        })
        ->when($gradeId, function ($query) use ($gradeId) {
            return $query->where('classes.id', $gradeId);
        })
        ->when($minPrice && $maxPrice, function ($query) use ($minPrice, $maxPrice) {
            return $query->whereBetween(DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100))'), [$minPrice, $maxPrice]);
        })
        ->when($tutorName, function ($query) use ($tutorName) {
            return $query->where('tutorregistrations.name', 'like', '%' . $tutorName . '%');
        })
        // ->when($ratings, function ($query) use ($ratings) {
        //     return $query->whereIn('tutorreviews.ratings', $ratings);
        // })
        // ->when($locations, function ($query) use ($locations) {
        //     return $query->whereIn('locations.name', $locations);
        // })
        // ->when($subjectId, function ($query, $subjectId) {
        //     return $query->where('subjects.id', $subjectId);
        // })
        // ->when($gradeId, function ($query, $gradeId) {
        //     return $query->where('classes.id', $gradeId);
        // })
        // ->when($minPrice && $maxPrice, function ($query, $minPrice, $maxPrice) {
        //     return $query->whereBetween(DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100))'), [$minPrice, $maxPrice]);
        // })
        ->groupby('tutorprofiles.id','my_favourites.status','tutorprofiles.tutor_id', 'subjects.id', 'subjects.name', 'classes.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name', 'rate', 'sub_map_id', 'experience', 'headline', 'total_classes_done')
        ->get();

        // Subject lists with category
        $subjectlists = DB::table('subjects')
        ->join('subjectcategories', 'subjects.category', '=', 'subjectcategories.id')
        ->select('subjectcategories.name as category_name', 'subjects.name as subject_name','subjects.id as subject_id')
        ->where('subjects.is_active', 1)
        ->orderBy('subjectcategories.name')
        ->get();

         // Grades/Level
         $gradelists = Classes::where('is_active',1)->get();
    // Pass only the necessary data to the Blade view
    // $html = view('front-cms.index_tutor_search', compact('tutorlists'))->render();

    // Return the HTML response
    // return response()->json(['html' => $html]);

        $subjectlist = subjects::select('*')->get();
        $classes = classes::where('is_active',1)->get();
        $countrylist = country::select('*')->get();
        // Grades/Level
        $gradelists = Classes::where('is_active',1)->get();

            // dd( ($tutors));
        // return view('front-cms.findatutor',get_defined_vars());

        if (!$tutorlist) {
            return view('student.searchtutor')->with('fail', 'No tutor found');
        }
        return view('student.searchtutor', get_defined_vars());
    }
    public function tutorsearchindex(Request $request)
    {
        // dd($request->all());

        // $query = tutorprofile::select('tutorprofiles.id','classes.name as class_name','tutorprofiles.name',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating,  COUNT(DISTINCT topics.name) as total_topics'),'tutorsubjectmappings.id as sub_map_id')
        // // select('tutorprofiles.id', 'tutorprofiles.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings)/COUNT(ratings) AS starrating, COUNT(topics.name) as total_topics'))
        //     ->leftjoin('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
        //     ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        //     ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        //     ->leftjoin('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
        //     ->leftjoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
        //     ->leftjoin('topics', 'topics.subject_id', '=', 'subjects.id');
        //     if($request->gradelistid){
        //         $query->where('teacherclassmappings.class_id',$request->gradelistid);
        //     }
        //     if($request->subjectlistid){
        //         $query->where('tutorsubjectmappings.subject_id',$request->subjectlistid);
        //     }


        //     $tutorlist=  $query->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name',  'classes.name','tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name','rate','sub_map_id')
        //     ->get();
        // // dd($tutorlist);

        // if (!$tutorlist) {
        //     return view('student.searchtutor')->with('fail', 'No tutor found');
        // }
        //////////////////////==========

        $classes = classes::all('id', 'name');

        // $tutors = tutorprofile::select('tutorprofiles.*', 'subjects.name as subject', 'subjects.name as subject',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'))
        //     ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        //     ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        //     ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        //     ->get();
        $tutors = tutorprofile::select(
            'tutorsubjectmappings.id as submapid','tutorprofiles.name','tutorprofiles.profile_pic',
            'subjects.name as subject',
            'classes.name as className',
            DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'),
            DB::raw('AVG(tutorreviews.ratings) as avg_rating')
        )
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','tutorsubjectmappings.class_id')
        ->leftjoin('tutorreviews', function($join) {
            $join->on('tutorreviews.tutor_id', '=', 'tutorprofiles.tutor_id')
                 ->on('tutorreviews.subject_id', '=', 'tutorsubjectmappings.subject_id');
        })
        ->groupBy('tutorsubjectmappings.id', 'tutorprofiles.name', 'subjects.name', 'tutorsubjectmappings.rate','tutorsubjectmappings.admin_commission','classes.name','tutorprofiles.profile_pic')
        ->get();

    // Check if either gradelistid or subjectlistid is provided
if ($request->has('gradelistid') || $request->has('subjectlistid')) {
    $tutorlists = tutorprofile::select('tutorprofiles.id', 'classes.name as class_name', 'tutorprofiles.name', 'tutorprofiles.headline', 'tutorprofiles.experience', DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings) / COUNT(ratings) AS starrating', 'COUNT(DISTINCT topics.name) as total_topics'), 'tutorsubjectmappings.id as sub_map_id', DB::raw('(SELECT COUNT(*) FROM classschedules WHERE classschedules.tutor_id = tutorprofiles.id) AS total_classes_done'))
        ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
        ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
        ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
        ->join('topics', 'topics.subject_id', '=', 'subjects.id')
        ->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name', 'classes.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name', 'rate', 'sub_map_id', 'experience', 'headline', 'total_classes_done');

    // Check if gradelistid is provided and add the condition
    if ($request->has('gradelistid')) {
        $tutorlists->where('classes.id', $request->gradelistid);
    }

    // Check if subjectlistid is provided and add the condition
    if ($request->has('subjectlistid')) {
        $tutorlists->where('tutorsubjectmappings.subject_id', $request->subjectlistid);
    }

    // Get the results
    $tutorlists = $tutorlists->get();
} else {
    // If neither gradelistid nor subjectlistid is provided, show an error or return an appropriate response.
    // You can handle the error or response based on your application's requirements.
}


        // Subject lists with category
        $subjectlists = DB::table('subjects')
        ->join('subjectcategories', 'subjects.category', '=', 'subjectcategories.id')
        ->select('subjectcategories.name as category_name', 'subjects.name as subject_name','subjects.id as subject_id')
        ->where('subjects.is_active', 1)
        ->orderBy('subjectcategories.name')
        ->get();

        // Grades/Level
        $gradelists = Classes::where('is_active',1)->get();

            // dd( ($tutors));
        return view('front-cms.index',get_defined_vars());


    }



    public function purchaseclass(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tutorenrollid' => 'required',
            'subjectenrollid' => 'required',
            // 'availableclassenroll' => 'required', //nnn
            'requiredclassenroll' => 'required',
            'rateperhourenroll' => 'required', //nn
            'totalamountenroll' => 'required' //nn
        ]);

        $selectedSlotIds = $request->slotids;
        $contactadmin = $request->contactadmin;

        // Temp. Order Id
        $order_id = '1234-5678-qqyz-aspa-zqkp1o2';

        $classId = subjects::select('*')->where('id',$request->subjectenrollid)->first();
        $tutorname = tutorprofile::select('*')->where('tutor_id',$request->tutorenrollid)->first();

        // Step 1: Save the paymentdetails record
        $paymentdetails = new paymentdetails();
        $paymentdetails->transaction_id = $order_id;
        $paymentdetails->payment_mode = 'Credit Card';
        $paymentdetails->amount = $request->totalamountenroll;
        $paymentdetails->status = 1;
        $test= $paymentdetails->save();

        // Step 2: Save the studentpayment record
        $studentpayment = new paymentstudents();
        $studentpayment->transaction_id = $order_id;
        $studentpayment->student_id = session('userid')->id;
        $studentpayment->class_id = $classId->class_id;
        $studentpayment->subject_id = $request->subjectenrollid;
        $studentpayment->tutor_id = $request->tutorenrollid;
        $studentpayment->classes_purchased = $request->requiredclassenroll;
        $studentpayment->rate_per_hr = $request->rateperhourenroll;
        $spdres = $studentpayment->save();

        // Send welcome mail
        $details = [
            'name' => session('userid')->name,
            'total_classes' => $request->requiredclassenroll,
            'tutor_name' => $tutorname->name,
            'mailtype' => 4
            ];

            Mail::to(session('userid')->email)->send(new SendMail($details));
            // Send welcome mail ends here ..

       // Step 3: Update slotbooking records for each selected slot
       // Converting comma-separated string to an array
        $selectedSlotIdsArray = explode(',', $selectedSlotIds);
        foreach ($selectedSlotIdsArray as $slotId) {
        // Find the existing slotbooking record by id
        $slotbooking = SlotBooking::find($slotId);

            // Check if the record exists
            if ($slotbooking) {
                // Update the fields as needed
                $slotbooking->student_id = session('userid')->id;
                $slotbooking->booked_at = Carbon::now();
                $slotbooking->transaction_id = $order_id;
                $slotbooking->subject_id = $request->subjectenrollid;
                $slotbooking->status = 1;
                $slotbooking->contact_admin = $request->contactadmin == 'on' ? 1 : 0;
                $slotbooking->class_schedule_id = $studentpayment->id;
                // $slotbooking->slot_id = $slotId;

                // Save the changes
                $slotbooking->save();
            }
        }
        if($contactadmin == 'on'){

            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 6;
            $notificationdata->notification = session('userid')->name.' Need your help in slot booking';
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $request->tutorenrollid;
            // Sending to admin
            // if($request->receiver_role_id == 1){
            //     $notificationdata->show_to_admin = 1;
            //     $notificationdata->show_to_admin_id = $request->receiver_id;
                $notificationdata->show_to_all_admin = 1;
            // }
            // Sending to tutor
            // if($request->receiver_role_id == 2){
                // $notificationdata->show_to_tutor = 1;
                // $notificationdata->show_to_tutor_id = $tutor_id->tutor_id;
                // $notificationdata->show_to_all_tutor = 0;
            // }
            // Sending to student
            // if($request->receiver_role_id == 3){
            //     $notificationdata->show_to_student = 1;
            //     $notificationdata->show_to_student_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_student = 0;
            // }
            // // Sending to parent
            // if($request->receiver_role_id == 3){
            //     $notificationdata->show_to_parent = 1;
            //     $notificationdata->show_to_parent_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_parent = 0;
            // }
            $notificationdata->read_status = 0;

            $notified = $notificationdata->save();
            broadcast(new RealTimeMessage('$notification'));

            $msg = 'Enrollment completed. Please have patience, admin you contact you soon.';
        }
        else{
            $msg = 'Enrollment Completed & Slots confirmed.';
        }

        if ($spdres) {

            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 4;
            $notificationdata->notification = session('userid')->name.' Enrolled for classes';
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $request->tutorenrollid;
            // Sending to admin
            // if($request->receiver_role_id == 1){
            //     $notificationdata->show_to_admin = 1;
            //     $notificationdata->show_to_admin_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_admin = 1;
            // }
            // Sending to tutor
            // if($request->receiver_role_id == 2){
                $notificationdata->show_to_tutor = 1;
                $notificationdata->show_to_tutor_id = $request->tutorenrollid;
                // $notificationdata->show_to_all_tutor = 0;
            // }
            // Sending to student
            // if($request->receiver_role_id == 3){
            //     $notificationdata->show_to_student = 1;
            //     $notificationdata->show_to_student_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_student = 0;
            // }
            // // Sending to parent
            // if($request->receiver_role_id == 3){
            //     $notificationdata->show_to_parent = 1;
            //     $notificationdata->show_to_parent_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_parent = 0;
            // }
            $notificationdata->read_status = 0;

            $notified = $notificationdata->save();
            broadcast(new RealTimeMessage('$notification'));

            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something Went Wrong. Try Again Later');
        }
    }



    public function tutorslist(){
        $ttrlists = tutorregistration::select('*','tutorregistrations.id as tutor_id', 'classes.name as class_name','tutorregistrations.name as tutor_name','tutorregistrations.mobile as tutor_mobile','tutorregistrations.email as tutor_email','tutorregistrations.is_active as tutor_status','subjects.name as subject_name','tutorprofiles.rateperhour as rate','tutorprofiles.admin_commission as admin_commission','tutorprofiles.id as rate_id')
    ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorregistrations.id')
    ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
    ->leftjoin('classes', 'classes.id', '=', 'subjects.class_id')
    ->leftJoin('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
    ->orderBy('tutorregistrations.created_at', 'desc') // Add this line to sort by created_at in descending order
    ->get();

    $classes = classes::where('is_active', 1)->get();

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

    // tutor search index page/common page
    public function tutorsindexsearch(Request $request){

        // dd($request->gradelistid);

        $classes = classes::all('id', 'name');

        $tutors = tutorprofile::select(
            'tutorsubjectmappings.id as submapid','tutorprofiles.name','tutorprofiles.profile_pic',
            'subjects.name as subject',
            'classes.name as className',
            DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'),
            DB::raw('AVG(tutorreviews.ratings) as avg_rating')
        )
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','tutorsubjectmappings.class_id')
        ->leftjoin('tutorreviews', function($join) {
            $join->on('tutorreviews.tutor_id', '=', 'tutorprofiles.tutor_id')
                 ->on('tutorreviews.subject_id', '=', 'tutorsubjectmappings.subject_id');
        })
        ->groupBy('tutorsubjectmappings.id', 'tutorprofiles.name', 'subjects.name', 'tutorsubjectmappings.rate','tutorsubjectmappings.admin_commission','classes.name','tutorprofiles.profile_pic')
        ->get();



    // Get form data
    $subjectIds = $request->input('subjectlistid');
    $gradeId = $request->input('gradelistid');
    $minPrice = $request->input('tminprice');
    $maxPrice = $request->input('tmaxprice');
    $ratings = $request->input('ratings');
    $locations = $request->input('locations');

    // Tutors List
    $tutorlists = tutorprofile::select('tutorprofiles.tutor_id as tutor_id', 'classes.name as class_name', 'tutorprofiles.name', 'tutorprofiles.headline', 'tutorprofiles.experience', DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings) / COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), 'tutorsubjectmappings.id as sub_map_id',
        DB::raw('(SELECT COUNT(*) FROM classschedules WHERE classschedules.tutor_id = tutorprofiles.id) AS total_classes_done')
    )
        ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
        ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
        ->join('tutorregistrations','tutorregistrations.id','=','tutorprofiles.tutor_id')
        ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
        ->join('topics', 'topics.subject_id', '=', 'subjects.id')
        ->where('tutorregistrations.is_active',1)
        ->when($subjectIds, function ($query) use ($subjectIds) {
            return $query->whereIn('tutorsubjectmappings.subject_id', $subjectIds);
        })
        ->when($gradeId, function ($query) use ($gradeId) {
            return $query->where('classes.id', $gradeId);
        })
        ->when($minPrice && $maxPrice, function ($query) use ($minPrice, $maxPrice) {
            return $query->whereBetween(DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100))'), [$minPrice, $maxPrice]);
        })
        // ->when($ratings, function ($query) use ($ratings) {
        //     return $query->whereIn('tutorreviews.ratings', $ratings);
        // })
        // ->when($locations, function ($query) use ($locations) {
        //     return $query->whereIn('locations.name', $locations);
        // })
        // ->when($subjectId, function ($query, $subjectId) {
        //     return $query->where('subjects.id', $subjectId);
        // })
        // ->when($gradeId, function ($query, $gradeId) {
        //     return $query->where('classes.id', $gradeId);
        // })
        // ->when($minPrice && $maxPrice, function ($query, $minPrice, $maxPrice) {
        //     return $query->whereBetween(DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100))'), [$minPrice, $maxPrice]);
        // })
        ->groupby('tutorprofiles.id','tutorprofiles.tutor_id', 'subjects.id', 'subjects.name', 'classes.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name', 'rate', 'sub_map_id', 'experience', 'headline', 'total_classes_done')
        ->get();

        // Subject lists with category
        $subjectlists = DB::table('subjects')
        ->join('subjectcategories', 'subjects.category', '=', 'subjectcategories.id')
        ->select('subjectcategories.name as category_name', 'subjects.name as subject_name','subjects.id as subject_id')
        ->where('subjects.is_active', 1)
        ->orderBy('subjectcategories.name')
        ->get();

         // Grades/Level
         $gradelists = Classes::where('is_active',1)->get();
    // Pass only the necessary data to the Blade view
    $html = view('front-cms.index_tutor_search', compact('tutorlists'))->render();

    // Return the HTML response
    // return response()->json(['html' => $html]);

        $subjectlist = subjects::select('*')->get();
        $classes = classes::where('is_active',1)->get();
        $countrylist = country::select('*')->get();
        // Grades/Level
        $gradelists = Classes::where('is_active',1)->get();

            // dd( ($tutors));
        return view('front-cms.findatutor',get_defined_vars());
    }

    // tutor search dashboard page
    public function tutorsdashboardsearch(Request $request){

        $classes = classes::all('id', 'name');

        $tutors = tutorprofile::select(
            'tutorsubjectmappings.id as submapid','tutorprofiles.name','tutorprofiles.profile_pic',
            'subjects.name as subject',
            'classes.name as className',
            DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'),
            DB::raw('AVG(tutorreviews.ratings) as avg_rating')
        )
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
        ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes','classes.id','=','tutorsubjectmappings.class_id')
        ->leftjoin('tutorreviews', function($join) {
            $join->on('tutorreviews.tutor_id', '=', 'tutorprofiles.tutor_id')
                 ->on('tutorreviews.subject_id', '=', 'tutorsubjectmappings.subject_id');
        })
        ->groupBy('tutorsubjectmappings.id', 'tutorprofiles.name', 'subjects.name', 'tutorsubjectmappings.rate','tutorsubjectmappings.admin_commission','classes.name','tutorprofiles.profile_pic')
        ->get();

    // Get form data
    $subjectId = $request->input('subjectlistid');
    $gradeId = $request->input('gradelistid');
    $minPrice = $request->input('tminprice');
    $maxPrice = $request->input('tmaxprice');


    // Tutors List
    $tutorlists = tutorprofile::select('tutorprofiles.id', 'classes.name as class_name', 'tutorprofiles.name', 'tutorprofiles.headline', 'tutorprofiles.experience', DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'), 'tutorprofiles.profile_pic', 'subjects.id as subjectid', 'subjects.name as subject', DB::raw('SUM(ratings) / COUNT(ratings) AS starrating, COUNT(DISTINCT topics.name) as total_topics'), 'tutorsubjectmappings.id as sub_map_id',
        DB::raw('(SELECT COUNT(*) FROM classschedules WHERE classschedules.tutor_id = tutorprofiles.id) AS total_classes_done')
    )
        ->join('teacherclassmappings', 'teacherclassmappings.teacher_id', '=', 'tutorprofiles.tutor_id')
        ->join('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
        ->join('classes', 'classes.id', '=', 'tutorsubjectmappings.class_id')
        ->leftJoin('tutorreviews', 'tutorreviews.tutor_id', '=', 'tutorprofiles.id')
        ->join('topics', 'topics.subject_id', '=', 'subjects.id')
        ->when($subjectId, function ($query, $subjectId) {
            return $query->where('subjects.id', $subjectId);
        })
        ->when($gradeId, function ($query, $gradeId) {
            return $query->where('classes.id', $gradeId);
        })
        ->when($minPrice && $maxPrice, function ($query, $minPrice, $maxPrice) {
            return $query->whereBetween(DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100))'), [$minPrice, $maxPrice]);
        })
        ->groupby('tutorprofiles.id', 'subjects.id', 'subjects.name', 'classes.name', 'tutorprofiles.rate', 'tutorprofiles.profile_pic', 'tutorprofiles.name', 'rate', 'sub_map_id', 'experience', 'headline', 'total_classes_done')
        ->get();

        // Subject lists with category
        $subjectlists = DB::table('subjects')
        ->join('subjectcategories', 'subjects.category', '=', 'subjectcategories.id')
        ->select('subjectcategories.name as category_name', 'subjects.name as subject_name','subjects.id as subject_id')
        ->where('subjects.is_active', 1)
        ->orderBy('subjectcategories.name')
        ->get();

         // Grades/Level
         $gradelists = Classes::where('is_active',1)->get();
    // Pass only the necessary data to the Blade view
    $html = view('student.tutorsearchdashboard', compact('tutorlists'))->render();

    // Return the HTML response
    return response()->json(['html' => $html]);


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
        // dd($request->id);
        // $tutorid = tutorsubjectmapping::find($request->id);
        $data = TutorProfile::where('tutor_id', $request->id)->first();
        // dd($data);
            $data->admin_commission = $request->commission;
            $res = $data->save();
     return json_encode(array('statusCode'=>200));
    }

    public function teacherProfile($id){
         $tutorpd = tutorprofile::select('tutorprofiles.*', 'subjects.name as subject', 'subjects.name as subject',DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'))
        ->leftjoin('tutorsubjectmappings', 'tutorsubjectmappings.tutor_id', '=', 'tutorprofiles.tutor_id')
            ->leftjoin('teacherclassmappings', 'teacherclassmappings.subject_mapping_id', '=', 'tutorsubjectmappings.id')
            ->leftjoin('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            // ->where('tutorprofiles.id', '=', $id)
            ->where('tutorsubjectmappings.id', '=', $id)
            ->first();


        if($tutorpd){
            $achievement = tutorachievements::select('*')->where('tutor_id', '=', $tutorpd->id)->get();


            $reviews = tutorreviews::select('tutorreviews.id', 'tutorreviews.name', 'tutorreviews.ratings', 'tutorreviews.subject_id', 'tutorreviews.tutor_id', 'subjects.name as subject')
                ->leftjoin('subjects', 'subjects.id', '=', 'tutorreviews.subject_id')
                ->where('tutorreviews.tutor_id', '=', $tutorpd->id)->get();
        }



        if (!$tutorpd) {
            return back();
        }

        return view('common.tutorprofile', compact('tutorpd', 'achievement', 'reviews'));

    }

    function enrollnow($id){
        $currentDate = Carbon::now()->toDateString();
        $enrollment = TutorSubjectMapping::select('tutorsubjectmappings.*','subjects.name as subject_name','tutorprofiles.name as tutor_name',\DB::raw('(tutorprofiles.rateperhour * tutorprofiles.admin_commission / 100) + tutorprofiles.rateperhour as rate'))
        ->join('tutorprofiles','tutorprofiles.tutor_id','=','tutorsubjectmappings.tutor_id')
        ->join('subjects','subjects.id','=','tutorsubjectmappings.subject_id')
        ->where('tutorprofiles.tutor_id',$id)
        ->first();

        $slotsAvailability = SlotBooking::select('slot_bookings.*', 'studentprofiles.name as student_name', 'subjects.name as subject')
    ->leftJoin('studentprofiles', 'studentprofiles.student_id', '=', 'slot_bookings.student_id')
    ->leftJoin('subjects', 'subjects.id', '=', 'slot_bookings.subject_id')
    ->where('slot_bookings.tutor_id', $id)
    ->whereDate('slot_bookings.date', '>=', $currentDate) // Filter for current date or later
    ->orderBy('slot_bookings.date')
    ->get();
        // dd($slotsAvailability);
    $groupedSlots = [];
    foreach ($slotsAvailability as $slot) {
        $date = Carbon::parse($slot->date)->isoFormat('DD-MM-YYYY (dddd)');
        $time = $slot->slot;
        $id = $slot->id;
        $isAvailable = $slot->status == 0; // Adjust this based on your actual logic
        // dd($slotsAvailability);
        if (!isset($groupedSlots[$date])) {
            $groupedSlots[$date] = [];
        }

        $groupedSlots[$date][] = [
            'time' => $time,
            'is_available' => $isAvailable,
            'id' => $id,
        ];
    }

    return view('student.enrollnow', compact('enrollment', 'groupedSlots'));
    }

    function enrollupdate($id) {
        $studentid = session('userid')->id;

        $enrollment = TutorSubjectMapping::select('tutorsubjectmappings.*', 'subjects.name as subject_name', 'tutorprofiles.name as tutor_name', DB::raw('(tutorsubjectmappings.rate + (tutorsubjectmappings.rate * tutorsubjectmappings.admin_commission / 100)) as rate'),)
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', '=', 'tutorsubjectmappings.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'tutorsubjectmappings.subject_id')
            ->where('tutorsubjectmappings.id', $id)
            ->first();

        $slotsAvailability = SlotBooking::select('slot_bookings.*', 'studentprofiles.name as student_name', 'subjects.name as subject', 'studentregistrations.id as student_id')
            ->leftJoin('studentprofiles', 'studentprofiles.student_id', '=', 'slot_bookings.student_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'slot_bookings.subject_id')
            ->leftJoin('studentregistrations', 'studentregistrations.id', '=', 'slot_bookings.student_id')
            ->where('slot_bookings.tutor_id', $enrollment->tutor_id)
            ->orderBy('slot_bookings.date')
            ->get();

        $groupedSlots = [];
        $bookedSlotsCount = 0; // Initialize the count variable

        foreach ($slotsAvailability as $slot) {
            $date = $slot->date;
            $time = $slot->slot;

            $id = $slot->id;
            $isAvailable = $slot->status == 0; // Adjust this based on your actual logic
            $bookedById = $slot->student_id == $studentid; // Check if the slot is booked by the current student

            if (!isset($groupedSlots[$date])) {
                $groupedSlots[$date] = [];
            }

            $groupedSlots[$date][] = [
                'time' => $time,
                'is_available' => $isAvailable,
                'id' => $id,
                'bookedbyme' => $bookedById,
            ];

            // Increment the count if the slot is booked by the current user
            if ($bookedById) {
                $bookedSlotsCount++;
            }
        }

        return view('student.enrollupdate', compact('enrollment', 'groupedSlots', 'bookedSlotsCount'));
    }


    function updateslots(Request $request){
        // dd($request->all());
        $selectedSlotIds = $request->slotids;
        $contactadmin = $request->contactadmin;

        $studentpayment = paymentstudents::select('*')
        ->where('student_id',session('userid')->id)
        ->where('tutor_id',$request->tutorenrollid)
        ->where('subject_id',$request->subjectenrollid)
        ->orderBy('id','desc')
        ->first();

        $spdres = "";
        // Step 3: Update slotbooking records for each selected slot
       // Converting comma-separated string to an array
       $selectedSlotIdsArray = explode(',', $selectedSlotIds);
       foreach ($selectedSlotIdsArray as $slotId) {
       // Find the existing slotbooking record by id
       $slotbooking = SlotBooking::find($slotId);

           // Check if the record exists
           if ($slotbooking) {
               // Update the fields as needed
               $slotbooking->student_id = session('userid')->id;
               $slotbooking->booked_at = Carbon::now();
               $slotbooking->transaction_id = $studentpayment->transaction_id;
               $slotbooking->subject_id = $request->subjectenrollid;
               $slotbooking->status = 1;
               $slotbooking->contact_admin = $request->contactadmin == 'on' ? 1 : 0;
               $slotbooking->class_schedule_id = $studentpayment->id;
               // $slotbooking->slot_id = $slotId;

               // Save the changes
               $spdres = $slotbooking->save();
           }
       }
        if($contactadmin == 'on'){
            $msg = 'Slots Updated. Please have patience, admin will contact you soon.';
        }
        else{
            $msg = 'Slots Updated & confirmed. For any querry, you can contact admin.';
        }

        // dd($studentpayment);
        if ($spdres) {

            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something Went Wrong. Try Again Later');
        }
    }
    function tutorslotscheck($id){
        $slots = SlotBooking::select('slot_bookings.*','studentprofiles.name as student_name','subjects.name as subject')
        ->leftJoin('studentprofiles','studentprofiles.student_id','=','slot_bookings.student_id')
        ->leftJoin('subjects','subjects.id','=','slot_bookings.subject_id')
        ->where('slot_bookings.tutor_id',$id)
        ->get();

    return view('admin.tutorslots', compact('slots'));
    }

}
