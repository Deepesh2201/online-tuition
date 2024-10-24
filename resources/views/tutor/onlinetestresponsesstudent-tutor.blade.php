@extends('tutor.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">



<!--==============================================================-->
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
            <!-- <h3 class="text-center"></h3> -->
            <div id="" class="mb-3  page-title-box">
                <h3>Test Response({{ $test->name }} - {{ \Carbon\Carbon::parse($test->test_start_date)->format('d M Y') }} )</h3>
                <p class="text-success"><b>{{ $student->name ?? ''}}</b></p>
                <!-- <a class="btn btn-primary" href="{{ route('admin.questionbank.create') }}">Add New Question</a> -->
                <!-- <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add New Question
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.questionbank.create') }}">Objective</a>
                            <a class="dropdown-item" href="{{route('admin.questionbank.subjective.create')}}">Subjective</a>

                        </div>
                    </div> -->
            </div>

            <form action="{{url('tutor/onlinetests/responses/correction')}}/{{$response->id}}" method="post">
                @csrf
                @foreach($questions as $question)
                    <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                        <p><b><span class="text-danger">Question {{$loop->iteration}} : &nbsp;</span>{!! $question->question !!}</b></p>
                        <p style="text-align: justify;"><b><span class="text-success">Answer : &nbsp;</span>
                            @foreach ($finalResponses as $subResponse)
                                @if($subResponse->question_id === $question->id)
                                {!! $subResponse->response !!}
                                @endif
                            @endforeach
                    </b></p>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Max Marks</label>
                                <input type="number" class="form-control" name="max_marks[{{$question->id}}]"  value="{{ old("max_marks.{$question->id}") }}">
                                @error("max_marks.{$question->id}")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                            <label> Marks Obtain</label>
                                <input type="number" class="form-control" name="marks_obtained[{{$question->id}}]" placeholder="Enter Marks"  value="{{ old("marks_obtained.{$question->id}") }}">
                                @error("marks_obtained.{$question->id}")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                            <label>Remarks</label>
                                <input type="text" class="form-control"  value="{{ old("remarks.{$question->id}") }}" name="remarks[{{$question->id}}]" placeholder="Remarks">
                                @error("remarks.{$question->id}")
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Save</button>
            </form>



            {{-- <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                <p><b><span class="text-danger">Question 2.&nbsp;</span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</b></p>
                <p style="text-align: justify;"><b><span class="text-success">Answer.&nbsp;</span></b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
                <div class="row">
                    <div class="col-md-3">
                        <label>Max Marks</label>
                        <input type="text" class="form-control" placeholder="Max Marks" readonly>
                    </div>
                    <div class="col-md-3">
                    <label> Marks Obtain</label>
                        <input type="text" class="form-control" placeholder="Enter Marks">
                    </div>
                    <div class="col-md-6">
                    <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div>

            <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                <p><b><span class="text-danger">Question 3.&nbsp;</span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</b></p>
                <p style="text-align: justify;"><b><span class="text-success">Answer.&nbsp;</span></b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
                <div class="row">
                    <div class="col-md-3">
                        <label>Max Marks</label>
                        <input type="text" class="form-control" placeholder="Max Marks" readonly>
                    </div>
                    <div class="col-md-3">
                    <label> Marks Obtain</label>
                        <input type="text" class="form-control" placeholder="Enter Marks">
                    </div>
                    <div class="col-md-6">
                    <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div>

            <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                <p><b><span class="text-danger">Question 4.&nbsp;</span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</b></p>
                <p style="text-align: justify;"><b><span class="text-success">Answer.&nbsp;</span></b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
                <div class="row">
                    <div class="col-md-4">
                        <label>Max Marks</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                    <label> Marks Obtain</label>
                        <input type="text" class="form-control" placeholder="Enter Marks">
                    </div>
                    <div class="col-md-4">
                    <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div>

            <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                <p><b><span class="text-danger">Question 5.&nbsp;</span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</b></p>
                <p style="text-align: justify;"><b><span class="text-success">Answer.&nbsp;</span></b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
                <div class="row">
                    <div class="col-md-4">
                        <label>Max Marks</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                    <label> Marks Obtain</label>
                        <input type="text" class="form-control" placeholder="Enter Marks">
                    </div>
                    <div class="col-md-4">
                    <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div>

            <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                <p><b><span class="text-danger">Question 6.&nbsp;</span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</b></p>
                <p style="text-align: justify;"><b><span class="text-success">Answer.&nbsp;</span></b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
                <div class="row">
                    <div class="col-md-4">
                        <label>Max Marks</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                    <label> Marks Obtain</label>
                        <input type="text" class="form-control" placeholder="Enter Marks">
                    </div>
                    <div class="col-md-4">
                    <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks">
                    </div>
                </div>
            </div> --}}
        <!-- content-wrapper ends -->
        <script>
        function changestatus(id, status) {

            var url = "{{ URL('admin/question/status') }}";
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
                        window.location = "/admin/questionbank";
                    } else {
                        alert("Something went wrong. Please try again later");
                    }

                }
            });
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
        <script>
        function changestatus(id, status) {

            var url = "{{ URL('admin/question/status') }}";
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
                        window.location = "/admin/questionbank";
                    } else {
                        alert("Something went wrong. Please try again later");
                    }

                }
            });

        }

        function fetchSubjects() {
            var classId = $('#classname option:selected').val();
            $("#subject").html('');
            $.ajax({
                url: "{{ url('fetchsubjects') }}",
                type: "POST",
                data: {
                    class_id: classId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subject').html('<option value="">-- Select Subject --</option>');
                    $.each(result.subjects, function(key, value) {
                        $("#subject").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });

        };

        function fetchTopics() {
            var subjectId = $('#subject option:selected').val();
            $("#topicid").html('');
            $.ajax({
                url: "{{ url('fetchtopics') }}",
                type: "POST",
                data: {
                    subject_id: subjectId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    $('#topicid').html('<option value="">-- Select Topic --</option>');
                    $.each(result.topics, function(key, value) {
                        $("#topicid").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });
        };
        </script>
        <script>
        function updateTableAndPagination(data) {
            // $('#tableContainer').html(data.table);
            $('.users-table tbody').html(data.table);
            $('#paginationContainer').html(data.pagination);
        }

        $(document).ready(function() {
            $('#payment-search').submit(function(e) {
                e.preventDefault();
                const page = 1;
                const ajaxUrl = "{{ route('admin.questionbank-search') }}"
                var formData = $(this).serialize();

                formData += `&page=${page}`;

                $.ajax({
                    type: 'post',
                    url: ajaxUrl, // Define your route here
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(data) {
                        // console.log(data)
                        updateTableAndPagination(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });

            });


            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                var formData = $('#payment-search').serialize();
                const page = $(this).attr('href').split('page=')[1];
                formData += `&page=${page}`;
                $.ajax({
                    type: 'post',
                    url: "{{ route('admin.questionbank-search') }}", // Define your route here
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        updateTableAndPagination(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });



        });
        </script>
        @endsection
