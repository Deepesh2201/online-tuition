@extends('front-cms.layouts.main')
@section('main-section')
    <!-- END header -->
    <section class="bannerSec tutBann">
        <div class="container-fluid">
            <div class="tutorHeader">
                <h1 class="mb-3">
                    Let our tutors worry about your
                </h1>

                <div class="text-center">
                    <p class="charcol">grades while you sit back and study</p>

                </div>

            </div>
        </div>

    </section>


    <section class="howitwork-sec2">
        <div class="container">


            <div class="row my-5">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                    <div class="resource-left">

                        <h3>How it works </h3>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="how-card card1" style="width: 60%;">
                        <h2>Find the best tutor</h2>
                        <div style="width: 60%;">
                            <p class="mt-4">MCT offers a selection of in-house trained tutors to elevate your academic
                                career. Explore tutors’ profiles, filter them based on reviews, video testimonials, and
                                availability.</p>
                        </div>

                    </div>
                    <div class="imgNumber1">
                        <img class="shaddow-shape1" src="{{url('frontendnew/img/icons/Vector 1.png')}}" alt="">
                        <img class="numbr11" src="{{url('frontendnew/img/icons/one.png')}}" alt="">
                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="how-card card2 " style="width: 60%; float: right;">
                        <h2>Connect with the tutor</h2>
                        <div style="width: 60%;">
                            <p class="mt-4">MCT embraces a connection-first strategy, offering students the option to
                                book a free trial class with tutors. This presents an excellent opportunity for both
                                students and tutors to familiarise themselves.</p>
                        </div>



                    </div>
                    <div class="imgNumber2">
                        <img class="shaddow-shape2" src="{{url('frontendnew/img/icons/Vector 2.png')}}" alt="">
                        <img class="numbr22" src="{{url('frontendnew/img/icons/two.png')}}" alt="">
                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-top: 90px;">
                    <div class="how-card card3" style="width: 60%;">
                        <h2>Access course material</h2>
                        <div style="width: 60%;">
                            <p class="mt-4">At MCT, we go beyond the basics. When it comes to your grades and
                                learning, we take that extra step. Our platform automatically records your sessions,
                                enabling you to revisit, rethink, and reinforce concepts. </p>
                        </div>
                    </div>
                    <div class="imgNumber3">
                        <img class="shaddow-shape3" src="{{url('frontendnew/img/icons/Vector 3.png')}}" alt="">
                        <img class="numbr33" src="{{url('frontendnew/img/icons/three.png')}}" alt="">
                    </div>
                </div>
            </div>













        </div>

    </section>




    <section>
        <div class="subj-bottom-banner">

            <div class="row">
                <div class="col-md-6 banncol">



                    <div class="bannText">
                        <h2>Is MCT the right fit for you?<br>
                            There is only one way to find out.</h2>

                        <a href="/student/register"><button class="orange-btn">Register Now</button></a>
                    </div>

                </div>
                <div class="col-md-6">
                    <img src="{{url('frontendnew/img/subj-bann-img.png')}}" alt="">
                </div>
            </div>

        </div>



    </section>
@endsection