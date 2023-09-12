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
                    $total = 0;
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
                                onchange="checkQty(id)">
                            <button type="button" class="controlBtn minus" onclick="minus({{ $item->id }})">-</button>
                        </div>
                        <div id="price{{ $item->id }}">${{ $item->product->price * $item->qty }}</div>
                    </div>
                @endforeach
            </div>
            <div class="order-details-footer d-flex justify-content-between align-items-center p-3 border rounded-bottom">
                <div>Subtotal</div>
                <div id="total">${{ $total }}</div>
            </div>
        </div>
        <input id="addCartRoute" type="hidden" value="{{ route('front.addCart') }}">
        {{-- 按鈕 --}}
        @if ($carts->count())
            <div class="d-flex justify-content-end py-3">
                <a href="{{ route('user.del') }}">
                    <button type="button" class="btn btn-success">Next</button>
                </a>
            </div>
        @endif
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
            fetchQty(id, input.value);
        }

        function plus(id) {
            const input = document.querySelector(`input#product${id}`);
            input.value++;
            fetchQty(id, input.value);
        }

        //id = cart_id qty = 商品數量
        function fetchQty(id, qty) {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'put');
            formData.append('qty', qty);
            formData.append('cart_id', id);
            fetch('{{ route('cart.update') }}', {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.json();
            }).then((data) => {
                const price = document.querySelector(`#price${id}`);
                const totalEl = document.querySelector('#total');
                price.textContent = '$' + `${data.price}`;

                const totalPrice = document.querySelectorAll(`[id^=price]`);
                let total = 0;
                totalPrice.forEach(element => {
                    const price = parseInt(element.textContent.substring(1));
                    total += price;
                    totalEl.textContent = '$' + total;
                });
            });
        }

        function checkQty(id) {
            const input = document.querySelector(`input#product${id}`);
            if (input.value <= 0) {
                input.value == 1
            }
            fetchQty(id, qty);
        }
    </script>
@endsection
