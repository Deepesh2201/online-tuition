@extends('parent.layouts.main')
@section('main-section')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> --}}
                                        {{-- <li class="breadcrumb-item active">Analytics</li> --}}
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-5">
                            <div class="d-flex flex-column h-100">
                                <div class="row h-100">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="alert alert-success border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                                    {{-- <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i> --}}
                                                    <div class="flex-grow-1 text-truncate">
                                                        Welcome To Dashboard {{session('usertype')}}

                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <a  class="text-reset text-decoration-underline"><b>{{session('userid')->name}}!</b></a>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end">
                                                    <div class="col-sm-12">
                                                        <div class="p-3">
                                                            <p class="fs-16 lh-base">"Education is the key to unlocking a world of possibilities, and with this online tuition app, we're not just gaining knowledge; we're gaining the future. Welcome to a journey of learning, where every lesson brings us closer to our dreams. Together, let's explore, discover, and excel. Here's to the start of an exciting educational adventure!"</p>

                                                            <div class="mt-3">
                                                                {{-- <a href="pages-pricing.html" class="btn btn-success">Upgrade Account!</a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-4">
                                                        <div class="px-3">
                                                            <img src="assets/images/user-illustarator-2.png" class="img-fluid" alt="">
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Subjects Enrolled</p>
                                                       <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{count($subjects_enrolled) ?? '0'}}">{{count($subjects_enrolled) ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="users" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Attended Classes</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $atendedclasses ?? '0'}}">{{ $atendedclasses ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="activity" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Total Purchased Classes</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$classes_purchased ?? '0'}}">{{$classes_purchased ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div></div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="clock" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Non-Attended Classes</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$non_atendedclasses ?? '0'}}">{{$non_atendedclasses ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div></div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="external-link" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-7">
                            <div class="row h-100">
                                <div class="col-xxl-5">
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Upcoming Classes</h4>

                                        </div><!-- end card header -->

                                        {{-- <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">25</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">20</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">02:00pm - 03:45pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Adding a new event with attachments</a>
                                                        </div>
                                                   </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">17</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">04:30pm - 07:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Create new project Bundling Product</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">12</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">10:30am - 01:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Weekly closed sales won checking with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link">←</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">→</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                @foreach ($upcomingClasses as $class)
                                                    <li class="list-group-item ps-0">
                                                        <div class="row align-items-center g-3">
                                                            <div class="col-auto">
                                                                <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                    <div class="text-center">
                                                                        <h5 class="mb-0">{{ $class->start_time->format('d') }}</h5>
                                                                        <div class="text-muted">{{ $class->start_time->format('M') }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5 class="text-muted mt-0 mb-1 fs-13">{{ $class->start_time->format('h:iA') }} - {{ $class->start_time->addMinutes($class->duration)->format('h:iA') }}</h5>
                                                                <a href="#" class="text-reset fs-14 mb-0">{{ $class->topic_name }}</a>
                                                            </div>
                                                        </div><!-- end row -->
                                                    </li><!-- end -->
                                                @endforeach
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    {{-- <div class="text-muted">Showing <span class="fw-semibold">{{ count($upcomingClasses) }}</span> of <span class="fw-semibold">{{ $totalClassesCount }}</span> Results</div> --}}
                                                </div>
                                                <div class="col-sm-auto">
                                                    <!-- Pagination can be added here if needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xxl-5">
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Upcoming Tests/Quizes</h4>

                                        </div><!-- end card header -->

                                        {{-- <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">25</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                                                        </div>

                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">20</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">02:00pm - 03:45pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Adding a new event with attachments</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">17</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">04:30pm - 07:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Create new project Bundling Product</a>
                                                        </div>
                                                   </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">12</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">10:30am - 01:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Weekly closed sales won checking with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link">←</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">→</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- end card body --> --}}

                                        <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                @foreach ($upcomingQuizes as $quiz)
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">{{ $quiz->test_start_date->format('d') }}</h5>
                                                                    <div class="text-muted">{{ $quiz->test_start_date->format('M') }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">
                                                                {{ $quiz->test_start_date->format('Y/m/d h:i:s A') }} - {{ $quiz->test_end_date->format('Y/m/d h:i:s A') }}
                                                            </h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">{{ $quiz->name }}</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                @endforeach
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">
                                                        {{-- Showing <span class="fw-semibold">{{ $upcomingQuizes->count() }}</span> of <span class="fw-semibold">{{ $totalQuizes }}</span> Results --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <!-- Pagination can be added here if needed -->
                                                </div>
                                            </div>
                                        </div><!-- end card -->

                                    </div><!-- end card -->
                                </div>



                            </div> <!-- end row-->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Latest Purchases</h4>

                                </div><!-- end card header -->
                                {{-- <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">25</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">20</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                           </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">17</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">12</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                <li class="page-item disabled">
                                                    <a href="#" class="page-link">←</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">→</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- end card body --> --}}
                                <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        @foreach ($latest_payments as $payment)
                                            <li class="list-group-item ps-0">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                            <div class="text-center">
                                                                <h5 class="mb-0">{{ $payment->payment_date->format('d') }}</h5>
                                                                <div class="text-muted">{{ $payment->payment_date->format('M') }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="text-muted mt-0 mb-1 fs-13">{{ $payment->transaction_id }}</h5>
                                                        <a href="#" class="text-reset fs-14 mb-0"> <a href="#" class="text-reset fs-14 mb-0">Purchased {{ $payment->classes_purchased }} Classes For {{ $payment->name }}</a></a>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </li><!-- end -->
                                        @endforeach
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            {{-- <div class="text-muted">Showing <span class="fw-semibold">{{ $latest_payments->count() }}</span> of <span class="fw-semibold">125</span> Results</div> --}}
                                        </div>
                                        <div class="col-sm-auto">

                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Classes By Subjects</h4>

                                </div>

                                <div class="card-body">

                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-12 mb-3">Total Classes Attended</h6>
                                            <h4 class="mb-0">{{$totalclassesTaken ?? "0"}}</h4>
                                            {{-- <p class="mb-0 mt-2 text-muted"><span class="badge bg-success-subtle text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 15.72 % </span> vs. previous month</p> --}}
                                        </div><!-- end col -->
                                        <div class="col-6">
                                            <div class="text-center">
                                                <img src="assets/images/illustrator-1.png" class="img-fluid" alt="">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    {{-- <div class="mt-3 pt-2">
                                        <div class="progress progress-lg rounded-pill">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 18%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 16%" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 19%" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><!-- end --> --}}

                                    <div class="mt-3 pt-2">
                                        <div class="progress progress-lg rounded-pill">
                                            @php
                                                $colorClasses = ['primary', 'info', 'success', 'warning', 'danger'];
                                                $colorIndex = 0;
                                            @endphp

                                            @foreach ($subjectData as $subject)
                                                <div class="progress-bar bg-{{ $colorClasses[$colorIndex] }}" role="progressbar" style="width: {{ $subject['percentage'] }}%;" aria-valuenow="{{ $subject['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>

                                                {{-- Cycle the color index --}}
                                                @php
                                                    $colorIndex = ($colorIndex + 1) % count($colorClasses);
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- <div class="mt-3 pt-2">
                                        <div class="d-flex mb-2">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-primary me-2"></i>English </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <p class="mb-0">24.58%</p>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex mb-2">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-info me-2"></i>Maths</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <p class="mb-0">17.51%</p>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex mb-2">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-success me-2"></i>Computer </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <p class="mb-0">23.05%</p>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex mb-2">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-warning me-2"></i>Physics </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <p class="mb-0">12.22%</p>
                                            </div>
                                        </div><!-- end -->
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-danger me-2"></i>Chemistry </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <p class="mb-0">17.58%</p>
                                            </div>
                                        </div><!-- end -->
                                    </div><!-- end --> --}}

                                    <div class="mt-3 pt-2">
                                        @php
                                            $colorClasses = ['primary', 'info', 'success', 'warning', 'danger'];
                                            $colorIndex = 0;
                                        @endphp
                                        @foreach ($subjectData as $subject)
                                            <div class="d-flex mb-2">
                                                <div class="flex-grow-1">
                                                    <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-{{ $colorClasses[$colorIndex] }} me-2"></i>{{ $subject['subject_name'] }}</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <p class="mb-0">{{ number_format($subject['percentage'], 2) }}%</p>
                                                </div>
                                            </div><!-- end -->
                                            @php
                                                $colorIndex = ($colorIndex + 1) % count($colorClasses);
                                            @endphp
                                        @endforeach
                                    </div><!-- end -->

                                    <div class="mt-2 text-center">
                                        {{-- <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show All</a> --}}
                                    </div>

                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Tests/Quizes</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">Current Year</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col" style="width: 62;">Test/Quiz</th>
                                                    <th scope="col">Total Marks</th>
                                                    <th scope="col">Obtained</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 1</a>
                                                    </td>
                                                    <td>50</td>
                                                    <td>2</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 2</a>
                                                    </td>
                                                    <td>86</td>
                                                    <td>22</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 3</a>
                                                    </td>
                                                    <td>64</td>
                                                    <td>18</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 4</a>
                                                    </td>
                                                    <td>53</td>
                                                    <td>14</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 5</a>
                                                    </td>
                                                    <td>33</td>
                                                    <td>12</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 6</a>
                                                    </td>
                                                    <td>20</td>
                                                    <td>10</td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);">Test 7</a>
                                                    </td>
                                                    <td>10</td>
                                                    <td>07</td>
                                                </tr><!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end -->
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


@endsection
