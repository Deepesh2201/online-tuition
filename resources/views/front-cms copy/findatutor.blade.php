@extends('front-cms.layouts.main')
@section('main-section')

        <section>
            <div class="container">
                <img src="images/banner300.jpg" alt="">
            </div>
        </section>


        <!-- find the right online tutor -->
        <section class=" pt-80 pb-90 a ">
            @if(isset($subjectlists))
            <div class="container righttutor bg-white">
                <h2 class="section-title mb-20 text-center">Find The Right Online Tutor For You</h2>
                <form action="{{ route('tutorsearchindex') }}" method="POST" class="multi-range-field my-5 pb-5" id="tutor-search">
                    <div class="row pt-50">
                        @csrf
                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Subject</label>
                            <select class="form-control" id="subjectlistid" name="subjectlistid">
                                <option value="">-- Select --</option>
                                @foreach ($subjectlists as $subject)

                                <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Level</label>
                            <select class="form-control" id="gradelistid" name="gradelistid">
                                <option value="">--Select--</option>
                                @foreach ($gradelists as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                            <label for="">Price</label>
                            <select class="form-control">
                                <option>--Select--</option>
                            </select>
                        </div> --}}

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                        <label for="">Min and Max Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Min Price" id="tminprice" name="tminprice">
                            <input type="text" class="form-control" placeholder="Max Price" id="tmaxprice" name="tmaxprice">
                        </div>
                        </div>

                        

                        <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                           <div class="seachbtn">
                           <button class="header-btn theme-btn-black" type="submit" id="">Advance Search</button>
                            <a href="{{url('/findatutor')}}"> <button class="header-btn theme-btn-black mt-4"
                                    id="" type="button">View All</button></a>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @if(isset($tutorlists))
            <div class="container ">



                <div id="tutorListContainer" class="row align-items-center mt-5 tutor-search">
                    @foreach ($tutorlists as $tutorlist)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

                        <div class="tutorcard">
                            <div class="tutorcardImg">
                                <div class="ratePerHr">
                                    <p>&#163;{{$tutorlist->rate}}</p>
                                </div>
                                <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}"
                                    class="card-img-top" alt="...">
                            </div>
                            <div class="tutorDesc">
                                <span class="tutname">{{ $tutorlist->name }}</span><br>
                                <table class="tutorTable">
                                    <tr>
                                        <td colspan="2"><small>{{ $tutorlist->headline }}</small></td>
                                    </tr>
                                    <tr>
                                        <td>{{$tutorlist->total_classes_done}}+ Lessions</td>
                                        <td class="floattright"><b>Exp:</b> {{$tutorlist->experience}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject:</b> {{ $tutorlist->subject }} </td>
                                        <td class="text-success floattright">Verified</td>
                                    </tr>

                                </table>

                                <div class="btnSec">
                                    <a href="tutorprofile/{{ $tutorlist->sub_map_id }}"><button class="btn btn-sm">View
                                            Profile</button></a>
                                    <a href="/student/searchtutor"> <button class="btn btn-sm">Free Trial</button></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    @endforeach

                </div>
            </div>
            @endif
        </section>
        <!-- find the online tutor end  -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
    // Attach change event handlers to your dropdowns
    $('#subjectlistid, #gradelistid, #tminprice, #tmaxprice').on('change', function () {
        // Get form data
        var formData = $('#tutor-search').serialize();

        // Make an Ajax request to fetch updated data based on dropdown changes
        $.ajax({
            url: '{{ route("guest.tutorsindexsearch") }}', // Replace with your actual API endpoint
            method: 'POST',
            data: formData,
            success: function (data) {
                // Update only the content of the tutorListContainer
                $('#tutorListContainer').html(data.html);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    });
});
            </script>
@endsection