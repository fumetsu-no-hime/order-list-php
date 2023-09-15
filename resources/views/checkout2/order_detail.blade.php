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
            @foreach ($order ?? [] as $key => $item)
                <div class="order-details-head border rounded-top d-flex justify-content-between">
                    <div class="p-3">第{{ $key + 1 }}筆訂單資訊</div>
                    <div class="p-3">{{ $item->created_at->format('Y/m/d') }}</div>
                </div>
                {{-- @dd($item->orderProduct) --}}
                @foreach ($item->orderProduct ?? [] as $product)
                    <div class="order-details-body">
                        <div class="p-3 d-flex justify-content-between align-items-center border">
                            <div>
                                <img style="width:150px" src="{{ asset($product->img_path) }}" alt="">
                            </div>
                            <div>
                                <div class="product-name">品名:{{ $product->product_name }}</div>
                                <div class="product-desc text-muted">產品描述:{{ $product->desc }}</div>
                            </div>
                            <div>數量:{{ $product->qty }}</div>
                            <div id="price">${{ $product->price * $product->qty }}</div>
                        </div>
                    </div>
                @endforeach
                <div
                    class="order-details-footer d-flex justify-content-between align-items-center p-3 border rounded-bottom">
                    <div>收件人 : {{ $item->name }}</div>
                    <div>地址 : {{ $item->address }}</div>
                    <div>日期 : {{ $item->date }}</div>
                    <div>電話 : {{ $item->phone }}</div>
                    <div>備註 : {{ $item->memo }}</div>
                </div>
                <div
                    class="order-details-footer d-flex justify-content-between align-items-center p-3 border rounded-bottom mb-2">
                    <div>訂單狀態 :
                        @if ($item->status == 1)
                            未繳費
                        @elseif ($item->status == 2)
                            已繳費
                        @elseif ($item->status == 3)
                            已出貨
                        @elseif ($item->status == 4)
                            完成訂單
                        @else
                            取消訂單
                        @endif
                    </div>
                    <div>總金額 : ${{ $item->subtotal }}</div>
                </div>
                <div id="nextBtn" class="d-flex justify-content-end py-3">
                    @if ($item->status == 1)
                        <form action="{{ route('order.backToPay') }}" method="POST">
                            @csrf
                            <input name="order_id" type="hidden" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-success">前往繳費</button>
                        </form>
                    @endif
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                <a href="{{ route('front.index') }}">
                    <button type="button" class="btn btn-success">回首頁</button>
                </a>
            </div>
        </div>
    </main>
@endsection
@if (Session::has('msg'))
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire('{{ Session::get('msg') }}')
        </script>
    @endsection
@else
@endif
