@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Transaction Detail!</h1>
        <div class="row">
            <div class="col-md-6 border"><b>Order no.</b></div>
            <div class="col-md-6 border text-end"><b>{{$data->no_order}}</b></div>
        </div>
        <div class="row">
            <div class="col-md-6 border"><b>Total</b></div>
            <div class="col-md-6 border text-end"><b>Rp. {{$data->price}}</b></div>
        </div>
        <div class="row my-5">
            <p>{{$data->product}} that cost {{$data->price}} will be shipped to:</p>
            <p>-{{$data->ship_address}} only after you pay.</p>
        </div>
        <div class="row">
            <button class="btn btn-primary" type="button" onclick="window.location=('/pay/{{$data->no_order}}')">Pay Now!</button>
        </div>
    </div>
</div>
@endsection