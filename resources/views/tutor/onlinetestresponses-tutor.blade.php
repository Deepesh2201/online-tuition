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
            <div id="" class="mb-3 listHeader page-title-box">
                <h3>Test Response({{$test_name->name ?? '-'}})</h3>
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
            <form id="payment-search">


                <div class="row">
                <div class="col-12 col-sm-3 col-md-3">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="student_name">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 mt-4">
                        <button class="btn btn-primary" type="submit" style="float:right"> <span class="fa fa-search"></span>
                            Search</button>
                    </div>

                </div>



            </form>

            <hr>

            <table class="table table-hover table-striped align-middlemb-0 table-responsive users-table">
                <thead>
                    <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">View Submission</th>

                    </tr>
                </thead>
                <tbody>
                    @if($responses)
                      @foreach ($responses as $response)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$response->std_name}}</td>
                            <td>{{ \Carbon\Carbon::parse($response->test_attempted_on)->format('d M Y') }}</td>
                            <td>
                                @if($response->status ==1 )
                                    <a href="#"><button class="btn btn-sm btn-primary" disabled>completed</button></a>
                                    {{-- <a href="{{url('tutor/onlinetests/responses/student')}}/{{$response->id}}"><button class="btn btn-sm btn-primary">View</button></a> --}}
                                @else
                                    <a href="{{url('tutor/onlinetests/responses/student')}}/{{$response->id}}"><button class="btn btn-sm btn-primary">View</button></a>
                                @endif
                            </td>
                        </tr>
                      @endforeach
                    @endif
                </tbody>
            </table>

            <div class="d-flex justify-content-center" id="paginationContainer">
                {!! $responses->links() !!}
            </div>

        </div>
        <!-- content-wrapper ends -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                const ajaxUrl = "{{ url('tutor/studentwise/subjectiveResponses') }}/{{$test_id}}"
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
                    url: "{{ url('tutor/studentwise/subjectiveResponses') }}/{{$test_id}}", // Define your route here
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
