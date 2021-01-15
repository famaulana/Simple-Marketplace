@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Product Page</h1>
        @if($errors->first('succ'))
            <p class="text-success">{{$errors->first()}}</p>
        @elseif($errors->first('err'))
            <p class="text-danger">{{$errors->first()}}</p>
        @elseif($errors->any())
                <p class="text-danger">{{$errors->first()}}</p>
        @endif
        <form action="{{ route('postProduct') }}" method="post">
            @csrf
            <div class="col-md-12 my-2">
                <textarea name="product" class="form-control" minlength="10" maxlength="150" cols="30" rows="5" placeholder="product" required></textarea>
            </div>
            <div class="col-md-12 my-2">
                <textarea name="ship_address" class="form-control" minlength="10" maxlength="150" cols="30" rows="5" placeholder="shiping address" required></textarea>
            </div>
            <div class="col-md-12 my-2">
                <input type="number" class="form-control" name="price" placeholder="price" required>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary px-5" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection