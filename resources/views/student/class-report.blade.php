@extends('student.layouts.main')
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


            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            <div id="" class="mb-3 listHeader page-title-box">
                <h3>Class Report</h3> 
            </div>

            <div class=" table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                    <thead class=" ">
                        <tr>
                            <th scope="col">S.No</th>
                            {{-- <th scope="col">Class</th> --}}
                            <th scope="col">Subject</th>
                            <th scope="col">Tutor</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $class->meeting_id }}</td> --}}
                            {{-- <td>{{ $class->status }}</td> --}}
                            
                            {{-- <td>{{ $class->class }}</td> --}}
                            <td>{{ $class->subjects }}</td>
                            {{-- <td>{{ $class->batch }}</td> --}}
                            <td>{{ $class->tutor }}</td>
                           <td>{{ Carbon\Carbon::parse($class->start_time)->format('d/m/Y h:i A') }}</td>

                            {{-- <td>{{ $class->duration }} min</td> --}}
                            <td>
                                @if ($class->status == 'confirmed' || $class->status == 'Confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif ($class->status == 'waiting' || $class->status == 'Waiting')
                                    <span class="badge bg-primary">Waiting Confirmation</span>
                                @elseif ($class->status == 'started' || $class->status == 'Started')
                                    <span class="badge blinking-icon" style="background: red"><i class="ri-record-circle-line "></i> Live..</span>
                                @elseif ($class->status == 'cancelled' || $class->status == 'Cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @elseif ($class->status == 'completed' || $class->status == 'Completed')
                                    <span class="badge bg-success">Completed</span>
                                {{-- @elseif ($liveclasses->status == 8)
                                    <span class="badge bg-primary">{{ $liveclasses->currentstatus }}</span> --}}
                                @endif
                            </td>
                            {{-- <td><button class="btn btn-sm btn-primary"
                                            onclick="openstudentmodal({{ $liveclass->batch_id }});"><span
                                class="fa fa-search"></span> Start Class</button>
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>



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
                // alert('test');
                const page = 1;
                const ajaxUrl = '{{ route("student.demolist-search") }}'
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
                    url: '{{ route("student.demolist-search") }}', // Define your route here
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