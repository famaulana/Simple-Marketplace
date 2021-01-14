@extends('template')
@section('content')
    <div class="row">
        <h1>Register</h1>
        <form action="{{ route('postRegist') }}" method="post">
            <div class="col-md-12 my-2">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="col-md-12 my-2">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary px-5" type="submit">Register</button>
            </div>
            <div class="col-md-12 mt-2">
                <button class="btn btn-secondary px-5" onclick="window.location='{{ route("login") }}'" type="button">Login</button>
            </div>
        </form>
    </div>
@endsection