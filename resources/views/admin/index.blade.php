<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Tutor Landing Page</title>
    <link rel="stylesheet" href="vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <!-- <link rel="stylesheet" href="css/custom.css" /> -->

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
</head>

<body>
    <header class="foi-header landing-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="index.html">
                    <img src="images/onlineTutor_logo.png" width="150px" height="40px" alt="FOI"
                        style="margin-top: -30px;">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.html">Features</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item mr-2 mb-3 mb-lg-0">
                            <a class="btn bg-white" data-toggle="modal" data-target="#registerModal">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn bg-white" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="header-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Achieve your goal with world's top tutor.</h1>
                        <p class="text-dark">Over <b class="">1 Millions</b> learners trust us for their
                            preparation.</p>
                        <a class="btn mb-4" href="{{url('tutorsearchforvisitors')}}"
                            style="background-color: #620ca8; color: white;">Search
                            Your Tutor</a>

                        <a class="btn mb-4" style="background-color: #620ca8; color: white;" data-toggle="modal"
                            data-target="#registerModal">Request Demo</a>


                    </div>
                    <div class="col-md-6">
                        <img src="images/app_1.png" alt="app" width="388px" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5 mb-5">
        <div class="container">
            <h2 class="section-title">Application Features</h2>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Secure Data</h5>
                    <p class="text-dark">No matter what kind of home you have to share, you can increase your earnings.
                    </p>
                    <p class="mb-5"><a href="#!" class="text-primary mb-5">Find out More</a></p>
                    <h5>Fully functional</h5>
                    <p class="text-dark">No matter what kind of home you have to share, you can increase your earnings.
                    </p>
                    <p class="mb-5"><a href="#!" class="text-primary mb-5">Find out More</a></p>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <h5>Live Chat</h5>
                    <p class="text-dark">No matter what kind of home you have to share, you can increase your earnings.
                    </p>
                    <p class="mb-5"><a href="#!" class="text-primary mb-5">Find out More</a></p>
                    <h5>Powerful dashboard</h5>
                    <p class="text-dark">No matter what kind of home you have to share, you can increase your earnings.
                    </p>
                    <p class="mb-5"><a href="#!" class="text-primary mb-5">Find out More</a></p>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-gray font-os font-weight-semibold">Trusted by the world's best</h6>
                    <div id="landingClientCarousel" class="carousel slide landing-client-carousel" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="d-flex flex-wrap justify-content-center">
                                    <div class="clients-logo">
                                        <img src="images/clients/slack.svg" alt="Slack" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/spotify.svg" alt="Spotify" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/paypal.svg" alt="Paypal" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/amazon.svg" alt="Amazon" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/google.svg" alt="Google" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/samsung.svg" alt="Samsung" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex flex-wrap justify-content-center">
                                    <div class="clients-logo">
                                        <img src="images/clients/slack.svg" alt="Slack" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/spotify.svg" alt="Spotify" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/paypal.svg" alt="Paypal" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/amazon.svg" alt="Amazon" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/google.svg" alt="Google" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/samsung.svg" alt="Samsung" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex flex-wrap justify-content-center">
                                    <div class="clients-logo">
                                        <img src="images/clients/slack.svg" alt="Slack" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/spotify.svg" alt="Spotify" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/paypal.svg" alt="Paypal" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/amazon.svg" alt="Amazon" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/google.svg" alt="Google" class="img-fluid">
                                    </div>
                                    <div class="clients-logo">
                                        <img src="images/clients/samsung.svg" alt="Samsung" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#landingClientCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#landingClientCarousel" data-slide-to="1"></li>
                            <li data-target="#landingClientCarousel" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <img src="images/app_2.png" alt="special offers" class="img-fluid" width="492px">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Get special offers on the things you love</h2>
                    <p class="mb-5">He has led a remarkable campaign, defying the traditional mainstream parties
                        courtesy of his En Marche! movement. For many, however, the campaign has become less about
                        backing Macron and instead about voting against Le Pen, the National Front candidate.</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="media landing-feature">
                                <span class="landing-feature-icon"></span>
                                <div class="media-body">
                                    <h5>Essentials</h5>
                                    <p>All the basics for businesses that are just getting started.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="media landing-feature">
                                <span class="landing-feature-icon"></span>
                                <div class="media-body">
                                    <h5>Premium</h5>
                                    <p>All the basics for businesses that are just getting started.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="media landing-feature">
                                <span class="landing-feature-icon"></span>
                                <div class="media-body">
                                    <h5>Standard</h5>
                                    <p>All the basics for businesses that are just getting started.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>Choose the plan that’s right for yor business</h2>
            <p class="text-muted mb-5">Thank you for your very professional and prompt response. I wished I had found
                you before </p>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card pricing-card border-warning">
                        <div class="card-body">
                            <h3 class="mb-1">Starter</h3>
                            <h3 class="mb-1 text-warning">Free</h3>
                            <p class="payment-period">Per month</p>
                            <p class="mb-4">Thank you for your very professional and prompt response.</p>
                            <button class="btn btn-outline-warning btn-rounded">Get Started</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card pricing-card border-primary active">
                        <div class="card-body">
                            <h3>Popular</h3>
                            <h3 class="text-primary">$23.00</h3>
                            <p class="payment-period">Per month</p>
                            <p class="mb-4">Thank you for your very professional and prompt response.</p>
                            <button class="btn btn-primary btn-rounded">Get Started</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card pricing-card border-success">
                        <div class="card-body">
                            <h3>Enterprise</h3>
                            <h3 class="text-success">$40.00</h3>
                            <p class="payment-period">Per month</p>
                            <p class="mb-4">Thank you for your very professional and prompt response.</p>
                            <button class="btn btn-outline-success btn-rounded">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>Satisfied Users</h2>
            <p class="text-muted mb-5">Thank you for your very professional and prompt response. I wished I had found
                you before </p>
            <div class="row">
                <div class="col-md-4 foi-review mb-5 mb-md-0">
                    <div class="foi-rating">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                    </div>
                    <h5 class="foi-review-heading">Great support available</h5>
                    <p class="foi-review-content">Thank you for your very professional and prompt response. I wished I
                        had found you before I spent money on a competitors theme.</p>
                    <div class="media foi-review-user">
                        <img src="images/avatar/avatar_11.jpg" alt="user" class="avatar">
                        <div class="media-body">
                            <h6 class="mb-0">Amarachi Nkechi</h6>
                            <p>UX Designer</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 foi-review mb-5 mb-md-0">
                    <div class="foi-rating">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                    </div>
                    <h5 class="foi-review-heading">Great support available</h5>
                    <p class="foi-review-content">Thank you for your very professional and prompt response. I wished I
                        had found you before I spent money on a competitors theme.</p>
                    <div class="media foi-review-user">
                        <img src="images/avatar/avatar_12.jpg" alt="user" class="avatar">
                        <div class="media-body">
                            <h6 class="mb-0">Margje Jutten</h6>
                            <p>Developer</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 foi-review mb-5 mb-md-0">
                    <div class="foi-rating">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                    </div>
                    <h5 class="foi-review-heading">Great support available</h5>
                    <p class="foi-review-content">Thank you for your very professional and prompt response. I wished I
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
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>FAQ</h2>
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
                        <button class="btn btn-app-download mr-2"><img src="images/ios.svg"
                                alt="App store"></button>
                        <button class="btn btn-app-download"><img src="images/android.svg"
                                alt="play store"></button>
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
                    {{-- <a href="#" id=regisAsTutor>Register as tutor</a>
                    <a href="#" id=regisAsStudent hidden>Register as student</a> --}}
                </div>
               
                <div class="modal-body">
                    <!-- <div class="row d-flex justify-content-center align-items-center "> -->
                    <div class="col">
                        <div class="card card-registration">
                            {{-- <div class="row g-0"> --}}
                                {{-- <div class="col-xl-6 d-none d-xl-block">
                                    <img src="images/Register.png" style="margin-top: 150px;" alt="Sample photo"
                                        class="img-fluid"
                                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div> --}}
                                {{-- <div class="col-xl-6"> --}}
                                    <div class="card-body text-black">

                                        <form action="" method="POST" id="regisForm">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="name">Name<i style="color:red">*</i></label>
                                                            <input type="text" class="form-control" id="name" id="name"
                                                                placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-sm-6" id="classdiv">
                                                    <div class="form-group"  >
                                                        <label>Class<i style="color:red">*</i></label>
                                                        <select type="text" class="form-control" id="class" required>
                                                            <option>--Select--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-sm-6" id="studentmobdiv" >
                                                    <div class="form-group">
                                                        <label for="inputAddress">Mobile<i style="color:red">*</i></label>
                                                        <input type="text" class="form-control" id="mobile"
                                                            placeholder="Mobile" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12 col-sm-12" hidden id="tutorMobDiv"> 
                                                    <div class="form-group">
                                                        <label for="inputAddress">Mobile<i style="color:red">*</i></label>
                                                        <input type="text" class="form-control" id="tutormobile" name="tutormobile"
                                                            placeholder="Mobile" required>
                                                    </div>
                                                </div>
                                                   

                                                <div class="col-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Email<i style="color:red">*</i></label>
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="example@email.com" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Password<i style="color:red">*</i></label>
                                                        <input type="text" class="form-control" id="pswd" name="pswd"
                                                            placeholder="Enter Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Confirm Password<i style="color:red">*</i></label>
                                                        <input type="text" class="form-control" id="confpswd" name="confpswd"
                                                            placeholder="Enter Password" required>
                                                    </div>
                                                </div>



                                            </div>
                                        
                                            <div>
                                                <a href="#" id=regisAsTutor onclick="changeRegisToTutor();">Register as tutor</a>
                                                <a href="#" id=regisAsStudent  onclick="regisToStudent();" hidden>Register as student</a>
                                            </div>


                                           <div class="d-flex justify-content-end pt-3  regisBtn">

                                            <button type="button" class="btn btn-secondary btn-lg mr-1"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{url('otpverification')}}" type="button" class="btn btn-warning btn-lg ms-2"
                                                >Register</a>
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


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Login</h3>
                    <div class="float-right">
                        <input type="checkbox" loginType data-width="120" id="logInToggleBTN" checked
                            data-toggle="toggle" data-on="STUDENT" data-off="TUTOR" data-onstyle="success"
                            data-offstyle="primary" onchange="getSwitchId();">
                    </div>
                </div>
                <div class="modal-body">


                    <form>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Username<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="username" placeholder="Mobile">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="password">Password<i style="color:red">*</i></label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a role="button" type="button" class="btn btn-primary text-white" onclick="redirect();">Login</a>

                </div>
                <!-- <div class="modal-body">
                        <p>Don't have an acocunt? <a onclick="registerModalShow();">Register</a></p>
                    </div> -->
            </div>
        </div>
    </div>

    <script>
        

       function changeRegisToTutor(){
            document.getElementById("classdiv").hidden=true;
            document.getElementById("studentRegis").hidden=true;
            document.getElementById("tutorRegis").hidden=false;
            document.getElementById("regisAsTutor").hidden=true;
            document.getElementById("regisAsStudent").hidden=false;
            document.getElementById("tutorMobDiv").hidden=false;
            document.getElementById("studentmobdiv").hidden=true;
        }

         function regisToStudent(){
            document.getElementById("classdiv").hidden=false;
            document.getElementById("studentRegis").hidden=false;
            document.getElementById("tutorRegis").hidden=true;
            document.getElementById("regisAsTutor").hidden=false;
            document.getElementById("regisAsStudent").hidden=true;
            document.getElementById("tutorMobDiv").hidden=true;
            document.getElementById("studentmobdiv").hidden=false;

            

        }

       
        
        
        









        var loginType = "";

        $(document).ready(function () {
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
                window.location.href = "{{URL::to('studentDashboard')}}";
            }

            if (loginType == 1) {
                window.location.href = "tutorDashboard.html";
            }
        }

    </script>

    <script src="vendors/jquery/jquery.min.js"></script>
    <script src="vendors/popper.js/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/bootstrap.bundle.multi.toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>
</html>