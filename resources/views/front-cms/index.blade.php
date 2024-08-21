@extends('front-cms.layouts.main')
@section('main-section')
<!-- END header -->
<section class="bannerSec">
    <div class="container-fluid">
        <div class="bannerImg ">
            <div class="bannerBGImg">
                <img class="desktopBanner" src="{{ url('frontendnew/img/bg-mtc.png') }}" alt="" width="100%">
                <img class="mobileBanner" src="{{ url('frontendnew/img/MobBan.png') }}" alt="" width="100%">
                <img class="tabBanner" src="{{ url('frontendnew/img/bannerIpad.png') }}" alt="" width="100%">
            </div>
            <div class="overlayMTC">
                <div class="tutorHeader">
                    <h1>
                        Discover the perfect tutor for you
                    </h1>
                    <form action="{{ url('toptutorsearch') }}" method="POST">
                        @csrf
                        <div class="findtutor-btns">

                            <div class="custom-select" style="width:300px;">
                                <select id="subject" name="subject">
                                    <option value="">Select a Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="custom-select" style="width:300px;">
                                <select id="grade" name="grade">
                                    <option value="">Select Grade</option>
                                    @foreach ($gradelists as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="drpdwnSearch">
                                <button type="submit" class="btn search-tutor">Search</button>
                            </div>
                        </div>
                    </form>



                    <div id="accordion">

                        <div class="accor">
                            <div class="advceAccordian">
                                <div class="" id="headingTwo">
                                    <div class="advance-search">
                                        <a href="" class="collapsed advSearTextLeft" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">Find the tutor of your choice use advance
                                            search</a>
                                        <span>
                                            <a href="" class="collapsed advSearch2" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                <img src="{{ url('frontendnew/img/icons/magnifire.png') }}" alt="">
                                                Advance Search
                                            </a>
                                        </span>
                                    </div>

                                </div>
                                <div id="collapseTwo" class="collapse collapseAdvSearch" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <form class="advSearchForm" action="{{url('advancesearch')}}" method="POST">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="" aria-describedby=""
                                                        placeholder="Search" id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                                <label for="">Subject</label>
                                                <select class="form-control" id="subject" name="subject">
                                                    <option value="">Select a subject</option>
                                                    @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                                <label for="">Grade</label>
                                                <select class="form-control" id="grade" name="grade">
                                                    <option value="">Select a grade</option>
                                                    @foreach ($gradelists as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" hidden>
                                                <label for="">Rating</label>
                                                <select class="form-control rating" id="ratings" name="ratings">
                                                    <option value="">5 Star <span
                                                            class="star-uni-code">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                                    </option>
                                                    <option value="">4 Star &#9733;&#9733;&#9733;&#9733;</option>
                                                    <option value="">3 Star &#9733;&#9733;&#9733;</option>
                                                    <option value="">2 Star &#9733;&#9733;</option>
                                                    <option value="">1 Star &#9733;</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" hidden>
                                                <label for="">Country</label>
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="advSearchBtns">
                                                    <button class="btn cancelBtn">Cancel</button>
                                                    <button type="submit" class="applyBtn">Apply</button>
                                                </div>
                                            </div>

                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="subSec">
                    <ul>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="1">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                    <img src="{{ url('frontendnew/img/icons/board-math.png') }}" alt="">
                                    <p>Maths</p>
                                </button>
                            </form>
                        </li>
                        
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="2">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/book-03.png') }}" alt="">
                                <p>English</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="3">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/chemistry-03.png') }}" alt="">
                                <p>Chemistry</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="4">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/physics.png') }}" alt="">
                                <p>Physics</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="5">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/geology-crust.png') }}" alt="">
                                <p>Biology</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="6">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/submerge.png') }}" alt="">
                                <p>Science</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="8">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/translation.png') }}" alt="">
                                <p>Spanish</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="9">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/translation.png') }}" alt="">
                                <p>French</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="10">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/translation.png') }}" alt="">
                                <p>German</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="11">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/text-creation.png') }}" alt="">
                                <p>History</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="12">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/music-note-03.png') }}" alt="">
                                <p>Music</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="13">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/global-education.png') }}" alt="">
                                <p>Psychology</p>
                             </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ url('toptutorsearch') }}" method="POST">
                                @csrf
                                <input type="hidden" id="subject" name="subject" value="14">
                                <button type="submit" style="background:none;border:none;padding:0;">
                                <img src="{{ url('frontendnew/img/icons/school-tie.png') }}" alt="">
                                <p>Politics</p>
                             </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tutor section -->
