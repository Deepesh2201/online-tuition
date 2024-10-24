@extends('student.layouts.main')
@section('main-section')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div id="listHeader">
                        <h3>Purchased Subjects</h3>
                    </div>

                    <div class="row mt-4">
                        @foreach ($subjectlist as $subjectlist)
                            
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <img src="{{url('images/subjects')}}/{{$subjectlist->image}}" class="card-img-top"
                                alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title">{{$subjectlist->subjectname}}</h5>
                                    <p class="card-text"><b>Tutor: </b>{{$subjectlist->tutorname}}</p>
                                    <p class="card-text"><b>Purchased On: </b>{{$subjectlist->payment_date}}</p>
                                    <a href="{{url('student/subjects/syllabus')}}/{{$subjectlist->subject_id}}" class="btn btn-sm btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>




                </div>
                <!-- content-wrapper ends -->
               
                @endsection