<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\democlasses;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    public function index()
    {
        $demos = democlasses::select('*', 'democlasses.id as demo_id', 'tutorregistrations.name as tutor', 'tutorregistrations.mobile as tutor_mobile', 'subjects.name as subject', 'subjects.id as subjectid', 'statuses.name as currentstatus', 'studentregistrations.id as student_id', 'studentregistrations.name as student_name', 'studentregistrations.mobile as student_mobile')
            ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'democlasses.subject_id')
            ->join('statuses', 'statuses.id', '=', 'democlasses.status')
            ->join('studentregistrations', 'studentregistrations.id', '=', 'democlasses.student_id')
            ->where('democlasses.student_id', '=', session('userid')->id)
            ->get();

        $statuses = status::select('*')->get();
        return view('admin.demolist', compact('demos', 'statuses'));
    }
    public function democancel(Request $request)
    {
        $demo = democlasses::find($request->id);
        // echo $demo;
        $demo->status = "5";
        $res = $demo->save();
        if ($res) {

            return back()->with('success', 'Trial Cancelled Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong. Try Again Later');

        }
    }

    public function bookdemo(Request $request)
    {
        $demo = new democlasses();
        $demo->student_id = session('userid')->id;
        $demo->tutor_id = $request->demotutorid;
        $demo->subject_id = $request->demosubjectid;
        // $demo->subject_id = $request->demosubjectid;
        $demo->slot_1 = $request->demoslotfirst;
        $demo->slot_2 = $request->demoslotsecond;
        $demo->slot_3 = $request->demoslotthird;
        // $demo->slot_confirmed = "";
        // $demo->slot_confirmed_at = "";
        // $demo->slot_confirmed_by = "";
        $demo->status = "1";

        $res = $demo->save();
        if ($res) {

            return back()->with('success', 'Trial Scheduled Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong. Try Again Later');

        }
    }

    public function demodetails($id)
    {
        $demo = democlasses::find($id);
        return json_encode(array($demo));
    }

    public function democonfirm(Request $request)
    {
        $request->validate([
            'slot' => 'required',
            'demolink' => 'required',
        ]);

        $dcnf = democlasses::find($request->confirmid);

        $dcnf->slot_confirmed = $request->slot;
        $dcnf->slot_confirmed_at = Carbon::now();
        $dcnf->slot_confirmed_by = session('userid')->id;
        $dcnf->demo_link = $request->demolink;
        $dcnf->remarks = $request->demoremarks;
        $dcnf->status = 3;

        $res = $dcnf->save();
        if ($res) {
            return back()->with('success', 'Slot confirmed successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }
    public function demoupdate(Request $request)
    {
        $request->validate([
            'slotupdate1' => 'required',
            'statusupdate' => 'required',
        ]);

        $dcnf = democlasses::find($request->demoupdateid);

        $dcnf->slot_1 = $request->slotupdate1;
        $dcnf->slot_2 = $request->slotupdate2;
        $dcnf->slot_3 = $request->slotupdate3;
        $dcnf->status = $request->statusupdate;

        $res = $dcnf->save();
        if ($res) {
            return back()->with('success', 'Slot updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }

    public function tutordemolist()
    {

        $demos = democlasses::select('*', 'democlasses.id as demo_id', 'tutorregistrations.name as tutor', 'tutorregistrations.mobile as tutor_mobile', 'subjects.name as subject', 'subjects.id as subjectid', 'statuses.name as currentstatus', 'studentregistrations.id as student_id', 'studentregistrations.name as student_name', 'studentregistrations.mobile as student_mobile', 'classes.name as classname')
            ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
            ->join('subjects', 'subjects.id', '=', 'democlasses.subject_id')
            ->join('classes', 'classes.id', '=', 'subjects.class_id')
            ->join('statuses', 'statuses.id', '=', 'democlasses.status')
            ->join('studentregistrations', 'studentregistrations.id', '=', 'democlasses.student_id')
            ->where('democlasses.tutor_id', '=', session('userid')->id)
            ->get();

        $statuses = status::select('*')->get();
        return view('tutor.demolist', compact('demos', 'statuses'));
    }
    public function tutordemoupdate(Request $request)
    {
        // echo $request->statusupdate;
        // dd();
        $request->validate([
            'statusupdate' => 'required',
            'demoid' => 'required',
        ]);

        $data = democlasses::find($request->demoid);
        $data->status = $request->statusupdate;
        $data->remarks = $request->remarks;

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Trial details updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }

    }
}
