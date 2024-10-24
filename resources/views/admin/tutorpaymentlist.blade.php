@extends('admin.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <style>
    .listHeader {
        display: flex;
        justify-content: space-between;
    }

    .btns button {
        float: right;
        margin: 2px;
    }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class=" listHeader mb-3 page-title-box">
                <h3>Tutor Payments </h3>
                <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> Make
                    Payment</button>
            </div>

            <form id="payment-search">
                <div class="row py-3">

                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tutorname" id="tname" placeholder="Tutor Name">
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tutormobile" id="tmob" placeholder="Tutor Mobile">
    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tutoremail" id="email" placeholder="Tutor Email">
    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tansaction_no" id="tranx" placeholder="Transaction No.">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="smob" placeholder="Student Mobile">
    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date" id="smob" placeholder="Student Mobile">
    
                        </div>
                    </div>
    
                    <div class="col-md-3 mt-4">
                        <div class="form-group">
                            <select class="form-control" name="status" id="byststus">
                                <option value="">--Select status --</option>
                                @foreach ($statuses as $status)
                                 <option value="{{$status->id}}">{{$status->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <div class="form-group">
                            <button class="btn btn-primary" style="float:right"> <span class="fa fa-search"></span>
                                Search</button>
                        </div>
                    </div>
                </div>

            </form>

            
            <hr>

            <div class="mt-4 table-responsive">
            <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">

                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Tutor Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Total Amount</th>
                            <th>Net Amount Paid</th>
                            <th>Admin Commission(%)</th>
                            <th>Admin Commission(&pound;)</th>
                            <th>Account No.</th>
                            <th>Transaction No.</th>
                            <th>Transaction Date</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>1</td>
                            <td><a href="{{route('admin.tutorpayments')}}">Benjamin</td>
                            <td>12345353453</td>
                            <td>benjamin@gmail.com</td>
                            <td>&pound;1230</td>
                            <td>&pound;1107</td>
                            <td>10%</td>
                            <td>&pound;123</td>
                            <td>1234567890987654</td>
                            <td>TNX0000000000001</td>
                            <td>02 Aug 2023</td>
                            <td class="text-success">Success</td>
                        </tr> --}}
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


                    </tbody>
                </table>
            </div>
            <!-- content-wrapper ends -->

        </div>

    </div>
    <!-- content-wrapper ends -->
    <div class="d-flex justify-content-center" id="paginationContainer">
        {!! $tutorpayouts->links() !!}
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-body">


                <header>
                    <h3 class="text-center mb-4">Add Payment Details</h3>
                </header>

                <form id="submit-tutor-payment">

                    <input type="hidden" id="max_payable" name="max_payable">
                    <div class="row">
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Class</label>
                            <select class="form-control" id="classname" name="class"  onchange="fetchSubjects()">
                                <option value="">--select class--</option>
                                @foreach ($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Subject</label>
                            <select class="form-control" id="subject" name="subject" onchange="fetchTutors()">
                                <option value="">--select subject--</option>
                                @foreach ($subjects as $subject)
                                 <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Tutor</label>
                            <select class="form-control" id="tutor" name="tutor" onchange="fetchTutorsToatalAmount()">

                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Total Amount</label>
                            <input type="text" class="form-control" id="total-amount" readonly name="total_amount"
                            placehodler="Total Amount">
                        </div>
                        
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Admin Commission Percentage</label>
                            <input type="text" class="form-control" id="admin_commission_percentage" readonly name="admin_commission_percentage"
                            placehodler="Total Amount">
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Admin Commission Amount</label>
                            <input type="text" class="form-control" id="admin_commission_amount" readonly name="admin_commission_amount"
                            placehodler="Total Amount">
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Net Amount</label>
                            <input type="text" class="form-control" id="net_amount_payable" readonly name="net_amount_payable"
                            placehodler="Total Amount">
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Already Paid Amount</label>
                            <input type="text" class="form-control" id="already_paid_amount" readonly name="already_paid_amount"
                            placehodler="Total Amount">
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Pending Amount</label>
                            <input type="text" class="form-control" id="pending_amount_payable" readonly name="pending_amount_payable"
                            placehodler="Total Amount">
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label> Amount Payable</label>
                            <input type="number" class="form-control" id="amount_payable" name="amount_payable"
                            placehodler="Total Amount">
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Account No.</label>
                            <input type="text" class="form-control" id="account" name="account"
                            placehodler="Account No.">
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Transaction No.</label>
                            <input type="text" class="form-control" id="transNo" name="transNo"
                                placehodler="Transaction No.">
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>


                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Mode Of Payment</label>
                            <select class="form-control" id="mop" name="payment_mode">
                                <option value="">--Select Payment Mode--</option>
                                @foreach ($PaymentModes as $modes)
                                 <option value="{{$modes->id}}">{{$modes->type  }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Status</label>
                            <select class="form-control" id="" name="status">
                                <option value="">--Select status --</option>
                                @foreach ($statuses as $status)
                                 <option value="{{$status->id}}">{{$status->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Status</label>
                            {{-- <select class="form-control" id="" name=""></select> 
                            <select class="form-control" id="status" name="status">
                                <option value="">--select status--</option>
                                @foreach ($statuses as $status)
                                 <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                    </div>
                    <div class="btns">
                        <button type="submit" id="" class="btn btn-sm btn-success">Submit</button>
                        <button type="button" class="btn btn-sm btn-danger  " data-dismiss="modal"><span
                                class="fa fa-times"></span> Close</button>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>





<script>
function openmodal() {
    $("#openmodal").modal('show');
}
function fetchSubjects() {
            var classId = $('#classname option:selected').val();
            $("#subject").html('');
            $.ajax({
                url: "{{ url('fetchsubjects') }}",
                type: "POST",
                data: {
                    class_id: classId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subject').html('<option value="">-- Select Subject --</option>');
                    $.each(result.subjects, function(key, value) {
                        $("#subject").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });

};
function fetchTutors() {
            var subject = $('#subject option:selected').val();
            $("#tutor").html('');
            $.ajax({
                url: "{{ url('fetchtutors') }}",
                type: "POST",
                data: {
                    subject_id: subject,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#tutor').html('<option value="">-- Select tutor --</option>');
                    $.each(result.tutors, function(key, value) {
                        $("#tutor").append('<option value="' + value
                            .tutor_id + '">' + value.name + '</option>');
                    });

                }
            });

};
function fetchTutorsToatalAmount() {
            var tutor = $('#tutor option:selected').val();
            $.ajax({
                url: "{{ url('admin/fetchtutorsAmount') }}",
                type: "POST",
                data: {
                    tutor_id: tutor,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#total-amount').val(result.totalAmount);
                    $('#admin_commission_percentage').val(result.adminComissionPercentage);
                    $('#admin_commission_amount').val(result.commissionAmount);
                    $('#net_amount_payable').val(result.netPayableAmount);
                    $('#already_paid_amount').val(result.alreadyPaid);
                    $('#pending_amount_payable').val(result.totalPayable);
                    
                }
            });

};
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submit-tutor-payment').submit(function(e) {
            e.preventDefault();
            const ajaxUrl = "{{ route('admin.tutor-payment') }}";
            var formData = $(this).serialize();


            $.ajax({
                type: 'post',
                url: ajaxUrl, // Define your route here
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(data) {
                    toastr.success(data.success);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, errorMessages) {
                            $.each(errorMessages, function (index, errorMessage) {
                                toastr.error(errorMessage);
                            });
                        });
                    }

                }
            });

        });
    });
</script>
<script>
    function updateTableAndPagination(data) {
        // $('#tableContainer').html(data.table);
        $('.users-table tbody').html(data.table);
        $('#paginationContainer').html(data.pagination);
    }

    $(document).ready(function() {
        $('#payment-search').submit(function(e) {
            e.preventDefault();
            const page = 1;
            const ajaxUrl = "{{ route('admin.payouts-search') }}";
            var formData = $(this).serialize();

            formData += `&page=${page}`;

            $.ajax({
                type: 'post',
                url: ajaxUrl, // Define your route here
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(data) {
                    // console.log(data)
                    updateTableAndPagination(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

        });


        $(document).on('click', '#paginationContainer .pagination a', function(e) {
            e.preventDefault();
            var formData = $('#payment-search').serialize();
            const page = $(this).attr('href').split('page=')[1];
            formData += `&page=${page}`;
            $.ajax({
                type: 'post',
                url: '{{ route("admin.payouts-search") }}', // Define your route here
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    updateTableAndPagination(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


@endsection