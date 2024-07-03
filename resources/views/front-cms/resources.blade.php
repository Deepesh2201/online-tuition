@extends('front-cms.layouts.main')
@section('main-section')
    <!-- END header -->
    <section class="bannerSec tutBann">
        <div class="container-fluid">
            <div class="tutorHeader">
                <h1 class="mb-3">
                    Explore Our Resources
                </h1>

                <div class="text-center">
                    <p class="charcol">Stay informed with our expertly written articles.</p>

                </div>

            </div>
        </div>

    </section>
    <!-- tutor section -->
    <section class="mt-5">
        <div class="container ">
            <div class="resourcesTop">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="resourcesBottom">
                        <h4>Featured</h4>
                        <h1>Blogs</h1>
                        <br>
                        <br>
                        <div class="freeClassBtn">
                          <button class="btn search-tutor" onclick="redirect();">Free Trial Class</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
           



            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="blog-card">
                        <img  src="{{ url('frontendnew/img/blog-img-1.png') }}" width="100%" alt="">
                        <div class="blogDetails">
                            <span class="feature">
                                Featured | Student
                                <span>
                                    <h5 class="my-2">Tips and Tricks to design a revision timetable for GCSE</h5>
                                    <p class="bDesc">Education is the best investment one can make in their children’s
                                        lives.</p>
                                    <a href="resources_main.html">
                                        Read more
                                    </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="blog-card">
                        <img src="{{ url('frontendnew/img/blog-img-1.png') }}" width="100%" alt="">
                        <div class="blogDetails">
                            <span class="feature">
                                Featured | Student
                                <span>
                                    <h5 class="my-2">Tips and Tricks to design a revision timetable for GCSE</h5>
                                    <p class="bDesc">Education is the best investment one can make in their children’s
                                        lives.</p>
                                    <a href="resources_main.html">
                                        Read more
                                    </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="blog-card">
                    <img src="{{ url('frontendnew/img/blog-img-1.png') }}" width="100%" alt="">
                        <div class="blogDetails">
                            <span class="feature">
                                Featured | Student
                                <span>
                                    <h5 class="my-2">Tips and Tricks to design a revision timetable for GCSE</h5>
                                    <p class="bDesc">Education is the best investment one can make in their children’s
                                        lives.</p>
                                    <a href="resources.html">
                                        Read more
                                    </a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            function redirect(){
                window.location.href = "{{('/student/register')}}";
            }

        </script>

        </div>

    </section>
@endsection
