
<!Doctype html>
<html class="no-js" lang="zxx">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Online Tutor</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png')}}"> -->
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
        <link rel="stylesheet" href="{{url('front-cms-styles/assets/css/main.css')}}">
    
      
        <link rel="stylesheet" href="{{url('css/custom.css')}}">

        <style>
    .listHeader {
        display: flex;
        justify-content: space-between;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

    .btns{
        display:flex;
    }
    .btns button{
        margin:3px;
    }

    .card .card-title {
                margin-bottom: 0;
            }

            #enrollnow {
                width: 90%;
                margin-top: 4px;
            }
    
            .btns{
                gap:1px
                
            }
            .btns a{
                /* float:right */
            }
    </style>
    </head>
<body>
    

<div class="main-content">
  
 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style>
                .listHeader {
                    display: flex;
                    justify-content: space-between;
                }

                .headline h2, .headline p{
                    display:flex;
                    justify-content: start;
                }

                .skillTag {
                display: flex;

                }

                .skillTag h5 {
                    margin: 10px;
                }

            </style>

            <div class="page-content">
                <div class="container-fluid">
            <div class="row mt-5">
                <h3 class="text-center">Tutor Profile</h3>
                <div class="col-md-12 grid-margin">
                    <div class="card" style="width: 50rem; margin: 0 auto;">

                        <div class=" card-header bg-white">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="ms-4 d-flex flex-column" style="width: 150px;">
                                        <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="Generic placeholder image"
                                            class="img-fluid img-thumbnail mb-2"
                                            style="width: 150px; z-index: 1; border-radius: 50%;">

                                        

                                    </div>
                                </div>
                                <div class="col-9 headline">
                                    <h2 style="margin-top: 60px;">{{$tutorpd->name}}</h2>
                                    <p><i>{{$tutorpd->headline}}</i> </p>
                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <div>
                                <iframe width="560" height="315" src="{{$tutorpd->intro_video_link}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>

                            <h4 class="mt-3">Personal Details</h4>
                            <table class="tab table-bordered" width="100%" id="profileTable">
                                <tr>

                                    <th>Name:</th>
                                    <td>{{$tutorpd->name}}</td>
                                </tr>
                                <tr>

                                    <th>Goal:</th>
                                    <td>{{$tutorpd->goal}}</td>
                                </tr>
                                <tr>
                                    <th>Qualification:</th>
                                    <td>{{$tutorpd->qualification}}</td>
                                </tr>
                                <tr>
                                    <th>Experience:</th>
                                    <td>{{$tutorpd->experience}}</td>
                                </tr>
                                <tr>
                                    <th>Certifications:</th>
                                    <td>{{$tutorpd->certification}}</td>
                                </tr>


                                <tr>
                                    <th>Rate:</th>
                                    <td><span>&#163;</span> {{$tutorpd->rate}}/ Hr</td>
                                </tr>

                                <tr>
                                    <th>Headline:</th>
                                    <td>{{$tutorpd->headline}}</td>
                                </tr>

                                <tr>
                                    <th>Area:</th>
                                    <td>{{$tutorpd->subject}}</td>
                                </tr>
                            </table>
                            <br>
                            <h4>Acievements</h4>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @foreach ($achievement as $achievement)
                                        <tr>
                                            <td class="text-wrap">{{ $achievement->name }}</td>
                                            <td class="text-wrap">{{ $achievement->description }}</td>
                                            {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br>
                            <h4>Reviews</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Subject</th>
                                    <th>details</th>
                                    <th>Rating</th>
                                </tr>
                                
                                @foreach ($reviews as $reviews)
                                    
                                <tr>
                                    <td>{{$reviews->subject}}</td>
                                    <td>{{$reviews->name}}</td>
        
                                    <td>
                                        @if($reviews->ratings >=1)
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        @endif
                                        @if($reviews->ratings >=2)
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        @endif
                                        @if($reviews->ratings >=3)
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        @endif
                                        @if($reviews->ratings >=4)
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        @endif
                                        @if($reviews->ratings >=5)
                                        <i class="fa fa-star-half-o  checked" aria-hidden="true"></i>
                                        @endif
                                    </td>

                                    
        
                                </tr>
                                @endforeach
                            </table>
                            <br>

                            @if($tutorpd->keywords)
                              @php 
                                $skillsArray = explode(',', $tutorpd->keywords);
                              @endphp
                            <div>
                                <h5>Skills</h5>
                                <hr>
                                <div class="skillTag">
                                    @foreach ($skillsArray  as $item)
                                       <h5><span class="badge bg-primary">{{$item}}</span></h5>
                                    @endforeach

                                </div>
                            </div>
                            @endif

                            <!-- <div>
                                <h5>Skills</h5>
                                <hr>
                                <div class="skillTag">
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                    <h5><span class="badge bg-primary">Mathematics</span></h5>
                                </div>
                            </div> -->

                            <hr>
                            <div class="category-content btns">
                                <div class="back">
                                    <a href="/"> <button class="btn  btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                </div>
                                <a href="/student/register"> <button class="btn btn-sm">Trial Class</button></a>
                                                    
                                <div class="enrlBtn">
                                <a href="/student/register"><button class="btn btn-sm">Enroll Now</button></a>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->

        </body>
    </html>