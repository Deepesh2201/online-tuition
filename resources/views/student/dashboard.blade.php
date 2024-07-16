@extends('student.layouts.main')
@section('main-section')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{session('usertype')}} Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> --}}
                                {{-- <li class="breadcrumb-item active">Analytics</li> --}}
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
                    <div class="card card-animate dashboardcard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="dashCard">
                                    <p class="fw-medium  mb-0"><b>Subjects Enrolled</b></p>
                                    <div class="topCradCount">
                                        <h2 class="pt-2" style="color:#D63531;"><span class="counter-value"
                                                data-target="{{ count($subjects_enrolled) ?? '0' }}">{{ count($subjects_enrolled) ?? '0' }}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right">
                                <a href="subjects" class="text-decoration-underline"><button
                                        class="badge bg-secondry p-2 text-dark border-0">View
                                        All</button></a>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
                    <div class="card card-animate dashboardcard subjcard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="dashCard">
                                    <p class="fw-medium  mb-0"><b>Attended Classes</b></p>
                                    <div class="topCradCount">
                                        <h2 class="pt-2 text-primary"><span class="counter-value"
                                                data-target="{{ ($atendedclasses) ?? '0' }}">{{ ($atendedclasses) ?? '0' }}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right">
                                <a href="completed-classes" class="text-decoration-underline"><button
                                        class="badge bg-secondry p-2 text-dark border-0">View
                                        All</button></a>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
                    <div class="card card-animate dashboardcard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="dashCard">
                                    <p class="fw-medium  mb-0"><b>My Tutor&nbsp;&nbsp;&nbsp;</b></p>
                                    <div class="topCradCount">
                                        <h2 class="pt-2" style="color: #59C069"><span class="counter-value"
                                                data-target="{{ count($subjects_enrolled) ?? '0' }}">{{ count($subjects_enrolled) ?? '0' }}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right">
                                <a href="yourtutor" class="text-decoration-underline"><button
                                        class="badge bg-secondry p-2 text-dark border-0">View
                                        All</button></a>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>




                <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
                    <div class="card card-animate dashboardcard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="dashCard">
                                    <p class="fw-medium  mb-0"><b>Over All Progress</b></p>

                                    @php
                                    $totalQuestions = 0;
                                    $totalAttempted = 0;
                                    @endphp

                                    @foreach ($pastQuizzes as $subjectId => $data)
                                    @php
                                    $totalQuestions += $data['totalQuestions'];
                                    $totalAttempted += $data['totalAttempted'];
                                    @endphp
                                    @endforeach
                                    @php
                                    if($totalQuestions != "" && $totalAttempted != "" && $totalQuestions != 0){
                                    $progressperc = $totalAttempted / $totalQuestions *100;
                                    }
                                    else{
                                    $progressperc = 1;
                                    }
                                    @endphp

                                    <div class="circular-progress " data-inner-circle-color="lightgrey"
                                        data-percentage="{{round($progressperc)}}" data-progress-color="#88B0F1"
                                        data-bg-color="white">
                                        <div class="inner-circle"></div>
                                        <p class="percentage">0%</p>
                                    </div>
                                </div>
                            </div>
                            <div style="float:right">
                                <a href="exams" class="text-decoration-underline"><button
                                        class="badge bg-secondry p-2 text-dark border-0">View Results
                                    </button></a>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="cardTitle">
                            <h5>Scheduled Classes</h5>
                            <a href="classes"><b>View All</b></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table dash_table">
                                    <thead>
                                        <tr class="">
                                            <th>Tutor</th>
                                            <th>Topic</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upclasses as $upcomingclass)
                                        <tr>
                                            <td>
                                                <div class="namePic">
                                                    <img src="/images/tutors/profilepics/{{ $upcomingclass->profile_pic }}"
                                                        alt="">
                                                    <span>{{ $upcomingclass->tutor_name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $upcomingclass->topics }}</td>
                                            <td>
                                                <div class="dayTime">
                                                    @php
                                                    $startDateTime = \Carbon\Carbon::parse($upcomingclass->start_time);
                                                    $now = \Carbon\Carbon::now();

                                                    if ($startDateTime->isToday()) {
                                                    $message = 'Today';
                                                    } elseif ($startDateTime->isTomorrow()) {
                                                    $message = 'Tomorrow';
                                                    } else {
                                                    $daysToGo = $now->diffInDays($startDateTime);
                                                    $message = $daysToGo . ' days to go';
                                                    }
                                                    @endphp
                                                    <span>{{ $message }}</span>
                                                    <small>{{ $startDateTime->format('Y-m-d H:i:s') }}</small>
                                                </div>
                                            </td>

                                            <td>
                                                @if (in_array(strtolower($upcomingclass->status), ['confirmed',
                                                'waiting']))
                                                <span class="confirm">Confirmed</span>
                                                @elseif (in_array(strtolower($upcomingclass->status), ['started',
                                                'cancelled']))
                                                <span class="live">Live</span>
                                                @elseif (in_array(strtolower($upcomingclass->status), ['completed']))
                                                <span class="confirm">Completed</span>
                                                @endif
                                            </td>

                                            <td class="joinclass">
                                                @if (in_array(strtolower($upcomingclass->status), ['confirmed',
                                                'waiting', 'completed']))
                                                <span style="background-color: lightgrey"
                                                    class="badge border-0 bg-muted text-dark"
                                                    id="countdownTimer">{{ $upcomingclass->status }}</span>
                                                {{-- <span id="countdownTimer"></span> --}}
                                                @elseif (in_array(strtolower($upcomingclass->status), ['started',
                                                'cancelled', 'live']))
                                                <a href="{{ $upcomingclass->join_url }}"><button class="badge border-0"
                                                        id="joinClassBtn">Join
                                                        Class</button></a>
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Schedule Trial Classes -->
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="cardTitle">
                            <h5>Scheduled Trial Classes</h5>
                            <a href="demolist"><b>View All</b></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table trialtable dash_table">
                                    <thead>
                                        <tr class="">
                                            <th>Tutor</th>
                                            <th>Subject</th>
                                            <th>Slot</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($demos as $democlass)
                                        <tr>
                                            <td>
                                                <div class="namePic">
                                                    <img src="/images/tutors/profilepics/{{ $democlass->profile_pic }}"
                                                        alt="">
                                                    <span>{{ $democlass->tutor_name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $democlass->subject }}</td>
                                            <td>
                                                <div class="dayTime">
                                                    @php
                                                    $startDateTime = \Carbon\Carbon::parse($democlass->slot_confirmed);
                                                    $now = \Carbon\Carbon::now();

                                                    if ($startDateTime->isToday()) {
                                                    $message = 'Today';
                                                    } elseif ($startDateTime->isTomorrow()) {
                                                    $message = 'Tomorrow';
                                                    } else {
                                                    $daysToGo = $now->diffInDays($startDateTime);
                                                    $message = $daysToGo . ' days to go';
                                                    }
                                                    @endphp
                                                    <span>{{ $message }}</span>
                                                    <small>{{ $startDateTime->format('Y-m-d H:i:s') }}</small>
                                                </div>
                                            </td>

                                            <td>

                                                @if ($democlass->status == 1)
                                                <span class="confirm">{{ $democlass->currentstatus }}</span>
                                                @elseif ($democlass->status == 2)
                                                <span class="confirm">{{ $democlass->currentstatus }}</span>
                                                @elseif ($democlass->status == 3)
                                                <span class="confirm">{{ $democlass->currentstatus }}</span>
                                                @elseif ($democlass->status == 4)
                                                <span class="confirm">{{ $democlass->currentstatus }}</span>
                                                @elseif ($democlass->status == 5)
                                                <span class="live">{{ $democlass->currentstatus }}</span>
                                                @else
                                                <span class="live">{{ $democlass->currentstatus }}</span>
                                                @endif

                                            </td>

                                            <td class="joinclass">
                                                @if (strtolower($democlass->currentstatus) == 'started')
                                                <a href="{{ $democlass->demo_link }}"><button class="badge border-0"
                                                        id="joinClassBtn2">Join Now</button></a>
                                                @else
                                                <span style="background-color: lightgrey"
                                                    class="badge border-0 bg-muted text-dark"
                                                    id="countdownTimer2">{{ $democlass->currentstatus }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="row" hidden>
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="cardTitle">
                            <h5>My Homework</h5>
                            <div class="hwMenu">
                                <a href="#test" onclick="switchmode(1)"><span class="test">Test</span></a>
                                <a href="#assignment" onclick="switchmode(2)"><span class="test">Assignment</span></a>

                            </div>
                            <a href="/student/exams" id="trplink"><b>View All</b></a>
                            <a href="/student/assignments" id="tasslink" hidden><b>View All</b></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table trialtable dash_table" id="tbltest">
                                    <thead>
                                        <tr class="">
                                            <th>Subject</th>
                                            <th>Test Name</th>
                                            @if (session('usertype') == 'Parent')
                                            @else
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($upcomingQuizes as $upcomingQuiz)
                                        <tr>
                                            <td>
                                                <div class="namePic">
                                                    {{-- <img src="/images/subjects/{{ $upcomingQuiz->subject_image }}"
                                                    alt=""> --}}
                                                    <span>{{ $upcomingQuiz->subject_name }}</span>
                                                </div>
                                            </td>
                                            {{-- <td>{{$upcomingQuiz->topic_name}}</td> --}}
                                            <td>{{ $upcomingQuiz->name }}</td>
                                            {{-- <td>{{$upcomingQuiz->start_date}}</td> --}}
                                            {{-- <td><span class="quizs">{{$upcomingQuiz->}}</span> </td> --}}
                                         @if (session('usertype') == 'Parent')
                                         <td></td>
                                             @else
                                             <td><a href="{{ url('student/taketest') }}/{{ $upcomingQuiz->id }}"><span
                                                class="test">Start Test</span></a></td>
                                         @endif

                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>

                                <table class="table trialtable dash_table " id="tblassignment" hidden>
                                    <thead>
                                        <tr class="">
                                            <th>Subject</th>
                                            <th>Assignment Name</th>
                                            @if (session('usertype') == 'Parent')
                                                @else
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upcomingAssignments as $upcomingAssignment)
                                        <tr>
                                            <td>
                                                <div class="namePic">
                                                    {{-- <img src="/images/subjects/{{ $upcomingQuiz->subject_image }}"
                                                    alt=""> --}}
                                                    <span>{{ $upcomingAssignment->subject_name }}</span>
                                                </div>
                                            </td>
                                            {{-- <td>{{$upcomingQuiz->topic_name}}</td> --}}
                                            <td>{{ $upcomingAssignment->assignment_name }}</td>
                                            {{-- <td>{{$upcomingQuiz->start_date}}</td> --}}
                                            {{-- <td><span class="quizs">{{$upcomingQuiz->}}</span> </td> --}}
                                            @if (session('usertype') == 'Parent')
                                                @else
                                            <td><a href="{{ $upcomingAssignment->assignment_link }}"><span
                                                class="test">Take</span></a></td>
                                                @endif
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="cardTitle">
                            <h5>Results </h5>
                            <div class="hwMenu">
                                <a href="#testreports" onclick="testprogress(1)"><span class="assign">Test
                                        Report</span></a>
                                <a href="#progressreports" onclick="testprogress(2)"><span class="assign">Progress
                                        Report</span></a>
                            </div>
                            <a href="/student/exams"><b>View All</b></a>
                        </div>
                        <div class="card-body" id="testreport">

                            <div class="table-responsive">
                                <table class="table trialtable dash_table" id="">
                                    <thead>
                                        <tr class="">
                                            <th>Test</th>
                                            <th>Total Marks</th>
                                            <th>Obtained</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $count = 0; @endphp
                                        @foreach ($pastQuizes as $pastQuiz)
                                        @if ($count >= 5)
                                        @break
                                        @endif
                                        <tr>
                                            <td>{{ $pastQuiz->exam_name }}</td>
                                            <td>{{ $pastQuiz->questionsCount }}</td>
                                            <td>{{ $pastQuiz->correctResponsesCount }}</td>
                                            <td style="width:23%"><a
                                                    href="/student/exam/report/{{ $pastQuiz->id }}"><span
                                                        class="assign">View Details</span></a></td>
                                        </tr>
                                        @php $count++; @endphp
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="card-body" id="progressreport" hidden>

                            <table class="table trialtable dash_table table-responsive">
                                <thead>
                                    <tr class="">
                                        <th>Subject</th>
                                        <th>Total Tests</th>
                                        <th>Progress</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach ($pastQuizzes as $subjectId => $data)
                                    @if ($count >= 5)
                                    @break
                                    @endif
                                    <tr>
                                        <td>{{ $data['subjectName'] }}</td>
                                        <td>{{ $data['totalTests'] }}</td>
                                        <td>{{ $data['totalAttempted'] / $data['totalQuestions'] * 100}} %</td>
                                        <td><a href="/student/exams"><span class="assign"> View</span></a></td>
                                    </tr>
                                    @php $count++; @endphp
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>




                <!-- end row-->
            </div><!-- end col -->
        </div> <!-- end row-->


        <!-- tutor and subjects -->

        <div class="container-fluid">

            <div class="tutor_sub">

                <button type="button" id="activeTutor" class="btn active" onclick="showAllTutors();">
                    Tutors</button>
                {{-- <button type="button" id="activeSubj" class="btn" onclick="showAllSubjects();">
                    Subjects</button> --}}

            </div>

            <div class="allTutor" id="allTutors">
                <!-- <div class="righttutor">
                    <p>Most Searched Tutors</p>
                    <a href="/student/searchtutor"><span class="report">View All</span></a>
                </div> -->

                <div class="righttutor">
                    {{-- <form class="multi-range-field my-5 pb-5" id="tutor-search"> --}}
                    @csrf
                    <div class="row ">
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
                            <label for="">Subject</label>
                            <select class="form-control" id="subjectlistid" name="subjectlistid">
                                <option value="">-- Select --</option>
                                @foreach ($subjectlistsdata as $subject)

                                <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
                            <label for="">Level</label>
                            <select class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($gradelists as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Min and Max Price</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Min Price" id="tminprice" name="tminprice">
                                <input type="text" class="form-control" placeholder="Max Price" id="tmaxprice" name="tmaxprice">
                            </div>
                            </div>

                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-6  ">
                            <div class="arrows">
                               <a href="searchtutor"> <button class="btn btn-sm ">Advance Search</button></a>

                            </div>


                        </div>
                    </div>
                    {{-- </form> --}}
                </div>

                <div class="sliderr mb-5">
                    <div class="slides" id="tutor-slides">
                        @foreach ($tutorlists as $tutorlist)


                        <div id="slide-1">
                            <div class="tutorcard">
                                <div class="tutorcardImg">
                                    <div class="ratePerHr">
                                        <p>&#163;{{$tutorlist->rate}}</p>
                                    </div>
                                    <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="tutorDesc">
                                    <span class="tutname">{{ $tutorlist->name }}</span><br>
                                    <table class="tutorTable">
                                        <tr>
                                            <td colspan="2"><small>{{ $tutorlist->headline }}</small></td>
                                        </tr>
                                        <tr>
                                            <td>{{$tutorlist->total_classes_done}}+ Lessions</td>
                                            <td class="floattright"><b>Exp:</b> {{$tutorlist->experience}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Subject:</b> {{ $tutorlist->subject }} </td>
                                            <td class="text-success floattright">Verified</td>
                                        </tr>

                                    </table>

                                    <div class="btnSec">
                                        <a href="tutorprofile/{{ $tutorlist->sub_map_id }}"><button
                                                class="btn btn-sm">View Profile</button></a>
                                                @if (session('usertype') == 'Parent')
                                                    @else
                                                    <a href="/student/searchtutor"> <button class="btn btn-sm">Free
                                                        Trial</button></a>
                                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            {{-- <div class="allSubjects" id="allSubjects" hidden>

                <div class="sliderr mb-5">
                    <div class="slides">

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5>Arts</h5>
                                        <div class="subItems">

                                            <ul>
                                                <li><a href="#">Fine Art</a></li>
                                                <li><a href="#">Media Studies</a></li>
                                                <li><a href="#">Photography</a></li>
                                                <li><a href="#">Textile</a></li>
                                                <li><a href="#">theatre Studies</a></li>
                                                <li><a href="#">Music Practicle</a></li>
                                                <li><a href="#">Performing Art</a></li>
                                            </ul>
                                        </div>

                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>

                        </div>

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5>Business</h5>
                                        <div class="subItems">

                                            <ul>
                                                <li><a href="">Business Studies</a></li>
                                                <li><a href="">Finance</a></li>
                                                <li><a href="">Business Managment</a></li>
                                                <li><a href="">Economics</a></li>
                                                <li><a href="">Travel & Tourism</a></li>
                                                <li><a href="">Global Perspective</a></li>

                                            </ul>
                                        </div>

                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>

                        </div>

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate cardWidth">
                                    <div class="card-body">
                                        <h5>English</h5>
                                        <div class="subItems">
                                            <ul>
                                                <li><a href="">English Language</a></li>
                                                <li><a href="">English Literature</a></li>
                                                <li><a href="">IELTS</a></li>
                                                <li><a href="">EFL(English As A Foreign Language)</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                        </div>

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5>Entrance Exams</h5>
                                        <div class="subItems">
                                            <ul>
                                                <li><a href="">4+ Exams & Prep</a></li>
                                                <li><a href="">7+ & 8+ Entrance Exam Prep</a></li>
                                                <li><a href="">SAT's</a></li>
                                                <li><a href="">11+ & 13+ Common Entrance</a></li>
                                                <li><a href="">science</a></li>


                                            </ul>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                        </div>

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5>Humanities</h5>
                                        <div class="subItems">
                                            <ul>
                                                <li><a href="">extended Essay</a></li>
                                                <li><a href="">T.O.K</a></li>
                                                <li><a href="">Theology</a></li>
                                                <li><a href="">Anthropology</a></li>
                                                <li><a href="">History</a></li>


                                            </ul>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                        </div>

                        <div id="slide-1">
                            <div class="subSlide">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5>Languages</h5>
                                        <div class="subItems">
                                            <ul>
                                                <li><a href="">Japanese</a></li>
                                                <li><a href="">Farsi</a></li>
                                                <li><a href="">Spanish</a></li>
                                                <li><a href="">Greek</a></li>
                                                <li><a href="">Latin</a></li>
                                                <li><a href="">English Language</a></li>

                                            </ul>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                        </div>









                    </div>
                </div>



                <div class="row" hidden>
                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>Arts</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href="#">Fine Art</a></li>
                                        <li><a href="#">Media Studies</a></li>
                                        <li><a href="#">Photography</a></li>
                                        <li><a href="#">Textile</a></li>
                                        <li><a href="#">theatre Studies</a></li>
                                        <li><a href="#">Music Practicle</a></li>
                                        <li><a href="#">Performing Art</a></li>
                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div>


                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>Business</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href="">Business Studies</a></li>
                                        <li><a href="">Finance</a></li>
                                        <li><a href="">Business Managment</a></li>
                                        <li><a href="">Economics</a></li>
                                        <li><a href="">Travel & Tourism</a></li>
                                        <li><a href="">Global Perspective</a></li>

                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->

                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>English</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->

                    </div>

                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>Entrance Exams</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->

                    </div>

                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>Humanities</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->

                    </div>


                    <div class="col-md-2 col-lg-2">
                        <div class="card card-animate subCard">
                            <div class="card-body">
                                <h5>Languages</h5>
                                <div class="subItems">

                                    <ul>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                        <li><a href=""></a></li>
                                    </ul>
                                </div>

                            </div><!-- end card body -->
                        </div> <!-- end card-->

                    </div>

                </div>



            </div> --}}

            <!--
            <div class="allSubjects" id="allSubjects" hidden>
                <div class="sliderr mb-5">
                    <div class="slides">
                        @foreach ($subjectlists as $subject)


                                <div id="slide-1">
                                    <div class="subSlide">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <h5>{{ $subject->category_name }}</h5>
                                                @if (!isset($currentCategory) || $subject->category_name !== $currentCategory)
                                                <div class="subItems">
                                                    @if (isset($currentCategory))
                                                </ul>
                                            @endif
                                                    <ul>
                                                        @php $currentCategory = $subject->category_name; @endphp
                                                    </ul>
                                                    @endif
                                                <li><a href="">{{ $subject->subject_name }}</a></li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                        @if (isset($currentCategory))
                            </ul>
                        @endif
                    </div>
                </div>
            </div> -->

        </div>





    </div>


    <!-- End Page-content -->

    <script>
    const circularProgress = document.querySelectorAll(".circular-progress");

    Array.from(circularProgress).forEach((progressBar) => {
        const progressValue = progressBar.querySelector(".percentage");
        //   const innerCircle = progressBar.querySelector(".inner-circle");
        let startValue = 0,
            endValue = Number(progressBar.getAttribute("data-percentage")),
            speed = 50,
            progressColor = progressBar.getAttribute("data-progress-color");

        const progress = setInterval(() => {
            startValue++;
            progressValue.textContent = `${startValue}%`;
            progressValue.style.color = `${progressColor}`;

            // innerCircle.style.backgroundColor = `${progressBar.getAttribute(
            //   "data-inner-circle-color"
            // )}`;

            progressBar.style.background = `conic-gradient(${progressColor} ${
      startValue * 3.6
    }deg,${progressBar.getAttribute("data-bg-color")} 0deg)`;
            if (startValue === endValue) {
                clearInterval(progress);
            }
        }, speed);
    });


    var element1 = document.getElementById('activeTutor');
    var element2 = document.getElementById('activeSubj');

    function showAllSubjects() {
        document.getElementById('allSubjects').hidden = false;
        document.getElementById('allTutors').hidden = true;

        element1.classList.remove('active');
        element2.classList.add('active');
    }


    function showAllTutors() {
        document.getElementById('allSubjects').hidden = true;
        document.getElementById('allTutors').hidden = false;

        element1.classList.add('active');
        element2.classList.remove('active');
    }
    </script>
    <script>
    // Get the start time and calculate the remaining time
    var startDateTime = new Date("{{ $upcomingclass->start_time ?? '' }}"); // Replace with your PHP variable
    var startDateTime2 = new Date("{{ $democlass->slot_confirmed ?? '' }}"); // Replace with your PHP variable

    var currentTime = new Date();
    var timeRemaining = startDateTime - currentTime;
    var timeRemaining2 = startDateTime2 - currentTime;

    // Update the countdown timer every second
    var countdownTimer = document.getElementById("countdownTimer");
    var countdownTimer2 = document.getElementById("countdownTimer2");
    var joinClassBtn = document.getElementById("joinClassBtn");
    var joinClassBtn2 = document.getElementById("joinClassBtn2");

    function updateCountdown() {
        timeRemaining -= 1000; // Decrease by 1 second
        var hours = Math.floor((timeRemaining / 1000 / 3600) % 24);
        var minutes = Math.floor((timeRemaining / 1000 / 60) % 60);
        var seconds = Math.floor((timeRemaining / 1000) % 60);

        if (timeRemaining <= 0) {
            // Class has started, hide the countdown and enable the button
            countdownTimer.style.display = "none";
            joinClassBtn.disabled = false;
        } else {
            countdownTimer.innerText = hours + "h " + minutes + "m " + seconds + "s";
            setTimeout(updateCountdown, 1000); // Update every 1 second
        }
    }

    function updateCountdown2() {

        timeRemaining2 -= 1000; // Decrease by 1 second
        var hours = Math.floor((timeRemaining2 / 1000 / 3600) % 24);
        var minutes = Math.floor((timeRemaining2 / 1000 / 60) % 60);
        var seconds = Math.floor((timeRemaining2 / 1000) % 60);
        // alert(timeRemaining2);
        // if (timeRemaining2 <= 0) {
        // Class has started, hide the countdown and enable the button
        // countdownTimer2.style.display = "none";
        // joinClassBtn2.disabled = false;
        // } else {
        countdownTimer2.innerText = hours + "h " + minutes + "m " + seconds + "s";
        setTimeout(updateCountdown2, 1000); // Update every 1 second
        // }
    }

    updateCountdown(); // Start the countdown
    updateCountdown2(); // Start the countdown
    </script>
    <script>
    function switchmode(id) {
        if (id == 1) {
            document.getElementById('tblassignment').hidden = true;
            document.getElementById('tbltest').hidden = false;
            document.getElementById('tasslink').hidden = true;
            document.getElementById('trplink').hidden = false;
        } else {
            document.getElementById('tblassignment').hidden = false;
            document.getElementById('tbltest').hidden = true;
            document.getElementById('tasslink').hidden = false;
            document.getElementById('trplink').hidden = true;
        }
    }
    </script>
    <script>
    function testprogress(id) {
        if (id == 1) {
            document.getElementById("progressreport").hidden = true;
            document.getElementById("testreport").hidden = false;
        } else {
            document.getElementById("progressreport").hidden = false;
            document.getElementById("testreport").hidden = true;
        }
    }
    </script>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <script>
         $(document).ready(function () {
 // Attach change event handlers to your dropdowns
 $('#subjectlistid, #gradelistid, #tminprice, #tmaxprice').on('change', function () {
     // Get form data
     var formData = $('#tutor-search').serialize();

     // Make an Ajax request to fetch updated data based on dropdown changes
     $.ajax({
         url: '{{ route("student.tutorsdashboardsearch") }}', // Replace with your actual API endpoint
         method: 'POST',
         data: formData,
         success: function (data) {
             // Update only the content of the tutorListContainer
             $('#tutor-slides').html(data.html);
         },
         error: function (error) {
             console.error('Error fetching data:', error);
         }
     });
 });
});
         </script>
    @endsection
