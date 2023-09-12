@extends('layout.template-front')
@section('head')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .btns {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid;
            border-radius: 10px;
        }

        .btns input {
            border: none;
            outline: none;
            width: 50px;
            text-align: center;
        }

        .controlBtn {
            border: none;
            background-color: white;
            padding: 10px 15px;
        }

        .plus {
            border-right: 1px solid;
            border-radius: 10px 0 0 10px;
        }

        .minus {
            border-left: 1px solid;
            border-radius: 0 10px 10px 0;
        }
    </style>
@endsection
@section('user')
    <main class="container my-1">
        {{-- 分頁標籤 --}}
        <div>
            <span class="text-success">Home</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
            <span class="text-success">Shop</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
            <span class="text-muted">Shop Checkout</span>
        </div>

        {{-- 標題 --}}
        <div class="title py-4 mb-4 px-2 w-100">
            <h2 class="fw-medium w-50 bold">Checkout</h2>
            <div class="text-muted">Already have an account? Click here to
                <a href="{{ route('login') }}" class="text-success">Sign in</a>.
            </div>
        </div>

        {{-- 商品列表 --}}
        <div>
            <div class="order-details-head border rounded-top">
                <div class="p-3">Order Details</div>
            </div>
            <div class="order-details-body">
                @php
                    $totalAmount = 0;
                @endphp
                @foreach ($carts ?? [] as $item)
                    <div class="p-3 d-flex justify-content-between align-items-center border">
                        <div>
                            <img style="width:150px;" src="{{ asset($item->product->img_path) }}" alt="">
                        </div>
                        <div>
                            <div class="product-name">品名 : {{ $item->product->name }}</div>
                            <div class="product-desc text-muted">{{ $item->product->desc }}</div>
                        </div>
                        <div class="btns">
                            <button type="button" class="controlBtn plus" onclick="plus({{ $item->id }})">+</button>
                            <input id="product{{ $item->id }}" type="number" value="{{ $item->qty }}"
                                onchange="updateQtyTotal(this, {{ $item->product->price }})">
                            <button type="button" class="controlBtn minus" onclick="minus({{ $item->id }})">-</button>
                        </div>
                        <div>${{ $item->product->price * $item->qty }}</div>
                    </div>
                    @php
                        $totalAmount += $item->product->price * $item->qty;
                    @endphp
                @endforeach
            </div>
            <div class="order-details-footer d-flex justify-content-between align-items-center p-3 border rounded-bottom">
                <div>Subtotal</div>
                <div>${{ $totalAmount }}</div>
            </div>
        </div>
        <input id="addCartRoute" type="hidden" value="{{ route('front.addCart') }}">
        {{-- 按鈕 --}}
        <div class="d-flex justify-content-end py-3">
            <a href="{{ route('user.del') }}">
                <button type="button" class="btn btn-success">Next</button>
            </a>
        </div>
    </main>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const addCartRoute = document.querySelector(`input#addCartRoute`).value;

        function minus(id) {
            const input = document.querySelector(`input#product${id}`);
            if (input.value == '1') return;
            input.value--;
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('qty', input.value);
            formData.append('product_id', id);
            fetch(addCartRoute, {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.json();
            }).then((data) => {
                // console.log(data);
            });
        }

        function plus(id) {
            const input = document.querySelector(`input#product${id}`);
            input.value++;
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('qty', input.value);
            formData.append('product_id', id);
            fetch(addCartRoute, {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.json();
            }).then((data) => {
                // console.log(data);
            });
        }

        function checkQty(el) {
            if (el.value <= 0) {
                el.value == 1
            }
        }
    </script>
@endsection
