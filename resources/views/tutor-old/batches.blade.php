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
            <h3 class="text-center">Batches</h3>
           <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class/Grade</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Batch Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($batches as $batch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $batch->class_name }}</td>
                                <td>{{ $batch->subject_name }}</td>
                                <td>{{ $batch->batch_name }}</td>
                                <td>{{ $batch->batch_description }}</td>
                                <td><button class="btn btn-sm btn-primary"
                                        onclick="openstudentmodal({{ $batch->batch_id }});"><span
                                            class="fa fa-search"></span> View Students</button>
                                    {{-- @if ($classessch)
                                @foreach ($classessch as $classsc)
                                    @if ($classsc->batch_id == $batch->batch_id)
                                        <p>Hello</p>
                                        
                                    @else --}}
                                    <a href="{{route('tutor.liveclass.classlist')}}">
                                    <button class="btn btn-sm btn-primary"><span
                                            class="fa fa-plus-circle"></span> Schedule Class</button></
                                    {{-- <button class="btn btn-sm btn-primary" onclick="openclassmodal('{{$batch->batch_id}}','{{$batch->subject_id}}');"><span class="fa fa-plus-circle"></span> Schedule Class</button> --}}
                                    {{-- @endif --}}
                                    {{-- @endforeach
                            @endif --}}
                                </td>
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

           
        </script>
    @endsection
