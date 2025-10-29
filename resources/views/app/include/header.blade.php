<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a href="/home">    <img src="{{ asset('images/logo2.png') }}" alt="" class="nav-logo"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/home" id="nav-a">Home</a>
        <a class="nav-link" href="{{route('apt_page')}}" id="nav-a">Appointment</a>
        <a class="nav-link disabled" href="#">{{ auth()->user()->name }}</a>
        
        {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
      </div>
      <div class="d-flex ">
        <a class="btn btn-outline-primary me-3 px-2 py-1" href="{{ route('cp_page') }}">Change Password</a>
        <a class="btn btn-outline-danger px-2 py-1" href="{{ route('logout') }}">Logout</a>
      </div>
    </div>
  </div>
</nav>