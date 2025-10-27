<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APS</title>
    {{-- Css link --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap.css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css">
</head>

<body style="background-color: #A2A4A4;">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    {{-- bootstrap.js link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/appAdmin.js') }}"></script>
</body>

</html>
