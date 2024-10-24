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
            <!-- <h3 class="text-center"></h3> -->
            <div id="listHeader" class="mb-3">
                <h3>Payment History</h3>
                <!-- <a class="btn btn-sm btn-primary" href="createtestseries.html"> <span class="fa fa-plus"></span>
                                Add New
                                Test Series</a> -->
            </div>

            <table class="table table-hover table-bordered table-responsive ">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">S.No</th>
                        <th>Student Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th>Tutor</th>
                        <th>Transaction Date</th>
                        <th>Trasaction Id</th>
                        <th>Amount Paid</th>
                        <th>Mode Of Payment</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}
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
                                onclick="openmodal('{{ $payment->transaction_id }}','{{ $payment->transaction_no }}','{{ $payment->student_name }}','{{ $payment->transaction_status_id }}','{{ $payment->remarks }}');">Update</button>
                            
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $payments->links() !!}
            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3 class="text-center mb-3"><u>Update Payment Status</u></h3>
                        <form action="{{ route('admin.payments.update') }}" method="POST">
                            @csrf
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="">Transaction No.</label>
                                    <input type="hidden" class="" id="transactionid" name="transactionid">
                                    <span class="text-danger">
                                        @error('transactionid')
                                            {{ 'Transaction Id is required' }}
                                        @enderror
                                    </span>
                                    <input type="text" class="form-control" id="transactionno" name="transactionno" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Student Name</label>
                                    <input type="text" class="form-control" id="studentname" name="studentname" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Payment Status<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="paymentstatus" name="paymentstatus" required>
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('paymentstatus')
                                            {{ 'Status is required'}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Remarks<i style="color:red">*</i></label>
                                    <input type="text" class="form-control" id="transactionremarks" name="transactionremarks" required>
                                    <span class="text-danger">
                                        @error('transactionremarks')
                                            {{ 'Remarks is required' }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <button type="submit" id="" class="btn btn-sm btn-primary float-right"><span
                                class="fa fa-check"></span>
                                Update</button>
                                <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                    class="fa fa-times"></span> Close</button>
                                </form>

                    </div>

                </div>
            </div>
        </div>
        <script>
            function openmodal(id,txnno,stdn,ps,txnr){
                $('#transactionid').val(id);
                $('#transactionno').val(txnno);
                $('#studentname').val(stdn);
                $('#paymentstatus').val(ps);
                $('#transactionremarks').val(txnr);
                $('#popupModal').modal('show')
            }
            </script>
    @endsection
