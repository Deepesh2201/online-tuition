@extends('admin.layouts.main')
@section('main-section')
    <style>
        .selectAns {
            border: 1px solid lightgrey;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        input[type='radio'] {
            accent-color: green;
        }

        .testseries {
            display: inline-block;

        }
    </style>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style>
                .listHeader {
                    display: flex;
                    justify-content: space-between;
                }
            </style>

            <div class="page-content">
                <div class="container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <!-- <h3 class="text-center"></h3> -->
            <div id="" class="mb-3 page-title-box listHeader">
                <h3>Create Test Series </h3>
                <a href="{{ route('admin.onlinetests') }}" class="btn btn-primary float-right ">Back To List</a>
            </div>

            <form action="{{ route('admin.onlinetests.store') }}" method="POST">
                @csrf
                <style>
                    .studentpop tr td {
                        margin: 0;
                        padding-top: 0 !important;
                        padding-bottom: 0 !important;


                    }

                    .my-custom-scrollbar {
                        position: relative;
                        height: 200px;
                        overflow: auto;
                    }

                    .table-wrapper-scroll-y {
                        display: block;
                    }

                    /* select option:nth-child(even) {
                                    background: rgb(231, 231, 231);
                                } */
                    select option:nth-child(odd) {
                        background: rgb(227, 226, 226);
                    }

                    select option:checked {
                        background-color: rgb(47, 255, 0);
                        /* color:white; */
                    }

                    select option:hover {
                        background-color: rgb(47, 255, 0);
                    }

                    .select-checkbox option::before {
                        content: "\2610";
                        width: 1.3em;
                        text-align: center;
                        display: inline-block;
                    }

                    .select-checkbox option:checked::before {
                        content: "\2611";
                    }

                    .select-checkbox-fa option::before {
                        font-family: FontAwesome;
                        content: "\f096";
                        width: 1.3em;
                        display: inline-block;
                        margin-left: 2px;
                    }

                    .select-checkbox-fa option:checked::before {
                        content: "\f046";
                    }
                </style>
                <div class=" row">
                    <input type="hidden" id="id" name="id" value="{{ $tdata->id ?? '' }}" class="form-control">
                    {{-- <div class="col-md-3 col-sm-3 col-12">

                        <label for="">Test Type<i style="color: red">*</i></label>
                        <select class="form-control">
                            <option>Objective</option>
                            <option>Subjective</option>
                        </select>
                    </div> --}}
                    <div class="col-md-3 col-sm-3 col-12">

                        <label for="">Test Type<i style="color: red">*</i></label>
                        <select class="form-control" id="test-type" name="test_type" onchange="fetchQuestions()">
                            @if ($tdata ?? '')
                            
                            <option value="1" @if ($tdata->test_type == 1) selected @endif>Objective</option>
                            <option value="2" @if ($tdata->test_type == 2) selected @endif>Subjective</option>
                            @else
                            <option value="1">Objective</option>
                            <option value="2">Subjective</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12">

                        <label for="">Test Name<i style="color: red">*</i></label>
                        <input type="text" class="form-control" id="testname" name="testname" placeholder="Enter Test Name"
                            value="{{ $tdata->name ?? '' }}" required>
                        <span class="text-danger">
                            @error('testname')
                                {{ 'Please enter test name' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6 col-sm-3 col-12">
                        <label for="">Test Description<i style="color: red">*</i></label>
                        <textarea type="text" class="form-control" id="testdescription"  name="testdescription" required>{{ $tdata->description ?? '' }}</textarea>
                        <span class="text-danger">
                            @error('testdescription')
                                {{ 'Please enter test description' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12">
                        <label for="">Class<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="classname" name="classname"
                            onchange="fetchSubjects();" required>
                            <option value="">--Select--</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}"
                                    @if ($tdata->class_id ?? '') @if ($class->id == $tdata->class_id)
                                    selected @endif
                                    @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('classname')
                                {{ 'Please select class' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Subject<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="subject" name="subject" onchange="fetchQuestions();" 
                            required>
                            @if ($tdata ?? '')
                                @foreach ($subjects as $subject)
                                    <option
                                        value="{{ $subject->id }}"@if ($tdata->subject_id ?? '') @if ($subject->id == $tdata->subject_id)
                                    selected @endif
                                        @endif>{{ $subject->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">
                            @error('subject')
                                {{ 'Please select subject' }}
                            @enderror
                        </span>

                    </div>
                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Topic<i style="color:red">*</i></label>
                        <input type="text" class="form-control" id="topic" name="topic" value="{{$tdata->topic_name ?? ''}}" placeholder="Enter Topic" required>
                        <span class="text-danger">
                            @error('topic')
                                {{ 'Please enter topic' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Max Attempt<i style="color: red">*</i></label>
                        <input type="number" class="form-control" id="maxattempt" name="maxattempt"
                            value="{{ $tdata->max_attempt ?? '' }}" required>
                        <span class="text-danger">
                            @error('maxattempt')
                                {{ 'Please enter max attempts' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Duration(minutes)<i style="color: red">*</i></label>
                        <input type="number" class="form-control" id="duration" name="duration"
                            value="{{ $tdata->test_duration ?? '' }}" required>
                        <span class="text-danger">
                            @error('duration')
                                {{ 'Please enter test duration' }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Test Start Date<i style="color: red">*</i></label>
                        <input type="datetime-local" class="form-control" id="tstartdate" name="tstartdate"
                            value="{{ $tdata->test_start_date ?? '' }}" required>
                        <span class="text-danger">
                            @error('tstartdate')
                                {{ 'Please select test start date' }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-3 col-sm-3 col-12 mt-2">
                        <label for="">Test End Date<i style="color: red">*</i></label>
                        <input type="datetime-local" class="form-control" id="testenddate" name="testenddate"
                            value="{{ $tdata->test_end_date ?? '' }}" required>
                        <span class="text-danger">
                            @error('testenddate')
                                {{ 'Please select test end date' }}
                            @enderror
                        </span>
                    </div>
                </div>


                <div class="form-group row mt-2">
                    <div class="col-md-12">
                        <label for="">Questions<i style="color: red">*</i></label>

                        <select class="form-control select-checkbox-fa" style="height: 300px" id="questiondata"
                            name="questiondata[]"  multiple required>

                           @if($questions ?? ''){ @foreach($questions as $question)
                                <option value="{{ $question->id }}" @if(in_array($question->id,$qstn)) selected @endif>
                                    {{ $question->question }}
                                </option>
                            @endforeach}
                            @endif

                        </select>

                        <span class="text-danger">
                            @error('questiondata')
                                {{ 'Please select questions' }}
                            @enderror
                        </span>
                        <br>
                    </div>




                <div class="row  " >
                    <div class="col-md-12 col-sm-12 col-12" >
                       <div style="display:flex; justify-content: end;">
                       <button type="submit" id="" class="btn btn-success btn-sm ">Save

                            Test</button>
                       </div>

                    </div>
                </div>
            </form>
        </div>
        <!-- content-wrapper ends -->

        <script>
            function fetchSubjects() {

                var classId = $('#classname option:selected').val();
                $("#subject").html('');
                $("#topic").html('');
                $.ajax({
                    url: "{{ url('fetchsubjects') }}",
                    type: "POST",
                    data: {
                        class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#subject').html('<option value="">-- Select Type --</option>');
                        $.each(result.subjects, function(key, value) {
                            $("#subject").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

            };

            function fetchTopics() {

                var subjectId = $('#subject option:selected').val();
                $("#topic").html('');
                $.ajax({
                    url: "{{ url('fetchtopics') }}",
                    type: "POST",
                    data: {
                        subject_id: subjectId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#topic').html('<option value="">-- Select Type --</option>');
                        $.each(result.topics, function(key, value) {
                            $("#topic").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

            };

            function fetchQuestions() {

                var subjectId = $('#subject option:selected').val();
                var type = $('#test-type option:selected').val();
                $.ajax({
                    url: "{{ url('admin/fetchquestions') }}",
                    type: "POST",
                    data: {
                        subject_id: subjectId,
                        type : type,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        $('#questiondata').html('');
                        $.each(result, function(key, value) {
                            $("#questiondata").append('<option value="' + value
                                .id + '">' + value.question + '</option>');
                        });

                    }

                });

            };
            // viewtestquestions();
            function viewtestquestions() {
                var id = $('#id').val();
                $.ajax({
                    url: "{{ url('admin/onlinetestquestions') }}/" + id,
                    type: "GET",
                    data: {
                        // class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(JSON.parse(result.subjects.question_id))
                        $("#questiondata").val(JSON.parse(result.subjects.question_id));
                    }

                });
            }
        </script>
    @endsection
