@extends('tutor.layouts.main')
@section('main-section')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <style>
    .listHeader {
        display: flex;
        justify-content: space-between;
    }

    .form-check-input:checked{
        background-color: #57b49d !important;
        border-color: #57b49d !important;
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
            <h3 class="text-center">Completed Classes </h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-striped align-middlemb-0 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            {{-- <th scope="col">Meeting ID</th> --}}
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liveclasses as $liveclass)



                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $liveclass->meeting_id }}</td> --}}
                            <td>{{ $liveclass->subjects }}</td>
                            <td>{{ $liveclass->batch }}</td>
                            <td>{{ $liveclass->topics }}</td>
                            <td>{{ $liveclass->start_time }}</td>
                            <td>{{ $liveclass->duration }}</td>
                            {{-- <td>{{ $liveclass->status }}</td> --}}
                            <td>
                                @if ($liveclass->status == 'confirmed' || $liveclass->status == 'Confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif ($liveclass->status == 'waiting' || $liveclass->status == 'Waiting')
                                    <span class="badge bg-primary">Waiting Confirmation</span>
                                @elseif ($liveclass->status == 'started' || $liveclass->status == 'Started')
                                    <span class="badge bg-success">Started</span>
                                @elseif ($liveclass->status == 'cancelled' || $liveclass->status == 'Cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @elseif ($liveclass->status == 'completed' || $liveclass->status == 'Completed')
                                    <span class="badge bg-success">Completed</span>
                                {{-- @elseif ($liveclasses->status == 8)
                                    <span class="badge bg-primary">{{ $liveclasses->currentstatus }}</span> --}}
                                @endif
                            </td>
                            @php
                                $formattedStartTime = date('Y-m-d\TH:i:s\Z', strtotime($liveclass->start_time));
                            @endphp
                            <td><button class="btn btn-sm btn-primary" onclick="openAttModal({{ $liveclass->batch_id }},{{ $liveclass->class_id }},{{$liveclass->subject_id}},{{$liveclass->topic_id}},'{{ $formattedStartTime }}');">Attendance</button></td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->



        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4" id="header">Attendance(Batch Name)</h3>
                        </header>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>



                            <div style="float:right">
                                <button type="button" class="btn btn-sm btn-danger mr-1 " data-dismiss="modal"><span
                                        class="fa fa-times"></span> Close</button>
                                <button type="submit" id="" class="btn btn-sm btn-success ">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!--Student List modal -->
        <div class="modal fade" id="studentlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>

                            <h3 class="text-center mb-4" id="header">Attendance(Batch Name)</h3>

                        </header>

                        <form action="{{url('tutor/batches/update-attendance')}}" method="post">
                            @csrf
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
                                                <th>Present</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentlist">
                                            {{-- <tr>
                                                <td>1</td>
                                                <td>Deepesh</td>
                                                <td class="text-center ">
                                                    <input class="form-check-input" type="checkbox" id="checkAtt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Deepesh</td>
                                                <td class="text-center ">
                                                    <input class="form-check-input" type="checkbox" id="checkAtt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Deepesh</td>
                                                <td class="text-center ">
                                                    <input class="form-check-input" type="checkbox" id="checkAtt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Deepesh</td>
                                                <td class="text-center ">
                                                    <input class="form-check-input" type="checkbox" id="checkAtt">
                                                </td>
                                            </tr> --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <input type="hidden" id="post_class_id" name="post_class_id">
                            <input type="hidden" id="post_subject_id" name="post_subject_id">
                            <input type="hidden" id="post_topic_id" name="post_topic_id">
                            <input type="hidden" id="post_batch_id" name="post_batch_id">
                            <input type="hidden" id="post_start_time" name="post_start_time">



                            <div style="float:right">
                            <button type="button" class="btn btn-sm btn-danger "
                                    data-dismiss="modal" onclick="closeModal();">
                                    Close</button>
                                <button type="submit" class="btn btn-sm btn-success  "
                                    data-dismiss="modal">
                                    Submit</button>


                            </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
        function openAttModal(batch_id,class_id,subject_id,topic_id,start_time) {
            $.ajax({
                    url: "{{ url('tutor/batches/attendance') }}/" + batch_id,
                    type: "GET",
                    data: {
                        batch_id: batch_id,
                        class_id: class_id,
                        subject_id: subject_id,
                        topic_id: topic_id,
                        start_time: start_time,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#studentlist').empty();

                        $.each(result.students, function(index, student) {
                            var isChecked = student.status === 1 ? 'checked' : '';

                            var row = `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${student.name}</td>
                                            <td class="text-center">
                                                <input type="hidden" name="attendance[${index}][student_name]" value="${student.name}">
                                                <input type="hidden" name="attendance[${index}][student_id]" value="${student.student_id}">
                                                <input type="checkbox" name="attendance[${index}][status]" ${isChecked}>
                                            </td>
                                        </tr>
                                    `;

                            $('#studentlist').append(row);
                            $('#post_subject_id').val(result.subject_id);
                            $('#post_class_id').val(result.class_id);
                            $('#post_topic_id').val(result.topic_id);
                            $('#post_batch_id').val(result.batch_id);
                            $('#post_start_time').val(result.start_time);
                        });

                    }

            });
            $("#studentlistmodal").modal('show');
        }

        function closeModal() {
            $("#studentlistmodal").modal('hidden');
        }
        </script>





        @endsection

