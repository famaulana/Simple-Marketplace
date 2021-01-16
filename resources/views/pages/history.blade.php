@extends('template')
@extends('component/navbar')
@section('content')
<div class="container my-5">
    <div class="row">
        <h1>Order History</h1>
        @foreach ($dataHistory as $data)
            {{-- @foreach ($data as $key1 => $item) --}}
            <div class="row border border-start-0 border-end-0 py-3">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6"><b>{{$data['nomor']}}</b></div>
                        <div class="col-md-6"><b>Rp {{$data['price']}}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">Rp {{$data['price']}} -> {{$data['name']}}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    @if ($data['status'] == "pending")
                    <button class="btn btn-primary" type="submit" onclick="window.location=('/pay/{{$data['nomor']}}')">Pay Now</button>
                    @else
                        @if ($data['status'] == "success")
                            <p class="text-success">{{$data['status']}}</p>
                        @elseif($data['status'] == "pending")
                            <p class="text-warning">{{$data['status']}}</p>
                        @elseif($data['status'] == "cancel")
                            <p class="text-danger">{{$data['status']}}</p>
                        @endif
                    @endif
                </div>
            </div>
            {{-- @endforeach --}}
        @endforeach
    </div>
</div>
@endsection