@extends('tutor.layouts.main')
@section('main-section')

 <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card" style="width: 50rem; margin: 0 auto;">

                                <div class=" card-header bg-white">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="ms-4 d-flex flex-column" style="width: 150px;">
                                                <img src="{{url('images/tutors/profilepics','/')}}{{ $tutorpd->profile_pic ?? url('images/avatar/default-profile-pic.png')}}"
                                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mb-2"
                                                    style="width: 150px; z-index: 1; border-radius: 50%;">
                
                                                <a type="button" class="btn btn-outline-dark bg-primary" href="profileupdate"
                                                    style="z-index: 1;">
                                                    Edit profile
                                                </a>
                
                                            </div>
                                        </div>
                                        <div class="col-9 text-left">
                                            <h2 style="margin-top: 60px;">{{ $tutorpd->name ?? session('userid')->name}}</h2>
                                        </div>
                
                                    </div>
                
                                </div>



                                <div class="card-body">

                                    <h5>Personal Details</h5>
                                    <table class="tab table-bordered" width="100%" id="">
                                        <tr>
                
                                            <th>Name:</th>
                                            <td>{{ $tutorpd->name  ?? session('userid')->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Goal</th>
                                            <td>{{ $tutorpd->goal  ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Qulifications:</th>
                                            <td>{{ $tutorpd->qualification ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Experience:</th>
                                            <td>{{ $tutorpd->experience ?? session('userid')->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Certifications</th>
                                            <td>{{ $tutorpd->certification ?? '' }}</td>
                                        </tr>
                
                                        <tr>
                                            <th>Mobile:</th>
                                            <td>{{ $tutorpd->mobile ?? session('userid')->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Secondary Mobile:</th>
                                            <td>{{ $tutorpd->secondary_mobile ?? '' }}</td>
                                        </tr>
                
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $tutorpd->email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Headline:</th>
                                            <td>{{ $tutorpd->headline ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Area:</th>
                                            <td>
                                                @if ($tutorsub ?? '')
                                                    
                                                @foreach ($tutorsub as $tutorsu)
                                                {{ $tutorsu->subject ?? '' }}(£{{ $tutorsu->rate ?? '' }}/hr),
                                                @endforeach
                                                @endif
                                        </td>
                                                
                                        </tr>
                                    </table>
                                    <br>
                                    <h5>Acievements</h5>
                
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($achievement ?? '')
                                                
                                            @foreach ($achievement as $achievement)
                                            <tr>
                                                <td class="text-wrap">{{ $achievement->name }}</td>
                                                <td class="text-wrap">{{ $achievement->description }}</td>
                                                {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                                <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                
                                    <br>
                                    <h5>Reviews</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Subject</th>
                                            <th>details</th>
                                            <th>Rating</th>
                                        </tr>
                                        @if ($reviews ?? '')
                                            
                                        @foreach ($reviews as $reviews)
                                        
                                        <tr>
                                            <td>{{$reviews->subject}}</td>
                                            <td>{{$reviews->name}}</td>
                                            
                                            <td>
                                                @if($reviews->ratings >=1)
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                                @if($reviews->ratings >=2)
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                                @if($reviews->ratings >=3)
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                                @if($reviews->ratings >=4)
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                                @if($reviews->ratings >=5)
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        @endif
                                    </table>
                
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->

@endsection
