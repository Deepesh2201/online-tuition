@extends('admin.layouts.main')
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
            <h3 class="text-center">Students List</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Mobile</th>
                            <th scope="col">Class</th>
                            <th scope="col">Current Status</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stdlists as $stdlist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="studentprofile/{{$stdlist->student_id}}">{{ $stdlist->student_name }}</a></td>
                                <td>{{ $stdlist->student_mobile }}</td>
                                
                                <td>{{ $stdlist->class_name }}</td>
                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox" onclick="changestatus('{{$stdlist->student_id}}','{{$stdlist->student_status}}');" class="checkbox" @if ($stdlist->student_status == 1) then checked
                                                    
                                                @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td><button class="badge badge-success"
                                        onclick="openconfirmmodal({{ $stdlist->demo_id }});">Confirm</button>
                                    <button class="badge badge-primary"
                                        onclick="openupdatemodal({{ $stdlist->demo_id }})">Modify</button>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $stdlists->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <script>
function changestatus(id,status){
            
            var url = "{{URL('admin/students/status')}}";
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
                    window.location = "/admin/students";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        </script>
    @endsection
