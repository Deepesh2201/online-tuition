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
        <div id="listHeader" class="mb-3">
            <h3>Learning Contents</h3>
            <a class="btn btn-sm btn-primary" href="{{route('admin.addlearningcontents')}}"><span
                    class="fa fa-plus"></span>
                Add Content</span></a>
        </div>
        <div class="mt-4" id="">

            <table class="table table-hover table-bordered table-responsive ">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Class/Grade</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Content</th>
                        <th scope="col">Video</th>
                        <th scope="col">Blog</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($contents as $content)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$content->classname}}</td>
                        <td>{{$content->subjectname}}</td>
                        <td>{{$content->topicname}}</td>
                        <td><div class="text-center">{{$content->content_description}}</div><br>
                            @if ($content->content_link)
                            <div class="text-center"><a href="{{url('uploads/documents/learningcontents')}}/{{$content->content_link}}" target="_blank" class="badge badge-primary mt-2 ">View</a></div>
                                
                            @endif
                        </td>
                        <td><div class="text-center">{{$content->video_description}}</div><br>
                            @if ($content->video_link)
                            
                            <div class="text-center"><a href="{{url('uploads/videos/learningcontents')}}/{{$content->video_link}}" target="_blank" class="badge badge-primary">View</a></div>
                            @endif
                        </td>
                        <td><div class="text-center">{{$content->blog_description}}</div><br>
                            @if ($content->blog_link)
                                
                            <div class="text-center"><a href="{{$content->blog_link}}" target="_blank" class="badge badge-primary">View</a></div>
                            @endif
                        </td>
                        <td>
                            <div class="toggle-button-cover">
                                <div class="button-cover">
                                    <div class="button r" id="button-3">
                                        <input type="checkbox" onclick="changestatus('{{$content->contentid}}','{{$content->contentstatus}}');" class="checkbox" @if ($content->contentstatus == 1) then checked
                                            
                                        @endif>
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a href="learningcontents/{{$content->contentid}}"><button class="badge badge-danger">Modify</button></a></td>
                       </tr>
                   @endforeach
                </tbody>
            </table>



        </div>



    </div>
<script>
    function changestatus(id,status){
            
            var url = "{{URL('admin/learningcontents/status')}}";
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
                    window.location = "/admin/learningcontents";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        </script>
@endsection