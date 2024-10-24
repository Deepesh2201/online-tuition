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
                    <!-- <h3 class="text-center"></h3> -->
                    <div id="listHeader" class="mb-3">
                        <h3>List Of Classes</h3>
                        <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span
                                class="fa fa-plus"></span> New
                            Subject</button>
                    </div>

                    <table class="table table-bordered table-hover mt-3">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>S.No.</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <thead name="classbody">
                            @foreach ($subjects as $subject)
                                
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$subject->class_name}}</td>
                                <td>{{$subject->subject_name}}</td>
                                <td>
                                    <img src="{{ asset('/images/subjects/'.$subject->subject_image) }}" width= '50' height='50' class="img img-responsive" />
                            
                            
                                </td>
                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox" onclick="changestatus('{{$subject->subject_id}}','{{$subject->subject_status}}');" class="checkbox" @if ($subject->subject_status == 1) then checked
                                                    
                                                @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td><button type="button" class="btn btn-sm btn-primary" onclick="edit('{{$subject->subject_id}}','{{$subject->class_id}}','{{$subject->subject_name}}');">Edit Record</button></td>

                            </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
                <!-- content-wrapper ends -->
                <div class="d-flex justify-content-center">
                    {!! $subjects->links() !!}
                </div>

                
    <!-- modal -->
    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h3 class="text-center mb-3"><u>Add New Subject</u></h3>
                    <form action="{{route('admin.subject.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" row">
                            <input type="hidden" id="id" name="id" class="form-group">
                            <div class="form-group col-md-6">
                                <label for="">Class<i style="color:red">*</i></label>
                                <select type="text" class="form-control" id="classname" name="classname" required>
                                    <option value="">--Select--</option>
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Subject</label>
                                <input type="text" class="form-control" placeholder="Enter Subject Name" id="subject"
                                    name="subject" required>
                            </div>
                            <div class=" col-md-6 col-12 col-sm-6 form-group">
                                <label class="ml-2">Upload Image<i style="color:red">*</i></label>
                                <input type="file" class="form-control" id="uploadimage" value="" name="uploadimage" required>
                            </div>
                            <span class="text-danger">
                                @error('uploadimage')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="img-holder"></div>
                        </div>
                        <button type="submit" id="" class="btn btn-sm btn-success float-right"> Submit</button>
                        <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"> Close</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <script>
        function openmodal(){
    
            $('#id').val('');
            $('#classname').val('');
            $('#subject').val('');
            $('#addSubjectModal').modal('show');
        }
        
        function edit(id,classname,subjectname){
            $('#id').val(id);
            $('#classname').val(classname);
            $('#subject').val(subjectname)
            $('#addSubjectModal').modal('show');
        }
        function changestatus(id,status){
            
            var url = "{{URL('admin/subject/status')}}";
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
                    window.location = "/admin/subject";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        
            //Reset input file
            $('input[type="file"][name="uploadimage"]').val('');
            //Image preview
            $('input[type="file"][name="uploadimage"]').on('change', function(){
               
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });
        </script>
    
    
@endsection