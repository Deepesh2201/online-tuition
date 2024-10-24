@extends('tutor.layouts.main')
@section('main-section')

 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">

        <div id="listHeader">
            <h3 class="mb-3">Student's Assignments</h3>

        </div>

        <table class="table table-bordered">
            <thead class="bg-dark text-white">
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


                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><div class="text-center"><b> {{$data->assignment_name}}</b><br><br><a class="badge badge-primary" href ="{{$data->assignment_link}}" target="_blank">View</a></td>
                        <td>{{$data->student_name}}</td>
                        <td>{{$data->submitted_on}}</td>
                        <td><a href="{{$data->submission_link}}"><button class="badge badge-primary"><span class="fa fa-search"></span> View Submission</button></td>
                        
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