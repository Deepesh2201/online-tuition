<?php

namespace App\Http\Controllers;

use App\Models\admin\admin;
use App\Models\ch_messages;
use App\Models\Notification;
use App\Models\studentprofile;
use App\Models\studentregistration;
use App\Models\tutorprofile;
use App\Models\tutorregistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Events\RealTimeMessage;

class MessagesController extends Controller
{

    // Messages by tutor
    public function messagesbytutor()
    {
        $userlists = studentregistration::select(
            'studentregistrations.*',
            'studentprofiles.profile_pic as profile_pic'
        )
        ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
        ->join('paymentstudents', 'paymentstudents.student_id', '=', 'studentregistrations.id')
        ->where('paymentstudents.tutor_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('studentregistrations.id',
        'studentprofiles.profile_pic',
        'studentregistrations.name',
        'studentregistrations.mobile',
        'studentregistrations.email',
        'studentregistrations.is_mobile_verified',
        'studentregistrations.mobile_verified_at',
        'studentregistrations.is_email_verified',
        'studentregistrations.email_verified_at',
        'studentregistrations.password',
        'studentregistrations.class_id',
        'studentregistrations.role_id',
        'studentregistrations.is_active',
        'studentregistrations.remember_token',
        'studentregistrations.created_at',
        'studentregistrations.updated_at',
        'studentregistrations.mobile_otp',
        'studentregistrations.email_otp',
        'studentregistrations.parent_password'
        )
        ->get();



        return view('tutor.message', compact('userlists'));
    }
    public function messagesbytutoradmins()
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();

