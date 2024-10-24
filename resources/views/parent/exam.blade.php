@extends('parent.layouts.main')
@section('main-section')

<meta name="csrf-token" content="{{ csrf_token() }}">
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

            @if (request()->has('message'))
                <div class="alert alert-success">
                    {{ urldecode(request()->get('message')) }}
                </div>
            @endif
           <form id="payment-search">
                    <div class="row ">
                        <div class="col-md-3 mt-4">
                            <select name="class_name" class="form-control" id="classname" onchange="fetchSubjects()">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-4">
                            <select name="subject_name" class="form-control" id="subject">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-4">
                            <input type="text" class="form-control" placeholder="Enter Topic" name="topic">
                        </div>



                        <div class="col-md-3 mt-4">
                            <button class="btn  btn-primary" style="float:right"> <span
                                class="fa fa-search"></span> Search</button>
                        </div>
                    </div>
                </form>



                <div id="" class="mt-3 listHeader page-title-box">
                    <h3>My Examination</h3>
                </div>



            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                    <thead class="">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Exam Type</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Exam Description</th>
                            <th scope="col">Attempts Pending</th>
                            <th scope="col">Exam Duration</th>
                            <th scope="col">Exam Start Date & Time</th>
                            <th scope="col">Exam End Date & Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($exams as $exam)
                            @if ($exam->attemptsRemaining > 0)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $exam->class }}</td>
                                    <td>{{ $exam->subject }}</td>
                                    <td>{{ $exam->topic }}</td>
                                    <td></td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->description }}</td>
                                    <td>{{ $exam->attemptsRemaining }}</td>
                                    <td>{{ $exam->test_duration }} min</td>
                                    <td>{{ $exam->test_start_date }}</td>
                                    <td>{{ $exam->test_end_date }}</td>
                                    <td><a href="{{ url('student/taketest') }}/{{ $exam->id }}"
                                            class="badge bg-success p-2">Start Test</a></td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center" id="paginationContainer">
                {!! $exams->links() !!}
            </div>

            <br>
            <br>

            <div id="" class="mb-3 listHeader page-title-box">
                <h3 class="mt-3">Previous Exams</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                    <thead class="">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Exam Type</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Exam Description</th>
                            <th scope="col">Exam Duration</th>
                            <th scope="col">Exam Start Date & Time</th>
                            <th scope="col">Exam End Date & Time</th>
                            <th scope="col">Attempted On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($extakens as $extaken)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td>{{ $extaken->exam_name }}</td>
                                <td>{{ $extaken->exam_description }}</td>
                                <td>{{ $extaken->duration }} min</td>
                                <td>{{ $extaken->test_start_date }}</td>
                                <td>{{ $extaken->test_end_date }}</td>
                                <td>{{ $extaken->test_attempted_on }}</td>
                                <td><a href="{{url('student/exam/report')}}/{{$extaken->id}}" class="badge bg-primary p-2"> Report</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <!-- content-wrapper ends -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
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
        </script>
        <script>
            function updateTableAndPagination(data) {
                // $('#tableContainer').html(data.table);
                $('.users-table tbody').html(data.table);
                $('#paginationContainer').html(data.pagination);
            }

            $(document).ready(function () {
                $('#payment-search').submit(function (e) {
                    e.preventDefault();
                    const page = 1;
                    const ajaxUrl = '{{ route("student.exams-search") }}'
                    var formData = $(this).serialize();

                    formData += `&page=${page}`;

                    $.ajax({
                        type: 'post',
                        url: ajaxUrl, // Define your route here
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function (data) {
                            // console.log(data)
                            updateTableAndPagination(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });

                });


                $(document).on('click', '#paginationContainer .pagination a', function (e) {
                e.preventDefault();
                var formData = $('#payment-search').serialize();
                const page = $(this).attr('href').split('page=')[1];
                formData += `&page=${page}`;
                $.ajax({
                    type: 'post',
                    url: '{{ route("student.exams-search") }}', // Define your route here
                    data:formData,
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    success: function (data) {
                        updateTableAndPagination(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });



            });
        </script>
    @endsection
