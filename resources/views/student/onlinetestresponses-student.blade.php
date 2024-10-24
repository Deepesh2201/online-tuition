@extends('student.layouts.main')
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
                {{-- <p class="text-success"><b>{{ $student->name ?? ''}}</b></p> --}}
                
            </div>



           
                @foreach($questions as $question)
                
                    <div class="mb-3" style="border:1px solid lightgray; padding:15px;">
                        <b style="display: flex;"><span class="text-danger">Question {{$loop->iteration}} : &nbsp;</span>{!! $question->question !!}</b>
                    
                           
                        <b style="text-align: justify; display:flex" >
                                <span class="text-success">Answer : &nbsp;</span>
                            @foreach ($finalResponses as $subResponse)
                                @if($subResponse->question_id === $question->id)
                                {!! $subResponse->response !!}

                                @endif
                            @endforeach
                        </b>

                    <div class="row">
                        @foreach ($finalResponses as $subResponse)
                                @if($subResponse->question_id === $question->id)
                              

                            <div class="col-md-2">
                                <label><b>Max Marks:</b></label><span> {{$subResponse->total_marks}}</span>
                            </div>
                            <div class="col-md-2">
                            <label><b>Marks Obtained:</b> {{$subResponse->obtained_marks}}</label>
                            </div>
                            <div class="col-md-8">
                            <label><b>Remarks:</b> </label><span> {{$subResponse->remarks}}</span>
                            </div>
                        </div>

                        @endif
                        @endforeach
                    </div>
                @endforeach
         

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
