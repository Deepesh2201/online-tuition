@extends('front-cms.layouts.main')
@section('main-section')
    <!-- tutor section -->
    <section class="tutor-details">
        <div class="container tutor-card topheader-tutor">

            <div class="row">

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 profileSec1">
                    <h2>{{ $tutorpd->headline }}</h2>

                    <h6 class="mb-2">Subjects</h6>

                    <div class="sub-btns">
                        @foreach ($subjects as $subject)
                            <button>{{ $subject->subject_name }}</button>
                        @endforeach
                    </div>

                    <div class="aboutTutor">

                        <h5>About {{ $tutorpd->name }}</h5>
                        <p class="charcol">{{ $tutorpd->goal }}</p>
                        {{-- <h5 class="">About the lesson</h5>
                        <p class="charcol">Have trouble understanding your workload? There are a million tutors, and you
                            have landed on the right page.<br><br> Hi, My name's Mr. Thompson, and I have the patience
                            and key to your understanding. I am a dynamic tutor. I know your needs change from session
                            to session. <br><br> That's why I provide 3 different rate prices just for you. I have the
                            notes and recordings that can help you. <br><br> I look forward to your message because I'm
                            a fast responder; Oh, and before I forget the most important thing, you can get answers to
                            questions and concepts from me even outside of scheduled classes.</p> --}}
                    </div>



                    <div class="aboutTutor review-top">
                        <h5>Review</h5>
                        <div class="star">
                            <span>
                                <i class="fa fa-star"></i> {{ $averagereview->avg_rating ?? '0' }}
                                ({{ $averagecount ?? '0' }}
                                reviews)
                            </span>
                        </div>
                    </div>


                    <div class="row mt-4">
                        @foreach ($reviews as $review)
                            <div class="col-12 mb-4">

                                <div class="review-text">
                                    <div class=" review-top">
                                        <h6>{{ $review->student_name }}</h6>
                                        <div class="star">
                                            <span>
                                                <i class="fa fa-star"></i> {{ $review->ratings }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="charcol font-14">{{ $review->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    <div class="aboutTutor">
                        <h5>{{ $tutorpd->name }}'s Video</h5>

                        <div class="tutor-Video">
                            <iframe width="100%" height="400" src="{{ $tutorpd->intro_video_link }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="tutorDetails tutorProfPic mar-top-40">
                        <div class="row">
                            <div class="col-lg-12 col-md-5">

                                <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorpd->profile_pic }}"
                                    width="100%" alt=""
                                    onerror="this.onerror=null;this.src='https://mychoicetutor.com/frontendnew/img/icons/mct-favicon.png';">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-7">

                            <p class="name mt-3">{{ $tutorpd->name }}</p>
                            <div class="star">
                                <span>
                                    <i class="fa fa-star"></i>
                                    {{ $averagereview->avg_rating ?? '0' }} ({{ $averagecount ?? '0' }})
                                </span>

                            </div>


                            <table class="priceTable">
                                <tr>
                                    <td>Hourly rate</td>
                                    <td>£{{ $tutorpd->rateperhour }}</td>
                                </tr>

                            </table>

                            <div class="tabView">
                                <div class="freeTrial btnSize ">
                                    <a href="/free-trial-class/student-login/{{ $tutorpd->tutor_id }}" class="btn">Free
                                        Trial Class</a>
                                </div>

                                <div class="expMore btnSize">
                                    <a href="/enroll-class/student-login/{{ $tutorpd->tutor_id }}" class="btn">Enroll
                                        Now</a>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>



    <div class="container tutor-card">
        <div class="aboutTutor">
            <h5 class="my-5">Other tutors in {{ $primarysubjects->subject_name }}</h5>
        </div>
        <div class="row">
            @foreach ($othertutors->slice(0, 4) as $othertutor)
                <a href="/tutor-details/{{ $othertutor->tutor_id }}" style="color: black">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 tutorCol">
                        <div class="tutorDetails padd-200">
                            <div class="tutorImg">
                                <img src="{{ url('images/tutors/profilepics', '/') }}{{ $othertutor->profile_pic }}"
                                    width="100%" alt=""
                                    onerror="this.onerror=null;this.src='https://mychoicetutor.com/frontendnew/img/icons/mct-favicon.png';">
                            </div>
                            <div class="star">
                                <span>
                                    <i class="fa fa-star"></i>
                                   {{$othertutor->avg_rating}} ({{$othertutor->total_reviews}})
                                </span>
                                <span>£{{ $othertutor->rateperhour }}/h</span>
                            </div>
                            <a href="/findatutor" style="color: black"> <span class="name">
                                    {{ $othertutor->name }}
                                    <p>{{ $primarysubjects->subject_name }} teacher</p>
                                </span></a>

                        </div>
                    </div>
                </a>
            @endforeach

        </div>


        </div>



    </section>
@endsection
