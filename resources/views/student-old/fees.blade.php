@extends('student.layouts.main')
@section('main-section')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div id="listHeader">
                        <h3 class="mb-3">Payment Details</h3>

                    </div>

                    <table class="table table-bordered ">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Trans.No.</th>
                                <th scope="col">Class</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Tutor</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalAmount = 0; // Initialize the total amount variable
                            @endphp
                            
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="#" class="" onclick="showinvoice('{{$payment->paymentdetails_id}}')"> {{$payment->transaction_id}}</a></td>
                                    <td>{{$payment->class}}</td>
                                    <td>{{$payment->subject}}</td>
                                    <td>{{$payment->tutor}}</td>
                                    <td>£{{$payment->amount}}</td>
                                </tr>
                                
                                @php
                                $totalAmount += $payment->amount; // Add the current payment amount to the total
                                @endphp
                            @endforeach
                            
                            <!-- Display the total amount after the loop -->
                            <tr>
                                <td colspan="4"></td>
                                <td><strong>Total:</strong></td>
                                <td><strong>£{{$totalAmount}}</strong></td>
                            </tr>
                            
                        </tbody>
                    </table>




                </div>
                <!-- content-wrapper ends -->
                
                @endsection