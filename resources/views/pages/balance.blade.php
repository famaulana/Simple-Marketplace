@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Prepaid Balance</h1>
        @if($errors->first('err'))
            <p class="text-danger">{{$errors->first()}}</p>
        @endif
        <form action="{{ route('postRegist') }}" method="post">
            @csrf
            <div class="col-md-12 my-2">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="col-md-12 my-2">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary px-5" type="submit">Register</button>
            </div>
            <div class="col-md-12 mt-2">
                <button class="btn btn-secondary px-5" onclick="window.location='{{ route("login") }}'" type="button">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection