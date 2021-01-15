@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Prepaid Balance</h1>
        @if($errors->first('succ'))
            <p class="text-success">{{$errors->first()}}</p>
        @elseif($errors->first('err'))
            <p class="text-danger">{{$errors->first()}}</p>
        @elseif($errors->any())
                <p class="text-danger">{{$errors->first()}}</p>
        @endif
        <form action="{{ route('postBalance') }}" method="post">
            @csrf
            <div class="col-md-12 my-2">
                <input type="number" class="form-control" name="mobile_number" placeholder="Mobile Number" required>
            </div>
            <div class="col-md-12 my-2">
                <select class="form-select" aria-label="Default select example" name="value" required>
                    <option selected disabled>Value</option>
                    <option value="10000">10.000</option>
                    <option value="50000">50.000</option>
                    <option value="100000">100.000</option>
                </select>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary px-5" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection