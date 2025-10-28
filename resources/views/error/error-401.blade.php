@extends('app.login_layout')
@section('content')
   <div style="background: #000; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="text-align: center; display: flex; flex-direction: column; align-items: center;">
        <img src="{{ asset('images/logo2.png') }}" alt="Error 401"
             style="max-width: 80%; height: auto; display: block; margin: 0 auto;">
             <div>
                <h1 class="text-light mt-4">401 Unauthorized</h1>
             </div>
        <a class="btn btn-outline-light mt-4" href="/home">
            Go Back To Home Page <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>


@endsection