<section class=" mar-top-40">
    <div class="container tutor-card padd-80">
        <h4>10 million evaluated private tutors</h4>
        <br>
        <div class="row">
            @foreach ($tutors->slice(0, 8) as $tutor)
            <a href="tutor-details/{{$tutor->tutor_id}}" style="color: black">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 tutorCol">
                    <div class="tutorDetails">
                        <div class="tutorImg">
                            <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutor->profile_pic }}" width="100%" alt="" onerror="this.onerror=null;this.src='https://mychoicetutor.com/frontendnew/img/icons/mct-favicon.png';">
                        </div>
                        <div class="star">
                            <span>
                                <i class="fa fa-star"></i>
                                {{ $tutor->avg_rating }} ({{ $tutor->total_reviews }})
                            </span>
                            <span>${{ $tutor->rateperhour }}/h</span>
                        </div>
                        <a href="tutor-details/{{$tutor->tutor_id}}" style="color: black"> <span class="name">
                                {{ $tutor->name }}
                                <p>{{ $tutor->subject }}</p>
                            </span></a>
                        <span class="desc-tutor">{{ $tutor->headline }}</span>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="expMore">
                    <a href="findatutor" class="btn btn-lg mb-4">Explore more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -----------testimonial---------- -->
<section class="testimonial-sec">
    <div class="container topheader">
        <h3 class="">Customer Testimonials</h3>
        <div class="row">
            @foreach ($reviews->slice(0, 4) as $review)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="testi-card">
                    <span class="nameTo">
                        {{ $review->tutorname }}
                        <p>{{ $review->subjectname }}
                            <br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p>
                    </span>
                    <p class="mt-4">“{{ $review->name }}”</p>
                    <p class="nameFrom">{{ $review->studentname }}</p>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row mt-4">
            <div class="col-12 ">
                <div class="expMore">
                    <a href="/reviews" class="btn btn-lg">View all</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ----------how it works----- -->
<section class="howitwork-sec">
    <div class="container topheader">
        <h3 class="">How it works</h3>
        <p class="text-center px-5 mb-5">Experience seamless learning with our online tuition app. We've simplified
            education, making
            it easy for students, parents, and tutors to connect and excel. Effortless, effective, and engaging learning
            awaits you.</p>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="how-card card1">
                    <span class="nameTo">Find the best tutor</span>
                    <p class="mt-4 pb-5">MCT offers a selection of in-house trained tutors to elevate your academic
                        career...</p>
                </div>
                <div class="imgNumber">
                    <img class="shaddow" src="{{ url('frontendnew/img/icons/Vector 1.png') }}" alt="">
                    <img class="numbr1" src="{{ url('frontendnew/img/icons/one.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="how-card card2">
                    <span class="nameTo">Find the best tutor</span>
                    <p class="mt-4 pb-5">MCT offers a selection of in-house trained tutors to elevate your academic
                        career...</p>
                </div>
                <div class="imgNumber">
                    <img class="shaddow" src="{{ url('frontendnew/img/icons/Vector 2.png') }}" alt="">
                    <img class="numbr2" src="{{ url('frontendnew/img/icons/two.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="how-card card3">
                    <span class="nameTo">Find the best tutor</span>
                    <p class="mt-4 pb-5">MCT offers a selection of in-house trained tutors to elevate your academic
                        career...</p>
                </div>
                <div class="imgNumber">
                    <img class="shaddow" src="{{ url('frontendnew/img/icons/Vector 3.png') }}" alt="">
                    <img class="numbr3" src="{{ url('frontendnew/img/icons/three.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fact sector -->
