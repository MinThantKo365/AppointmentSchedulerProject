@extends('app.login_layout')
@section('content')
@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert"
            style="border-left: 6px solid #28a745;">
            <i class="bi bi-check-circle-fill me-2 fs-4 text-success"></i>
            <div class="flex-grow-1">
                {{ session('success') }}
                {{-- Login Success --}}
            </div>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('err'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert"
            style="border-left: 6px solid red;">
            <i class="bi bi-check-circle-fill me-2 fs-4 text-success"></i>
            <div class="flex-grow-1">
                {{ session('err') }}
              
            </div>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pt-2">
        <div class="container mt-5 pt-3">
            <div class="my-0 p-0">

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
                        Forget Password
                    </div>

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form action="{{ route('forgotPwdPost') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">EMAIL</label>
                                    <input type="text" class="form-control mb-0" name="email">
                                    @error('email')
                                        <small class="p-0 mb-1 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-button d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-primary mx-2">SEND</button>
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
@endsection