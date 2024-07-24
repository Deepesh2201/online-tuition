<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\OnlineTests;
use App\Models\questionbank;
use App\Models\subjects;
use App\Models\classes;
use App\Models\AssignTest;
use App\Models\topics;
use App\Models\OnlineTest;
use App\Models\testattempted;
use App\Models\testresponssheet;
use App\Models\tutorsubjectmapping;
use App\Models\TemporarySubjective;
use App\Models\SubjectiveResponse;
use App\Models\studentregistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Events\RealTimeMessage;
use App\Models\Notification;

class OnlineTestController extends Controller
{
    public function index()
    {
        $testlists = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')->orderby('online_tests.created_at','desc')
            ->paginate(10);
        $classes = classes::where('is_active', 1)->get();
        $subjects = subjects::where('is_active', 1)->get();
        $topics = topics::where('is_active', 1)->get();

        return view('admin.onlinetestlist', get_defined_vars());
    }

    public function onlinetestSearch(Request $request)
    {
        // return $request->all();
        $query = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id');
        // ->get();
        if ($request->test_name) {
            $query->where('online_tests.name', 'like', '%' . $request->test_name . '%');
        }
        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic_name) {
            $query->where('online_tests.topic_id', $request->topic_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
        }
        if ($request->status_field) {
            if ($request->status_field == '2') {
                $request->status_field = '0';
            }
            $query->where('online_tests.is_active', $request->status_field);
        }
        $testlists = $query->paginate(10);
        $type = 'testlists';
        $viewTable = view('admin.partials.students-tutor-search', compact('testlists', 'type'))->render();
        $viewPagination = $testlists->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);
    }


    public function create()
    {
        $classes = (new CommonController)->classes();
        return view('admin.onlinetestnew', compact('classes'));
    }

    public function fetchquestions(Request $request)
    {
        // echo $request->topic_id;

        $questions = questionbank::select('*')
            ->where('subject_id', $request->subject_id)
            ->where('is_active', 1)
            ->where('type', $request->type)
            ->get();

        return $questions;
    }

    public function store(Request $request)
    {
        $request->validate([
            'testname' => 'required',
            'testdescription' => 'required',
            'classname' => 'required',
            'subject' => 'required',
            'topic' => 'required',
            'maxattempt' => 'required',
            'duration' => 'required',
            'tstartdate' => 'required',
            'testenddate' => 'required',
            'questiondata' => 'required',
        ]);

        if ($request->id) {
            $data = OnlineTests::find($request->id);
            $msg = 'Test updated successfully';
        } else {
            $data = new OnlineTests();
            $msg = 'Test added successfully';
        }
        $data->name = $request->testname;
        $data->test_type = $request->test_type;
        $data->description = $request->testdescription;
        $data->class_id = $request->classname;
        $data->subject_id = $request->subject;
        $data->topic_name = $request->topic;
        $data->max_attempt = $request->maxattempt;
        $data->test_duration = $request->duration;
        $data->test_start_date = $request->tstartdate;
        $data->test_end_date = $request->testenddate;
        $data->question_id = json_encode($request->questiondata);
        $res = $data->save();

        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }

    public function edit($id)
    {
        $tdata = OnlineTests::select('*')->where('id', $id)->first();
        $classes = (new CommonController)->classes();
        $subjects = subjects::select('*')->where('class_id', $tdata->class_id)->where('is_active', 1)->get();
        $topics = topics::select('*')->where('subject_id', $tdata->subject_id)->where('is_active', 1)->get();
        $questions = questionbank::select('*')->where('subject_id', $tdata->subject_id)->where('type',$tdata->test_type)->where('is_active', 1)->get();
        $questiondatas = OnlineTests::select('question_id')->where('id', $tdata->id)->first();

        // $questiondata = explode(',', $tdata->question_id);
        // $data = ModelName::find($id);
        $qstn = explode('"', $tdata->question_id);
        // return view('package.edit', ['data' => $data,'months' => $SelectedMonths]);
        // foreach($prodmulti as $test)
        // echo $months ;
        // echo "<pre>";
        // dd($months);
        // endforeach
        // $keywords = preg_split('/[\s,-,"]+/', $tdata->question_id);
        // dd($months);
        return view('admin.onlinetestnew', compact(['tdata', 'classes', 'subjects', 'topics', 'questions', 'questiondatas', 'qstn']));
    }

    public function viewquestions($id)
    {
        // Fetch question details based on testid -> Using jQuerry
        $data['questions'] = OnlineTests::where("id", $id)->first();
        return response()->json($data);
    }

    public function studentexams()
    {

        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active', 1)->get();
        // $exams = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'topics.name as topic')
        $exams = OnlineTests::select('online_tests.*')
            // ->join('classes', 'classes.id', 'online_tests.class_id')
            // ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            // ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->join('assign_tests', 'assign_tests.test_id', 'online_tests.id')
            ->where('assign_tests.status', 1)
            ->where('assign_tests.is_attempted', 0)
            ->where('assign_tests.student_id', session('userid')->id)
            // ->paginate(10);
            ->get();
        // dd($exams);
        // foreach ($exams as $exam) {
        //     $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
        //         ->where('test_id', $exam->id)
        //         ->count();
        // }

        $extakens = testattempted::select('testattempteds.*', 'online_tests.name as exam_name', 'online_tests.description as exam_description', 'online_tests.test_duration as duration', 'online_tests.test_start_date as test_start_date', 'online_tests.test_end_date as test_end_date')
            ->join('online_tests', 'online_tests.id', 'testattempteds.test_id')
            ->where('testattempteds.student_id', session('userid')->id)->where('testattempteds.is_active', 1)->orderBy('testattempteds.created_at', 'desc')->get();

        return view('student.exam', get_defined_vars());
    }

    public function studentexamsParent()
    {

        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active', 1)->get();
        $exams = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'topics.name as topic')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->paginate(10);
        foreach ($exams as $exam) {
            $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
                ->where('test_id', $exam->id)
                ->count();
        }

        $extakens = testattempted::select('testattempteds.*', 'online_tests.name as exam_name', 'online_tests.description as exam_description', 'online_tests.test_duration as duration', 'online_tests.test_start_date as test_start_date', 'online_tests.test_end_date as test_end_date')
            ->join('online_tests', 'online_tests.id', 'testattempteds.test_id')
            ->where('testattempteds.student_id', session('userid')->id)->where('testattempteds.is_active', 1)->orderBy('testattempteds.created_at', 'desc')->get();

        return view('parent.exam', get_defined_vars());
    }

    // search functionality
    public function studentexamsSearch(Request $request)
    {
        // return $request->all();
        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active', 1)->get();
        $query = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'online_tests.topic_name as topic')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('assign_tests', 'assign_tests.test_id', 'online_tests.id')
            ->where('assign_tests.status', 1)
            ->where('assign_tests.is_attempted', 0);
        // ->get();


        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic) {
            $query->where('online_tests.topic_name', 'like', '%' . $request->topic . '%');
        }
        $exams = $query->paginate(10);
        foreach ($exams as $exam) {
            $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
                ->where('test_id', $exam->id)
                ->count();
        }
        $type = 'student-exams';
        $viewTable = view('admin.partials.common-search', compact('exams', 'type'))->render();
        $viewPagination = $exams->links()->render();
        $extakens = testattempted::select('testattempteds.*', 'online_tests.name as exam_name', 'online_tests.description as exam_description', 'online_tests.test_duration as duration', 'online_tests.test_start_date as test_start_date', 'online_tests.test_end_date as test_end_date')
            ->join('online_tests', 'online_tests.id', 'testattempteds.test_id')
            ->where('testattempteds.student_id', session('userid')->id)->where('testattempteds.is_active', 1)->orderBy('testattempteds.created_at', 'desc')->get();


        return view('student.exam', get_defined_vars());
    }

    public function taketest($id)
    {

        $onlineTest = OnlineTests::where('id', $id)
            ->where('class_id', session('userid')->class_id)
            ->first();

        // echo session('userid')->class_id;
        // dd($onlineTest);
        // Decode the JSON string to an array
        $questionIds = json_decode($onlineTest->question_id);

        // Fetch the related questions using the decoded question_ids array
        $questions = Questionbank::whereIn('id', $questionIds)->get();


        return view('student.taketest', compact('onlineTest', 'questions'));
    }
    public function taketestsubjective($id)
    {

        $onlineTest = OnlineTests::where('id', $id)
            ->where('class_id', session('userid')->class_id)
            ->first();

        // echo session('userid')->class_id;
        // dd($onlineTest);
        // Decode the JSON string to an array
        $questionIds = json_decode($onlineTest->question_id);
        // Fetch the related questions using the decoded question_ids array
        $questions = Questionbank::whereIn('id', $questionIds)->get();


        return view('student.take-subjectivetest', get_defined_vars());
    }



    public function saveResponses(Request $request)
    {

        $responses = $request->input('responses'); // Assuming the responses are sent as an array

        $savedId = [];
        $test_id = "";
        $attemptNumber = "";
        foreach ($responses as $response) {
            if ($response) {
                $values = explode(',', $response);

                // Question ID = $values[0]
                // Selection Option = $values[1]
                // Test ID = $values[2]

                $copt = questionbank::select('*')->where('id', $values[0])->first();
                $correctOption = $copt['correct_option'];
                $correct_option = "";
                // Loop through the options and check if any option matches the correct option
                foreach (range(1, 4) as $optionNumber) {
                    $optionField = "option{$optionNumber}";
                    $optionValue = $copt[$optionField];

                    if ($optionValue === $correctOption) {
                        // Option $optionNumber is the correct answer
                        $correct_option = $optionNumber;
                        break; // No need to check other options
                    }
                }
                // checking attempt no.
                $totalattp = OnlineTests::select('max_attempt')->where('id', $values[2])->first();
                $alreadyattp = testattempted::select('*')->where('student_id', session('userid')->id)->where('test_id', $values[2])->count();

                $remaining = ($totalattp->max_attempt) - ($alreadyattp);
                $attemptNumber = $alreadyattp + 1;

                $data = new testresponssheet();
                $data->test_id = $values[2];
                $data->student_id = session('userid')->id;
                $data->attempt_no = $attemptNumber;
                $data->question_id = $values[0];
                $data->correct_option = $correct_option;
                $data->marked_option = $values[1];

                $data->save();
                // Access the ID of the saved record

                $savedId[] = $data->id;
                $test_id = $values[2];




                // dd();
            }
        }
        // calculating the total marks
        $marks_ttl = 50;
        $marks_obt = 28;
        // Saving final test data
        $data = new testattempted();
        $data->student_id = session('userid')->id;
        $data->test_id = $test_id;
        $data->attempt_no = $attemptNumber;
        $data->test_attempted_on = now();
        $data->test_time_taken = 0;
        $data->total_marks = $marks_ttl;
        $data->obtained_marks = $marks_obt;
        $data->test_type = 1;
        $data->response_id = json_encode($savedId);
        // $data->status = ;
        // $data->is_active = session('userid')->id;
        $data->save();
        // Update is_attempted in assign_tests table
        AssignTest::where('test_id', $test_id)
            ->where('student_id', session('userid')->id)
            ->update(['is_attempted' => 1]);

            $tutor_id = AssignTest::select('*')->where('test_id',$test_id)->where('student_id',session('userid')->id)->first();

            //////////////// Here I need to pass notification into db
            $notificationdata = new Notification();
            $notificationdata->alert_type = 4;
            $notificationdata->notification = 'Test Attempted By '.session('userid')->name;
            $notificationdata->initiator_id = session('userid')->id;
            $notificationdata->initiator_role = session('userid')->role_id;
            $notificationdata->event_id = $test_id;
            // Sending to admin
            // if($request->receiver_role_id == 1){
            //     $notificationdata->show_to_admin = 1;
            //     $notificationdata->show_to_admin_id = $request->receiver_id;
            //     // $notificationdata->show_to_all_admin = 1;
            // }
            // Sending to tutor
            // if($request->receiver_role_id == 2){
                $notificationdata->show_to_tutor = 1;
                $notificationdata->show_to_tutor_id = $tutor_id->tutor_id;
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

        return response()->json(['message' => 'Test Submitted Successfully']);
    }
    public function saveSubjectiveResponses(Request $request)
    {
        // dd();
        $testId = $request->testId;
        $questionIds = $request->questionIds;
        $savedId = [];
        // dd($request->all());
        if (count($questionIds) > 0) {
            foreach ($questionIds as $questionId) {
                $temprec = TemporarySubjective::where('std_id', session('userid')->id)->where('test_id', $testId)->where('question_id', $questionId)->first();

                // dd($temprec);
                if ($temprec) {
                    $data = new SubjectiveResponse;
                    $data->test_id = $testId;
                    $data->student_id = session('userid')->id;
                    $data->question_id = $questionId;
                    $data->response = $temprec->answer;
                    $data->total_marks = null;
                    $data->obtained_marks = null;
                    $data->remarks = null;
                    $data->save();
                    $savedId[] = $data->id;
                }
            }
            $totalattp = OnlineTests::select('max_attempt')->where('id', $testId)->first();
            $alreadyattp = testattempted::select('*')->where('student_id', session('userid')->id)->where('test_id', $testId)->count();

            $remaining = ($totalattp->max_attempt) - ($alreadyattp);
            $attemptNumber = $alreadyattp + 1;

            $data = new testattempted();
            $data->student_id = session('userid')->id;
            $data->test_id = $testId;
            $data->attempt_no = $attemptNumber;
            $data->test_attempted_on = now();
            $data->test_time_taken = 0;
            $data->total_marks = 0;
            $data->obtained_marks = 0;
            $data->response_id = 0;
            $data->answer = json_encode($savedId);
            $data->test_type = 2;
            $data->save();
            $temprec = TemporarySubjective::where('std_id', session('userid')->id)->where('test_id', $testId)->delete();
            // Update is_attempted in assign_tests table
            AssignTest::where('test_id', $testId)
                ->where('student_id', session('userid')->id)
                ->update(['is_attempted' => 1]);
            return response()->json(['message' => 'Test Submitted Successfully']);
        }
    }
    public function testreport($id)
    {
        // dd($id);
        // $assigntdata = AssignTest::find($id);
        // $testid = testattempted::where('test_id', $assigntdata->test_id)->first();
        $testid = testattempted::find($id);
        $onlineTest = OnlineTests::where('id', $testid->test_id)->first();
        if ($onlineTest->test_type == 1) {

            $questionIds = json_decode($onlineTest->question_id);
            $responseIds = json_decode($testid->response_id);
            $questionsCount = Questionbank::whereIn('id', $questionIds)->count();
            $questions = Questionbank::whereIn('id', $questionIds)->get();

            // Initialize mergedData array
            $mergedData = [];

            foreach ($questions as $question) {
                $questionData = [
                    'question' => $question->question,
                    'option1' => $question->option1,
                    'option2' => $question->option2,
                    'option3' => $question->option3,
                    'option4' => $question->option4,
                    'correct_answer' => $this->getOptionNumber($question, $question->correct_option),
                ];

                // Find the corresponding response for the question
                $response = $responseIds > 0 ? testresponssheet::whereIn('id', $responseIds)->where('question_id', $question->id)->first() : null;

                if ($response) {
                    $questionData['marked_answer'] = intval($response->marked_option);
                } else {
                    $questionData['marked_answer'] = '';
                }


                $mergedData[] = $questionData;
            }
            // dd($mergedData);
            // Continue with the rest of your code...

            if ($responseIds > 0) {
                $responsesCount = testresponssheet::whereIn('id', $responseIds)->count();
                $responsesCn = testresponssheet::whereIn('id', $responseIds)->get();
                $correctResponsesCount = testresponssheet::whereIn('id', $responseIds)->whereColumn('correct_option', 'marked_option')->count();
            } else {
                $responsesCount = 0;
                $correctResponsesCount = 0;
            }
            // dd($mergedData);
            return view('student.testreport', compact('onlineTest', 'questionsCount', 'responsesCount', 'correctResponsesCount', 'mergedData'));
        } else {
            $response = testattempted::find($id);

            if ($response) {
                $responseIds = json_decode($response->answer);
                $finalResponses = SubjectiveResponse::select('subjective_responses.*', 'questionbanks.question')
                    ->join('questionbanks', 'questionbanks.id', 'subjective_responses.question_id')
                    ->whereIn('subjective_responses.id', $responseIds)
                    ->get();

                // Check if any of the responses is not checked
                $uncheckedResponses = $finalResponses->first(function ($response) {
                    return $response->checked == 0;
                });

                if ($uncheckedResponses) {
                    return back()->with('fail', 'Test not yet checked. Please wait or contact tutor');
                } else {
                    $test = OnlineTests::find($response->test_id);
                    $questionIds = json_decode($test->question_id);
                    $questions = questionbank::whereIn('id', $questionIds)->get();
                    $student = studentregistration::find(session('userid')->id);

                    return view('student.onlinetestresponses-student', get_defined_vars());
                }
            }
        }
    }

    public function onlinetestresponseslist()
    {
        $subs = tutorsubjectmapping::pluck('subject_id')->toArray();
        if ($subs) {
            $onlineTests = OnlineTests::select('online_tests.*', 'subjects.name as sub_name', 'classes.name as class_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('testattempteds','testattempteds.test_id','online_tests.id')
            ->join('paymentstudents','paymentstudents.student_id','testattempteds.student_id')
            ->where('online_tests.subject_id', 'paymentstudents.subject_id')
            ->where('online_tests.test_type', 2)
            ->where('paymentstudents.tutor_id', session('userid')->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $classes = classes::where('is_active', 1)->get();
            $subjects = subjects::where('is_active', 1)->get();
            $topics = topics::where('is_active', 1)->get();
            // dd();
            return view('admin.onlinetestresponselist', get_defined_vars());
        } else {
            return back()->with('fail', 'No tests Found');
        }
    }
    public function onlinetestresponse($id)
    {
        return view('admin.onlinetestresponses');
    }

    // tutor subjectve responses
    public function onlinetestresponseslistTutor()
    {
        $subs = tutorsubjectmapping::where('tutor_id', session('userid')->id)->pluck('subject_id')->toArray();
        if ($subs) {
            $onlineTests = OnlineTests::select('online_tests.*', 'subjects.name as sub_name', 'classes.name as class_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('testattempteds','testattempteds.test_id','online_tests.id')
            ->join('paymentstudents','paymentstudents.student_id','testattempteds.student_id')
            ->where('online_tests.subject_id', 'paymentstudents.subject_id')
            ->where('online_tests.test_type', 2)
            ->where('paymentstudents.tutor_id', session('userid')->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $classes = classes::where('is_active', 1)->get();
            $subjects = subjects::where('is_active', 1)->get();
            $topics = topics::where('is_active', 1)->get();
            // dd();
            return view('tutor.onlinetestresponselist-tutor', get_defined_vars());
        } else {
            return back()->with('fail', 'No tests Found');
        }
    }

    public function subjTestsSearch(Request $request)
    {
        $subs = tutorsubjectmapping::where('tutor_id', session('userid')->id)->pluck('subject_id')->toArray();
        if ($subs) {
            $query = OnlineTests::select('online_tests.*', 'subjects.name as sub_name', 'classes.name as class_name', 'topics.name as topic_name')->join('classes', 'classes.id', 'online_tests.class_id')->join('subjects', 'subjects.id', 'online_tests.subject_id')->join('topics', 'topics.id', 'online_tests.topic_id')->whereIn('online_tests.subject_id', $subs)->where('online_tests.test_type', 2);

            if ($request->test_name) {
                $query->where('online_tests.name', 'like', '%' . $request->test_name . '%');
            }
            if ($request->class_name) {
                $query->where('online_tests.class_id', $request->class_name);
            }
            if ($request->subject_name) {
                $query->where('online_tests.subject_id', $request->subject_name);
            }
            if ($request->topic_name) {
                $query->where('online_tests.topic_id', $request->topic_name);
            }
            if ($request->start_date) {
                $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
            }
            if ($request->end_date) {
                $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
            }
            $onlineTests = $query->paginate(10);
            $type = 'tutor_subjective_tests';
            $viewTable = view('admin.partials.students-tutor-search', compact('onlineTests', 'type'))->render();
            $viewPagination = $onlineTests->links()->render();
            return response()->json([
                'table' => $viewTable,
                'pagination' => $viewPagination
            ]);
        }
    }

    public function onlinetestresponseTutor(Request $request, $test_id)
    {
        $responses = testattempted::select('testattempteds.*', 'studentregistrations.name as std_name')->join('studentregistrations', 'studentregistrations.id', 'testattempteds.student_id')->where('testattempteds.test_id', $test_id)->where('testattempteds.test_type', 2)->paginate(10);
        $test_name = OnlineTests::find($test_id);
        return view('tutor.onlinetestresponses-tutor', get_defined_vars());
    }
    public function studentwiseSubjSearch(Request $request, $test_id)
    {

        $query = testattempted::select('testattempteds.*', 'studentregistrations.name as std_name')->join('studentregistrations', 'studentregistrations.id', 'testattempteds.student_id')->where('testattempteds.test_id', $test_id)->where('testattempteds.test_type', 2);
        if ($request->student_name) {
            $query->where('studentregistrations.name', 'like', '%' . $request->student_name . '%');
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(testattempteds.test_attempted_on)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(testattempteds.test_attempted_on)'), '<=', $request->end_date);
        }
        $responses = $query->paginate(10);
        $type = 'tutor_subjective_responses';
        $viewTable = view('admin.partials.students-tutor-search', compact('responses', 'type'))->render();
        $viewPagination = $responses->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);
    }

    public function onlinetestresponsestudentTutor($response_id)
    {
        $response = testattempted::find($response_id);
        if ($response) {
            $responseIds = json_decode($response->answer);
            $finalResponses = SubjectiveResponse::select('subjective_responses.*', 'questionbanks.question')->join('questionbanks', 'questionbanks.id', 'subjective_responses.question_id')->whereIn('subjective_responses.id', $responseIds)->get();
            $test = OnlineTests::find($response->test_id);
            $questionIds = json_decode($test->question_id);
            $questions = questionbank::whereIn('id', $questionIds)->get();
            $student = studentregistration::find($response->student_id);
            return view('tutor.onlinetestresponsesstudent-tutor', get_defined_vars());
        }
    }

    public function testCorrection(Request $request, $response_id)
    {
        $response = testattempted::find($response_id);
        if ($response) {
            $responseIds = json_decode($response->answer);
            $finalResponses = SubjectiveResponse::whereIn('subjective_responses.id', $responseIds)->get();
            $test = OnlineTests::find($response->test_id);
            $questionIds = json_decode($test->question_id);
            $questions = questionbank::whereIn('id', $questionIds)->get();

            $rules = [];
            $messages = [];

            foreach ($questions as $question) {
                $fieldPrefix = "{$question->id}";

                // Define rules for max_marks and marks_obtained
                $rules["max_marks.{$fieldPrefix}"] = 'required|numeric';
                $rules["marks_obtained.{$fieldPrefix}"] = "required|numeric|min:0|max:{$request->input("max_marks.{$fieldPrefix}")}";

                // Define custom error messages
                $messages["max_marks.{$fieldPrefix}.required"] = "Max Marks for Question  is required.";
                $messages["max_marks.{$fieldPrefix}.numeric"] = "Max Marks for Question  must be a numeric value.";
                $messages["marks_obtained.{$fieldPrefix}.required"] = "Marks Obtained for Question  is required.";
                $messages["marks_obtained.{$fieldPrefix}.numeric"] = "Marks Obtained for Question  must be a numeric value.";
                $messages["marks_obtained.{$fieldPrefix}.min"] = "Marks Obtained for Question  must be at least 0.";
                $messages["marks_obtained.{$fieldPrefix}.max"] = "Marks Obtained for Question  cannot be greater than Max Marks.";

                // // Define custom validation attribute names
                // $attributes["max_marks.{$fieldPrefix}"] = "Max Marks for Question {$question->id}";
                // $attributes["marks_obtained.{$fieldPrefix}"] = "Marks Obtained for Question {$question->id}";
                // $attributes["remarks.{$fieldPrefix}"] = "Remarks for Question {$question->id}";
            }

            // Create the validator instance
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }




            $totalTotalMarks = 0;
            $totalObtainedMarks = 0;


            foreach ($questions as  $question) {
                foreach ($finalResponses as  $SubjectiveResponse) {
                    if ($SubjectiveResponse->question_id === $question->id) {
                        $SubjectiveResponse->total_marks = $request->max_marks[$question->id];
                        $SubjectiveResponse->obtained_marks = $request->marks_obtained[$question->id];
                        $SubjectiveResponse->remarks = $request->remarks[$question->id];
                        $SubjectiveResponse->checked_by = session('userid')->id;
                        $SubjectiveResponse->checked = session('userid')->id;
                        $SubjectiveResponse->save();
                        $totalTotalMarks += $SubjectiveResponse->total_marks;
                        $totalObtainedMarks += $SubjectiveResponse->obtained_marks;
                    }
                }
            }
            $response->total_marks = $totalTotalMarks;
            $response->obtained_marks = $totalObtainedMarks;
            $response->status = 1;
            $response->save();

            return redirect(url('tutor/onlinetestresponseslist'))->with('success', 'Marks Submitted');
        }
    }



    //  Tutor online tests

    public function tutorindex()
    {
        $testlists = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->orderby('online_tests.created_at', 'desc')
            ->paginate(10);
        $classes = classes::where('is_active', 1)->get();
        $subjects = subjects::where('is_active', 1)->get();
        $topics = topics::where('is_active', 1)->get();
        $students = studentregistration::select('studentregistrations.*')
            ->leftJoin('paymentstudents', function ($join) {
                $join->on('paymentstudents.student_id', '=', 'studentregistrations.id')
                    ->where('paymentstudents.tutor_id', '=', session('userid')->id);
            })
            ->whereNotNull('paymentstudents.student_id')
            ->distinct()
            ->where('studentregistrations.is_active', 1)
            ->get();
        return view('tutor.tutor-onlinetestlist', get_defined_vars());
    }

    function assigntest($id)
    {
        $testdata = OnlineTests::select('*')->where('id', $id)->where('is_active', 1)->first();
        $students = studentregistration::select('studentregistrations.*')
            ->leftJoin('paymentstudents', function ($join) {
                $join->on('paymentstudents.student_id', '=', 'studentregistrations.id')
                    ->where('paymentstudents.tutor_id', '=', session('userid')->id);
            })
            ->whereNotNull('paymentstudents.student_id')
            ->distinct()
            ->where('studentregistrations.is_active', 1)
            ->get();

        $test_id = $id;
        // dd($students);
        $studentdata = AssignTest::select('assign_tests.*', 'online_tests.name as test_name', 'studentregistrations.name as student_name')
            ->join('online_tests', 'online_tests.id', 'assign_tests.test_id')
            ->join('studentregistrations', 'studentregistrations.id', 'assign_tests.student_id')
            ->where('assign_tests.test_id', $id)
            ->where('assign_tests.tutor_id', session('userid')
                ->id)->where('assign_tests.is_active', 1)
            ->get();
        return view('tutor.assigntest', get_defined_vars());
    }
    function assigntestdata(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'testid' => 'required',
            'student' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ]);
        $datachk = AssignTest::select('*')
            ->where('test_id', $request->testid)
            ->where('student_id', $request->student)
            ->where('tutor_id', session('userid')->id)
            ->first();
        // dd($datachk);
        if ($datachk) {
            return back()->with('fail', 'Test already assigned to this student');
        }
        $assigntest = new AssignTest();
        $assigntest->test_id = $request->testid;
        $assigntest->student_id = $request->student;
        $assigntest->tutor_id = session('userid')->id;
        $assigntest->start_time = $request->starttime;
        $assigntest->end_time = $request->endtime;
        $assigntest->status = 1;
        $res = $assigntest->save();

        if ($res) {
            return back()->with('success', 'Student assigned to test successfully!');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }
    function assigntestdelete(Request $request)
    {
        $request->validate([
            'assigntestdeleteid' => 'required',
        ]);

        // dd($request->all());
        // Assuming SlotBooking is the model associated with the slot_bookings table
        $slotbooking = AssignTest::where('id', $request->assigntestdeleteid)
            ->first();

        if ($slotbooking) {
            // Found the slot, now delete it
            $slotbooking->delete();

            return back()->with('success', 'Record deleted successfully!');
        } else {
            // Slot not found
            return back()->with('fail', 'Record not found or you do not have permission to delete it.');
        }
    }

    public function tutorcreate()
    {
        $classes = (new CommonController)->classes();
        return view('tutor.tutor-onlinetestnew', compact('classes'));
    }
    public function tutorstore(Request $request)
    {
        $request->validate([
            'testname' => 'required',
            'testdescription' => 'required',
            'classname' => 'required',
            'subject' => 'required',
            'topic' => 'required',
            // 'maxattempt' => 'required',
            'duration' => 'required',
            // 'tstartdate' => 'required',
            // 'testenddate' => 'required',
            'questiondata' => 'required',
        ]);

        if ($request->id) {
            $data = OnlineTests::find($request->id);
            $msg = 'Test updated successfully';
        } else {
            $data = new OnlineTests();
            $msg = 'Test added successfully';
        }
        $data->name = $request->testname;
        $data->test_type = $request->test_type;
        $data->description = $request->testdescription;
        $data->class_id = $request->classname;
        $data->subject_id = $request->subject;
        $data->topic_name= $request->topic;
        $data->max_attempt = 1;
        $data->test_duration = $request->duration;
        $data->test_start_date = Carbon::now();
        $data->test_end_date = Carbon::now();
        $data->question_id = json_encode($request->questiondata);
        $res = $data->save();

        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }
    public function tutorfetchquestions(Request $request)
    {
        // echo $request->topic_id;

        $questions = questionbank::select('*')
            ->where('subject_id', $request->subject_id)
            ->where('type', $request->type)
            ->where('is_active', 1)
            ->get();

        return $questions;
    }
    public function tutorviewquestions($id)
    {
        // Fetch question details based on testid -> Using jQuerry
        $data['questions'] = OnlineTests::where("id", $id)->first();
        return response()->json($data);
    }
    public function tutoredit($id)
    {
        $tdata = OnlineTests::select('*')->where('id', $id)->first();
        $classes = (new CommonController)->classes();
        $subjects = subjects::select('*')->where('class_id', $tdata->class_id)->where('is_active', 1)->get();
        $topics = topics::select('*')->where('subject_id', $tdata->subject_id)->where('is_active', 1)->get();
        $questions = questionbank::select('*')->where('subject_id', $tdata->subject_id)->where('type',$tdata->test_type)->where('is_active', 1)->get();
        $questiondatas = OnlineTests::select('question_id')->where('id', $tdata->id)->first();

        // $questiondata = explode(',', $tdata->question_id);
        // $data = ModelName::find($id);
        $qstn = explode('"', $tdata->question_id);
        // return view('package.edit', ['data' => $data,'months' => $SelectedMonths]);
        // foreach($prodmulti as $test)
        // echo $months ;
        // echo "<pre>";
        // dd($months);
        // endforeach
        // $keywords = preg_split('/[\s,-,"]+/', $tdata->question_id);
        // dd($months);
        return view('tutor.tutor-onlinetestnew', compact(['tdata', 'classes', 'subjects', 'topics', 'questions', 'questiondatas', 'qstn']));
    }

    public function tutorstatus(Request $request)
    {
        $data = OnlineTests::find($request->id);
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
    public function assignteststatus(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:assign_tests,id',
            'status' => 'required|in:0,1',
        ]);

        // Find the record by test_id
        $data = AssignTest::where('id', $request->id)->first();

        // Check if the record exists
        if (!$data) {
            return json_encode(array('statusCode' => 404, 'error' => 'Record not found'));
        }

        // Update the status
        $tstatus = ($request->status == 1) ? 0 : 1;
        $data->status = $tstatus;

        // Save the changes
        $res = $data->save();

        return json_encode(array('statusCode' => 200));
    }


    public function tutoronlinetestSearch(Request $request)
    {
        // return $request->all();
        $query = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'online_tests.topic_name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id');
        // ->get();
        if ($request->test_name) {
            $query->where('online_tests.name', 'like', '%' . $request->test_name . '%');
        }
        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic_name) {
            $query->where('online_tests.topic_name', $request->topic_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
        }
        if ($request->status_field) {
            if ($request->status_field == '2') {
                $request->status_field = '0';
            }
            $query->where('online_tests.is_active', $request->status_field);
        }
        $testlists = $query->paginate(10);
        $type = 'tutor-testlists';
        $viewTable = view('admin.partials.students-tutor-search', compact('testlists', 'type'))->render();
        $viewPagination = $testlists->links()->render();
        $classes = classes::where('is_active', 1)->get();
        $subjects = subjects::where('is_active', 1)->get();
        $topics = topics::where('is_active', 1)->get();

        return view('tutor.tutor-onlinetestlist', get_defined_vars());
    }

    public function onlinetestresponsestudent($id)
    {
        return view('admin.onlinetestresponsesstudent');
    }

    // operations with subjective data
    public function  storeSubjectiveDataInTemporaryTable(Request $request)
    {
        // dd($request->all());
        $testId = $request->input('testId');
        $questionId = $request->input('questionId');
        $answer = $request->input('answer'); // Assuming 'answer' is the name of the input field
        $data = TemporarySubjective::where('std_id', session('userid')->id)->where('test_id', $testId)->where('question_id', $questionId)->first();
        if ($data) {
            $answerSave = $data;
        } else {
            $answerSave = new TemporarySubjective;
        }
        $answerSave->std_id = session('userid')->id;
        $answerSave->test_id = $testId;
        $answerSave->question_id = $questionId;
        $answerSave->answer = $answer;
        $answerSave->save();
        if ($request->nextQuestionId != null) {
            $nextanswer = TemporarySubjective::where('std_id', session('userid')->id)->where('test_id', $testId)->where('question_id', $request->nextQuestionId)->value('answer');
        } else {
            $nextanswer = null;
        }
        return response()->json(['message' => 'Data stored successfully', 'nextAnswer' => $nextanswer]);
    }

    public function  getAnswerFromSubjectiveTempTable(Request $request)
    {

        $testId = $request->input('testId');
        $questionId = $request->input('questionId');
        $answer = TemporarySubjective::where('std_id', session('userid')->id)->where('test_id', $testId)->where('question_id', $questionId)->value('answer');
        return response()->json(['answer' => $answer]);
    }
    function tutortestreport($id)
    {
        $assigntdata = AssignTest::find($id);
        $testid = testattempted::where('test_id', $assigntdata->test_id)->first();
        $onlineTest = OnlineTests::where('id', $testid->test_id)->first();
        // dd($onlineTest);
        if ($onlineTest->test_type == 1) {
            $questionIds = json_decode($onlineTest->question_id);
            $responseIds = json_decode($testid->response_id);
            $questionsCount = Questionbank::whereIn('id', $questionIds)->count();
            $questions = Questionbank::whereIn('id', $questionIds)->get();

            // Initialize mergedData array
            $mergedData = [];

            foreach ($questions as $question) {
                $questionData = [
                    'question' => $question->question,
                    'option1' => $question->option1,
                    'option2' => $question->option2,
                    'option3' => $question->option3,
                    'option4' => $question->option4,
                    'correct_answer' => $this->getOptionNumber($question, $question->correct_option),
                ];

                // Find the corresponding response for the question
                $response = $responseIds > 0 ? testresponssheet::whereIn('id', $responseIds)->where('question_id', $question->id)->first() : null;

                if ($response) {
                    $questionData['marked_answer'] = intval($response->marked_option);
                } else {
                    $questionData['marked_answer'] = '';
                }


                $mergedData[] = $questionData;
            }
            // dd($mergedData);
            // Continue with the rest of your code...

            if ($responseIds > 0) {
                $responsesCount = testresponssheet::whereIn('id', $responseIds)->count();
                $responsesCn = testresponssheet::whereIn('id', $responseIds)->get();
                $correctResponsesCount = testresponssheet::whereIn('id', $responseIds)->whereColumn('correct_option', 'marked_option')->count();
            } else {
                $responsesCount = 0;
                $correctResponsesCount = 0;
            }
            // dd($mergedData);
            return view('tutor.testreport', compact('onlineTest', 'questionsCount', 'responsesCount', 'correctResponsesCount', 'mergedData'));
        } else {

            $assigntdata = AssignTest::find($id);
            $onlineTest = OnlineTests::where('id', $assigntdata->test_id)->first();
            $testid = testattempted::where('test_id', $onlineTest->id)->where('student_id', $assigntdata->student_id)->first();

            $response = testattempted::find($testid);
            if ($response && $response->isNotEmpty()) {
                // Access the first item in the collection
                $firstResponse = $response->first();

                $responseIds = json_decode($firstResponse->answer);

                $finalResponses = SubjectiveResponse::select('subjective_responses.*', 'questionbanks.question')
                    ->join('questionbanks', 'questionbanks.id', 'subjective_responses.question_id')
                    ->whereIn('subjective_responses.id', $responseIds)
                    ->get();
                // dd($finalResponses);
                // Check if any of the responses is not checked
                $uncheckedResponses = $finalResponses->first(function ($response) {
                    return $response->checked == 0;
                });

                if ($uncheckedResponses) {
                    return back()->with('fail', 'Test not yet checked. Please wait or contact tutor');
                } else {
                    $test = OnlineTests::find($firstResponse->test_id);
                    // dd($test);
                    $questionIds = json_decode($test->question_id);
                    $questions = questionbank::whereIn('id', $questionIds)->get();
                    $student = studentregistration::find($assigntdata->student_id);
                    // dd($questionIds);
                    return view('tutor.onlinetestresponsesreport-tutor', get_defined_vars());
                }
                // iuiuiuuii //



            }

        }
    }

    // Helper function to get the option number from the correct option value
    private function getOptionNumber($question, $correctOption)
    {
        foreach (range(1, 4) as $optionNumber) {
            $optionField = "option{$optionNumber}";
            $optionValue = $question->$optionField;

            if ($optionValue === $correctOption) {
                return $optionNumber;
            }
        }

        return 0; // Return 0 if the correct option is not found (shouldn't happen)
    }
}
