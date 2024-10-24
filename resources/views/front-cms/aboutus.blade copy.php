@extends('front-cms.layouts.main')
@section('main-section')
    <section class="bannerSec tutBann">
        <div class="container-fluid">
            <div class="tutorHeader">
                <h1 class="mb-5">
                    Exceptional tutoring at <br>an affordable price
                </h1>

                <div class="text-center">
                    <div class="abc">
                        <div class="flex-container">
                            <div class="charcol">One free trial class<span class="px-2">- </span></div>
                            <div class="charcol">One-on-one lessons<span class="px-2">- </span></div>
                            <div class="charcol">Flexible scheduling<span class="px-2">-</span></div>
                            <div class="charcol">Lecture Recording</div>
                        </div>
                    </div>
                  <a href="/findatutor">  <button class="btn search-tutor mt-4">Book free trial class today</button></a>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- tutor section -->
    <section class="tutor-section">
        <div class="container ">

            <div class="row whyChooseUsTop">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="whyChooseUsCol">
                        <h3>Why choose us?</h3>
                        <p class="charcol">Education is the best investment one can make in their children’s lives. It’s
                            crucial to be well-informed before selecting tutors and the type of tutoring they receive.
                        </p>

                    </div>

                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 getstartedBtnPosition">
                    <div class="whyChooseUsCol">
                     <a href="student/register">   <button>Get started</button></a>
                    </div>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="Bg_purple">
                        <div class="p-5">
                            <h3>One free trial Class</h3>

                            <p>MCT offers the option to book a free trial class before committing to a tutor. This
                                allows you to familiarize yourself with the tutor’s teaching style. Students typically
                                spend this free trial class planning lessons, identifying weak areas to address, and
                                discussing various strategies to improve grades in any subject.</p>
                        <a href="findatutor">    <button class="btn search-tutor">Book now</button></a>

                        </div>
                        
                        <img src="{{ url('frontendnew/img/OnefretrialClass.png') }}" width="100%" alt="">
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="boeder_Bg">
                                <div class="p-5">
                                    <h3>Flexible scheduling</h3>

                                    <p class="charcol">MCT offers the option to book a free trial class before
                                        committing to a tutor. This allows you to familiarize yourself with the tutor’s
                                        teaching style. Students typically spend this free trial class planning lessons,
                                        identifying weak areas to address, and discussing various strategies to improve
                                        grades in any subject.</p>


                                </div>


                            </div>
                        </div>

                        <div class="col-12">
                            <div class="boeder_Bg">
                                <div class="p-5">
                                    <h3>Engage and Excel with Our Lecture Recordings!</h3>

                                    <p class="charcol">MCT offers the option to book a free trial class before
                                        committing to a tutor. This allows you to familiarize yourself with the tutor’s
                                        teaching style. Students typically spend this free trial class planning lessons,
                                    </p>

                                </div>
                                <img src="{{ url('frontendnew/img/Engage_and_Excel.png') }}" width="100%" alt="">
                                
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="boeder_Bg">
                        <div class="p-5">
                            <h3>One-on-one lessons</h3>

                            <p class="charcol">MCT offers the option to book a free trial class before committing to a
                                tutor. This allows you to familiarize yourself with the tutor’s teaching style. Students
                                typically spend this free trial class planning lessons, identifying weak areas to
                                address, and discussing various strategies to improve grades in any subject.</p>

                        </div>
                        <img src="{{ url('frontendnew/img/One-on-one-lessons.png') }}" width="100%" alt="">
                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
