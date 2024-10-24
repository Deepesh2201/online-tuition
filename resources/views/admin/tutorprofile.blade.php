@extends('admin.layouts.main')
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
 <link rel="stylesheet" href="{{url('frontend/css/profile.css')}}">
 <main class="tu-main tu-bgmain">
    <section class="tu-main-section">
        <div class="container">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-12 col-xxl-9">
                        <div class="tu-tutorprofilewrapp">
                            <span class="tu-cardtag"></span>
                            <div class="tu-profileview">
                                <figure>
                                    <img src="{{ url('images/tutors/profilepics/') }}/{{ $tutorpd->profile_pic ?? 'default-profile-pic.png' }}" alt="image-description">

                                </figure>
                                <div class="tu-protutorinfo">
                                    <div class="tu-protutordetail">
                                        <div class="tu-productorder-content">
                                            <figure>
                                                <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="images">
                                            </figure>
                                            <div class="tu-product-title">
                                                <h3>{{$tutorpd->name}} <i class="icon icon-check-circle tu-greenclr" data-tippy-trigger="mouseenter" data-tippy-html="#tu-verifed" data-tippy-interactive="true" data-tippy-placement="top"></i></h3>
                                                <div class="sub-btns">
                                                    @foreach ($subjects as $subject)
                                                        <button>{{ $subject->subject_name }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tu-listinginfo_price">
                                                <span>Starting from:</span>
                                                <h4>£{{$tutorpd->rate}}/hr</h4>
                                            </div>
                                        </div>
                                        <ul class="tu-tutorreview">
                                            <li>
                                                <span><i class="fa fa-star tu-coloryellow">
                                                        <em>{{$tutorpd->avg_rating}}<span></span></em> </i>
                                                    <em>({{$tutorpd->total_reviews}})</em></span>
                                            </li>
                                            <li>
                                                <span><i
                                                        class="fa fa-check-circle tu-colorgreen"><em>Qualification:</em></i><em>{{ $tutorpd->qualification }}</em></span>
                                            </li>
                                            <li>
                                                <span><i
                                                        class="fa fa-check-circle tu-colorgreen"><em>Experience:</em></i><em>{{ $tutorpd->experience }}</em></span>
                                            </li>
                                        </ul>
                                        <div class="tu-detailitem">
                                            <h6>Certifications</h6>
                                            <div class="tu-languagelist">
                                                <ul class="tu-languages">
                                                    <li>{{$tutorpd->certification}}</li>
                                                     </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tu-actionbts">
                                <div class="tu-userurl">
                                    <a href="{{ $tutorpd->intro_video_link }}" target="_blank"><button
                                            class="btn btn-danger">Watch Intro</button><i
                                            class="icon icon-copy"></i></a>
                                </div>
                                <a href="/admin/tutorslotscheck/{{$tutorpd->tutor_id}}"><button class="btn btn-sm btn-primary">Check Slots</button></a>
                                <a href="/admin/tutormessages/{{$tutorpd->tutor_id}}"><button class="btn btn-sm btn-success">Start Chat</button></a>

                            </div>
                        </div>
                        <div class="tu-detailstabs">
                            <ul class="nav nav-tabs tu-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true"><i
                                            class="icon icon-home"></i><span>Introduction</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false"><i
                                            class="icon icon-message-circle"></i><span>Reviews</span></button>
                                </li>
                            </ul>
                            <div class="tab-content tu-tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="tu-tabswrapper">
                                        <div class="tu-tabstitle">
                                            <h4>{{ $tutorpd->headline }}</h4>
                                        </div>
                                       <br>
                                        <hr>
                                        <div class="tu-tabstitle">
                                            <h4>About {{$tutorpd->name}}</h4>
                                        </div>
                                        <div class="tu-description">
                                            <p> {{ $tutorpd->goal }}</p>
                                        </div><br>
                                        <hr>
                                        <div class="tu-tabstitle">
                                            <h4>Qualification</h4>
                                        </div>
                                        <div class="tu-description">
                                            <p> {{ $tutorpd->qualification }}</p>
                                        </div><br>
                                        <hr>
                                        <div class="tu-tabstitle">
                                            <h4>Experience</h4>
                                        </div>
                                        <div class="tu-description">
                                            <p> {{ $tutorpd->experience }}</p>
                                        </div>


                                    </div>

                                    <div class="tu-tabswrapper">
                                        <div class="tu-tabstitle">
                                            <h4>Achievement</h4>
                                        </div>
                                        <ul class="tu-icanteach">
                                            <li>
                                                {{-- <div class="tu-tech-title">
                                            <h6>Class 9 - 10</h6>
                                        </div> --}}
                                                <ul class="tu-serviceslist">
                                                    @foreach ($achievement as $achievement)
                                                        {{-- <tr> --}}
                                                        {{-- <td class="text-wrap">{{ $achievement->name }}</td> --}}
                                                        {{-- <td class="text-wrap">{{ $achievement->description }}</td> --}}
                                                        {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                                        {{-- <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td> --}}
                                                        </tr>



                                                        <li>
                                                            <a href="#achievement">{{ $achievement->name }}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="tu-tabswrapper">
                                        <div class="tu-boxtitle">
                                            <h4>Reviews ({{ count($reviews) }})</h4>
                                        </div>
                                        @foreach ($reviews as $reviews)
                                            </tr>

                                            <div class="tu-commentarea">
                                                <div class="tu-commentlist">
                                                    <figure>
                                                        <img src="{{ url('images/students/profilepics', '/') }}{{ $reviews->student_pic ?? url('images/avatar/default-profile-pic.png') }}"
                                                            alt="images">
                                                    </figure>
                                                    <div class="tu-coomentareaauth">
                                                        <div class="tu-commentright">
                                                            <div class="tu-commentauthor">
                                                                <h6><span>{{ $reviews->student_name }}</span></h6>
                                                                <div class="tu-listing-location tu-ratingstars">
                                                                    <span>{{ $reviews->ratings }}</span>
                                                                    <span class="tu-stars tu-sm-stars">
                                                                        <span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tu-description">
                                                            <p>{{ $reviews->name }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tu-Joincommunity">
                            <div class="tu-particles">
                                <div id="tu-particlev2"></div>
                            </div>
                            <div class="tu-Joincommunity_content">
                                <h4>Trending tutor directory of 2023</h4>
                                <p>Its Free, Join today and start spreading knowledge with students out there</p>
                            </div>
                            <div class="tu-Joincommunity_btn">
                                <a href="/student/register" class="tu-yellowbtn">Join our community</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- content-wrapper ends -->
    @endsection
