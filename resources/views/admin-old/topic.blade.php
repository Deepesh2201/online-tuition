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
                    <div id="listHeader" class="mb-3">
                        <h3>List Of Topics</h3>
                        <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span
                                class="fa fa-plus"></span> New
                            Topic</button>
                    </div>
                    <div class="mt-4" id="">
                        <table class="table table-bordered table-hover mt-3 table-responsive">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Topic</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                        <thead name="classbody">
                            @foreach ($topics as $topic)
                                
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$topic->class_name}}</td>
                                <td>{{$topic->subject_name}}</td>
                                <td>{{$topic->topic_name}}</td>
                                <td>{{$topic->topic_description}}</td>
                                
                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox" onclick="changestatus('{{$topic->topic_id}}','{{$topic->topic_status}}');" class="checkbox" @if ($topic->topic_status == 1) then checked
                                                    
                                                @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td><button type="button" class="btn btn-sm btn-primary" onclick="edit('{{$topic->topic_id}}','{{$topic->class_id}}','{{$topic->subject_id}}','{{$topic->topic_name}}','{{$topic->topic_description}}');">Edit Record</button></td>

                            </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
                <!-- content-wrapper ends -->
                <div class="d-flex justify-content-center">
                    {!! $topics->links() !!}
                </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                
    <!-- modal -->
    <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h3 class="text-center mb-3"><u>Add New Topic</u></h3>
                    <form action="{{route('admin.topic.create')}}" method="POST">
                        @csrf
                        <div class=" row">
                            <div class="form-group col-md-6">
                                <label for="">Class<i style="color:red">*</i></label>
                                <select type="text" class="form-control" id="classname" name="classname" onchange="fetchSubjects();" required>
                                   <option value="">--Select--</option>
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id" name="id" class="form-group">
                                <label for="">Subject<i style="color:red">*</i></label>
                                <select type="text" class="form-control" id="subject" name="subject" required>

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Topic<i style="color:red">*</i></label>
                                <input type="text" class="form-control" placeholder="Enter Topic" name="topic" id="topic" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Description<i style="color:red">*</i></label>
                                <textarea type="text" class="form-control" placeholder="Enter Description" name="description" id="description" required></textarea>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-sm btn-success float-right">Submit</button>
                        <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal">Close</button>
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
            $('#topic').val('');
            $('#description').val('');
            $('#addTopicModal').modal('show');
        }
        
        function edit(id,classname,subjectname,topicname,description){
            $('#id').val(id);
            $('#classname').val(classname);
            $('#subject').val(subjectname)
            $('#topic').val(topicname)
            $('#description').val(description)
            $('#addTopicModal').modal('show');
        }
        function changestatus(id,status){
            
            var url = "{{URL('admin/topic/status')}}";
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
                    window.location = "/admin/topic";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        
        function fetchSubjects() {
        
        var classId = $('#classname option:selected').val();
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
                $('#subject').html('<option value="">-- Select Type --</option>');
                $.each(result.subjects, function (key, value) {
                    $("#subject").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                
            }
        });
        };
       
        </script>
    
    
@endsection