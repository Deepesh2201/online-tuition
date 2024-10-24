@extends('student.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <style>
            .card .card-title {
                margin-bottom: 0;
            }

            .cardBtn {
                width: 90%;
                margin-top: 4px;
            }
        </style>
        <div class="content-wrapper">
            <h3 class="text-center mb-5">Your Tutor</h3>
            <div class="row">
                @foreach ($tutorlist as $tutorlist)
                    <div class="col-md-3 mb-3">
                        <div class="card tutorCrad" style="width: 15rem;">
                            <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tutorlist->name }}</h5>
                                <div class="mb-1">
                                    @if ($tutorlist->starrating >= 1)
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                    @if ($tutorlist->starrating >= 2)
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                    @if ($tutorlist->starrating >= 3)
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                    @if ($tutorlist->starrating >= 4)
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                    @if ($tutorlist->starrating >= 5)
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                </div>
                                <p><b>Subject:</b>{{ $tutorlist->subject }}</p>
                                <p><b>Remaining Hrs:</b>{{ $tutorlist->total_topics }}</p>
                                <p><b>Rate:</b> <span>&#163;</span>{{ $tutorlist->rate }}</p>
                                <a href="tutorprofile/{{ $tutorlist->id }}" class="btn btn-sm btn-primary">Profile</a>
                                <button data-toggle="modal" data-target="#openDemoModal" class="btn btn-sm btn-primary"
                                    onclick="openDemoModal('{{ $tutorlist->id }}','{{ $tutorlist->name }}','{{ $tutorlist->subjectid }}','{{ $tutorlist->subject }}')">Classes
                                    </button>
                                {{-- <div class="text-center">
                                    <button class="btn btn-sm btn-success" id="enrollnow" data-target="#openEnrollModal"
                                        data-toggle="modal"
                                        onclick="openEnrollModal('{{ $tutorlist->id }}','{{ $tutorlist->name }}','{{ $tutorlist->subjectid }}','{{ $tutorlist->subject }}','{{ $tutorlist->total_topics }}','{{ $tutorlist->rate }}');">Enroll
                                        Now</button>

                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="openClassModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <style>
                        table tr td,
                        table tr th {
                            padding: 10px !important;
                        }
                    </style>

                    <div class="modal-body">
                        <header>
                            <h3 class="text-center mb-4">Details</h3>
                        </header>
                        <form method="" action="">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody name="classDetalsTable">
                                    <tr>
                                        <th>Student Name</th>
                                        <td>Samar Ahmad</td>
                                    </tr>
                                    <tr>
                                        <th>Tutor Name</th>
                                        <td>Hamza Ali Abbasi</td>
                                    </tr>
                                    <tr>
                                        <th>Class</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Enrollment Date</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Paid Amount</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Classes</th>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th>Available Classes</th>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th>Attended Classes</th>
                                        <td><a href="attendedclassdetails.html"> 10 Classes</a></td>
                                    </tr>
                                </tbody>

                            </table>
                            <div class="row float-right mt-2">
                                <div class=" col-12 col-md-12 col-sm-12">
                                    <button class="btn btn-primary">View Class Details</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->
    @endsection
