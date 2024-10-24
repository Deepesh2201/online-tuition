@foreach ($batches as $batch)
    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $batch->class_name }}</td>
        <td>{{ $batch->subject_name }}</td>
        <td><a
                href="{{ url('admin/tutorprofile') . '/' . $batch->tutor_id }}">{{ $batch->tutor_name }}</a>
        </td>
        <td>{{ $batch->batch_name }}</td>
        <td>{{ $batch->batch_description }}</td>
        <td>
            <div class="form-check form-switch">
                @if ($batch->batch_status == 1)
                <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
                @else
                <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
                @endif
                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{ $batch->batch_id }}','{{ $batch->batch_status }}');"
                class="checkbox" @if ($batch->batch_status == 1) then checked @endif>
            </div>
        </td>

        <td>
            <div class="text-center batchBadge">
                <button type="button" class="badge btn-sm btn-primary"
                    onclick="edit('{{ $batch->batch_id }}','{{ $batch->class_id }}','{{ $batch->subject_id }}','{{ $batch->tutor_id }}','{{ $batch->batch_name }}','{{ $batch->batch_description }}');">Edit
                    Batch Details</button>
                <br><br>
                <button type="button" class="badge btn-sm btn-primary"
                    onclick="addstudentsmodal('{{ $batch->class_id }}','{{ $batch->batch_id }}','{{ $batch->tutor_id }}');">Add/View
                    Students</button>
            </div>
        </td>

    </tr>
@endforeach
