@extends('student.layouts.main')
@section('main-section')
 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style>
                .listHeader {
                    display: flex;
                    justify-content: space-between;
                }

                .headline h2, .headline p{
                    display:flex;
                    justify-content: start;
                }

                .skillTag {
                display: flex;

                }

                .skillTag h5 {
                    margin: 10px;
                }

            </style>

            <div class="page-content">
                <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card" style="width: 50rem; margin: 0 auto;">

                        <div class=" card-header bg-white">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="ms-4 d-flex flex-column" style="width: 150px;">
                                        <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="Generic placeholder image"
                                            class="img-fluid img-thumbnail mb-2"
                                            style="width: 150px; z-index: 1; border-radius: 50%;">

                                        

                                    </div>
                                </div>
                                <div class="col-9 headline">
                                    <h2 style="margin-top: 60px;">{{$tutorpd->name}}</h2>
                                    <p><i>{{$tutorpd->headline}}</i> </p>
                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <div>
                                <iframe width="560" height="315" src="{{$tutorpd->intro_video_link}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>

                            <h4 class="mt-3">Personal Details</h4>
                            <table class="tab table-bordered" width="100%" id="profileTable">
                                <tr>

                                    <th>Name:</th>
                                    <td>{{$tutorpd->name}}</td>
                                </tr>
                                <tr>

                                    <th>Goal:</th>
                                    <td>{{$tutorpd->goal}}</td>
                                </tr>
                                <tr>
                                    <th>Qualification:</th>
                                    <td>{{$tutorpd->qualification}}</td>
                                </tr>
                                <tr>
                                    <th>Experience:</th>
                                    <td>{{$tutorpd->experience}}</td>
                                </tr>
                                <tr>
                                    <th>Certifications:</th>
                                    <td>{{$tutorpd->certification}}</td>
                                </tr>


                                <tr>
                                    <th>Rate:</th>
                                    <td><span>&#163;</span> {{$tutorpd->rate}}/ Hr</td>
                                </tr>

                                <tr>
                                    <th>Headline:</th>
                                    <td>{{$tutorpd->headline}}</td>
                                </tr>

                                <tr>
                                    <th>Area:</th>
                                    <td>{{$tutorpd->subject}}</td>
                                </tr>
                            </table>
                            <br>
                            <h4>Acievements</h4>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @foreach ($achievement as $achievement)
                                        <tr>
                                            <td class="text-wrap">{{ $achievement->name }}</td>
                                            <td class="text-wrap">{{ $achievement->description }}</td>
                                            {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br>
                            <h4>Reviews</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Subject</th>
                                    <th>details</th>
                                    <th>Rating</th>
                                </tr>
                                
                                @foreach ($reviews as $reviews)
                                    
                                <tr>
                                    <td>{{$reviews->subject}}</td>
                                    <td>{{$reviews->name}}</td>
        
                                    <td>
                                        @if($reviews->ratings >=1)
                                        <span class="ri-star-fill checked"></span>
                                        @endif
                                        @if($reviews->ratings >=2)
                                        <span class="ri-star-fill checked"></span>
                                        @endif
                                        @if($reviews->ratings >=3)
                                        <span class="ri-star-fill checked"></span>
                                        @endif
                                        @if($reviews->ratings >=4)
                                        <span class="ri-star-fill checked"></span>
                                        @endif
                                        @if($reviews->ratings >=5)
                                        <span class="ri-star-fill checked"></span>
                                        @endif
                                    </td>

                                    
        
                                </tr>
                                @endforeach
                            </table>
                            <br>

                            <div>
                                <h5>Skills</h5>
                                <hr>
                                <div class="skillTag">
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                </div>
                            </div>






                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
    @endsection
