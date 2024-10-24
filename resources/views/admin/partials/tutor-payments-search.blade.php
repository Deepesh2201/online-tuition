@foreach ($payments as $payment)
<tr>
    <td>{{ $loop->iteration }}
    <td><a href="tutorprofile/{{$payment->tutor_id}}">{{ $payment->tutor_name }}</a></td>
    <td>{{ $payment->class_name }}</td>
    <td>{{ $payment->subject_name }}</td>
    {{-- <td><a href="tutorprofile/{{$payment->tutor_id}}">{{ $payment->tutor_name }}</a></td> --}}
    <td>{{ $payment->transaction_date }}</td>
    <td>{{ $payment->transaction_no }}</td>
    <td>{{ $payment->transaction_amount }}</td>
    <td>{{ $payment->payment_mode }}</td>
    @if ($payment->transaction_status_id == "3")
    <td><span  class="badge badge-success">{{ $payment->transaction_status }}</span></td>

    @elseif ($payment->transaction_status_id == "5")
    <td><span  class="badge badge-danger">{{ $payment->transaction_status }}</span></td>
    @else
    <td><span  class="badge badge-primary">{{ $payment->transaction_status }}</span></td>
    @endif

    <td>{{ $payment->remarks }}</td>
    <td><button class="badge badge-primary"
        onclick="openmodal('{{ $payment->transaction_id }}','{{ $payment->transaction_no }}','{{ $payment->student_name }}','{{ $payment->transaction_status_id }}','{{ $payment->remarks }}');">Update</button>

</td>
</tr>
@endforeach
<tr>
    <td colspan="6"><strong>Grand Total:</strong></td>
    <td>{{ $totalTransactionAmount }}</td>
    <td colspan="4"></td>
</tr>
