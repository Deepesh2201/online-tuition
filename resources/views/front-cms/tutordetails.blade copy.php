@extends('front-cms.layouts.main')
@section('main-section')

<!-- MAIN START -->
<main class="tu-main tu-bgmain">
    <section class="tu-main-section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-8 col-xxl-9">
                    <div class="tu-tutorprofilewrapp">
                        <span class="tu-cardtag"></span>
                        <div class="tu-profileview">
                            <figure>
                                <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="image-description">
                            </figure>
                            <div class="tu-protutorinfo">
                                <div class="tu-protutordetail">
                                    <div class="tu-productorder-content">
                                        <figure>
                                            <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="images">
                                        </figure>
                                        <div class="tu-product-title">
                                            <h3>{{$tutorpd->name}} <i class="icon icon-check-circle tu-greenclr" data-tippy-trigger="mouseenter" data-tippy-html="#tu-verifed" data-tippy-interactive="true" data-tippy-placement="top"></i></h3>
                                            <h5>{{$tutorpd->subject}}</h5>
                                        </div>
                                        <div class="tu-listinginfo_price">
                                            <span>Starting from:</span>
                                            <h4>£{{$tutorpd->rate}}/hr</h4>
                                        </div>
                                    </div>
                                    <ul class="tu-tutorreview">
                                        <li>
                                            <span><i class="fa fa-star tu-coloryellow"> <em>4.5<span>/5.0</span></em> </i>  <em>({{count($reviews)}})</em></span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-check-circle tu-colorgreen"><em>Qualification:</em></i><em>{{$tutorpd->qualification}}</em></span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-check-circle tu-colorgreen"><em>Experience:</em></i><em>{{$tutorpd->experience}}</em></span>
                                        </li>
                                    </ul>	
                                    <div class="tu-detailitem">
                                        <h6>Certifications</h6>
                                        <div class="tu-languagelist">
                                            <ul class="tu-languages">
                                                <li>{{$tutorpd->certification}}</li>
                                                 </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tu-actionbts">
                            <div class="tu-userurl">
                                <i class="icon icon-globe"></i>
                                <a href="{{$tutorpd->intro_video_link}}" target="_blank">{{$tutorpd->intro_video_link}} <i class="icon icon-copy"></i></a>
                            </div>
                            <ul class="tu-profilelinksbtn">
                                <li>
                                    <a class="tu-linkheart" href="javascript:void(0);"><i class="icon icon-heart"></i><span>Save</span></a>
                                </li>
                                <li><a href="/student/searchtutor" class="tu-secbtn">Let’s Book Trial</a></li>
                                <li>
                                    <a href="/student/searchtutor" class="tu-primbtn">Book a tution</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tu-detailstabs">
                        <ul class="nav nav-tabs tu-nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="icon icon-home"></i><span>Introduction</span></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="icon icon-message-circle"></i><span>Reviews</span></button>
                            </li>
                        </ul>
                        <div class="tab-content tu-tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tu-tabswrapper">
                                    <div class="tu-tabstitle">
                                        <h4>A brief introduction</h4>
                                    </div>
                                    <div class="tu-description">
                                        <p> {{$tutorpd->headline}}</p>
                                    </div><br><hr>
                                    <div class="tu-tabstitle">
                                        <h4>Goal</h4>
                                    </div>
                                    <div class="tu-description">
                                        <p> {{$tutorpd->goal}}</p>
                                    </div><br><hr>
                                    <div class="tu-tabstitle">
                                        <h4>Qualification</h4>
                                    </div>
                                    <div class="tu-description">
                                        <p> {{$tutorpd->qualification}}</p>
                                    </div><br><hr>
                                    <div class="tu-tabstitle">
                                        <h4>Experience</h4>
                                    </div>
                                    <div class="tu-description">
                                        <p> {{$tutorpd->experience}}</p>
                                    </div>
                                   
                                    
                                </div>
                               
                                <div class="tu-tabswrapper">
                                    <div class="tu-tabstitle">
                                        <h4>Achievement</h4>
                                    </div>
                                    <ul class="tu-icanteach">  
                                        <li>
                                            {{-- <div class="tu-tech-title">
                                                <h6>Class 9 - 10</h6>
                                            </div> --}}
                                            <ul class="tu-serviceslist">
                                                @foreach ($achievement as $achievement)
                                        {{-- <tr> --}}
                                            {{-- <td class="text-wrap">{{ $achievement->name }}</td> --}}
                                            {{-- <td class="text-wrap">{{ $achievement->description }}</td> --}}
                                            {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td> --}}
                                        {{-- </tr> --}}
                                        <li>
                                            <a href="#achievement">{{ $achievement->name }}</a>
                                        </li>
                                        @endforeach
                                                
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </div>
                               
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tu-tabswrapper">
                                    <div class="tu-boxtitle">
                                        <h4>Reviews ({{count($reviews)}})</h4>
                                    </div>
                                    @foreach ($reviews as $reviews)
                                    
                                
                                </tr>
                               
                                    <div class="tu-commentarea">
                                        <div class="tu-commentlist">
                                            <figure>
                                                <img src="{{url('images/students/profilepics','/')}}{{ $reviews->student_pic ?? url('images/avatar/default-profile-pic.png')}}" alt="images">
                                            </figure>
                                            <div class="tu-coomentareaauth">
                                                <div class="tu-commentright">
                                                    <div class="tu-commentauthor">
                                                        <h6><span>{{$reviews->student_name}}</span></h6>
                                                        <div class="tu-listing-location tu-ratingstars">
                                                            <span>{{$reviews->ratings}}</span>
                                                            <span class="tu-stars tu-sm-stars">
                                                                <span></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tu-description">
                                                    <p>{{$reviews->name}} </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="tu-Joincommunity">
                        <div class="tu-particles">
                            <div id="tu-particlev2"></div>
                        </div>
                        <div class="tu-Joincommunity_content">
                            <h4>Trending tutor directory of 2023</h4>
                            <p>Its Free, Join today and start spreading knowledge with students out there</p>
                        </div>
                        <div class="tu-Joincommunity_btn">
                            <a href="/student/register" class="tu-yellowbtn">Join our community</a>
                        </div>
                    </div>
                   
                </div>
                <div class="col-xl-4 col-xxl-3">
                    <aside class="tu-asidedetail">
                        <div class="tu-asideinfo text-center">
                            <h6>Hello! You can have my teaching services direct at</h6>
                        </div>
                        <ul class="tu-featureinclude">
                            <li>
                                <span class="icon icon-home tu-colorgreen"> <i>My home</i> </span>
                                <em class="fa fa-check-circle tu-colorgreen"></em>  
                            </li>
                            <li>
                                <span class="icon icon-map-pin tu-colorblue"> <i>Student's home</i> </span>
                                <em class="fa fa-check-circle tu-colorgreen"></em>  
                            </li>
                            <li>
                                <span class="icon icon-video tu-colororange"> <i>Online</i> </span>
                                <em class="fa fa-check-circle tu-colorgreen"></em>  
                            </li>
                        </ul>
                        {{-- <div class="tu-contactbox">
                            <h6>Contact details</h6>
                            <ul class="tu-listinfo">
                                <li>
                                    <span class="tu-bg-maroon"><i class="icon icon-phone-call "></i></span>
                                    <h6>0800 - 28<em>*** - ***</em></h6>
                                </li>
                                <li>
                                    <span class="tu-bg-voilet"><i class="icon icon-mail"></i></span>
                                    <h6>cindy287@<em>*****</em>.com</h6>
                                </li>
                                <li>
                                    <span class="tu-bg-blue"><i class="fab fa-skype"></i></span>
                                    <h6>cindylore<em>********</em></h6>
                                </li>
                                <li>
                                    <span class="tu-bg-green"><i class="fab fa-whatsapp"></i></span>
                                    <h6>0800 - 28 <em> *** - ***</em> </h6>
                                </li>
                                <li>
                                    <span class="tu-bg-orange"><i class="icon icon-printer"></i></span>
                                    <a href="javascript:void(0);">www.cindylorex77.com</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="tu-unlockfeature text-center">
                            <h6>
                                Click the button below to buy a package & unlock the contact details
                            </h6>
                            <a href="/student/login" class="tu-primbtn tu-btngreen"><span>Unlock feature</span><i class="icon icon-lock"></i></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- MAIN END -->

@endsection