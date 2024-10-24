@extends('common.layouts.main')
@section('main-section')
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <h1 style="color: white">Logo</h1>
                                {{-- <img src="{{url('new-styles/assets/images/logo-light.png')}}" alt="" height="20"> --}}
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Over 1 Millions learners trust us for their preparation.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- auth page content -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="mb-4">
                                <div class="avatar-lg mx-auto">
                                    <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 mt-4">
                                <div class="text-muted text-center mb-4 mx-lg-3">
                                    <h4>Verify Your Mobile</h4>
                                    <p>Please enter the 4 digit code sent to mobile</p>
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if (Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                
                                <form autocomplete="off" action="{{route('verify_student_mobile')}}" method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <input type="hidden" id="mobile" name="mobile" value="{{$mobile}}">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit1_input" class="visually-hidden">Digit 1</label>
                                                <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(1, event)" maxLength="1" id="digit1_input" name="digit1_input">
                                            </div>
                                        </div><!-- end col -->
                                
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit2_input" class="visually-hidden">Digit 2</label>
                                                <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(2, event)" maxLength="1" id="digit2_input" name="digit2_input">
                                            </div>
                                        </div><!-- end col -->
                                
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit3_input" class="visually-hidden">Digit 3</label>
                                                <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(3, event)" maxLength="1" id="digit3_input" name="digit3_input">
                                            </div>
                                        </div><!-- end col -->
                                
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit4_input" class="visually-hidden">Digit 4</label>
                                                <input type="text" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(4, event)" maxLength="1" id="digit4_input" name="digit4_input">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success w-100">Confirm</button>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Didn't receive a code ? <a href="#" class="fw-semibold text-primary text-decoration-underline">Resend</a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
<script>
    function moveToNext(currentField, event) {
    var maxLength = 1; // Maximum length of each input field
    var nextField = currentField + 1;
    var prevField = currentField - 1;

    // Check if the pressed key is a number and the current field is not at its maximum length
    if (event.keyCode >= 48 && event.keyCode <= 57 && event.target.value.length === maxLength) {
        // Move to the next input field if available
        var nextInput = document.getElementById('digit' + nextField + '_input');
        if (nextInput) {
            nextInput.focus();
        }
    } else if (event.keyCode === 8 && event.target.value.length === 0) {
        // If backspace is pressed and the current field is empty, move to the previous input field
        var prevInput = document.getElementById('digit' + prevField + '_input');
        if (prevInput) {
            prevInput.focus();
        }
    }
}

    </script>
            @endsection
