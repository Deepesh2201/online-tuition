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

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4 text-center">
                            <div class="avatar-lg mx-auto mt-2">
                                <div class="avatar-title bg-light text-success display-3 rounded-circle">
                                    <i class="ri-checkbox-circle-fill"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <h4>Well done !</h4>
                                <p class="text-muted mx-4">Aww yeah, mobile number verified successfully.</p>
                                <div class="mt-4">
                                    <a href="{{url('/')}}" class="btn btn-success w-100">Back to Login</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>

            @endsection
