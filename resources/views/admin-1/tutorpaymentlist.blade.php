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
                        <h3>Tutor Payments </h3>
                        <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span
                                class="fa fa-plus"></span> Make Payment</button>
                    </div>
                    <div class="mt-4" id="">
                        <table class="table table-bordered table-hover mt-3 table-responsive">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Tutor Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Account</th>
                                    <th>Transaction No.</th>
                                    <th>Transaction Date</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <td>1</td>
                                    <td><a href="{{route('admin.tutorpayments')}}">Benjamin</td>
                                    <td>12345353453</td>
                                    <td>benjamin@gmail.com</td>
                                    <td>$1230</td>
                                    <td>1234567890987654</td>
                                    <td>TNX0000000000001</td>
                                    <td>02 Aug 2023</td>
                                    <td class="text-success">Success</td>
                               </tr>
                                

                            </tbody>

                           
                       
                    </table>
                </div>
                <!-- content-wrapper ends -->
                <div class="d-flex justify-content-center">
                   
                </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
            </div>
                
    <!-- modal -->
      <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Add Payment Details</h3>
                        </header>

                        <form action="" method="">

                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class</label>
                                    <select class="form-control" id="class" name="class"></select>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Subject</label>
                                    <select class="form-control" id="sub" name="sub"></select>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Tutor</label>
                                    <select class="form-control" id="tutor" name="totor"></select>
                                </div>
                                 <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Account</label>
                                    <select class="form-control" id="account" name="account"></select>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Total Payable Amount</label>
                                    <input type="text" class="form-control" id="totalpayableamt" name="totalpayableamt">
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" id="amt" name="amt">
                                </div>
                            </div>


                            <button type="button" id="" class="btn btn-sm btn-primary float-right">Next</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal"><span class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
  


       

    <script>
       function openmodal(){
         $("#openmodal").modal('show');
       }
    </script>
    
    
    
@endsection