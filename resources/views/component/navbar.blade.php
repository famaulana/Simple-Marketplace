
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row d-flex ">
            <div class="col-md-6 m-auto">
                <div class="row">
                    <h3 class="text-black">Hello, {{$userName}}</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="text-dark"><span class="text-danger">2</span> unpaid order</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-dark">Your balance <span class="text-success">Rp {{$userBalance}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 justify-content-end d-flex">
                <div class="col-md-6 border-end text-center d-flex">
                    <a href="{{route('prepaidBalance')}}" class="m-auto"><b>Prepaid Balance</b></a>
                </div>
                <div class="col-md-6 border-start text-center d-flex">
                    <a href="" class="m-auto"><b>Product Page</b></a>
                </div>
            </div>
        </div>
    </div>
</div>