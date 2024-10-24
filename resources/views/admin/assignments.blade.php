@extends('admin.layouts.main')
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

        <div id="listHeader">
            <h3 class="mb-3">Student's Assignments</h3>

        </div>

        <table class="table table-hover table-striped align-middlemb-0 table-responsive">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Assignment</th>
                    {{-- <th scope="col">View Assignment</th> --}}
                    {{-- <th scope="col">Assigned On</th> --}}
                    {{-- <th scope="col">Assignment End Date</th> --}}
                    {{-- <th scope="col">Assigned By</th> --}}
                    <th scope="col">Submitted By Student</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">View Submission</th>
                    {{-- <th>Action</th> --}}


                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-nowrap"><div class="text-center"><b> {{$data->assignment_name}}</b>&nbsp;<a class="badge bg-primary" href ="{{$data->assignment_link}}" target="_blank">View</a></td>
                        <td><a href="{{url('admin/studentprofile').'/'.$data->student_id}}" target="_blank">{{$data->student_name}}</a></td>
                        <td>{{$data->submitted_on}}</td>
                        <!-- <td><a href="{{url('admin/studentprofile').'/'.$data->student_id}}" target="_blank">{{$data->student_name}}</a></td> -->
                        <td><button class="badge bg-primary">View</button></td>
                        {{-- <td>
                            <div class="toggle-button-cover">
                                <div class="button-cover">
                                    <div class="button r" id="button-3">
                                        <input type="checkbox" class="checkbox" />
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                        </td> --}}
                    </tr>
                @endforeach
               
            </tbody>



        </table>




    </div>
    

<!-- login modal -->

<div class="modal fade" id="popUpVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="text-center mt-3">
        <h5 class="modal-title" id="exampleModalLabel"> Sample Video</h5>
    </div>
    <div class="modal-body">
        <iframe width="100%" height="300px" src="https://www.youtube.com/embed/n5FNuytDFFE"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>


    </div>
    <!-- <div class="modal-body">
                <p>Don't have an acocunt? <a onclick="registerModalShow();">Register</a></p>
            </div> -->
</div>
</div>
</div>

<div class="modal fade" id="studyMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="text-center mt-3">
        <h5 class="modal-title" id="exampleModalLabel">Study Content</h5>
    </div>
    <div class="modal-body">
        <iframe width="100%" height="500px"
            src="assets/studyMaterial/10_maths_key_notes_ch_01_real_numbers.pdf"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>


    </div>
    <!-- <div class="modal-body">
                    <p>Don't have an acocunt? <a onclick="registerModalShow();">Register</a></p>
                </div> -->
</div>
</div>
</div>



@endsection