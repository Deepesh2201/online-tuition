@extends('front-cms.layouts.main')
@section('main-section')

        <section>
            <div class="container">
                <img src="images/banner300.jpg" alt="">
            </div>
        </section>

        <!-- how does it work -->
        <section class=" pt-90 pb-90 a ">
            <img src="{{url('front-cms-styles/assets/img/about/3/shape-5.png')}}" alt="" class="h3_about-top-shape">
            <div class="container">
                <h2 class="section-title mb-20 text-center">How It Works - find your perfect tutor online</h2>
                <p class="text-center">Request tutor, Then easily schedule demo class and pay for online and recorded
                    classes.</p>
                <div class="row align-items-center mt-5">
                    <div class="col-xl-3 col-lg-3 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/icons8-school-director-64.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Click Find A Tutor</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/chooseTutor.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Choose Your Tutor</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 hiwCol">
                        <div class="hiwImg">
                            <img src="images/icons/schedule.png" alt="">
                        </div>
                        <div class="belowArea">
                            <h5>Schedule Demo Class</h5>
                            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document</p>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-3 hiwCol">
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
@endsection