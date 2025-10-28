@extends('app.login_layout')
@section('content')
    <section class="">
        <div class="pt-2">
        <div class="container mt-5 pt-3" style=" margin-bottom: 130px;">
            <div class="my-0 p-0">

            </div>
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="mt-3">
                        <img src="{{ asset('images/logo2.png') }}" alt="" class="login-img" >
                    </div>
                    <div class="col-lg-12 login-title">
                        Appointment Scheduler Project
                    </div>
                    <div class="col-lg-12 text-light h4 fw-bold mb-0">
                        Login
                    </div>

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form action="{{ route('resetPost') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label class="form-control-label">EMAIL</label>
                                    <input type="text" class="form-control mb-0 text-dark" name="email" 
                                    value="{{ $email }}" readonly>
                                    @error('email')
                                        <small class="p-0 mb-1 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label">PASSWORD</label>
                                    <input type="password" class="form-control mb-0" name="password">
                                    @error('password')
                                        <small class="p-0 mb-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                 <div class="form-group mb-3">
                                    <label class="form-control-label">PASSWORD CONFIRMATION</label>
                                    <input type="password" class="form-control mb-0" name="password_confirmation">
                                    @error('password_confirmation')
                                        <small class="p-0 mb-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 loginbttm">
    
                                    <div class="col-lg-12 login-button d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-primary mx-2">SUBMIT</button>
                                        <button type="reset" class="btn btn-outline-secondary mx-2">CANCEL</button>
                                    </div>
                                 
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
       
    </section>
@endsection