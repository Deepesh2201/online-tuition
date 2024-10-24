@extends('student.layouts.main')
@section('main-section')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
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
    </style>

    <div class="page-content">
        <div class="container-fluid">


            {{-- <h3 class="text-center mb-5">Choose your Tutor</h3> --}}
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="mb-5 listHeader">
                <h3>Choose your Tutor</h3>
                <div class="btns">

                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Sort By
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Price</a>
                            <a class="dropdown-item" href="#">Class</a>
                            <a class="dropdown-item" href="#">Rating</a>
                            <a class="dropdown-item" href="#">Experience</a>

                        </div>
                    </div> -->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort By
                        </button>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">


                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Price</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a tabindex="-1" href="{{url('student/sorttutor/pricing/asc')}}">Ascending</a></li>
                                    <li class="dropdown-item"><a href="{{url('student/sorttutor/pricing/desc')}}">Descending</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Class</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a tabindex="-1" href="{{url('student/sorttutor/class/asc')}}">Ascending</a></li>
                                    <li class="dropdown-item"><a href="{{url('student/sorttutor/class/desc')}}">Descending</a></li>
                                </ul>
                            </li>



                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Rating</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a tabindex="-1" href="{{url('student/sorttutor/rating/asc')}}">Ascending</a></li>
                                    <li class="dropdown-item"><a href="{{url('student/sorttutor/rating/desc')}}">Descending</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Experience</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a tabindex="-1" href="{{url('student/sorttutor/experience/asc')}}">Ascending</a></li>
                                    <li class="dropdown-item"><a href="{{url('student/sorttutor/experience/desc')}}">Descending</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>


                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#advSearchModal"><i
                            class="fa fa-search"></i> Advance Search
                    </button>
                </div>
            </div>
            <div class="row">
                @foreach ($tutorlist as $tutorlist)
                <div class="col-md-3 mb-3">
                    <div class="card tutorCrad" style="width: 15rem;">
                        <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tutorlist->name }}</h5>
                            <div class="mb-1">
                                @if ($tutorlist->starrating >= 1)
                                <span class="ri-star-fill checked"></span>
                                @endif
                                @if ($tutorlist->starrating >= 2)
                                <span class="ri-star-fill checked"></span>
                                @endif
                                @if ($tutorlist->starrating >= 3)
                                <span class="ri-star-fill checked"></span>
                                @endif
                                @if ($tutorlist->starrating >= 4)
                                <span class="ri-star-fill checked"></span>
                                @endif
                                @if ($tutorlist->starrating >= 5)
                                <span class="ri-star-line "></span>
                                @endif
                            </div>

                            <p><b>Class:</b>{{ $tutorlist->class_name }}</p>
                            <p><b>Subject:</b>{{ $tutorlist->subject }}</p>
                            <p><b>Total Topics:</b>{{ $tutorlist->total_topics }}</p>
                            <p><b>Rate:</b> <span>&#163;</span>{{ $tutorlist->rate }}</p>
                            <a href="tutorprofile/{{ $tutorlist->sub_map_id }}"
                                class="btn btn-sm btn-primary">Profile</a>
                            <button data-toggle="modal" data-target="#openDemoModal" class="btn btn-sm btn-primary"
                                onclick="openDemoModal('{{ $tutorlist->id }}','{{ $tutorlist->name }}','{{ $tutorlist->subjectid }}','{{ $tutorlist->subject }}')">Trial
                                Class</button>
                            <div class="text-center">
                                <button class="btn btn-sm btn-success" id="enrollnow" data-target="#openEnrollModal"
                                    data-toggle="modal"
                                    onclick="openEnrollModal('{{ $tutorlist->id }}','{{ $tutorlist->name }}','{{ $tutorlist->subjectid }}','{{ $tutorlist->subject }}','{{ $tutorlist->total_topics }}','{{ $tutorlist->rate }}');">Enroll
                                    Now</button>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Advance search modal -->
            {{-- Search Using Sliders --}}
            {{-- <div class="modal fade" id="advSearchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <style>
                            .pb-5,
                            .py-5 {
                                padding-bottom: 0 !important;
                            }

                            select.form-control {
                                color: black !important;
                            }
                        </style>

                        <div class="modal-body">


                            <header>
                                <h3 class="text-center mb-4">Search Tutor</h3>
                            </header>

                            <form action="{{route('student.tutoradvs')}}" method="POST" class="multi-range-field my-5
            pb-5">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <select type="text" class="form-control" id="subject" name="subject">
                            <option value="">--Select--</option>
                            @foreach ($subjectlist as $subjectlist)
                            <option value="{{$subjectlist->id}}">{{$subjectlist->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nationality</label>
                        <select type="text" class="form-control" id="country" name="country">
                            <option value="">--Select--</option>
                            @foreach ($countrylist as $countrylist)
                            <option value="{{$countrylist->id}}">{{$countrylist->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="name">Charges</label>
                </div>
                <div class="col-md-9 col-12 rangeBody">
                    <div class="wrapper wrapper1">
                        <div class="multi-range-slider">
                            <input type="range" id="input-left" min="10" max="100" value="20" name="minrate">
                            <input type="range" id="input-right" min="10" max="100" value="60" name="maxrate">
                            <div class="slider">
                                <div class="track"></div>
                                <div class="range"></div>
                            </div>
                        </div>
                        <div class="price__wrapper">
                            <span class="price-from">50</span>
                            <span class="price-to">500</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 col-12">
                    <label for="name">Experience</label>
                </div>
                <div class="col-md-9 col-12 rangeBody">
                    <div class="wrapper wrapper1">
                        <div class="multi-range-slider">
                            <input type="range" id="minexp" name="minexp" min="0" max="30" value="0">
                            <input type="range" id="maxexp" name="maxexp" min="0" max="30" value="10">
                            <div class="slider1">
                                <div class="track1"></div>
                                <div class="range1"></div>
                            </div>
                        </div>
                        <div class="price__wrapper1">
                            <span class="price-from1">0</span>
                            <span class="price-to1">30</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3 col-12">
                    <label for="name">Star Rating</label>
                </div>
                <div class="col-md-9 col-12 rangeBody">
                    <div class="wrapper wrapper1">
                        <div class="multi-range-slider">
                            <input hidden type="range" id="minrating" name="minrating" min="0" max="5" value="0">
                            <input type="range" id="maxrating" name="maxrating" min="0" max="5" value="3">
                            <div class="slider2">
                                <div class="track2"></div>
                                <div class="range2"></div>
                            </div>
                        </div>
                        <div class="price__wrapper2">
                            <span hidden class="price-from2">0</span>
                            <span class="price-to2">5</span>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" id="" class="btn btn-sm btn-primary moveRight mt-2"><i class="fa fa-search"></i>
                Search</button>

            </form>
        </div>
    </div>
</div>
</div> --}}

{{-- Modified search modal as per customer requirements --}}
<div class="modal fade" id="advSearchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <style>
            .pb-5,
            .py-5 {
                padding-bottom: 0 !important;
            }

            select.form-control {
                color: black !important;
            }
            </style>

            <div class="modal-body">


                <header>
                    <h3 class="text-center mb-4">Search Tutor</h3>
                </header>
                <form action="{{ route('student.tutoradvs') }}" method="POST" class="multi-range-field my-5 pb-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Class</label>
                            <select type="text" class="form-control" id="class" onchange="fetchSubjects()" name="class_name">
                                <option value="">--Select--</option>
                                @foreach ( $classes as  $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <select type="text" class="form-control" id="subject" name="subject">
                                    <option value="">--Select--</option>
                                    @foreach ($subjectlist as $subjectlist)
                                    <option value="{{ $subjectlist->id }}">{{ $subjectlist->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nationality</label>
                                <select type="text" class="form-control" id="country" name="country">
                                    <option value="">--Select--</option>
                                    @foreach ($countrylist as $countrylist)
                                    <option value="{{ $countrylist->id }}">{{ $countrylist->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Keyword</label>
                            <input type="text" class="form-control" id="class" name="keywords">
                        </div>
                        <div class="col-md-4 col-12">
                            <label for="name">Charges</label>
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="number" placeholder="Min" class="form-control" name="minrate" id="minrate">
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="number" placeholder="Max" class="form-control" name="maxrate"
                                id="maxrate"></select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 col-12">
                            <label for="name">Experience</label>
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="text" class="form-control" placeholder="Min" id="minexp" name="minexp">
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="text" class="form-control" placeholder="Max" id="maxexp" name="maxexp">


                        </div>
                    </div>

                    {{-- <div class="row mt-4">
                                <div class="col-md-3 col-12">
                                    <label for="name">Star Rating</label>
                                </div>
                                <div class="col-md-9 col-12 rangeBody">
                                    <div class="wrapper wrapper1">
                                        <div class="multi-range-slider">
                                            <input hidden type="range" id="minrating" name="minrating" min="0"
                                                max="5" value="0">
                                            <input type="range" id="maxrating" name="maxrating" min="0" max="5"
                                                value="3">
                                            <div class="slider2">
                                                <div class="track2"></div>
                                                <div class="range2"></div>
                                            </div>
                                        </div>
                                        <div class="price__wrapper2">
                                            <span hidden class="price-from2">0</span>
                                            <span class="price-to2">5</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                    <button type="submit" id="" class="btn btn-sm btn-primary moveRight mt-2"><i
                            class="fa fa-search"></i> Search</button>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Enroll modal -->
<div class="modal fade" id="openEnrollModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-body">


                <header>
                    <h3 class="text-center mb-4">Enroll Now</h3>
                </header>

                <form action="{{ route('student.purchaseclass') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Tutor</label>
                            <input type="hidden" id="tutorenrollid" name="tutorenrollid">
                            <input type="text" class="form-control" name="tutorenroll" id="tutorenroll" readonly>
                            <span class="text-danger">
                                @error('tutorenrollid')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Subject</label>
                            <input type="hidden" id="subjectenrollid" name="subjectenrollid">
                            <input type="text" class="form-control" name="subjectenroll" id="subjectenroll" readonly>
                            <span class="text-danger">
                                @error('subjectenrollid')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Available Class</label>
                            <input type="text" class="form-control" name="availableclassenroll"
                                id="availableclassenroll" readonly>
                            <span class="text-danger">
                                @error('availableclassenroll')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Required Class<i style="color: red">*</i></label>
                            <input type="number" class="form-control" name="requiredclassenroll"
                                id="requiredclassenroll" onkeyup="calculate()" required>
                            <span class="text-danger">
                                @error('requiredclassenroll')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Rate/Hr</label>
                            <input type="text" class="form-control" name="rateperhourenroll" id="rateperhourenroll"
                                readonly>
                            <span class="text-danger">
                                @error('rateperhourenroll')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                            <label for="">Total Amount</label>
                            <input type="text" class="form-control" name="totalamountenroll" id="totalamountenroll"
                                readonly>
                            <span class="text-danger">
                                @error('totalamountenroll')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row" style="float:right">
                        <div class="col-12 col-md-12 col-sm-12 mb-2">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-success">Pay Now</button>
                        </div>


                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!--Demo modal -->
<div class="modal fade" id="openDemoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-body">


                <header>
                    <h3 class="text-center mb-4">Free Trial Class</h3>
                </header>

                <form action="{{ route('student.bookdemo') }}" method="POST">
                    @csrf
                    <div class=" row mb-2">

                        <div class="form-group col-md-6">
                            <label for="">Candidate</label>
                            <input type="text" class="form-control" id="demostudentname"
                                value="{{ session('userid')->name }}" readonly>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tutor</label>
                            <input type="hidden" class="" id="demotutorid" name="demotutorid">
                            <input type="text" class="form-control" id="demotutorname" name="demotutorname" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="name">Subject</label>
                            <input type="hidden" id="demosubjectid" name="demosubjectid">
                            <input type="text" class="form-control" id="demosubjectname" name="demosubjectname"
                                readonly>
                            {{-- <select class="form-control" id="" disabled>
                                            <option>--Select--</option>
                                            <option>Biology</option>
                                            <option>Chemistry</option>
                                            <option selected>English</option>
                                            <option>Mathematics</option>
                                            <option>Physics</option>

                                        </select> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Prefer Slot 1<i style="color: red;">*</i></label>
                            <input type="datetime-local" class="form-control" id="demoslotfirst" name="demoslotfirst"
                                required>

                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="">Prefer Slot 2<i style="color: red;">*</i></label>
                            <input type="datetime-local" class="form-control" id="demoslotsecond" name="demoslotsecond"
                                required>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Prefer Slot 3<i style="color: red;">*</i></label>
                            <input type="datetime-local" class="form-control" id="demoslotthird" name="demoslotthird"
                                required>

                        </div>

                        <div class="form-group col-md-12 mt-2">
                            <label for="">Message(<span><i>Optional</i></span>)</label>
                            <textarea type="datetime-local" class="form-control" id="message" name="message"
                                required></textarea>

                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" id="" class="btn btn-sm btn-primary" style="float:right ">Schedule
                            Demo</button>
                    </div>

                </div>


                   
                   

                </div>


                 



                </form>

            </div>
        </div>
    </div>
</div>
<script>
function openDemoModal(tid, tname, sid, sname) {
    $('#demotutorid').val(tid)
    $('#demotutorname').val(tname)
    $('#demosubjectid').val(sid)
    $('#demosubjectname').val(sname)
    $('#openDemoModal').modal('show')
}

function openEnrollModal(tid, tname, sid, sname, ttopics, ratehr) {

    $('#tutorenrollid').val(tid)
    $('#tutorenroll').val(tname)
    $('#subjectenrollid').val(sid)
    $('#subjectenroll').val(sname)
    $('#availableclassenroll').val(ttopics)
    $('#rateperhourenroll').val(ratehr)
    // $('#totalamountenroll').val(ratehr * )
    $('#openEnrollModal').modal('show')
}

function calculate() {
    $('#totalamountenroll').val($('#rateperhourenroll').val() * $('#requiredclassenroll').val())
}
</script>
<script>
// range slid

let inputLeft = document.getElementById('input-left');
let inputRight = document.getElementById('input-right');
let range = document.querySelector('.slider > .range');
let priceFrom = document.querySelector('.price-from');
let priceTo = document.querySelector('.price-to');

function setLeftValue() {
    let _this = inputLeft,
        min = parseInt(_this.min),
        max = parseInt(_this.max);
    _this.value = Math.min(
        parseInt(_this.value),
        parseInt(inputRight.value) - 1
    );
    priceFrom.textContent = `Min: £${_this.value}`;
    let percent = ((_this.value - min) / (max - min)) * 100;
    range.style.left = `${percent}%`;
}
setLeftValue();

function setRightValue() {
    let _this = inputRight,
        min = parseInt(_this.min),
        max = parseInt(_this.max);

    _this.value = Math.max(
        parseInt(_this.value),
        parseInt(inputLeft.value) + 1
    );
    priceTo.textContent = `Max: £${_this.value}`;
    let percent = ((_this.value - min) / (max - min)) * 100;
    range.style.right = `${100 - percent}%`;
}
setRightValue();
inputLeft.addEventListener('input', setLeftValue);
inputRight.addEventListener('input', setRightValue);

inputLeft.addEventListener('mousemove', (e) => {
    inputLeft.classList.add('hover');
});
inputLeft.addEventListener('mouseout', (e) => {
    inputLeft.classList.remove('hover');
});
inputLeft.addEventListener('mousedown', (e) => {
    inputLeft.classList.add('active');
});
inputLeft.addEventListener('mouseup', (e) => {
    inputLeft.classList.remove('active');
});
inputLeft.addEventListener('touchstart', (e) => {
    inputLeft.classList.add('active');
});
inputLeft.addEventListener('touchend', (e) => {
    inputLeft.classList.remove('active');
});
inputRight.addEventListener('mouseover', (e) => {
    inputRight.classList.add('hover');
});
inputRight.addEventListener('mouseout', (e) => {
    inputRight.classList.remove('hover');
});
inputRight.addEventListener('mousedown', (e) => {
    inputRight.classList.add('active');
});
inputRight.addEventListener('mouseup', (e) => {
    inputRight.classList.remove('active');
});
inputRight.addEventListener('touchstart', (e) => {
    inputRight.classList.add('active');
});
inputRight.addEventListener('touchend', (e) => {
    inputRight.classList.remove('active');
});

//   experience range
let minExp = document.getElementById('minexp');
let maxExp = document.getElementById('maxexp');
let rangeExp = document.querySelector('.slider1 > .range1');
let expFrom = document.querySelector('.price-from1');
let expTo = document.querySelector('.price-to1');

function setMinValue() {
    let _this1 = minExp,
        min = parseInt(_this1.min),
        max = parseInt(_this1.max);
    _this1.value = Math.min(
        parseInt(_this1.value),
        parseInt(maxExp.value) - 1
    );
    expFrom.textContent = `Year: ${_this1.value}`;
    let percent1 = ((_this1.value - min) / (max - min)) * 100;
    rangeExp.style.left = `${percent1}%`;
}
setMinValue();

function setMaxValue() {
    let _this1 = maxExp,
        min = parseInt(_this1.min),
        max = parseInt(_this1.max);

    _this1.value = Math.max(
        parseInt(_this1.value),
        parseInt(minExp.value) + 1
    );
    expTo.textContent = `Year: ${_this1.value}`;
    let percent1 = ((_this1.value - min) / (max - min)) * 100;
    rangeExp.style.right = `${100 - percent1}%`;
}
setMaxValue();
minExp.addEventListener('input', setMinValue);
maxExp.addEventListener('input', setMaxValue);

minExp.addEventListener('mousemove', (e) => {
    minExp.classList.add('hover');
});
minExp.addEventListener('mouseout', (e) => {
    minExp.classList.remove('hover');
});
minExp.addEventListener('mousedown', (e) => {
    minExp.classList.add('active');
});
minExp.addEventListener('mouseup', (e) => {
    minExp.classList.remove('active');
});
minExp.addEventListener('touchstart', (e) => {
    minExp.classList.add('active');
});
minExp.addEventListener('touchend', (e) => {
    minExp.classList.remove('active');
});
maxExp.addEventListener('mouseover', (e) => {
    maxExp.classList.add('hover');
});
maxExp.addEventListener('mouseout', (e) => {
    maxExp.classList.remove('hover');
});
maxExp.addEventListener('mousedown', (e) => {
    maxExp.classList.add('active');
});
maxExp.addEventListener('mouseup', (e) => {
    maxExp.classList.remove('active');
});
maxExp.addEventListener('touchstart', (e) => {
    maxExp.classList.add('active');
});
maxExp.addEventListener('touchend', (e) => {
    maxExp.classList.remove('active');
});



// --star rating--

let minrating = document.getElementById('minrating');
let maxRating = document.getElementById('maxrating');


let rangeRating = document.querySelector('.slider2 > .range2');
let ratingFrom = document.querySelector('.price-from2');
let ratingTo = document.querySelector('.price-to2');

function setMinRating() {
    let _this2 = minrating,
        min = parseInt(_this2.min),
        max = parseInt(_this2.max);
    _this2.value = Math.min(
        parseInt(_this2.value),
        parseInt(maxRating.value) - 0
    );
    ratingFrom.textContent = `Star: ${_this2.value}`;
    let percent1 = ((_this2.value - min) / (max - min)) * 100;
    rangeRating.style.left = `${percent1}%`;
}
setMinRating();

function setMaxRating() {
    let _this2 = maxRating,
        min = parseInt(_this2.min),
        max = parseInt(_this2.max);

    _this2.value = Math.max(
        parseInt(_this2.value),
        parseInt(minrating.value) + 0
    );
    ratingTo.textContent = `Star: ${_this2.value}`;
    let percent1 = ((_this2.value - min) / (max - min)) * 100;
    rangeRating.style.right = `${100 - percent1}%`;
}
setMaxRating();
minrating.addEventListener('input', setMinRating);
maxRating.addEventListener('input', setMaxRating);


                minrating.addEventListener('mousemove', (e) => {
                    minrating.classList.add('hover');
                });
                minrating.addEventListener('mouseout', (e) => {
                    minrating.classList.remove('hover');
                });
                minrating.addEventListener('mousedown', (e) => {
                    minrating.classList.add('active');
                });
                minrating.addEventListener('mouseup', (e) => {
                    minrating.classList.remove('active');
                });
                minrating.addEventListener('touchstart', (e) => {
                    minrating.classList.add('active');
                });
                minrating.addEventListener('touchend', (e) => {
                    minrating.classList.remove('active');
                });
                maxRating.addEventListener('mouseover', (e) => {
                    maxRating.classList.add('hover');
                });
                maxRating.addEventListener('mouseout', (e) => {
                    maxRating.classList.remove('hover');
                });
                maxRating.addEventListener('mousedown', (e) => {
                    maxRating.classList.add('active');
                });
                maxRating.addEventListener('mouseup', (e) => {
                    maxRating.classList.remove('active');
                });
                maxRating.addEventListener('touchstart', (e) => {
                    maxRating.classList.add('active');
                });
                maxRating.addEventListener('touchend', (e) => {
                    maxRating.classList.remove('active');
                });
            </script>
<script>
    function fetchSubjects() {

        var classId = $('#class option:selected').val();
        $("#subject").html('');
        $("#topic").html('');
        $.ajax({
            url: "{{ url('fetchsubjects') }}",
            type: "POST",
            data: {
                class_id: classId,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                $('#subject').html('<option value="">-- Select Subject --</option>');
                $.each(result.subjects, function(key, value) {
                    $("#subject").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });

            }

        });

    };

</script>


@endsection

