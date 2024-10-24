@extends('admin.layouts.main')
@section('main-section')
{{-- ---------- --}}

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
                        <h3>Payment History</h3>
                      </div>
                        <h3>Benjamin</h3>
                        <p><b>Mobile:</b> 9898987766</p>
                        <p><b>Email:</b> benjamin@gmail.com</p>
                       
                  
                    <div class="mt-4" id="">
                        <table class="table table-bordered table-hover mt-3">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>S.No.</th>
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
     


       

    
    
    
@endsection
{{-- --------------- --}}
@endsection