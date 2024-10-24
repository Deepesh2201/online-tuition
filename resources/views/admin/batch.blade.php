@extends('admin.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- partial -->
    <div class="main-content">
        <style>
            .listHeader {
                display: flex;
                justify-content: space-between;
            }
            .batchBadge button{
                background-color: #405189;
            }

        </style>
        <div class="page-content " >
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div id="" class="mb-3 listHeader page-title-box">

                    <h3>List Of Batches</h3>
                    <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> New
                        Batch</button>
                </div>


                <form id="payment-search">
                    <div class="row py-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select  class="form-control" name="class_name" onchange="fetchSubjects1();" id="classname1">
                                    <option value="">--Select Class--</option>
                                    @foreach ($classes as $class)
                                        <option  value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select  class="form-control" name="subject_name" id="subject1">
                                    <option value="">--Select Subject--</option>
                                    @foreach ($subjects as $subject)
                                        <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="tutor_name" class="form-control">
                                    <option value="">-- Select Tutor--</option>
                                    @foreach ($tutors as $tutor)
                                        <option  value="{{$tutor->id }}">{{ $tutor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <button  class="btn btn-primary"> <span
                                class="fa fa-search"></span> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">

                    <tbody name="classbody">
                        @foreach ($batches as $batch)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $batch->class_name }}</td>
                                <td>{{ $batch->subject_name }}</td>
                                <td><a
                                        href="{{ url('admin/tutorprofile') . '/' . $batch->tutor_id }}">{{ $batch->tutor_name }}</a>
                                </td>
                                <td>{{ $batch->batch_name }}</td>
                                <td>{{ $batch->batch_description }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        @if ($batch->batch_status == 1)
                                        <i class="ri-checkbox-circle-line align-middle text-success"></i> Active 
                                        @else
                                        <i class="ri-close-circle-line align-middle text-danger"></i> Inactive 
                                        @endif
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{ $batch->batch_id }}','{{ $batch->batch_status }}');"
                                        class="checkbox" @if ($batch->batch_status == 1) then checked @endif>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-center batchBadge">
                                        <button type="button" class="badge btn-sm btn-primary"
                                            onclick="edit('{{ $batch->batch_id }}','{{ $batch->class_id }}','{{ $batch->subject_id }}','{{ $batch->tutor_id }}','{{ $batch->batch_name }}','{{ $batch->batch_description }}');">Edit
                                            Batch Details</button>
                                        <br><br>
                                        <button type="button" class="badge btn-sm btn-primary"
                                            onclick="addstudentsmodal('{{ $batch->class_id }}','{{ $batch->batch_id }}','{{ $batch->tutor_id }}');">Add/View
                                            Students</button>
                                    </div>
                                </td>

                            </tr>
                      
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- content-wrapper ends -->
                <div class="d-flex justify-content-center" id="paginationContainer">
                    {!! $batches->links() !!}
                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3 class="text-center mb-3"><u>Add New Batch</u></h3>
                        <form action="{{ route('admin.batch.create') }}" method="POST">
                            @csrf
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="">Class<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="classname" name="classname"
                                        onchange="fetchSubjects();" required>
                                        <option value="">--Select--</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="id" name="id" class="form-group">
                                    <label for="">Subject<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="subject" name="subject" required>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="id" name="id" class="form-group">
                                    <label for="">Tutor<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="tutor" name="tutor" required>
                                        <option value="">--Select--</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Topic<i style="color:red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Enter Batch Name"
                                        name="batchname" id="batchname" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" placeholder="Enter Description" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="" class="btn btn-sm btn-success float-right">Submit</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal">Close</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- Modal add students --}}
        <div class="modal fade" id="addStudentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3 class="text-center mb-3"><u>Add Student</u></h3>
                        <form action="{{ route('admin.batchmapping.create') }}" method="POST">
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
                            <input type="hidden" id="batchid" name="batchid">
                            <input type="hidden" id="tutorid" name="tutorid">
                            <select class="form-control select-checkbox-fa" style="height: 300px" id="studentsdata"
                                name="studentsdata[]" multiple>

                            </select><br>

                            <button type="submit" id="" class="btn btn-sm btn-primary float-right"><span
                                    class="fa fa-plus"></span>
                                Add</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal"><span class="fa fa-times"></span> Close</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function openmodal() {

                $('#id').val('');
                $('#classname').val('');
                $('#subject').val('');
                $('#tutor').val('');
                $('#batchname').val('');
                $('#description').val('');
                $('#addTopicModal').modal('show');
            }

            function edit(id, classname, subjectname, tutorid, batchname, description) {
                $('#id').val(id);
                $('#classname').val(classname);
                $('#subject').val(subjectname)
                $('#tutor').val(tutorid)
                $('#batchname').val(batchname)
                $('#description').val(description)
                $('#addTopicModal').modal('show');
            }

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

                            toastr.success('status changed')
                            window.location = "{{URL('admin/batch')}}" ;

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
                        $('#subject').html('<option value="">-- Select Type --</option>');
                        $.each(result.subjects, function(key, value) {
                            $("#subject").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

            };
            var data = "";

            function addstudentsmodal(classId, batchid, tutorid) {

                $('#batchid').val(batchid);
                $('#tutorid').val(tutorid);
                $('#addStudentsModal').modal('show');


                $.ajax({
                    url: "{{ url('studentsbyclass') }}",
                    type: "POST",
                    data: {
                        class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        // data = result.students;
                        // populateTable();
                        $('#studentsdata').html('');
                        $.each(result.students, function(key, value) {
                            $("#studentsdata").append('<option value="' + value
                                .id + '">' + value.name + ' (' + value.email + ')</option>');
                        });
                    }
                });
                $.ajax({
                    url: "{{ url('admin/viewbatchdata') }}/" + batchid,
                    type: "GET",
                    data: {
                        // class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(JSON.parse(result.subjects.student_data))
                        $("#studentsdata").val(JSON.parse(result.subjects.student_data));
                    }

                });
            };

            function populateTable() {
                var table = "";
                var p = 0;
                for (var i in data) {
                    p++;
                    table += "<tr>";
                    table += "<td hidden>" +
                        data[i].id + "</td>" +
                        "<td>" + p + "</td>" +
                        "<td>" + data[i].name + "</td>" +
                        "<td><input id='sel" + data[i].id + "' type='checkbox'><label for='sel" + data[i].id +
                        "'>&nbsp; Select</label></td>";
                    table += "</tr>";
                }

                document.getElementById("studentlisttbl").innerHTML = table;

            }
            function fetchSubjects1() {

                var classId = $('#classname1 option:selected').val();
                $("#subject").html('');
                $.ajax({
                    url: "{{url('fetchsubjects')}}",
                    type: "POST",
                    data: {
                        class_id: classId,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#subject1').html('<option value="">-- Select Subject --</option>');
                        $.each(result.subjects, function (key, value) {
                            $("#subject1").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }
             });
            };
        </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTableAndPagination(data) {
            // $('#tableContainer').html(data.table);
             $('.users-table tbody').html(data.table);
             $('#paginationContainer').html(data.pagination);
        }

        $(document).ready(function () {
            $('#payment-search').submit(function (e) {
                // alert('')
                e.preventDefault();
                const page = 1;
                const ajaxUrl = '{{ route("admin.batches-search") }}'
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

            const page = $(this).attr('href').split('page=')[1];

            $.ajax({
                type: 'post',
                url: '{{ route("admin.batches-search") }}', // Define your route here
                data: {
                    tutor_name: $('select[name="tutor_name"]').val(),
                    class_name: $('select[name="class_name"]').val(),
                    subject_name: $('select[name="subject_name"]').val(),
                    page: page
                },
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
