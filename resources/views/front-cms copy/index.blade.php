
@extends('front-cms.layouts.main')
@section('main-section')
        <!-- banner area start -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="banner-area">
            <div class="single-banner container container-custom-1 p-0 ">
                <img class="banner-top-shape-1" src="{{url('front-cms-styles/assets/img/banner/1/1.png')}}" alt="">
                <img class="banner-top-shape-2" src="{{url('front-cms-styles/assets/img/banner/1/3.png')}}" alt="">
                <img class="banner-top-shape-3" src="{{url('front-cms-styles/assets/img/banner/1/5.png')}}" alt="">
                <img class="banner-top-shape-4" src="{{url('front-cms-styles/assets/img/banner/1/saturn.png')}}" alt=""
                    width="7%">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-5 col-md-8">
                            <div class="banner-content">
                                <div class="section-area">
                                    <span class="section-subtitle">Online Learning Platform</span>
                                    <h1 class="section-title">Achieve Your Goal With World's Top
                                        <span>Tutor. <img src="{{url('front-cms-styles/assets/img/banner/1/line.png')}}"
                                                alt=""></span>
                                    </h1>
                                    <p class="section-text"> Over 1 Millions learners trust us for their preparation.
                                    </p>
                                    <a href="{{url('/courses')}}" class="theme-btn theme-btn-big">View All
                                        Course</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                            <div class="banner-right">
                                <div class="banner-img">
                                    <img src="{{url('front-cms-styles/assets/img/banner/1/banner-img.png')}}" alt="">
                                </div>
                                <div class="banner-meta">
                                    <div class="banner-inner-meta banner-meta-info">
                                        <img class="inner-img"
                                            src="{{url('front-cms-styles/assets/img/banner/1/info_icon.png')}}" alt="">
                                        <div class="banner-inner-info">
                                            <div class="banner-info-img">
                                                <img src="{{url('front-cms-styles/assets/img/banner/1/author.jpg')}}"
                                                    alt="">
                                                <span class="banner-info-icon"><i class="fa-solid fa-star"></i></span>
                                            </div>
                                            <div class="banner-info-text">
                                                <h5>Brian Cumin</h5>
                                                <!-- <p>“Lorem ipsum dolorous rises various <br> qualm quique id dam connecter easum <br> commode impediment”.</p> -->
                                                <p class="text-wrap">“Online tutor is convenient,<br> offers
                                                    flexibility, and access <br>to expert tutors. However,<br> potential
                                                    distractions and <br>internet connectivity can <br> be occasional
                                                    drawbacks.”</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-inner-meta banner-meta-rating">
                                        <span><i class="fa-solid fa-star"></i>4.5 (3.4k Reviews)</span>
                                        <h5>Congratulations</h5>
                                    </div>
                                </div>
                                <div class="banner-right-shape">
                                    <img class="banner-shape-1"
                                        src="{{url('front-cms-styles/assets/img/banner/1/shape_1.png')}}" alt="">
                                    <img class="banner-shape-2"
                                        src="{{url('front-cms-styles/assets/img/banner/1/2.png')}}" alt="">
                                    <img class="banner-shape-4"
                                        src="{{url('front-cms-styles/assets/img/banner/1/4.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- brand area start -->
        <div class="brand-area pt-115" hidden>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-content">
                            <h5>340+ Leading Universities And Companies</h5>
                        </div>
                    </div>
                </div>
                <div class="brand-wrap">
                    <div class="brand-active swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_1.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/1.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_2.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/2.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_3.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/3.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_4.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/4.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_5.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/5.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="{{url('front-cms-styles/assets/img/brand/h_6.png')}}" alt=""
                                            class="brand-hover-img">
                                        <img src="{{url('front-cms-styles/assets/img/brand/6.png')}}" alt=""
                                            class="brand-main-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->

        <!-- how does it work -->
        <section class=" pt-140 pb-90 a ">
            <img src="{{url('front-cms-styles/assets/img/about/3/shape-5.png')}}" alt="" class="h3_about-top-shape">
            <div class="container">
                <h2 class="section-title mb-20 text-center">How It Works - find your perfect tutor online</h2>
                <p class="text-center">Request tutor, Then easily schedule demo class and pay for online and recorded
                    classes.</p>
                <div class="row align-items-center mt-5">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/icons8-school-director-64.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Click Find A Tutor</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/chooseTutor.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Choose Your Tutor</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/schedule.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Schedule Demo Class</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/online-class.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Have Online Lessons</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>


                </div>
            </div>
        </section>
        <!-- how it works end  -->



        <!-- Browse By Subjects -->
        <section class=" pt-80 pb-90 browseBySubjects">

            <div class="container">
                <h2 class="section-title mb-20 text-center">Browse By Subjects</h2>
                <p class="text-center">Request tutor, Then easily schedule demo class and pay for online and recorded
                    classes.</p>
                <div class="row align-items-center mt-5">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/degree.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Academics</h5>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/language.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Language</h5>
                        </div>
                    </div>


                    <div class="col-xl-2 col-lg-2 col-md-4  col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/music.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Music</h5>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4  col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/art.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Art</h5>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4  col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/health.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Health</h5>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4  col-sm-6 col-xs-12 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/IT.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>IT</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12">
                        <div style="float:right">
                            <a href="{{url('/allsubjects')}}"><button class="badge border-0 text-primary">View All <i
                                        class="fa fa-angle-right" aria-hidden="true"></i>
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end  -->


        <!-- find the right online tutor -->
        <section class=" pt-80 pb-90 a ">
            @if(isset($subjectlists))
            <div class="container righttutor bg-white">
                <h2 class="section-title mb-20 text-center">Find The Right Online Tutor For You</h2>
                <form action="{{ route('tutorsearchindex') }}" method="POST" class="multi-range-field my-5 pb-5" id="tutor-search">
                    <div class="row pt-50">
                        @csrf
                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Subject</label>
                            <select class="form-control" id="subjectlistid" name="subjectlistid">
                                <option value="">-- Select --</option>
                                @foreach ($subjectlists as $subject)

                                <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Level</label>
                            <select class="form-control" id="gradelistid" name="gradelistid">
                                <option value="">--Select--</option>
                                @foreach ($gradelists as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Price</label>
                            <select class="form-control">
                                <option>--Select--</option>
                            </select>
                        </div> --}}

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                        <label for="">Min and Max Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Min Price" id="tminprice" name="tminprice">
                            <input type="text" class="form-control" placeholder="Max Price" id="tmaxprice" name="tmaxprice">
                        </div>
                        </div>

                        

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                           <div class="seachbtn">
                           <button class="header-btn theme-btn-black" type="button" id="">Advance Search</button>
                            <a href="{{url('/findatutor')}}"> <button class="header-btn theme-btn-black mt-4"
                                    id="" type="button">View All</button></a>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @if(isset($tutorlists))
            <div class="container ">



                <div id="tutorListContainer" class="row align-items-center mt-5 tutor-search">
                    @foreach ($tutorlists as $tutorlist)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

                        <div class="tutorcard">
                            <div class="tutorcardImg">
                                <div class="ratePerHr">
                                    <p>&#163;{{$tutorlist->rate}}</p>
                                </div>
                                <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}"
                                    class="card-img-top" alt="...">
                            </div>
                            <div class="tutorDesc">
                                <span class="tutname">{{ $tutorlist->name }}</span><br>
                                <table class="tutorTable">
                                    <tr>
                                        <td colspan="2"><small>{{ $tutorlist->headline }}</small></td>
                                    </tr>
                                    <tr>
                                        <td>{{$tutorlist->total_classes_done}}+ Lessions</td>
                                        <td class="floattright"><b>Exp:</b> {{$tutorlist->experience}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject:</b> {{ $tutorlist->subject }} </td>
                                        <td class="text-success floattright">Verified</td>
                                    </tr>

                                </table>

                                <div class="btnSec">
                                    <a href="tutorprofile/{{ $tutorlist->sub_map_id }}"><button class="btn btn-sm">View
                                            Profile</button></a>
                                    <a href="/student/searchtutor"> <button class="btn btn-sm">Free Trial</button></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    @endforeach

                </div>
            </div>
            @endif
        </section>
        <!-- find the online tutor end  -->

        <!-- about area start -->
        <section class="h3_about-area pt-140 pb-90 a " hidden>
            <img src="{{url('front-cms-styles/assets/img/about/3/shape-5.png')}}" alt="" class="h3_about-top-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="h3_about-img mb-50">
                            <div class="h3_about-inner-img w_img mr-50">
                                <img src="{{url('front-cms-styles/assets/img/about/3/1.png')}}" alt="">
                            </div>
                            <div class="h3_about-img-shape d-none d-sm-block">
                                <img class="h3_about-img-shape-1"
                                    src="{{url('front-cms-styles/assets/img/about/3/shape-1.png')}}" alt="">
                                <img class="h3_about-img-shape-2"
                                    src="{{url('front-cms-styles/assets/img/about/3/shape-2.png')}}" alt="">
                                <img class="h3_about-img-shape-3"
                                    src="{{url('front-cms-styles/assets/img/about/3/shape-3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="h3_about-wrap mr-65 mb-50">
                            <img src="{{url('front-cms-styles/assets/img/about/3/shape-4.png')}}" alt=""
                                class="h3_about-wrap-shape">
                            <div class="section-area-3 mb-35 small-section-area-3">
                                <span class="section-subtitle">Know About Us</span>
                                <h2 class="section-title mb-25">This Stage Focuses on The Development Young Children
                                    Usually Between.</h2>
                                <p class="section-text">
                                    At Online Tutor, we are passionate about empowering students to achieve their
                                    academic goals through personalized, convenient, and effective online tutoring. With
                                    a team of experienced and dedicated educators, we offer a wide range of subjects and
                                    levels to cater to diverse learning needs.

                                    Our tutors are carefully selected for their expertise and teaching skills, ensuring
                                    that students receive top-notch guidance. We believe in fostering a positive and
                                    interactive learning environment that encourages questions, discussions, and active
                                    participation.

                                    Whether you need help with math, science, language arts, or test preparation, Online
                                    Tutor is here to support your educational journey. Join us in unlocking your full
                                    potential and reaching new heights in your studies. Experience the future of
                                    learning with us today!
                                </p>
                            </div>
                            <div class="h3_about-content mb-35">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Access Lifetime any devices</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Free for Student</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>No Credit Card Required</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>30 Days Trial</span>
                                    </div>
                                </div>
                            </div>
                            <div class="h3_about-button">
                                <a href="#" class="theme-btn theme-btn-medium theme-btn-3">More Details<i
                                        class="fa-light fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- category area start -->


        <section class="category-area pt-120 pb-60" hidden>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="category-left pb-60">
                            <div class="section-area">
                                <span class="section-subtitle">Browse Tutors</span>
                                <h2 class="section-title mb-20">Popular Tutors</h2>
                            </div>
                            <div class="category-navigation">
                                <div class="category-prev"><i class="fa-thin fa-arrow-left"></i>
                                </div>
                                <div class="category-next"><i class="fa-light fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="category-wrap">
                            <div class="category-shape">
                                <img src="{{url('front-cms-styles/assets/img/category/1/shape-1.png')}}" alt=""
                                    class="category-shape-1">
                                <img src="{{url('front-cms-styles/assets/img/category/1/shape-2.png')}}" alt=""
                                    class="category-shape-2">
                                <img src="{{url('front-cms-styles/assets/img/category/1/shape-3.png')}}" alt=""
                                    class="category-shape-3">
                                <img src="{{url('front-cms-styles/assets/img/category/1/shape-4.png')}}" alt=""
                                    class="category-shape-4">
                            </div>
                            @if(isset($tutors))
                            <div class="category-active swiper pb-60">
                                <div class="swiper-wrapper">
                                    @foreach($tutors as $tutor)

                                    <div class="swiper-slide">
                                        <div class="category-item">
                                            <div class="category-img">
                                                @if($tutor->profile_pic)
                                                <img src="{{url('images/tutors/profilepics','/')}}{{ $tutor->profile_pic}}"
                                                    alt="">

                                                @else
                                                <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}"
                                                    alt="">

                                                @endif

                                            </div>
                                            <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile')}}/{{$tutor->submapid}}">{{$tutor->name}}
                                                            - {{$tutor->submapid}}</a></h5>
                                                    @if($tutor->avg_rating)
                                                    <div class="mb-1" style="color: gold" class="starRating">
                                                        <i class="fa fa-star <?php echo $tutor->avg_rating >= 1 ? 'checked' : ''; ?>"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star <?php echo $tutor->avg_rating >= 2 ? 'checked' : ''; ?>"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star <?php echo $tutor->avg_rating >= 3 ? 'checked' : ''; ?>"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star <?php echo $tutor->avg_rating >= 4 ? 'checked' : ''; ?>"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star <?php echo $tutor->avg_rating >= 5 ? 'checked' : ''; ?>"
                                                            aria-hidden="true"></i>

                                                        <!-- <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star-half-o" aria-hidden="true"></i> -->
                                                    </div>
                                                    @endif



                                                    <p><b>Class:</b>{{$tutor->className ?? '' }}</p>
                                                    <p><b>Subject:</b> {{$tutor->subject ?? '' }}</p>
                                                    <!-- <p><b>Total Topics:</b>17</p> -->
                                                    <p><b>Rate:</b>£{{$tutor->rate ?? '' }}</p>

                                                    <a href="{{url('tutorprofile')}}/{{$tutor->submapid}}"> <button
                                                            class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial
                                                            Class</button></a>

                                                    <div class="enrlBtn">
                                                        <a href="/student/register"><button class="btn btn-sm">Enroll
                                                                Now</button></a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                    <!-- <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="swiper-slide">
                                            <div class="category-item">
                                                <div class="category-img">
                                                    <img src="{{url('front-cms-styles/assets/img/category/1/1.jpg')}}" alt="">
                                                </div>
                                                <div class="category-content">

                                                <div>
                                                    <h5><a href="{{url('tutorprofile/1')}}">Daniel Alexander</a></h5>
                                                    <div class="mb-1" style="color: gold" class="starRating">

                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>

                                                    <p><b>Class:</b>X<sup>th</sup></p>
                                                    <p><b>Subject:</b> Maths</p>
                                                    <p><b>Total Topics:</b>17</p>
                                                    <p><b>Rate:</b>£10.2</p>

                                                   <a href="{{url('tutorprofile/1')}}"> <button class="btn btn-sm">Tutor Profile</button></a>
                                                    <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                                    <div class="enrlBtn">
                                                    <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                                        
                                                    </div>

                                                </div>

                                                </div>
                                            </div>
                                        </div> -->



                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category area end -->

        <!-- course area start -->
        <section class="course-area" hidden>
            <div class="container-fluid container-custom-1 p-0">
                <div class="course-wrap pt-120 pb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="course-section-area text-center">
                                    <div class="section-area section-area-top">
                                        <span class="section-subtitle">Learning Content</span>
                                        <h2 class="section-title mb-20">Explore Learning Content</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="course-tab">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">PDF</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-contact" type="button" role="tab"
                                                aria-controls="pills-contact" aria-selected="false">Video</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-four-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-four" type="button" role="tab"
                                                aria-controls="pills-four" aria-selected="false">Quiz</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="course-inner">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="row">


                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('/images/subjects/physics.jpeg')}}" alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Fundamentals Of
                                                            Physics</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Fundamentals Of Physics</a></h5>
                                                    <br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/2.jpg')}}"
                                                        alt="">
                                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#">Organic Chemistry</a>
                                                    </h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Organic Chemistry</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                                &nbsp;Play </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-four" role="tabpanel"
                                    aria-labelledby="pills-four-tab" tabindex="0">
                                    <div class="row">


                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-4 col-md-6">
                                            <div class="course-item mb-30">
                                                <div class="course-img">
                                                    <img src="{{url('front-cms-styles/assets/img/course/1/4.jpg')}}"
                                                        alt="">
                                                </div>
                                                <div class="course-content mt-3">

                                                    <h5 class="course-content-title"><a href="#"> Quiz</a></h5>
                                                    <p>Class: X<sup>th</sup></p>

                                                </div>
                                                <div class="course-hover-content">

                                                    <h5 class="course-hover-content-title"><a
                                                            href="course-details.html">Quiz</a></h5><br>
                                                    <p class="course-hover-content-text">Lorem ipsum dolorous rises quiz
                                                        varus qualm quisque id connecter adipescent commode impediment.
                                                        Lorem ipsum dolorous rises quiz varus qualm quisque id connecter
                                                        adipescent commode impediment.</p>
                                                    <br>
                                                    <div class="course-hover-content-btn">
                                                        <div class="course-hover-cart-btn">
                                                            <a href="#" class="theme-btn course-btn"><i
                                                                    class="fa fa-play" aria-hidden="true"></i> &nbsp;
                                                                Start Quiz </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- course area end -->

        <!-- about area start -->
        <section class="about-area pt-140 pb-90" hidden>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-img mb-50">
                            <img src="{{url('front-cms-styles/assets/img/about/1/1.png')}}" alt="">
                            <div class="about-img-meta">
                                <span><i class="fa-solid fa-star"></i>4.5 (3.4k Reviews)</span>
                                <h5>Congratulations</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-10">
                        <div class="about-content mb-50">
                            <div class="section-area mb-20">
                                <span class="section-subtitle">Start learning Free</span>
                                <h2 class="section-title mb-15">Online Course can be Tailored to Need of learners</h2>
                                <p class="section-text">
                                    Through a combination of lectures, readings, discussions, students will gain a solid
                                    foundation in educational psychology.
                                </p>
                            </div>
                            <div class="about-content-list">
                                <ul>
                                    <li>International course collection in 14 languages</li>
                                    <li>Top certifications in tech and business</li>
                                    <li>Access to 35,000+ top Online Tutor courses, anytime, anywhere</li>
                                </ul>
                            </div>
                            <div class="about-content-button">
                                <a href="about.html" class="theme-btn about-btn theme-btn-medium">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->
        <!-- admission area start -->
        <section class="h3_admission-area pt-140 pb-90" hidden>
            <div class="banner-right-shape">
                <img class="h3_admission-bg" src="{{url('front-cms-styles/assets/img/banner/1/shape_1.png')}}" alt="">

            </div>
            <!-- <img src="{{url('front-cms-styles/assets/img/admission/3/1.png')}}" alt="" class="h3_admission-bg"> -->
            <img src="{{url('front-cms-styles/assets/img/admission/3/shape-1.png')}}" alt=""
                class="h3_admission-shape-1">
            <img src="{{url('front-cms-styles/assets/img/admission/3/shape-3.png')}}" alt=""
                class="h3_admission-shape-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 ">
                        <div class="h3_admission-wrap mr-65 mb-50">
                            <img src="{{url('front-cms-styles/assets/img/admission/3/shape-2.png')}}" alt=""
                                class="h3_admission-wrap-shape-2">
                            <div class="section-area-3 mb-35 small-section-area-3">
                                <span class="section-subtitle">Enrolment</span>
                                <h2 class="section-title mb-25">Creating Equal Learning Chances, Bridging the
                                    Educational Divide!</h2>
                                <p class="section-text">
                                    Maecenas Felis Tellus, dictum sed fermentum vel, various condiment dolour donec
                                    aliquot denim ut auctor molestee, era elite pharetra masa.
                                </p>
                            </div>
                            <div class="h3_admission-content mb-35">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Teach your way</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Record your video</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Plan your curriculum</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span><i class="fa-regular fa-check"></i>Launch your course</span>
                                    </div>
                                </div>
                            </div>
                            <div class="h3_admission-button">
                                <a href="#" class="theme-btn theme-btn-medium theme-btn-3">Apply Now<i
                                        class="fa-light fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="h3_admission-form mb-50">
                            <h5 class="h3_admission-form-title">Enrolment</h5>
                            <form action="#">
                                <div class="row g-15">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="Street Address">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="h3_admission-form-input">
                                            <input type="text" placeholder="Zip Code">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="h3_admission-form-input">
                                            <input type="date">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="h3_admission-form-input">
                                            <textarea name="message" placeholder="Academic Qualifications"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="h3_admission-form-btn">
                                            <button type="submit"
                                                class="theme-btn h3_admission-btn theme-btn-full theme-btn-3">Contact
                                                Us<i class="fa-light fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <span class="h3_admission-text">Courses Education Admissions</span> -->
        </section>
        <!-- admission area end -->

        <!-- testimonial area start -->
        <section class="testimonial-area pt-90 pb-90">
            <div class="container">

                <h2 class="section-title mb-20 text-center">What Our Students Saying</h2>
                <p class="section-text text-center">
                    Through a combination of lectures, readings, discussions, students will gain a solid foundation in
                    educational psychology.
                </p>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class=" mb-55">
                            <!-- <span class="section-subtitle">Student Reviews</span> -->


                            <!-- <h2 class="section-title mb-20">What Our Students Saying</h2> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-wrap">
                <div class="testimonial-active swiper">
                    <div class="swiper-wrapper pb-80">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-1.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Brian Cumin</h5>
                                            <span>Indigo Violet</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Online tutor is convenient, offers flexibility, and access to expert tutors.
                                        However, potential distractions and internet connectivity can be occasional
                                        drawbacks.”.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-2.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Penny Tool</h5>
                                            <span>Web Designer</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nunc valuate nil urn, id fermentum sem portico non volitant leafed lorem, quiz
                                        poseur ipsum aliquot a. Morbi urn unique ac herderite volutpatorca, pelletise in
                                        felis elemental fermentum lobotids effector mi. nula denim orca, so dales at
                                        ante dales ornate rises.”.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-3.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Jake Weary</h5>
                                            <span>Manager</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Lorem ipsum dolorArcu risus quis varius quam quisque id diam. mauris
                                        consectetur adipiscing elit, sed do eiusm commodo imperdiet”.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-4.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Indigo Violet</h5>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nunc valuate nil urn, id fermentum sem portico non volitant leafed lorem, quiz
                                        poseur ipsum aliquot a. Morbi urn unique ac herderite volutpatorca, pelletise in
                                        felis elemental fermentum lobotids effector mi. nula denim orca, so dales at
                                        ante dales ornate rises.”.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-5.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Eric Widget</h5>
                                            <span>IT Specialist</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Lorem ipsum dolorArcu risus quis varius quam quisque id diam. mauris
                                        consectetur adipiscing elit, sed do eiusm commodo imperdiet”.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    <div class="testimonial-admin">
                                        <div class="testimonial-admin-img">
                                            <img src="{{url('front-cms-styles/assets/img/testimonial/1/admin-6.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-admin-info">
                                            <h5>Tom Hack</h5>
                                            <span>UI Designer</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-rating">
                                        <ul>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nunc valuate nil urn, id fermentum sem portico non volitant leafed lorem, quiz
                                        poseur ipsum aliquot a. Morbi urn unique ac herderite volutpatorca, pelletise in
                                        felis elemental fermentum lobotids effector mi. nula denim orca, so dales at
                                        ante dales ornate rises.”.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="testimonial-scrollbar-wrap">
                    <div class="swiper-scrollbar testimonial-scrollbar"></div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- counter area start -->
        <div class="counter-area" hidden>
            <div class="container">
                <div class="counter-wrap">
                    <div class="row g-0">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="fa-thin fa-globe"></i>
                                </div>
                                <div class="counter-info">
                                    <h3 class="counter-info-title">
                                        <span class="odometer count_one" data-count="34">00</span>
                                        <span>k</span>
                                    </h3>
                                    <span class="counter-info-text">Foreign Followers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="fa-thin fa-book-open"></i>
                                </div>
                                <div class="counter-info">
                                    <h3 class="counter-info-title">
                                        <span class="odometer count_one" data-count="12">00</span>
                                        <span>k</span>
                                    </h3>
                                    <span class="counter-info-text">Classes complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="fa-thin fa-user-group"></i>
                                </div>
                                <div class="counter-info">
                                    <h3 class="counter-info-title">
                                        <span class="odometer count_one" data-count="214">00</span>
                                        <span>k</span>
                                    </h3>
                                    <span class="counter-info-text">Students Enrolled</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="fa-thin fa-medal"></i>
                                </div>
                                <div class="counter-info">
                                    <h3 class="counter-info-title">
                                        <span class="odometer count_one" data-count="56">00</span>
                                        <span>k</span>
                                    </h3>
                                    <span class="counter-info-text">Certified teachers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->

        <!-- blog area start -->
        <section class="blog-area pt-140 pb-110" hidden>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="testimonial-section-area text-center">
                            <div class="section-area mb-55 section-area-top">
                                <span class="section-subtitle">Our Blog</span>
                                <h2 class="section-title mb-20">Our Latest Articles</h2>
                                <p class="section-text">
                                    Through a combination of lectures, readings, discussions, students will gain a solid
                                    foundation in educational psychology.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="blog-wrap">
                            <div class="blog-item blog-item-h mb-30">
                                <div class="blog-img">
                                    <a href="blog-details.html"><img
                                            src="{{url('front-cms-styles/assets/img/blog/1/blog-1.jpg')}}" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-content-meta">
                                        <span><i class="fa-thin fa-user"></i>Admin</span>
                                        <span><i class="fa-thin fa-clock"></i>March 23, 2023</span>
                                    </div>
                                    <h5 class="blog-content-title"><a href="blog-details.html">Education Week News and
                                            Views on Education Policy and Practice.</a></h5>
                                    <a href="#" class="theme-btn blog-btn t-theme-btn">Read More</a>
                                </div>
                            </div>
                            <div class="blog-item blog-item-h mb-30">
                                <div class="blog-img">
                                    <a href="blog-details.html"><img
                                            src="{{url('front-cms-styles/assets/img/blog/1/blog-2.jpg')}}" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-content-meta">
                                        <span><i class="fa-thin fa-user"></i>Admin</span>
                                        <span><i class="fa-thin fa-clock"></i>April 23, 2023</span>
                                    </div>
                                    <h5 class="blog-content-title"><a href="blog-details.html">The Learning Network
                                            Teaching and Learning With The New York Times.</a></h5>
                                    <a href="#" class="theme-btn blog-btn t-theme-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog-item blog-item-v mb-30">
                            <div class="blog-img">
                                <a href="blog-details.html"><img
                                        src="{{url('front-cms-styles/assets/img/blog/1/blog-3.jpg')}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <span><i class="fa-thin fa-user"></i>Admin</span>
                                    <span><i class="fa-thin fa-clock"></i>June 23, 2023</span>
                                </div>
                                <h5 class="blog-content-title"><a href="blog-details.html">Only One Thing Impossible For
                                        God Find Sense in Any.</a></h5>
                                <a href="#" class="theme-btn blog-btn t-theme-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
    // Attach change event handlers to your dropdowns
    $('#subjectlistid, #gradelistid, #tminprice, #tmaxprice').on('change', function () {
        // Get form data
        var formData = $('#tutor-search').serialize();

        // Make an Ajax request to fetch updated data based on dropdown changes
        $.ajax({
            url: '{{ route("guest.tutorsindexsearch") }}', // Replace with your actual API endpoint
            method: 'POST',
            data: formData,
            success: function (data) {
                // Update only the content of the tutorListContainer
                $('#tutorListContainer').html(data.html);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    });
});
            </script>
            

@endsection
   