        return view('tutor.message', compact('userlists'));
    }
    public function messagesbytutorstudents()
    {
        $userlists = studentregistration::select(
            'studentregistrations.*',
            'studentprofiles.profile_pic as profile_pic'
        )
        ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
        ->join('paymentstudents', 'paymentstudents.student_id', '=', 'studentregistrations.id')
        ->where('paymentstudents.tutor_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('studentregistrations.id',
        'studentprofiles.profile_pic',
        'studentregistrations.name',
        'studentregistrations.mobile',
        'studentregistrations.email',
        'studentregistrations.is_mobile_verified',
        'studentregistrations.mobile_verified_at',
        'studentregistrations.is_email_verified',
        'studentregistrations.email_verified_at',
        'studentregistrations.password',
        'studentregistrations.class_id',
        'studentregistrations.role_id',
        'studentregistrations.is_active',
        'studentregistrations.remember_token',
        'studentregistrations.created_at',
        'studentregistrations.updated_at',
        'studentregistrations.mobile_otp',
        'studentregistrations.email_otp',
        'studentregistrations.parent_password'
        )
        ->get();

        return view('tutor.message', compact('userlists'));
    }

    public function messagesbytutoradminmessages($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at','desc')->get();

        // dd($messages);
        return view('tutor.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesbytutoradminmessagesload($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at','desc')->get();

        // dd($messages);
        return view('tutor.partial_chat_messages', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesbytutorstudentmessages($id)
    {
        $userlists = studentregistration::select(
            'studentregistrations.*',
            'studentprofiles.profile_pic as profile_pic'
        )
        ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
        ->join('paymentstudents', 'paymentstudents.student_id', '=', 'studentregistrations.id')
        ->where('paymentstudents.tutor_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('studentregistrations.id',
        'studentprofiles.profile_pic',
        'studentregistrations.name',
        'studentregistrations.mobile',
        'studentregistrations.email',
        'studentregistrations.is_mobile_verified',
        'studentregistrations.mobile_verified_at',
        'studentregistrations.is_email_verified',
        'studentregistrations.email_verified_at',
        'studentregistrations.password',
        'studentregistrations.class_id',
        'studentregistrations.role_id',
        'studentregistrations.is_active',
        'studentregistrations.remember_token',
        'studentregistrations.created_at',
        'studentregistrations.updated_at',
        'studentregistrations.mobile_otp',
        'studentregistrations.email_otp',
        'studentregistrations.parent_password'
        )
        ->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at','desc')->get();



        return view('tutor.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function messagesbytutorstudentmessagesload($id)
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at','desc')->get();



        return view('tutor.partial_chat_messages', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesentbytutor(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";

        $res = $data->save();
        if ($res) {
            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 1;
            $notificationdata->notification = $request->message;
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $data->id;
            // Sending to admin
            if($request->receiver_role_id == 1){
                $notificationdata->show_to_admin = 1;
                $notificationdata->show_to_admin_id = $request->receiver_id;
                // $notificationdata->show_to_all_admin = 1;
            }
            // Sending to tutor
            if($request->receiver_role_id == 2){
                $notificationdata->show_to_tutor = 1;
                $notificationdata->show_to_tutor_id = $request->receiver_id;
                // $notificationdata->show_to_all_tutor = 0;
            }
            // Sending to student
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_student = 1;
                $notificationdata->show_to_student_id = $request->receiver_id;
                // $notificationdata->show_to_all_student = 0;
            }
            // Sending to parent
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_parent = 1;
                $notificationdata->show_to_parent_id = $request->receiver_id;
                // $notificationdata->show_to_all_parent = 0;
            }
            $notificationdata->read_status = 0;

            $notified = $notificationdata->save();
            broadcast(new RealTimeMessage('$notification'));

            return back()->with('success', 'Message sent successfully!');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }

    // Messages by student
    public function messagesbystudent()
    {
        $prof_chk = studentprofile::select('*')->where('student_id','=',session('userid')->id)->count();
        if ($prof_chk == 0) {
            return redirect()->route('student.dashboard')->with('fail', 'Please update your profile details to start messaging. Click on profile > Edit Profile');
        }
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
        ->join('tutorprofiles', 'tutorprofiles.tutor_id', '=', 'tutorregistrations.id')
        ->join('paymentstudents', 'paymentstudents.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->where('paymentstudents.student_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('tutorregistrations.id','tutorregistrations.name','tutorregistrations.mobile','tutorregistrations.email','tutorregistrations.is_mobile_verified','tutorregistrations.mobile_verified_at','tutorregistrations.is_email_verified','tutorregistrations.email_verified_at','tutorregistrations.password','tutorregistrations.role_id','tutorregistrations.is_active','tutorregistrations.remember_token','tutorregistrations.created_at','tutorregistrations.updated_at','tutorprofiles.profile_pic')
        ->distinct()
        ->get();

        // dd();
        return view('student.message', compact('userlists'));
    }
    public function messagesbystudentadmins()
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();

        return view('student.message', compact('userlists'));
    }
    public function messagesbystudenttutor()
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
        ->join('tutorprofiles', 'tutorprofiles.tutor_id', '=', 'tutorregistrations.id')
        ->join('paymentstudents', 'paymentstudents.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->where('paymentstudents.student_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('tutorregistrations.id','tutorregistrations.name','tutorregistrations.mobile','tutorregistrations.email','tutorregistrations.is_mobile_verified','tutorregistrations.mobile_verified_at','tutorregistrations.is_email_verified','tutorregistrations.email_verified_at','tutorregistrations.password','tutorregistrations.role_id','tutorregistrations.is_active','tutorregistrations.remember_token','tutorregistrations.created_at','tutorregistrations.updated_at','tutorprofiles.profile_pic')
        ->distinct()
        ->get();

        return view('student.message', compact('userlists'));
    }

    public function messagesbystudentadminmessages($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();

        // dd($messages);
        return view('student.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesbystudentadminmessagesload($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();

        // dd($messages);
        return view('student.partial_chat_messages', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function messagesbystudenttutormessages($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
        ->join('tutorprofiles', 'tutorprofiles.tutor_id', '=', 'tutorregistrations.id')
        ->join('paymentstudents', 'paymentstudents.tutor_id', '=', 'tutorprofiles.tutor_id')
        ->where('paymentstudents.student_id', session('userid')->id)
        ->where('is_active', 1)
        ->groupBy('tutorregistrations.id','tutorregistrations.name','tutorregistrations.mobile','tutorregistrations.email','tutorregistrations.is_mobile_verified','tutorregistrations.mobile_verified_at','tutorregistrations.is_email_verified','tutorregistrations.email_verified_at','tutorregistrations.password','tutorregistrations.role_id','tutorregistrations.is_active','tutorregistrations.remember_token','tutorregistrations.created_at','tutorregistrations.updated_at','tutorprofiles.profile_pic')
        ->distinct()
        ->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();



        // return view('student.partial_chat_messages', ['messages' => $messages], compact('userlists', 'header', 'profile_pics'));
        return view('student.message', compact('userlists', 'header', 'messages', 'profile_pics'));


    // Render messages HTML and return
    }
    public function messagesbystudenttutormessagesload($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();



        return view('student.partial_chat_messages', ['messages' => $messages], compact('userlists', 'header', 'profile_pics'));
        // return view('student.message', compact('userlists', 'header', 'messages', 'profile_pics'));


    // Render messages HTML and return
    }
    public function messagesentbystudent(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";
        echo $request->receiver_role_id;
        $res = $data->save();

        if ($res) {
            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 1;
            $notificationdata->notification = $request->message;
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $data->id;
            // Sending to admin
            if($request->receiver_role_id == 1){
                $notificationdata->show_to_admin = 1;
                $notificationdata->show_to_admin_id = $request->receiver_id;
                // $notificationdata->show_to_all_admin = 1;
            }
            // Sending to tutor
            if($request->receiver_role_id == 2){
                $notificationdata->show_to_tutor = 1;
                $notificationdata->show_to_tutor_id = $request->receiver_id;
                // $notificationdata->show_to_all_tutor = 0;
            }
            // Sending to student
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_student = 1;
                $notificationdata->show_to_student_id = $request->receiver_id;
                // $notificationdata->show_to_all_student = 0;
            }
            // Sending to parent
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_parent = 1;
                $notificationdata->show_to_parent_id = $request->receiver_id;
                // $notificationdata->show_to_all_parent = 0;
            }
            $notificationdata->read_status = 0;

            $notified = $notificationdata->save();
            broadcast(new RealTimeMessage('$notification'));

            return back()->with('success', 'Message sent successfully!');

        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }


    // Messages by admin
    public function messagesbyadmin()
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }
    public function messagesbyadminstudents()
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }
    public function chatstudentsearch(Request $request)
    {
        
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
        ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
        ->where('studentregistrations.is_active', 1)
        ->where('studentregistrations.name', 'like', '%' . $request->searchtext . '%')
        ->get();

        return view('admin.message', compact('userlists'));
    }
    public function messagesbyadmintutor()
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }
    public function chattutorsearch(Request $request)
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
        ->join('tutorprofiles', 'tutorprofiles.tutor_id', '=', 'tutorregistrations.id')
        ->where('tutorregistrations.is_active', 1)
        ->where('tutorregistrations.name', 'like', '%' . $request->searchtext . '%')
        ->get();

        return view('admin.message', compact('userlists'));
    }

    public function messagesbyadminstudentmessages($id)
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages =  ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
                    // ->whereNull('deleted_at');
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
                    // ->whereNull('deleted_at');
            })
            ->orderby('created_at', 'desc')->get();

        // dd($messages);
        return view('admin.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesbyadminstudentmessagesload($id)
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages =  ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
                    // ->whereNull('deleted_at');
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
                    // ->whereNull('deleted_at');
            })
            ->orderby('created_at', 'desc')->get();

        // dd($messages);
        return view('admin.partial_chat_messages', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function chatClearAdminstudent($id)
    {

        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();

        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->delete();

            return back()->with('success', 'Chat cleared successfully!');

    }



    public function messagesbyadmintutormessages($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            // ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();



        return view('admin.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesbyadmintutormessagesload($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            // ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->orderby('created_at', 'desc')->get();



        return view('admin.partial_chat_messages', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function chatClearAdmintutor($id)
    {


        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();

        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->delete();

        return back()->with('success', 'Chat cleared successfully!');

    }
    public function messagesentbyadmin(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";

        $res = $data->save();
        if ($res) {
            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 1;
            $notificationdata->notification = $request->message;
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $data->id;
            // Sending to admin
            if($request->receiver_role_id == 1){
                $notificationdata->show_to_admin = 1;
                $notificationdata->show_to_admin_id = $request->receiver_id;
                // $notificationdata->show_to_all_admin = 1;
            }
            // Sending to tutor
            if($request->receiver_role_id == 2){
                $notificationdata->show_to_tutor = 1;
                $notificationdata->show_to_tutor_id = $request->receiver_id;
                // $notificationdata->show_to_all_tutor = 0;
            }
            // Sending to student
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_student = 1;
                $notificationdata->show_to_student_id = $request->receiver_id;
                // $notificationdata->show_to_all_student = 0;
            }
            // Sending to parent
            if($request->receiver_role_id == 3){
                $notificationdata->show_to_parent = 1;
                $notificationdata->show_to_parent_id = $request->receiver_id;
                // $notificationdata->show_to_all_parent = 0;
            }
            $notificationdata->read_status = 0;

            $notified = $notificationdata->save();
            broadcast(new RealTimeMessage('$notification'));

            return back()->with('success', 'Message sent successfully!');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }
}
