@extends('admin.layouts.main')
@section('main-section')
<style>
.selectAns {
    border: 1px solid lightgrey;
    padding-top: 10px;
    padding-bottom: 10px;
}

input[type='radio'] {
    accent-color: green;
}

.ck-powered-by {
    display: none;
}

.ck-balloon-panel,
.ck-powered-by-balloon,
.ck-balloon-panel_position_border-side_right {
    border: none !important;
}
</style>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>  




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
            <!-- <h3 class="text-center"></h3> -->
            <div id="" class="mb-3 listHeader page-title-box">
                <h3>{{$label ?? 'Add New Question '}} </h3>
                <a href="{{ route('admin.questionbank') }}" class="btn btn-primary">Back To List</a>
            </div>

            <form action="{{ route('admin.questionbank.subjective.store') }}" method="POST">
                @csrf
                <div class=" row">
                    <input type="hidden" id="id" name="id" value="{{$qdata->id ?? ''}}" class="form-group">

                    <div class="col-md-4">
                        <label for="">Class<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="classname" name="classname"
                            onchange="fetchSubjects();" required>
                            <option value="">--Select--</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}" @if ($qdata->class_id ?? '')
                                @if($class->id == $qdata->class_id)
                                selected
                                @endif
                                @endif>{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('classname')
                            {{ 'Please select class' }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="">Subject<i style="color:red">*</i></label>
                        <select type="text" class="form-control" id="subject" name="subject"
                            required>
                            @if ($qdata ?? '')
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}" @if ($qdata->subject_id ?? '')
                                @if($subject->id == $qdata->subject_id)
                                selected
                                @endif
                                @endif>{{$subject->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <span class="text-danger">
                            @error('subject')
                            {{ 'Please select subject' }}
                            @enderror
                        </span>

                    </div>
                    <div class="col-md-4">
                        <label for="">Topic<i style="color:red">*</i></label>
                        <input type="text" class="form-control" id="topic" name="topic" required value="{{$qdata->topic_name ?? ''}}">
                        <span class="text-danger">
                            @error('topic')
                            {{ 'Please select topic' }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-12 mt-5">
                        <label for="">Question<i style="color:red">*</i></label>
                        <!-- <textarea type="text" class="form-control" rows="5" id="question" name="question">
                            {{$qdata->question ?? ''}}
                        </textarea> -->

                        <textarea name="editor1">{{$qdata->question ?? ''}}</textarea><br/>
                        <span class="text-danger">
                            @error('editor1')
                            {{ 'Please enter question' }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-12 mt-4">
                        <label for="">Remarks</label>
                        <textarea type="text" class="form-control" id="remarks" name="remarks">
                            {{$qdata->remarks ?? ''}}
                        </textarea>

                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div style="display:flex; justify-content: end;">
                            <button type="submit" id="" class="btn btn-success btn-sm">Save Question</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- content-wrapper ends -->

        <script>
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
                        window.location = "/admin/batch";
                    } else {
                        alert("Something went wrong. Please try again later");
                    }

                }
            });

        }

        function fetchSubjects() {

            var classId = $('#classname option:selected').val();
            $("#subject").html('');
            $("#topic").html('');
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

        function fetchTopics() {

            var subjectId = $('#subject option:selected').val();
            $("#topic").html('');
            $.ajax({
                url: "{{ url('fetchtopics') }}",
                type: "POST",
                data: {
                    subject_id: subjectId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#topic').html('<option value="">-- Select Type --</option>');
                    $.each(result.topics, function(key, value) {
                        $("#topic").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }

            });

        };

        ClassicEditor
            .create(document.querySelector('#question'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        </script>

<script>  
    CKEDITOR.replace('editor1');  
    CKEDITOR.replace('editor2');  
  
    function getData() {  
        //Get data written in first Editor   
        var editor_data = CKEDITOR.instances['editor1'].getData();  
        //Set data in Second Editor which is written in first Editor  
        CKEDITOR.instances['editor2'].setData(editor_data);  
    }  
</script>  
        @endsection