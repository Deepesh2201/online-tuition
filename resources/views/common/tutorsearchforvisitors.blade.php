<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:31 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Tutor Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium mr-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with
                                this template!</p>
                            <a href="https://www.bootstrapdash.com/product/skydash-admin-template/?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=buynow_demo"
                                target="_blank" class="btn mr-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i
                                class="ti-home mr-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="ti-close text-white mr-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/onlineTutor_logo.png"
                        class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="studentDashboard.html"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item mr-2 mb-3 mb-lg-0">
                        <a class="btn" data-toggle="modal" data-target="#registerModal">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn " data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>


                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li> -->
                </ul>
                <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button> -->
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid">
            <!-- partial:partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->

            <!-- partial -->
            <div>
                <div class="content-wrapper">
                    <h3 class="text-center mb-5">Choose your Tutor</h3>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Richard</h5>
                                    <p><b>Subject:</b> English</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="tutorProfile.html" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Hazel</h5>
                                    <p><b>Subject:</b> Mathematics</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Christopher</h5>
                                    <p><b>Subject:</b> French</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face4.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">David</h5>
                                    <p><b>Subject:</b> Computer</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face5.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Isabella</h5>
                                    <p><b>Subject:</b> Chemistry</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face6.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Amelia</h5>
                                    <p><b>Subject:</b> Biology</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face7.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Jeffrey</h5>
                                    <p><b>Subject:</b> Physics</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star-half checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card tutorCrad" style="width: 15rem;">
                                <img src="images/faces/face28.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Ronald</h5>
                                    <p><b>Subject:</b> Chemistry</p>
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-starchecked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="demo.html" class="btn btn-primary">Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->




    <!-- login modal -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center mt-3">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                </div>
                <div class="modal-body">


                    <form>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Username<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="username" placeholder="Email/Mobile">
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
                    <a role="button" type="button" class="btn btn-primary" href="studentDashboard.html">Login</a>

                </div>
                <!-- <div class="modal-body">
                            <p>Don't have an acocunt? <a onclick="registerModalShow();">Register</a></p>
                        </div> -->
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <script src="vendors/jquery/jquery.min.js"></script>


    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <script src="js/custom.js"></script>

    <!-- End custom js for this page-->


</body>


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:40 GMT -->

</html>