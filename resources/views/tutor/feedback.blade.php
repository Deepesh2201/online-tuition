@extends('tutor.layouts.main')
@section('main-section')


<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

            <div id="" class="mb-3 listHeader">
                <h3>Feedback </h3>
                <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> Add
                    Review</button>
            </div>
            <div class="mt-4 table-responsive" id="">

                <table class="table table-hover table-striped align-middlemb-0 ">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class/Grade</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Ratings</th>
                            <th scope="col">Comments</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_reviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $review->class_name ?? '' }}</td>
                                <td>{{ $review->subject_name ?? '' }}</td>
                                <td>{{ $review->batch_name ?? '' }}</td>
                                <td>{{ $review->student_name ?? '' }}</td>
                                <td>{{ $review->ratings ?? '' }}</td>
                                <td>{{ $review->description ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $student_reviews->links() !!}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4" id="header">Add Feedback</h3>
                        </header>
                        <style>

                        </style>

                        <form id="submit-feedback">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
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

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
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

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Batch<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="batchid" name="batchid"
                                        onchange="studentsByBatch()">

                                    </select>
                                    <span class="text-danger">
                                        @error('batchid')
                                        {{ 'Batch is required' }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Student's Name<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="sname" name="student">
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Rating<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="rating" name="rating">
                                        <option value="0">0</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4">4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>

                                    </select>

                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Comments<span style="color:red">*</span></label>
                                    <textarea type="text" class="form-control" id="comments" name="comments">
                                    </textarea>
                                </div>



                            </div>

                            <div style="float:right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    onclick="closeModal();">Close</button>
                                <button type="submit" id="" class="btn btn-sm btn-success "><span
                                        class="fa fa-check"></span>
                                    Submit</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        function openmodal() {
            $("#openmodal").modal('show');
        }

        function closeModal() {
            $('#openmodal').modal('hide');
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

        function studentsByBatch() {


            var batchId = $('#batchid option:selected').val();
            $("#sname").html('');
            $.ajax({
                url: "{{ url('studentsbybatch') }}",
                type: "POST",
                data: {
                    batch_id: batchId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#sname').html('<option value="">-- Select student --</option>');
                    $.each(result.students, function(key, value) {
                        $("#sname").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }

            });

        };
        </script>

        <script>
            $(document).ready(function() {
                $('#submit-feedback').submit(function(e) {
                    e.preventDefault();
                    const page = 1;
                    const ajaxUrl = "{{ route('tutor.feedback.student') }}";
                    var formData = $(this).serialize();


                    $.ajax({
                        type: 'post',
                        url: ajaxUrl, // Define your route here
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(data) {
                            toastr.success(data.success);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);

                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function (field, errorMessages) {
                                    $.each(errorMessages, function (index, errorMessage) {
                                        toastr.error(errorMessage);
                                    });
                                });
                            }


                        }
                    });

                });
            });
        </script>
@endsection
