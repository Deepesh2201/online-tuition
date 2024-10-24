@extends('tutor.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">



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
            <div id="" class="mb-3 listHeader  page-title-box">
                <h3>Purchase History</h3><br>
                <!-- <a class="btn btn-sm btn-primary" href="createtestseries.html"> <span class="fa fa-plus"></span>
                                Add New
                                Test Series</a> -->

            </div>
            <form action="{{route('tutor.paymentsearch')}}" method="POST" class="">
                @csrf
                <div class="form-group mt-">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control">

                        </div>

                        <div class="col-md-3">
                            <label>Transaction Id</label>
                            <input type="text" class="form-control" name="transaction_id">

                        </div>
                        <div class="col-md-3">

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn  btn-primary float-right" type="submit">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <hr>
            <div class="mt-4 table-responsive">
                <table class="table table-hover table-bordered  users-table">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th>Student Name </th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            {{-- <th>Tutor</th> --}}
                            <th>Transaction Date</th>
                            <th>Trasaction Id</th>
                            <th>Amount Paid</th>
                            <th>Mode Of Payment</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->student_name }}</td>
                            <td>{{ $payment->class_name }}</td>
                            <td>{{ $payment->subject_name }}</td>
                            {{-- <td><a href="tutorprofile/{{$payment->tutor_id}}">{{ $payment->tutor_name }}</a></td> --}}
                            <td>{{ $payment->transaction_date ? \Carbon\Carbon::parse($payment->transaction_date)->format('d-m-Y h:i A') : '' }}</td>
                            <td>{{ $payment->transaction_no }}</td>
                            <td>£{{ $payment->transaction_amount }}</td>
                            <td>{{ $payment->payment_mode }}</td>
                            @if ($payment->transaction_status_id == "3")
                            <td><span class="badge bg-success">{{ $payment->transaction_status }}</span></td>

                            @elseif ($payment->transaction_status_id == "5")
                            <td><span class="badge bg-danger">{{ $payment->transaction_status }}</span></td>
                            @else
                            <td><span class="badge bg-primary">{{ $payment->transaction_status }}</span></td>
                            @endif

                            <td>{{ $payment->remarks }}</td>
                            <!-- <td><button class="badge bg-primary"
                            onclick="openmodal('{{ $payment->transaction_id }}','{{ $payment->transaction_no }}','{{ $payment->student_name }}','{{ $payment->transaction_status_id }}','{{ $payment->remarks }}');">Update</button> -->

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>


            <!-- content-wrapper ends -->

            <!-- modal -->
            <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <h3 class="text-center mb-3"><u>Update Payment Status</u></h3>
                            <form action="{{ route('tutor.payments.update') }}" method="POST">
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
                                        <input type="text" class="form-control" id="transactionno" name="transactionno"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Student Name</label>
                                        <input type="text" class="form-control" id="studentname" name="studentname"
                                            disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Payment Status<i style="color:red">*</i></label>
                                        <select type="text" class="form-control" id="paymentstatus" name="paymentstatus"
                                            required>
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
                                        <input type="text" class="form-control" id="transactionremarks"
                                            name="transactionremarks" required>
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
                                <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                    data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <script>
            function openmodal(id, txnno, stdn, ps, txnr) {
                $('#transactionid').val(id);
                $('#transactionno').val(txnno);
                $('#studentname').val(stdn);
                $('#paymentstatus').val(ps);
                $('#transactionremarks').val(txnr);
                $('#popupModal').modal('show')
            }
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            function updateTableAndPagination(data) {
                // $('#tableContainer').html(data.table);
                $('.users-table tbody').html(data.table);
                $('#paginationContainer').html(data.pagination);
            }

            </script>
            @endsection
