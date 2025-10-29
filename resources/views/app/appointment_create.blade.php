@extends('app.layout')
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
        <div class="d-flex justify-content-start align-items-center ms-4">
            <a href="{{ route('apt_page') }}" class="btn btn-dark"> <i class="fa-solid fa-left-long"></i> Back to Appointments</a>
        </div>
        <div class="container mt-3 pt-3" style=" margin-bottom: 130px;">
            <div class="my-0 p-0">

            </div>
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="mt-3">
                        <img src="{{ asset('images/logo2.png') }}" alt="" class="login-img">
                    </div>
                    <div class="col-lg-12 login-title">
                        Appointment Create
                    </div>
                    {{-- <div class="col-lg-12 text-light h4 fw-bold mb-0">
                        Change Password
                    </div> --}}

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form action="{{ route('apt_create_post') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label text-uppercase">Title</label>
                                    <input type="text" class="form-control mb-0" name="title">
                                    @error('title')
                                        <small class="p-0 mb-1 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-uppercase">Description</label>
                                    {{-- <textarea name="" id=""> --}}

                                    <textarea id="text-area-reg" class="form-control mb-0" name="description"></textarea>
                                    @error('description')
                                        <small class="p-0 mb-1 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label text-uppercase">Appointment Date</label>
                                    <input type="date" class="form-control mb-0" name="appointment_date">
                                    @error('appointment_date')
                                        <small class="p-0 mb-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label text-uppercase">Appointment TIme</label>
                                    <input type="time" class="form-control mb-0" name="appointment_time">
                                    @error('appointment_time')
                                        <small class="p-0 mb-0 text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-12 login-button d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-primary mx-2">CREATE</button>
                                        <button type="reset" class="btn btn-outline-secondary mx-2">CANCEL</button>
                                    </div>
                                    <div class="col-lg-12 login-button d-flex justify-content-center mb-0">
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