<section>
    <div class="tu-statsholder mb-5">
        <div class="container">


            <div id="tu-counter" class="tu-stats">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-5">

                        <img src="{{ url('frontendnew/img/icons/img-01.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="50" data-speed="8000" data-refresh-interval="10">50</span>+
                                Courses
                            </h4>
                            <p>Courses available from verified and top tutors</p>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-5">


                        <img src="{{ url('frontendnew/img/icons/img-02.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="100" data-speed="8000"
                                    data-refresh-interval="30">100</span>+ Quizes
                            </h4>
                            <p>Online quiz & online tests to improve your skills</p>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-5">
                        <img src="{{ url('frontendnew/img/icons/img-03.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="10" data-speed="8000" data-refresh-interval="50">10</span>+
                                Hours
                            </h4>
                            <p>User daily average time spent on the platform</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-5">

                        <img src="{{ url('frontendnew/img/icons/img-04.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="1000" data-speed="8000"
                                    data-refresh-interval="100">1000</span>+ Users
                            </h4>
                            <p>Active instructor and students available on the platform</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <ul id="tu-counter" class="tu-stats">
                    <li>
                        <img src="{{ url('frontendnew/img/icons/img-01.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="50" data-speed="8000"
                                    data-refresh-interval="10">50</span>+ Courses
                            </h4>
                            <p>Courses available from verified and top tutors</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ url('frontendnew/img/icons/img-02.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="100" data-speed="8000"
                                    data-refresh-interval="30">100</span>+ Quizes
                            </h4>
                            <p>Online quiz & online tests to improve your skills</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ url('frontendnew/img/icons/img-03.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="10" data-speed="8000"
                                    data-refresh-interval="50">10</span>+ Hours
                            </h4>
                            <p>User daily average time spent on the platform</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ url('frontendnew/img/icons/img-04.png') }}" alt="img">
                        <div class="tu-stats_info">
                            <h4>
                                <span data-from="0" data-to="1000" data-speed="8000"
                                    data-refresh-interval="100">1000</span>+ Users
                            </h4>
                            <p>Active instructor and students available on the platform</p>
                        </div>
                    </li>
                </ul> -->
        </div>
    </div>
</section>
<!-- fact sector END -->
<!-- fact sector END -->
<section>
    <div class="container">
        <div class="tutor-banner ">

            <div class="rightside">
                <h2>Begin your tutoring journey now! Join us as a tutor.</h2>
                <button onclick="redirect();">Get Started</button>
            </div>

        </div>
    </div>
    <script>
    function redirect() {
        window.location.href = "{{('/student/register')}}";
    }
    </script>
</section>





<!-- -----------blog---------- -->
<!-- <section class="testimonial-sec">
            <div class="container topheader">
                <h3 class="">Resources / Blogs</h3>
                <p class="para">Experience seamless learning with our online tuition app. We've simplified education, making
                    it easy for students, parents, and tutors to connect and excel. Effortless, effective, and engaging learning
                    awaits you.</p>
                <div class="row">
                    @foreach ($blogs as $blog)
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="blog-card">

                            <img src="{{ url('images/blogs') }}/{{ $blog->image }}" width="100%" height="230px" alt="">


                            <div class="blogDetails">
                                <span class="feature">
    @if ($blog->is_featured)
    Featured |
    @endif {{ $blog->published_by }}
    <span>
                                        <h5 class="my-2">{{ $blog->name }}</h5>
                                        <p class="bDesc">{{ $blog->description }}</p>

                                        <a href="#">
                                            Read more
                                        </a>
                            </div>

                        </div>
                    </div>
    @endforeach


                </div>
                <div class="row mt-4">
                    <div class="col-12 ">
                        <div class="expMore">
                            <a href="#" class="btn btn-lg">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->




@endsection