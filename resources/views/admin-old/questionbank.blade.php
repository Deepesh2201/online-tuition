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
        .ck-powered-by{
            display: none;
        }

        .ck-balloon-panel, .ck-powered-by-balloon,
        .ck-balloon-panel_position_border-side_right{
            border: none !important;
        }
        
    </style>
    
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <!-- <h3 class="text-center"></h3> -->
            <div id="listHeader" class="mb-3">
                <h3>{{$label ?? 'Add New Question'}} </h3>
                <a href="{{ route('admin.questionbank') }}" class="btn btn-primary float-right mr-2 btn-sm">Back To List</a>

            </div>

            <form action="{{ route('admin.questionbank.store') }}" method="POST">
                @csrf
                <div class=" row">
                    <input type="hidden" id="id" name="id" value="{{$qdata->id ?? ''}}" class="form-group">
                    <div class="col-md-4">
                        <label for="">Class<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="classname" name="classname" 
                            onchange="fetchSubjects();" required>
                            <option value="">--Select--</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" @if ($qdata->class_id ?? '')
                                    @if($class->id == $qdata->class_id)
                                        selected
                                        @endif
                                @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('classname')
                                {{ 'Please select class' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="">Subject<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="subject" name="subject" onchange="fetchTopics();"
                            required>
                            @if ($qdata ?? '')
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}"@if ($qdata->subject_id ?? '')
                                        @if($subject->id == $qdata->subject_id)
                                        selected
                                        @endif
                                    @endif>{{$subject->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">
                            @error('subject')
                                {{ 'Please select subject' }}
                            @enderror
                        </span>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="">Topic<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="topic" name="topic" required>
                            @if ($qdata ?? '')
                            @foreach ($topics as $topic)
                                <option value="{{$topic->id}}"@if ($qdata->topic_id ?? '')
                                    @if($topic->id == $qdata->topic_id)
                                    selected
                                    @endif
                                @endif>{{$topic->name}}</option>
                            @endforeach
                        @endif
                        </select>
                        <span class="text-danger">
                            @error('topic')
                                {{ 'Please select topic' }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Question<i style="color:red">*</i></label>
                        <textarea type="text" class="form-control" rows="5" id="question" name="question">
                            {{$qdata->question ?? ''}}
                        </textarea>

                        </select>
                        <span class="text-danger">
                            @error('question')
                                {{ 'Please enter question' }}
                            @enderror
                        </span>
                    </div>

                </div>
                <p><u>Give Options<i style="color:red">*</i></u></p>

                <div class="form-group row">
                    <label class="col-md-1 col-sm-1 col-3 col-form-label rtl"><b>.A</b></label>
                    <div class="col-sm-5 col-md-5 col-9">
                        <input type="text" class="form-control" id="optiona" name="optiona" value="{{$qdata->option1 ?? ''}}"
                            placeholder="Enter Option A">
                            <span class="text-danger">
                                @error('optiona')
                                    {{ 'Please enter option' }}
                                @enderror
                            </span>
                    </div>

                    <label class="col-md-1 col-sm-1 col-3 col-form-label rtl"><b>.B</b></label>
                    <div class="col-sm-5 col-md-5 col-9">
                        <input type="text" class="form-control" name="optionb" id="optionb" value="{{$qdata->option2 ?? ''}}"
                            placeholder="Enter Option B">
                            <span class="text-danger">
                                @error('optionb')
                                    {{ 'Please enter option' }}
                                @enderror
                            </span>
                    </div>

                    <label class="col-md-1 col-sm-1 col-3 col-form-label rtl"><b>.C</b></label>
                    <div class="col-sm-5 col-md-5 col-9">
                        <input type="text" class="form-control" id="optionc" name="optionc" value="{{$qdata->option3 ?? ''}}"
                            placeholder="Enter Option C">
                            <span class="text-danger">
                                @error('optionc')
                                    {{ 'Please enter option' }}
                                @enderror
                            </span>
                    </div>

                    <label class="col-md-1 col-sm-1 col-3 col-form-label rtl"><b>.D</b></label>
                    <div class="col-sm-5 col-md-5 col-9">
                        <input type="text" class="form-control" name="optiond" id="optiond" value="{{$qdata->option4 ?? ''}}"
                            placeholder="Enter Option D">
                            <span class="text-danger">
                                @error('optiond')
                                    {{ 'Please enter option' }}
                                @enderror
                            </span>
                    </div>
                    
                </div>
                <p><u>Select Correct Answer</u></p>
                <div class="row selectAns">
                    <div class="col-md-3 col-sm-3 col-12">
                        <input type="radio" name="correctanswer" id="option1" value="A" 
                        @if ($qdata ?? '')
                            @if ($qdata->correct_option == $qdata->option1)
                                checked
                            @endif
                        @endif>
                        <label
                            class="checkAns ml-2" for="option1">Option A</label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12">
                        <input type="radio" name="correctanswer" id="option2" value="B"
                        @if ($qdata ?? '')
                        @if ($qdata->correct_option == $qdata->option2)
                            checked
                        @endif
                    @endif>
                    <label
                            class="checkAns ml-2" for="option2">Option B</label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12">
                        <input type="radio" name="correctanswer" id="option3" value="C"
                        @if ($qdata ?? '')
                            @if ($qdata->correct_option == $qdata->option3)
                                checked
                            @endif
                        @endif>
                        <label
                            class="checkAns ml-2" for="option3">Option C</label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12">
                        <input type="radio" name="correctanswer" id="option4" value="D"
                        @if ($qdata ?? '')
                            @if ($qdata->correct_option == $qdata->option4)
                                checked
                            @endif
                        @endif>
                        <label
                            class="checkAns ml-2" for="option4">Option D</label>
                    </div>
                    <span class="text-danger">
                        @error('correctanswer')
                            {{ 'Please select correct option' }}
                        @enderror
                    </span>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 mt-4">
                        <label for="">Remarks</label>
                        <textarea type="text" class="form-control"  id="remarks" name="remarks">
                            {{$qdata->remarks ?? ''}}
                        </textarea>

                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-sm-12 col-12">
                        <button type="submit" id="" class="btn btn-success btn-sm float-right">Save Question</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- content-wrapper ends -->

        <script>
            function changestatus(id, status) {

                var url = "{{ URL('admin/batch/status') }}";
                // var id= 
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/admin/batch";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }

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

                        ClassicEditor
                                .create( document.querySelector( '#question' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
    @endsection
