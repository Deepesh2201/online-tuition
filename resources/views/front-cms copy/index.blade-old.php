
@extends('layout.common.main')
@section('main-section')
    <div class="header-content ">
        <div class="row ">
            <div class="col-md-6">
                <p class="headerText">Achieve your goal with world's top tutor.</p>
                <p class="text-dark">Over <b class="">1 Millions</b> learners trust us for their
                    preparation.</p>
                <a class="btn btn-primary mb-4" href="#teacherSec"
                    >Search
                    Your Tutor</a>

                <a class="btn btn-primary mb-4" style="color: white" data-toggle="modal"
                    data-target="#registerModal">Request Demo</a>


            </div>
            <div class="col-md-6">
                <img src="images/home-illustration.svg" alt="app" width="600px" class="img-fluid ">
            </div>
        </div>
    </div>
    
    </div>
    
    </header>
    
    
    <section class="py-5 mb-5 popCourses">
        {{-- <div class="parallax"></div> --}}
        {{-- <div class="overlay-content">
            <div class="parallax overlay-lighten" style="background-image: url('images/populaeCourse.jpg'); height: 300px; width: 100%;">&nbsp;</div>
            <div class="overlay-text" style="width: 75%; min-width: 350px;">
                <h2 style="padding: 0 20px;">
                    <span style="font-size: 60pt; font-family: 'Architects Daughter', lato, 'Helvetica Neue', Helvetica, Arial, sans-serif; color: tomato;">Popular Subjects</span>
                </h2>
            </div>
        </div> --}}
        <div class="container" >
            
            <h2 class="section-title mb-5 ">Popular Subjects</h2>
          <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="../images/subjects/maths.webp" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title">Mathematics</h5>
                                    <p class="card-text"><b>Tutor: </b>Hazel</p>
                                     <button href="#!" class="btn btn-sm btn-primary"  onclick="viewSubject();">View</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="../images/subjects/chemistry.jpeg" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title">Chemistry</h5>
                                    <p class="card-text"><b>Tutor: </b>Ronald</p>
                                    <button href="#!" class="btn btn-sm btn-primary" >View</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="../images/subjects/physics.jpeg" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title">Physics</h5>
                                    <p class="card-text"><b>Tutor: </b>Jeffrey</p>
                                    <a href="#!" class="btn btn-sm btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="../images/subjects/computer.jpeg" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title">Computer</h5>
                                    <p class="card-text"><b>Tutor: </b>David</p>
                                    <a href="#!" class="btn btn-sm btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
           <div class="row mt-4">
             <div class="col-3 col-md-3 col-sm-3">
                <button class="btn btn-outline-primary">See All Subjects</button>
             </div>
           </div>
        </div>
    </section>
     {{-- <div class="overlay-content">
            <div class="parallax overlay-lighten" style="background-image: url('images/parallex3.jpg'); height: 300px; width: 100%;">&nbsp;</div>
            <div class="overlay-text" style="width: 75%; min-width: 350px;">
                <h2 style="padding: 0 20px;">
                    <span style="font-size: 60pt; font-family: 'Architects Daughter', lato, 'Helvetica Neue', Helvetica, Arial, sans-serif; color: tomato;">Popular Tutors</span>
                </h2>
            </div>
        </div> --}}

    {{-- teacher sec --}}
    <section class="py-5 mb-5 teacherSec" id="teacherSec">
        <div class="container">
             <h2 class="section-title mb-5">Popular Tutors</h2>
            <div class="row">
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="../images/faces/face1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Richard</h5>
                                    <p><b>Subject:</b> English</p>
                                    <p><b>Rate:</b> <span>&#163;</span>150/Hr</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                        <a href="tutorforguest.html" class="btn btn-primary mr-1">View</button>
                                        <a href="demo.html" class="btn btn-primary">Demo</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="../images/faces/face2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Hazel</h5>
                                    <p><b>Subject:</b> Mathematics</p>
                                    <p><b>Rate:</b> <span>&#163;</span>160/Hr</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <button class="btn btn-primary">View</button>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="../images/faces/face3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Christopher</h5>
                                    <p><b>Subject:</b> French</p>
                                    <p><b>Rate:</b> <span>&#163;</span>130/Hr</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="tutorsearchforvisitors" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="../images/faces/face4.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">David</h5>
                                    <p><b>Subject:</b> Computer</p>
                                    <p><b>Rate:</b> <span>&#163;</span>150/Hr</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="tutorsearchforvisitors" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
           <div class="row mt-4">
             <div class="col-3 col-md-3 col-sm-3">
                <button class="btn btn-outline-primary">See All Tutors</button>
             </div>
           </div>
        </div>
    </section>
   
    <section class="py-5 mb-5">
        <div class="container-fluide">
            <div class="container">
                <h2 class="section-title">Satisfied Users</h2>
                <p class="text-muted mb-5">Thank you for your very professional and prompt response. I wished I had
                    found
                    you before </p>
                <div class="carousel-container">
                    <div class="carousel">

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 1</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 2</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 2</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 2</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 2</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="contentBox">
                            <div class="foi-review">
                                <div class="foi-rating">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                </div>
                                <h5 class="foi-review-heading">Great support available 2</h5>
                                <p class="foi-review-content">Thank you for your very professional and prompt response.
                                    I
                                    wished I
                                    had found you before I spent money on a competitors theme.</p>
                                <div class="media foi-review-user">
                                    <img src="images/avatar/avatar_13.jpg" alt="user" class="avatar">
                                    <div class="media-body">
                                        <h6 class="mb-0">Monica Böttger</h6>
                                        <p>UX Designer</p>
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div>
                    <!-- Add more testimonial divs as needed -->

                    <button class="carousel-button prev-btn" onclick="moveCarousel(-1)"><i class="fa fa-angle-left"></i>
                    </button>
                    <button class="carousel-button next-btn" onclick="moveCarousel(1)"><i
                            class="fa fa-angle-right"></i></button>



                </div>
            </div>
        </div>
    </section>

  
    <section class="py-5 mb-5">
        <div class="container">
            <h2 class="section-title">FAQ</h2>
            <p class="section-subtitle">Frequently Asked Questions</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqOneTitle">
                            <a href="#faqOneCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">What is Foi app?</h6> <i class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqOneCollapse" class="collapse" aria-labelledby="faqOneTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqTwoTitle">
                            <a href="#faqTwoCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Why should I use Foi app?</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqTwoCollapse" class="collapse" aria-labelledby="faqTwoTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqThreeTitle">
                            <a href="#faqThreeCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">How can I use Foi app?</h6> <i class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqThreeCollapse" class="collapse" aria-labelledby="faqThreeTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqFourTitle">
                            <a href="#faqFourCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Who will see my updates?</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqFourCollapse" class="collapse" aria-labelledby="faqFourTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqFiveTitle">
                            <a href="#faqFiveCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Can people see my connections?</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqFiveCollapse" class="collapse" aria-labelledby="faqFiveTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqSixTitle">
                            <a href="#faqSixCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Being a user, what all rights I have?</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqSixCollapse" class="collapse" aria-labelledby="faqSixTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="foi-footer text-white">
        <div class="container">
            <div class="row footer-content">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <a href="contact.html" class="btn btn-danger btn-lg">Contact form</a>
                </div>
            </div>
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3">
                        <img src="images/logo-white.svg" alt="FOI">
                    </div>
                    <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                    <div>
                        <button class="btn btn-app-download mr-2"><img src="images/ios.svg" alt="App store"></button>
                        <button class="btn btn-app-download"><img src="images/android.svg" alt="play store"></button>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My tasks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Activity</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Careers <span
                                        class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Shop with us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; foi. 2020 <a href="https://www.bootstrapdash.com/" target="_blank"
                            rel="noopener noreferrer" class="text-reset">BootstrapDash</a>.
                    </p>
                    <p>All rights reserved.</p>
                    <nav class="social-menu">
                        <a href="#!"><img src="images/facebook.svg" alt="facebook"></a>
                        <a href="#!"><img src="images/instagram.svg" alt="instagram"></a>
                        <a href="#!"><img src="images/twitter.svg" alt="twitter"></a>
                        <a href="#!"><img src="images/youtube.svg" alt="youtube"></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <!-- Register modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" name="studentRegis" id="studentRegis">Student Registration</h3>
                    <h3 hidden class="modal-title" name="studentRegis" id="tutorRegis">Tutor Registration</h3>
                </div>

                <div class="modal-body">
                    <!-- <div class="row d-flex justify-content-center align-items-center "> -->
                    <div class="col">
                        <div class="card-registration">
                            {{-- <div class="row g-0"> --}}
                            {{-- <div class="col-xl-6 d-none d-xl-block">
                                    <img src="images/Register.png" style="margin-top: 150px;" alt="Sample photo"
                                        class="img-fluid"
                                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div> --}}
                            {{-- <div class="col-xl-6"> --}}
                            <div class="card-body text-black">
                                @if (Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if (Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                <form action="{{Route('studenttutorregistration')}}" method="POST" id="regisForm">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="id" name="id" value="1" class="form-group">
                                        <div class="col-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="name">Name<i style="color:red">*</i></label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Name" required>
                                                        <span class="text-danger">
                                                            @error('name')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6" id="classdiv">
                                            <div class="form-group">
                                                <label>Class<i style="color:red">*</i></label>
                                                <select type="text" class="form-control" id="class" name="class">
                                                   <option value="">Select Class</option>
                                                    @foreach($classes as $classes)
                                                    <option value="{{$classes->id}}"
                                                    
                                                    >
                                                    {{$classes->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('class')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6" id="studentmobdiv">
                                            <div class="form-group">
                                                <label for="inputAddress">Mobile<i style="color:red">*</i></label>
                                                <input type="text" class="form-control" id="studentmobile" name="studentmobile"
                                                    placeholder="Mobile">
                                                    <span class="text-danger">
                                                        @error('studentmobile')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12" hidden id="tutorMobDiv">
                                            <div class="form-group">
                                                <label for="inputAddress">Mobile<i style="color:red">*</i></label>
                                                <input type="text" class="form-control" id="tutormobile"
                                                    name="tutormobile" placeholder="Mobile">
                                                    <span class="text-danger">
                                                        @error('tutormobile')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                        </div>


                                        <div class="col-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="inputAddress2">Email<i style="color:red">*</i></label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="example@email.com" required>
                                                    <span class="text-danger">
                                                        @error('email')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="inputAddress2">Password<i style="color:red">*</i></label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Enter Password" required>
                                                    <span class="text-danger">
                                                        @error('password')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="inputAddress2">Confirm Password<i
                                                        style="color:red">*</i></label>
                                                <input type="password" class="form-control" id="confirmpassword"
                                                    name="confirmpassword" placeholder="Enter Password" required>
                                                    <span class="text-danger">
                                                        @error('confirmpassword')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                        </div>



                                    </div>

                                    <div>
                                        <a href="#" id=regisAsTutor onclick="changeRegisToTutor();">Register as
                                            tutor</a>
                                        <a href="#" id=regisAsStudent onclick="regisToStudent();" hidden>Register as
                                            student</a>
                                    </div>


                                    <div class="d-flex justify-content-end pt-3  regisBtn">

                                        <button type="button" class="btn btn-secondary btn-lg mr-1"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit"
                                            class="btn btn-warning btn-lg ms-2">Register</button>
                                    </div>
                                </form>



                                {{-- </div> --}}
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <!-- </div> -->

                    <!-- <div class="modal-body">
                            <p>Already have an acocunt? <a href="#">Login</a></p>
                        </div> -->
                </div>
            </div>
        </div>
    </div>

   

    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <div class="text-center mt-4">
                    <h3 class="modal-title" name="studentLogin" id="studentLogin">Login</h3>
                    {{-- <h3 hidden class="modal-title" name="tutorLogin" id="tutorLogin">Tutor Login</h3> --}}
                </div>
                <div class="modal-body">
                    <form action="{{url('/login')}}" method="GET" class="loginForm">
                        @csrf
                        <input type="hidden" id="loginid" name="loginid" value="1">
                        <div class="row">
                            <div class="col-6 col-md-6 col-sm-6">
							<div class="imgBorder selectable p-1" onclick="toggleSelection(this); loginToStudent();">
                               
								<img src="images/student.png">
                                 <i class="fa fa-check-circle" style="float: right;"></i>
								
							</div>
                            <p class="text-center">Student</p>

						</div>
						<div class="col-6 col-md-6 col-sm-6">
							<div class="imgBorder selectable p-1" onclick="toggleSelection(this); loginToTutor();">
								<img src="../images/teacher.png">
                                 <i class="fa fa-check-circle" style="float: right;"></i>
								
							</div>
                             <p class="text-center">Tutor</p>

						</div>
						

					</div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Mobile<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Mobile" required>
                                <span class="text-danger">
                                    @error('username')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="password">Password<i style="color:red">*</i></label>
                            <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required>
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            {{-- <a href="#" id="loginAsTutor" onclick="loginToTutor();">Login as tutor</a>
                            <a href="#" id="loginAsStudent"  onclick="loginToStudent();" hidden>Login as student</a>                        --}}
                            <button role="button" type="submit" class="btn btn-success text-white float-right">Login</button>
                            <button type="submit" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="xloginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <div class="modal-header">
                    <h3 class="modal-title" name="studentLogin" id="studentLogin">Student Login</h3>
                    <h3 hidden class="modal-title" name="tutorLogin" id="tutorLogin">Tutor Login</h3>
                </div>
                <div class="modal-body">
                    <form action="{{url('/login')}}" method="GET">
                        @csrf
                        <input type="hidden" id="loginid" name="loginid" value="1">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Mobile<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Mobile" required>
                                <span class="text-danger">
                                    @error('username')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="password">Password<i style="color:red">*</i></label>
                            <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required>
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <a href="#" id="loginAsTutor" onclick="loginToTutor();">Login as tutor</a>
                            <a href="#" id="loginAsStudent"  onclick="loginToStudent();" hidden>Login as student</a>                       
                            <button role="button" type="submit" class="btn btn-primary text-white float-right">Login</button>
                            <button type="submit" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="viewSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Syllabus</h3>
                   
                </div>
                <div class="modal-body">
                     <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqOneTitle">
                            <a href="#faqOneCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Real Number</h6> <i class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqOneCollapse" class="collapse" aria-labelledby="faqOneTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Real Number&#44;&nbsp; Euclids division lemma and problems on it complete&#44;&nbsp; Finding HCF prime-factorization method&#44;&nbsp;Decimal expansion of rational and irrational number with ncert solutions &#44;&nbsp;Without actually dividing finding the decimal expansion of rational number.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqTwoTitle">
                            <a href="#faqTwoCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Pair of linear equation in two variables</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqTwoCollapse" class="collapse" aria-labelledby="faqTwoTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Introduction and pre requisite of Pair of linear equation in two variables&#44;&nbsp; substitution method and elimination method &#44;&nbsp;Solving by cross multiplication method&#44;&nbsp;Graphical method and some problems of reducible form.</p>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqFourTitle">
                            <a href="#faqFourCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Polynomials</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqFourCollapse" class="collapse" aria-labelledby="faqFourTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Introduction to polynomials, zeroes of the polynomials (relations ship b/w zeroes and coefficient), Polynomial division</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 landing-faq-card">
                        <div class="card-header bg-white" id="faqFiveTitle">
                            <a href="#faqFiveCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h6 class="mb-0">Quadratic Equation</h6> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="faqFiveCollapse" class="collapse" aria-labelledby="faqFiveTitle">
                            <div class="card-body">
                                <p class="mb-0 text-gray">Introduction of quadratic equation and pre- requisite, solving by factorization method, Nature of the roots, Solving by quadratic formula and completing square method.</p>
                            </div>
                        </div>
                    </div>
                  
                    
                </div>
              
            </div>


               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
                <!-- <div class="modal-body">
                        <p>Don't have an acocunt? <a onclick="registerModalShow();">Register</a></p>
                    </div> -->
            </div>
        </div>
    </div>

   
    <script>
        function loginToTutor(){
            document.getElementById("loginid").value=2;  
        }
        function loginToStudent(){
            document.getElementById("loginid").value=1;
        }
        function changeRegisToTutor() {
            document.getElementById("classdiv").hidden = true;
            document.getElementById("studentRegis").hidden = true;
            document.getElementById("tutorRegis").hidden = false;
            document.getElementById("regisAsTutor").hidden = true;
            document.getElementById("regisAsStudent").hidden = false;
            document.getElementById("tutorMobDiv").hidden = false;
            document.getElementById("studentmobdiv").hidden = true;
            document.getElementById("id").value = 2;
        }

        function regisToStudent() {
            document.getElementById("classdiv").hidden = false;
            document.getElementById("studentRegis").hidden = false;
            document.getElementById("tutorRegis").hidden = true;
            document.getElementById("regisAsTutor").hidden = false;
            document.getElementById("regisAsStudent").hidden = true;
            document.getElementById("tutorMobDiv").hidden = true;
            document.getElementById("studentmobdiv").hidden = false;
            document.getElementById("id").value = 1;
        }

        var loginType = "";
        $(document).ready(function() {
            if (document.getElementById("logInToggleBTN").checked == false) {
                loginType = 1;
            }
        });


        function getSwitchId() {
            if (document.getElementById("logInToggleBTN").checked == true) {
                loginType = 0
            }

            if (document.getElementById("logInToggleBTN").checked == false) {
                loginType = 1;
            }
        }

        function redirect() {
            if (loginType == 0) {
                window.location.href = "{{ URL::to('studentDashboard') }}";
            }

            if (loginType == 1) {
                window.location.href = "tutorDashboard.html";
            }
        }
        
    
         function viewSubject(){
            $("#viewSub").modal("show");

        }

        // slide

        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },

            breakpoints:{
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

    <script>
        let currentIndex = 0;

        function moveCarousel(direction) {
            const testimonials = document.querySelectorAll('.contentBox');
            const totalTestimonials = testimonials.length;
            currentIndex += direction;

            // Wrap around if it reaches the end or beginning of testimonials
            if (currentIndex >= totalTestimonials) {
                currentIndex = 0;
            } else if (currentIndex < 0) {
                currentIndex = totalTestimonials - 1;
            }

            const carousel = document.querySelector('.carousel');
            const offset = currentIndex * -33.33; // Adjust this value to control the width of each testimonial
            carousel.style.transform = `translateX(${offset}%)`;
        }

        // Get all the selectable divs
        const selectableDivs = document.querySelectorAll('.selectable');

        // Select the first div by default
        selectableDivs[0].classList.add('selected');

        function toggleSelection(div) {
            // If the clicked div is already selected, do nothing
            if (div.classList.contains('selected')) {
                return;
            }

            // Remove 'selected' class from all other divs
            selectableDivs.forEach(item => {
                item.classList.remove('selected');
            });

            // Add 'selected' class to the clicked div
            div.classList.add('selected');
            

        }



    </script>

    
@endsection

   