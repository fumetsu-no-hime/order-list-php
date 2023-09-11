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
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4">
            @foreach ($products ?? [] as $product)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset($product->img_path) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->desc }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="btns">
                                    <button type="button" class="controlBtn plus"
                                        onclick="plus({{ $product->id }})">+</button>
                                    <input id="product{{ $product->id }}" type="number" value="1"
                                        onchange="checkQty(this)">
                                    <button type="button" class="controlBtn minus"
                                        onclick="minus({{ $product->id }})">-</button>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="addCart({{ $product->id }})">加入購物車</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <input id="addCartRoute" type="hidden" value="{{ route('front.addCart') }}">
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const addCartRoute = document.querySelector(`input#addCartRoute`).value;
        console.log(addCartRoute);

        function minus(id) {
            const input = document.querySelector(`input#product${id}`);
            if (input.value === '1') return;
            input.value--;
        }

        function plus(id) {
            const input = document.querySelector(`input#product${id}`);
            input.value++;
        }

        function checkQty(el) {
            if (el.value <= 0) {
                el.value == 1
            }
        }

        function addCart(id) {
            const input = document.querySelector(`input#product${id}`)
            if (parseInt(input.value) <= 0) return;
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
                if (data.code == 1) {
                    Swal.fire('成功加入商品')
                }
            });
        }
    </script>
@endsection
