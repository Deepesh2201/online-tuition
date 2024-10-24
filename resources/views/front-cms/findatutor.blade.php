@extends('front-cms.layouts.main')
@section('main-section')
<!-- END header -->
<section class="bannerSec tutBann">
    <div class="container-fluid">
        <div class="tutorHeader ">
            <h1 class="findtutorHeader">
                Discover the perfect tutor for you
            </h1>
            <form action="{{ url('toptutorsearch') }}" method="POST">
                @csrf
                <div class="findtutor-btns">
                    <div class="custom-select" style="width:300px;">
                        <select id="subject" name="subject">
                            <option value="">Select a Subject</option>
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-select" style="width:300px;">
                        <select id="grade" name="grade">
                            <option value="">Select Grade</option>
                            @foreach ($gradelists as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="drpdwnSearch">
                        <button type="submit" class="btn search-tutor">Search</button>
                    </div>
                </div>
            </form>


            <div id="accordion">

                <div class="accor">
                    <div class="advceAccordian">
                        <div class="" id="headingTwo">

                            <div class="advance-search">
                                <a href="" class="collapsed advSearTextLeft" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Find
                                    the tutor of your choice use advance
                                    search</a>
                                <span>
                                    <a href="" class="collapsed advSearch2" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <img src="{{ url('frontendnew/img/icons/magnifire.png') }}" alt="">
                                        Advance Search
                                    </a>
                                </span>
                            </div>

                        </div>
                        <div id="collapseTwo" class="collapse collapseAdvSearch" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <form class="advSearchForm" action="{{url('advancesearch')}}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="" aria-describedby=""
                                                placeholder="Search" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                        <label for="">Subject</label>
                                        <select class="form-control" id="subject" name="subject">
                                            <option value="">Select a subject</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                        <label for="">Grade</label>
                                        <select class="form-control" id="grade" name="grade">
                                            <option value="">Select a grade</option>
                                            @foreach ($gradelists as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                        <label for="">Min Price</label>
                                        <input class="form-control" id="tminprice" name="tminprice">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-2">
                                        <label for="">Max Price</label>
                                        <input class="form-control" id="tmaxprice" name="tmaxprice">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" hidden>
                                        <label for="">Rating</label>
                                        <select class="form-control rating" id="ratings" name="ratings">
                                            <option value="">5 Star <span
                                                    class="star-uni-code">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                            </option>
                                            <option value="">4 Star &#9733;&#9733;&#9733;&#9733;</option>
                                            <option value="">3 Star &#9733;&#9733;&#9733;</option>
                                            <option value="">2 Star &#9733;&#9733;</option>
                                            <option value="">1 Star &#9733;</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" hidden>
                                        <label for="">Country</label>
                                        <select class="form-control" id="country" name="country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="advSearchBtns">
                                            <button class="btn cancelBtn">Cancel</button>
                                            <button type="submit" class="applyBtn">Apply</button>
                                        </div>
                                    </div>

                                </div>


                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
    </div>
    </div>
</section>
<!-- tutor section -->
<section class="findtutSecs mar-top-40">
    <div class="container tutor-card">
        <h4>10 million evaluated private tutors</h4>
        <br>
        <div class="row">
            @foreach ($tutors as $tutor)
            <a href="tutor-details/{{$tutor->tutor_id}}" style="color: black">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 tutorCol mb-5">
                    <div class="tutorDetails padd-50">
                        <div class="tutorImg">
                            <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutor->profile_pic }}" width="100%" alt="" onerror="this.onerror=null;this.src='https://mychoicetutor.com/images/avatar/default_avatar_img.jpg';">
                        </div>
                        <div class="star">
                            <span>
                                <i class="fa fa-star"></i>
                                {{$tutor->avg_rating}} ({{$tutor->total_reviews}})
                            </span>
                            <span>${{$tutor->rateperhour}}/h</span>
                        </div>
                        <a href="tutor-details/{{$tutor->tutor_id}}" style="color: black"><span class="name">
                                {{$tutor->name}}
                                <p>{{$tutor->subject}}</p>
                            </span></a>
                        <span class="desc-tutor">{{$tutor->headline}}</span>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        {{-- <div class="row mt-4">
                <div class="col-12">
                    <div class="expMore">
                        <a href="#" class="btn btn-lg">Explore more</a>
                    </div>
                </div>
            </div> --}}
    </div>
</section>
<section>
    <div class="container">
        <div class="tutor-banner bottom-banner1 ">

            <div class="rightside">
            <h2>Experience our free trial classes today!</h2>
            <button onclick="redirect();">Book free trial class today</button>
            </div>

        </div>
    </div>
    <script>
    function redirect() {
        window.location.href = "{{('/student/register')}}";
    }
    </script>
</section>
@endsection
