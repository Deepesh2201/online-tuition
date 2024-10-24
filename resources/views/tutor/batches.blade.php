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
            </style>

            <div class="page-content">
                <div class="container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <h3 class="text-center">Students</h3>
           <div class="mt-4" id="">

           <div class="table-responsive">
           <table class="table table-hover table-striped align-middlemb-0">
                <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class/Grade</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Student</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


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
