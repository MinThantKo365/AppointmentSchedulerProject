@extends('app.login_layout')
@section('content')
<div class="pt-3">
        <div class="container pt-1 pb-2">
            <div class="my-0 p-0">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm"
                        role="alert" style="border-left: 6px solid #28a745;">
                        <i class="bi bi-check-circle-fill me-2 fs-4 text-success"></i>
                        <div class="flex-grow-1">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close ms-2" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="mt-3">
                        <img src="{{ asset('images/logo2.png') }}" alt="" class="login-img">
                    </div>
                    <div class="col-lg-12 login-title">
                        Appointment Scheduler Project
                    </div>
                    <div class="col-lg-12 text-light h4 fw-bold mb-0">
                        Register
                    </div>

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form method="POST" action="{{ route('register_post') }}">
                                @csrf
                                <div class="form-group-reg m-0 p-0">
                                    <label class="form-control-label">USERNAME</label>
                                    <input type="text" class="form-control mb-0" name="name">
                                    @error('name')
                                        <small class="p-0 m-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group-reg m-0 p-0">
                                    <label class="form-control-label">EMAIL</label>
                                    <input type="text" class="form-control mb-0" name="email">
                                    @error('email')
                                        <small class="p-0 m-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group-reg m-0 p-0">
                                    <label class="form-control-label">PASSWORD</label>
                                    <input type="password" class="form-control mb-0" name="password">
                                    @error('password')
                                        <small class="p-0 m-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group-reg mb-3 p-0">
                                    <label class="form-control-label">PASSWORD CONFIRMATION</label>
                                    <input type="password" class="form-control mb-0" name="password_confirmation">
                                    @error('password_confirmation')
                                        <small class="p-0 m-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-lg-12 loginbttm mb-2">
                                    <div class="col-lg-12 login-button d-flex justify-content-center mb-2">
                                        <button type="submit" class="btn btn-outline-primary mx-2">SIGN UP</button>
                                        <button type="reset" class="btn btn-outline-secondary mx-2">CANCEL</button>
                                    </div>
                                    <div class="col-lg-12 login-button d-flex justify-content-center mb-0">
                                        <p class="text-light me-1">Already have Account?</p>
                                        <a href="/">Sign In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-2"></div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection