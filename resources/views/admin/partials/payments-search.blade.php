@if($type=="admin" && isset($payments))
    @foreach ($payments as $payment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="studentprofile/{{$payment->student_id}}">{{ $payment->student_name }}</a></td>
            <td>{{ $payment->class_name }}</td>
            <td>{{ $payment->subject_name }}</td>
            <td><a href="tutorprofile/{{$payment->tutor_id}}">{{ $payment->tutor_name }}</a></td>
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
                onclick="openmodal('{{ $payment->transaction_id }}','{{ $payment->transaction_no }}','{{ $payment->student_name }}','{{ $payment->transaction_status_id }}','{{ $payment->remarks }}');">Update</button></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="7"><strong>Grand Total:</strong></td>
        <td>{{ $totalTransactionAmount }}</td>
        <td colspan="5"></td>
    </tr>
@endif
@if($type=="tutor" && isset($payments))
    @foreach ($payments as $payment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="studentprofile/{{$payment->student_id}}">{{ $payment->student_name }}</a></td>
            <td>{{ $payment->class_name }}</td>
            <td>{{ $payment->subject_name }}</td>
            <td><a href="tutorprofile/{{$payment->tutor_id}}">{{ $payment->tutor_name }}</a></td>
            <td>{{ $payment->transaction_date }}</td>
            <td>{{ $payment->transaction_no }}</td>
            <td>{{ $payment->transaction_amount }}</td>
            <td>{{ $payment->payment_mode }}</td>
            @if ($payment->transaction_status_id == "3")
            <td><span  class="badge bg-success">{{ $payment->transaction_status }}</span></td>

            @elseif ($payment->transaction_status_id == "5")
            <td><span  class="badge bg-danger">{{ $payment->transaction_status }}</span></td>
            @else
            <td><span  class="badge bg-primary">{{ $payment->transaction_status }}</span></td>
            @endif

            <td>{{ $payment->remarks }}</td>
            <td><button class="badge bg-primary"
                onclick="openmodal('{{ $payment->transaction_id }}','{{ $payment->transaction_no }}','{{ $payment->student_name }}','{{ $payment->transaction_status_id }}','{{ $payment->remarks }}');">Update</button>

            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="7"><strong>Grand Total:</strong></td>
        <td>{{ $totalTransactionAmount }}</td>
        <td colspan="5"></td>
    </tr>
@endif
@if($type=="tutor" && isset($tutorpayouts))
    @foreach ($tutorpayouts as $payout )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$payout->name}}</td>
            <td>{{$payout->mobile}}</td>
            <td>{{$payout->email}}</td>
            <td>&pound;{{$payout->total_amount}}</td>
            <td>&pound;{{$payout->net_amount_received}}</td>
            <td>{{$payout->admin_commission_percentage}}%</td>
            <td>&pound;{{$payout->admin_commission_amount}}</td>
            <td>{{$payout->account_no}}</td>
            <td>{{$payout->transaction_no}}</td>
            <td>{{ \Carbon\Carbon::parse($payout->transaction_date)->format('d M Y') }}</td>
            <td class="text-success">{{$payout->status_name}}</td>
        </tr>
    @endforeach
@endif
@if($type=="admin" && isset($tutorpayouts))
    @foreach ($tutorpayouts as $payout )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$payout->name}}</td>
            <td>{{$payout->mobile}}</td>
            <td>{{$payout->email}}</td>
            <td>&pound;{{$payout->total_amount}}</td>
            <td>&pound;{{$payout->net_amount_received}}</td>
            <td>{{$payout->admin_commission_percentage}}%</td>
            <td>&pound;{{$payout->admin_commission_amount}}</td>
            <td>{{$payout->account_no}}</td>
            <td>{{$payout->transaction_no}}</td>
            <td>{{ \Carbon\Carbon::parse($payout->transaction_date)->format('d M Y') }}</td>
            <td class="text-success">{{$payout->status_name}}</td>
        </tr>
    @endforeach
@endif

