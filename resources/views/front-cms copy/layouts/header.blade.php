<!Doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Tutor</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/images/MCTfavicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/main.css')}}">
</head>

<body>
    <!-- sidebar-information-area-start -->
    <div class="sidebar-info side-info">
        <div class="sidebar-logo-wrapper mb-25">
            <div class="row align-items-center">
                <div class="col-xl-6 col-8">
                    <div class="sidebar-logo">
                        <a href="/"><img src="images/MCT Logo.png" width="120px" alt="logo-img"></a>
                        <!-- <span style="font-size: 30px; font-weight: 900; color: lightgray;">Logo</span> -->
                    </div>
                </div>
                <div class="col-xl-6 col-4">
                    <div class="sidebar-close-wrapper text-end">
                        <button class="sidebar-close side-info-close"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrapper fix">
            <div class="mobile-menu"></div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- sidebar-information-area-end -->

    <!-- header area start -->
    <header>
        <div class="header-area header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class=" col-lg-8 col-md-8 col-6 col-sm-6">
                        <div class="header-left">
                            <div class="header-logo float-left mr-1">
                                <a href="/"><img src="images/MCtWebsitelogo.png" width="140px" alt=""></a>
                            </div>

                            <nav class="main-menu mobile-menu d-none d-xl-block" id="mobile-menu">
                                <ul>
                                    <li class="menu-has-child">
                                        <a href="{{('/findatutor')}}">Find a tutor</a>
                                    </li>
                                    <li class="menu-has-child">
                                        <a href="{{('/howitworks')}}">How it works</a>
                                    </li>
                                    <li class="menu-has-child">
                                        <a href="{{('/price')}}">Prices</a>
                                    </li>
                                    <li class="menu-has-child">
                                        <a href="{{('/allsubjects')}}">All Subjects</a>
                                    </li>
                                    <li class="menu-has-child">
                                        <a href="{{('/courses')}}">Courses</a>
                                    </li>

                                    <li class="menu-has-child">
                                        <a href="{{('/aboutus')}}">About Us</a>

                                    </li>

                                    <li class="menu-has-child">
                                        <a href="{{('/blog')}}">Blog</a>

                                    </li>
                                    <li><a href="{{('/contact')}}">Contact</a></li>
                                </ul>

                                <div class="headerBtns">
                                    
                                    <a href="/student/login" class="header-btn theme-btn-green ">Login</a>
                                    <a href="/student/register" class="header-btn theme-btn ">Register</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-4 col-6 col-sm-6">
                        <div class="header-right">
                            <div class="header-search d-none d-sm-block">
                                <form action="#">
                                    <input type="text" placeholder="Search Item">
                                    <button type="submit" class="header-search-btn"><i
                                            class="fa-thin fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                            <div class="header-btn d-none d-sm-block">
                                
                                <a href="#login" class="header-btn theme-btn-green " onclick="showloginpopup()">Login</a>
                                <a href="#register" class="header-btn theme-btn " onclick="showregistrationpopup()">Register</a>
                            </div>
                            {{-- href for login as student : /student/login  --}}
                            {{-- href for login as tutor : /tutor/login --}}
                            {{-- href for login as parent : /parent/login --}}
                            {{-- href for regsiter as student : /student/register --}}
                            {{-- href for regsiter as tutor : /tutor/register  --}}
                            <div class="header-menu-bar d-xl-none ml-10">
                                <span class="header-menu-bar-icon side-toggle">
                                    <i class="fa-light fa-bars"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <main>
