@extends('admin.layouts.main')
@section('main-section')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome {{session('userid')->name}}</h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                            class="text-primary">0 unread alerts!</span></h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> <span id="today"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="{{url('images/dashboard/educationDashboard.svg')}}" alt="people"
                                        height="290px">
                                    <div class="weather-info" style="padding:8%;">
                                        <div class="d-flex">
                                            <div>
                                                <h2 class="mb-0 font-weight-normal"><i
                                                        class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                            </div>
                                            <div class="ml-2">
                                                <h4 class="location font-weight-normal">USA</h4>
                                                <h6 class="font-weight-normal">California</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">My Subjects</p>
                                            <p class="fs-30 mb-2">1</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Hours Completed</p>
                                            <p class="fs-30 mb-2">0</p>
                                            <!-- <p>20.00% (30 days)</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Assignments Completed </p>
                                            <p class="fs-30 mb-2">0</p>
                                            <p>00.00% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Quizes Completed</p>
                                            <p class="fs-30 mb-2">0</p>
                                            <!-- <p>0.22% (30 days)</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
 @endsection