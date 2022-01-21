@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
        <div class="content">
            <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign Up Block -->
                    <div class="block block-rounded mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create Account</h3>
                            <div class="block-options">
                                <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#one-signup-terms">View Terms</a>
                                <a class="btn-block-option" href="{{ route('login') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Sign In">
                                    <i class="fa fa-sign-in-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                <h1 class="h2 mb-4"><img src="{{ asset('media/logos/Full-Logo-Black.png') }}"
                                        class="img-fluid" alt=""></h1>
                                <p class="fw-medium text-muted">
                                    Please fill the following details to create a new account.
                                </p>

                                <!-- Sign Up Form -->
                                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->

                                <form method="POST" class="js-validation-signup" action="{{ route('register') }}">
                                    @csrf
                                    <div class="py-3">
                                        <div class="mb-4">
                                            <input type="text"
                                                class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror"
                                                id="signup-username" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus name="name" placeholder="First Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="mb-4">


                                            <input id="password" type="password"
                                                class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <div class="mb-4">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-lg form-control-alt"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password">

                                        </div>

                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn w-100 btn-alt-success">
                                                <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Sign Up
                                            </button>
                                        </div>

                                        <div class="mt-4">

                                            <a href="{{ route('login') }}">Already a member? Sign in</a>

                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign Up Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign Up Block -->
                </div>
            </div>
            <div class="fs-sm text-muted text-center">
                <strong>All Rights Reserved </strong> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>


    </div>
    <!-- END Page Content -->
@endsection
