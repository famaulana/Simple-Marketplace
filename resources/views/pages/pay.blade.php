@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Pay Your Order</h1>
        @if($errors->first('succ'))
            <p class="text-success">{{$errors->first()}}</p>
        @elseif($errors->first('err'))
            <p class="text-danger">{{$errors->first()}}</p>
        @elseif($errors->any())
                <p class="text-danger">{{$errors->first()}}</p>
        @endif
        <form action="{{ route('payProcess') }}" method="post">
            @csrf
            <div class="col-md-12 my-2">
                <input type="number" class="form-control" name="no_order" placeholder="no_order" value="{{$data->no_order}}" required>
            </div>
            <button class="btn btn-primary col-md-12" type="submit">Pay Now!</button>
        </form>
    </div>
</div>
@endsection