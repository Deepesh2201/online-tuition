@extends('admin.layouts.main')
@section('main-section')

 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <div id="listHeader">
            <h3 class="mb-3">Student's Assignments</h3>

        </div>

        <table class="table table-bordered table-responsive">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Assignment Name</th>
                    <th scope="col">Class/Grade</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Assigned By</th>
                    <th scope="col">Assigned On</th>
                    <th scope="col">Assignment End Date</th>
                    {{-- <th scope="col">Assignment To</th> --}}
                    <th scope="col">View Submissions</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datalist)
                    
                
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$datalist->assignment_name}}</td>
                    <td>{{$datalist->class_name}}</td>
                    <td>{{$datalist->subject_name}}</td>
                    <td>{{$datalist->topic_name}}</td>
                    <td><a href="{{url('admin/tutorprofile').'/'.$datalist->tutor_id}}">{{$datalist->tutor_name}}</td>
                    <td>{{$datalist->assignment_start_date}}</td>
                    <td>{{$datalist->assignment_end_date}}</td>
                    {{-- <td>{{$datalist->assigned_to}}</td> --}}
                    <td><div class="text-center"> <a href="{{url('admin/assignments/').'/'.$datalist->assignment_id}}" class="badge badge-primary">View</a></div></td>
                    <td>
                        <div class="toggle-button-cover">
                            <div class="button-cover">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" onclick="changestatus('{{$datalist->assignment_id}}','{{$datalist->assignment_status}}');" class="checkbox" @if ($datalist->assignment_status == 1) then checked
                                        
                                    @endif>
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>



        </table>

<!-- content-wrapper ends -->
<div class="d-flex justify-content-center">
    {!! $data->links() !!}
</div>





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

<script>
    function changestatus(id,status){
        
        var url = "{{URL('admin/assignments/status')}}";
        // var id= 
		$.ajax({
			url: url,
			type: "GET",
			cache: false,
			data:{
                _token:'{{ csrf_token() }}',
				id:id,
                status:status
			},
			success: function(dataResult){
                dataResult = JSON.parse(dataResult);
             if(dataResult.statusCode)
             {
                window.location = "/admin/assignments";
             }
             else{
                 alert("Something went wrong. Please try again later");
             }
				
			}
		});
        
    }
    </script>

@endsection