@extends('student.layouts.main')
@section('main-section')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h3 class="text-center">Demo List</h3>
                    <div class="mt-4" id="">
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <table class="table table-hover table-bordered table-responsive ">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Tutor</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Current Status</th>
                                    <th scope="col">Prefer Slot-1</th>
                                    <th scope="col">Prefer Slot-2</th>
                                    <th scope="col">Prefer Slot-3</th>
                                    <th scope="col">Confirm Slot</th>
                                    {{-- <th scope="col">Class Link</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($demo as $demo)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$demo->tutor}}</td>
                                    <td>{{$demo->subject}}</td>
                                    <td> 
                                        @if($demo->status == 1)
                                        <span class="badge badge-info">{{$demo->currentstatus}}</span> 
                                        @elseif ($demo->status == 2)
                                        <span class="badge badge-primary">{{$demo->currentstatus}}</span> 
                                        @elseif ($demo->status == 3)
                                        <span class="badge badge-success">{{$demo->currentstatus}}</span> 
                                        @elseif ($demo->status == 4)
                                        <span class="badge badge-success">{{$demo->currentstatus}}</span> 
                                        @elseif ($demo->status == 5)
                                        <span class="badge badge-danger">{{$demo->currentstatus}}</span> 
                                            
                                        @endif
                                    </td>
                                    <td>{{$demo->slot_1}}</td>
                                    <td>{{$demo->slot_2}}</td>
                                    <td>{{$demo->slot_3}}</td>
                                    <td>{{$demo->slot_confirmed}}</td>
                                    {{-- <td><a href="{{$demo->demo_link}}">{{$demo->demo_link}}</a></td> --}}

                                    @if ($demo->status == 1)
                                    <td>
                                        {{-- <a href="demoreschedule"><button class="btn btn-sm mr-1 btn-primary"><i class="fa fa-calendar" aria-hidden="true"></i> Reschedule</button></a> --}}
                                        <a href="democancel/{{$demo->demo_id}}"><button class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button></a></td>
                                    @elseif ($demo->status == 2)
                                    <td>
                                        {{-- <a href="demoreschedule"><button class="btn btn-sm mr-1 btn-primary"><i class="fa fa-calendar" aria-hidden="true"></i> Reschedule</button></a> --}}
                                        <a href="democancel/{{$demo->demo_id}}"><button class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button></a></td>
                                    @elseif ($demo->status == 3)
                                    <td>
                                        {{-- <button class="btn btn-sm mr-1 btn-primary" disabled><i class="fa fa-calendar" aria-hidden="true"></i> Reschedule</button> --}}
                                        <a href="{{$demo->demo_link}}"><button class="badge badge-success"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Join Class</button></a></td>
                                    @else
                                    <td>
                                        {{-- <button class="btn btn-sm mr-1 btn-primary" disabled><i class="fa fa-calendar" aria-hidden="true"></i> Reschedule</button> --}}
                                        <button class="badge badge-secondary" disabled><i class="fa fa-times" aria-hidden="true"></i> Cancelled</button></td>
                                    
                                        @endif
                                        

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        


                    </div>



                </div>
                <!-- content-wrapper ends -->
                @endsection