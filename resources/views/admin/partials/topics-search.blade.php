@foreach ($topics as $topic)

<tr>

    <td>{{$loop->iteration}}</td>
    <td>{{$topic->class_name}}</td>
    <td>{{$topic->subject_name}}</td>
    <td>{{$topic->topic_name}}</td>
    <td>{{$topic->topic_description}}</td>
    <td>
        <div class="form-check form-switch">
            @if ($topic->topic_status == 1)
            <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
            @else
            <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
            @endif
            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{$topic->topic_id}}','{{$topic->topic_status}}');" class="checkbox" @if ($topic->topic_status == 1) then checked @endif>
        </div>
    </td>


    <td><button type="button" class="btn btn-sm btn-primary" onclick="edit('{{$topic->topic_id}}','{{$topic->class_id}}','{{$topic->subject_id}}','{{$topic->topic_name}}','{{$topic->topic_description}}');">Edit Record</button></td>

</tr>
@endforeach
