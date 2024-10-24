@extends('student.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <style>
            .card {
                text-align: left !important;
            }
        </style>

        <div class="content-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div class="card" style="width: 50rem; margin: 0 auto;">
                <form action="{{ route('student.updateprofiledata') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-header bg-white">

                        <div class="row mb-5">
                            <div class="col-md-3 col-12">

                                <div class="profile-pic-div">
                                    <img src="{{url('images/students/profilepics','/')}}{{ $student->profile_pic ?? url('images/avatar/default-profile-pic.png')}}" id="photo">
                                    <input type="file" id="file" name="file">
                                    {{-- <input type="file" id="test" name="test"> --}}
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <h2 style="margin-top: 60px; color: black; padding-left: 30px;">
                                    {{ $student->name ?? session('userid')->name }}</h2>


                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Name<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{ $student->name ?? session('userid')->name }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">Date Of Birth<i style="color:red">*</i></label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $student->dob ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Gender<i style="color:red">*</i></label>
                                <select type="text" class="form-control" id="gender" name="gender"
                                    value="" required>
                                    <option value="1" {{ ( $student->gender == "1") ? 'selected' : '' }}>Male</option>
                                    <option value="2"{{ ( $student->gender == "2") ? 'selected' : '' }}>Female</option>
                                    <option value="3"{{ ( $student->gender == "3") ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Mobile<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="primarymobile" name="primarymobile"
                                    placeholder="" value="{{ $student->mobile ?? session('userid')->mobile }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Secondary Mobile</i></label>
                                <input type="text" class="form-control" id="secmobile" name="secmobile"
                                    placeholder="Enter Secondary Mobile" value="{{ $student->secondary_mobile ?? '' }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $student->email ?? session('userid')->email }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">School<i style="color:red">*</i></i></label>
                                <input type="text" class="form-control" id="school" name="school"
                                    placeholder="Enter School Name" value="{{ $student->school_name ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Fathre's Name<i style="color:red">*</i></label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                    placeholder="Enter Father's Name " value="{{ $student->fathers_name ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Mother's Name</label>
                                <input type="text" class="form-control" id="mname" name="mname"
                                    placeholder="Enter Mother's Name" value="{{ $student->mothers_name ?? '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="float-right">
                                    <button type="submit" id="" class="btn btn-sm btn-success moveRight"><span
                                            class="fa fa-check"></span> Update</button>

                                    {{-- <a type="button" class="btn btn-danger mr-1 moveRight" --}}
                                    {{-- style="background-color:#DC3545;" href="editstudentprofile.html">Back</a> --}}


                                </div>
                            </div>

                        </div>


                </form>
                <hr>



                {{-- Achievement Add/Update --}}
                <h3 class="text-center mb-4"><u>Achievement</u></h3>

                <form action="{{ route('student.studentacadd') }}"  method="POST" name="achie">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">Name<i style="color:red">*</i></label>
                            <input type="text" class="form-control" id="achievementName" name="achievementName"
                                placeholder="Enter Details" required>
                                <span class="text-danger">
                                    @error('achievementName')
                                    {{ $message }}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Description<i style="color:red">*</i></label>
                            <input type="text" class="form-control" id="achievementDesc" name="achievementDesc"
                                placeholder="Enter Details" required>
                                <span class="text-danger">
                                    @error('achievementDesc')
                                    {{ $message }}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Date</label>
                            <input type="date" class="form-control" id="achDate" name="achDate">

                        </div>

                        <div class="form-group col-md-3 text-right" style="margin-top: 33px;">
                            <button class=" btn btn-sm btn-success text-white" type="submit"><span
                                    class="fa fa-plus"></span> Add</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-responsive">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="achievementGrid">
                        @foreach ($achievement as $achievement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-wrap">{{ $achievement->name }}</td>
                                <td class="text-wrap">{{ $achievement->description }}</td>
                                {{-- <td class="text-wrap">{{$achievement->date}}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($achievement->date)->format('j-F-Y') }}</td>
                                <td><a href="../studentacdel/{{$achievement->id}}"><button class="btn-sm btn btn-danger"
                                            type="button"><span class="fa fa-trash"></span> Delete</button></a></td>
                            </tr>
                        @endforeach
                        <tr>

                        </tr>

                    </tbody>
                </table>




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
    <script>
        var achievementArray = [];

        function addNewAchievement() {
            achieveObj = {};
            achieveObj.achieveName = $("#achievementName").val();
            achieveObj.achieveDesc = $("#achievementDesc").val();
            achieveObj.achieveDate = $("#achDate").val();
            achievementArray.push(achieveObj);

            bindAchieveArray();

            $("#achievementName").val("");
            $("#achievementDesc").val("");
            $("#achDate").val("");

        }

        function bindAchieveArray() {
            var p = 0;
            var strRow = "";
            for (var c = 0; c < achievementArray.length; c++) {
                p++;
                strRow += `<tr>`;
                strRow += `<td >${p}</td>`;
                strRow += `<td>${achievementArray[c].achieveName}</td>`;
                strRow += `<td>${achievementArray[c].achieveDesc}</td>`;
                strRow += `<td>${achievementArray[c].achieveDate}</td>`;
                strRow += `<td><button class="btn-danger" href="#" onclick="removeAchievement(${p})" ></i>Remove</a></td>`;
                strRow += `</tr>`;
            }
            document.getElementById("achievementGrid").innerHTML = strRow;
        }

        function removeAchievement(objToRemove) {


        }
    </script>

    <script>
        //declearing html elements

        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        //if user hover on img div 

        imgDiv.addEventListener('mouseenter', function() {
            uploadBtn.style.display = "block";
        });

        //if we hover out from img div

        imgDiv.addEventListener('mouseleave', function() {
            uploadBtn.style.display = "none";
        });

        //lets work for image showing functionality when we choose an image to upload

        //when we choose a foto to upload

        file.addEventListener('change', function() {
            //this refers to file
            const choosedFile = this.files[0];

            if (choosedFile) {

                const reader = new FileReader(); //FileReader is a predefined function of JS

                reader.addEventListener('load', function() {
                    img.setAttribute('src', reader.result);
                });

                reader.readAsDataURL(choosedFile);
                // alert(document.getElementById('file').value)
                // $("#profilepic").change(function(){
                // $.ajax({
                //     type: "POST",
                //     // data: $('#profile-form').serialize(),
                //     data: document.getElementById('file')value,
                //     url: "{{ url('student/profilepicupdate') }}",
                //     success: function(data) {
                //         window.location.href = window.location.href;
                //     },

                // });
            }
        });
        //         });

        //     }
        // });
    </script>
@endsection
