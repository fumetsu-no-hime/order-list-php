@extends('layout.template-front')
@section('user')
    <div class="container d-flex flex-column p-3 gap-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-success">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop Checkout</li>
            </ol>
        </nav>
        <h3 class="fw-bolder">Checkout</h3>
        <p>Already have an account? Click here to <a href="">Sign in</a>.</p>

        <ul class="list-group">
            <li class="list-group-item">Order Details</li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><img src="{{ asset('img/product-img-1.jpg') }}" alt="" width="150"></span>
                <span>cadbury 5 star chocolate
                    <p>1kg</p>
                </span>
                <span>-1+</span>
                <span>$30.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><img src="{{ asset('img/product-img-1.jpg') }}" alt="" width="150"></span>
                <span>onion flavour potato
                    <p>250g</p>
                </span>
                <span>-1+</span>
                <span>$30.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Subtotal</span>
                <span>$30.00</span>
            </li>
        </ul>

        <div class="d-flex justify-content-end">
            <a href="{{ route('user.del') }}"><button class="btn btn-outline-dark border-5"
                    style="width: 100px">下一步</button></a>
        </div>
    </div>
@endsection
