@extends('app.layout')
@section('content')
<div class="text-light">
    Hello
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>
@endsection