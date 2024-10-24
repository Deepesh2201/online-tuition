@extends('tutor.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div id="listHeader" class="mb-3">
                <h3>Upcoming Classes</h3>
                <button class="btn btn-sm btn-primary" onclick="openclassmodal();"><span class="fa fa-plus-circle"> </span> Schedule Class</button>
            </div>
            
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Meeting ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liveclasses as $liveclass)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $liveclass->meeting_id }}</td>
                                <td>{{ $liveclass->status }}</td>
                                <td>{{ $liveclass->subjects }}</td>
                                <td>{{ $liveclass->batch }}</td>
                                <td>{{ $liveclass->topics }}</td>
                                <td>{{ $liveclass->start_time }}</td>
                                <td>{{ $liveclass->duration }}</td>
                                <td><a href="{{$liveclass->start_url}}" target="_blank"><button class="btn btn-sm btn-success"><span
                                            class="fa fa-play-circle "></span> Start Class</button></a>
                                            <a href="{{url('tutor/liveclass/completed').'/'.$liveclass->liveclass_id}}"><button class="btn btn-sm btn-success"><span
                                                class="fa fa-check "></span> Mark Completed</button></a>
                                </td>
                                {{-- <td><button class="btn btn-sm btn-primary"
                                    onclick="openstudentmodal({{ $liveclass->batch_id }});"><span
                                        class="fa fa-search"></span> Start Class</button>
                            </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>
                {{-- <form action="{{ route('tutor.liveclass.store') }}" method="POST">
                    @csrf
                    <input type="text" id="url" name="url"
                        value="{{ url()->full() }}">{{ url()->full('code') }}
                    <button type="submit" class="success">Submit</button>
                </form> --}}
                <br>

                {{-- <form action="{{ route('tutor.liveclass.getuser') }}" method="GET">
                    @csrf
                    <input type="text" id="zuser" name="zuser"><button type="submit" class="success">Submit</button>
                </form> --}}

            </div>
        </div>
        <!-- content-wrapper ends -->


        <!--Student List modal -->
        <div class="modal fade" id="studentlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Student List</h3>
                        </header>

                        <form action="" method="">
                            <div class="row">
                                <div class="col-12 col-md-12 col-ms-12 mb-3">
                                    {{-- <select id="studentlist" name="studentlist[]" multiple>

                         </select> --}}
                                    <style>
                                        .newclass td,
                                        .newclass th {
                                            padding: 2px !important
                                        }
                                    </style>
                                    <table class="table table-bordered newclass" style="margin: 0%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Student Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentlist">

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                    class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Schedule modal -->
        <div class="modal fade" id="scheduleclassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Schedule New Class</h3>
                        </header>

                        <form action="{{ route('tutor.liveclass.scheduleclass') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-md-4 col-ms-6 mb-3">
                                    <label>Class/Grade<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="class" name="class"
                                        onchange="fetchSubjects()">
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('class')
                                            {{ 'Class is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-4 col-ms-6 mb-3">
                                    <label>Subject<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="subject" name="subject"
                                        onchange="fetchTopics();batchbysubject()">

                                    </select>
                                    <span class="text-danger">
                                        @error('subject')
                                            {{ 'Subject is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-4 col-ms-6 mb-3">
                                    <label>Batch<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="batchid" name="batchid">

                                    </select>
                                    <span class="text-danger">
                                        @error('batchid')
                                            {{ 'Batch is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Topic<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="topic" name="topic">

                                    </select>
                                    <span class="text-danger">
                                        @error('topic')
                                            {{ 'Topic is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class Start Time<span style="color:red">*</span></label>
                                    <input type="datetime-local" class="form-control" id="classstarttime"
                                        name="classstarttime">
                                    <span class="text-danger">
                                        @error('classstarttime')
                                            {{ 'Class start time is required' }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class Duration(minutes)<span style="color:red">*</span></label>
                                    <input type="tet" class="form-control" id="classduration" name="classduration">
                                    <span class="text-danger">
                                        @error('classduration')
                                            {{ 'Class duration is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class Password<span style="color:red">*</span></label>
                                    <input type="tet" class="form-control" id="classpassword" name="classpassword">
                                    <span class="text-danger">
                                        @error('classpassword')
                                            {{ 'Class password is required' }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <button type="submit" id=""
                                class="btn btn-sm btn-success float-right">Submit</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal">Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openclassmodal(batchid, subjectid) {
                $('#batchid').val(batchid);
                $("#topic").html('');
                $.ajax({
                    url: "{{ url('fetchtopics') }}",
                    type: "POST",
                    data: {
                        subject_id: subjectid,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#topic').html('<option value="">-- Select Topic --</option>');
                        $.each(result.topics, function(key, value) {
                            $("#topic").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

                $('#scheduleclassmodal').modal('show')

            }

            function openstudentmodal(id) {
                var classId = $('#classname option:selected').val();
                $("#subject").html('');
                $.ajax({
                    url: "{{ url('tutor/batches/students') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        // console.log(result)
                        $('#studentlist').html('');
                        $.each(result, function(key, value) {
                            // $("#studentlist").append(value.name);
                        });
                        var table = "";
                        var p = 0;
                        for (var i in result) {
                            p++;
                            table += "<tr>";
                            table += "<td hidden>" +
                                result[i].id + "</td>" +
                                "<td>" + p + "</td>" +
                                "<td>" + result[i].name + "</td>";
                            table += "</tr>";
                        }

                        document.getElementById("studentlist").innerHTML = table;
                    }

                });
                // $('#studentlist').val()
                $('#studentlistmodal').modal('show')

            }

            function fetchSubjects() {

                var classId = $('#class option:selected').val();
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

            function batchbysubject() {

                var subjectId = $('#subject option:selected').val();
                $("#batchid").html('');
                $.ajax({
                    url: "{{ url('batchbysubject') }}",
                    type: "POST",
                    data: {
                        subject_id: subjectId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#batchid').html('<option value="">-- Select Type --</option>');
                        $.each(result.batches, function(key, value) {
                            $("#batchid").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

            };
        </script>
    @endsection
