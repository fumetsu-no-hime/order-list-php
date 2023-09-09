@extends('layout.template-front')
@section('user')
    <div class="container">
        <form action="{{ route('user.update') }}" method="POST" class="d-flex flex-column gap-3 my-3">
            @csrf
            <h3>帳號資訊</h3>
            <div>帳號:{{ $user->email }}</div>
            <div>
                <div>姓名:
                    <span class="username">{{ $user->name }}</span>
                </div>
                <input class="d-none" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div class="d-flex gap-3">
                <div class="d-none column-gap-3">
                    <button type="submit" class="btn btn-primary">確認送出</button>
                    <button type="button" class="btn btn-primary">刪除</button>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary" onclick="editmode()">編輯</button>
                </div>
            </div>
            @if ($errors->first())
                <input type="hidden" id="error" value="{{ $errors->first() }}">
            @endif
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function editmode() {
            const nameInput = document.querySelector('input[name="name"]');
            const username = document.querySelector('.username');
            const btns = document.querySelector('.d-none.column-gap-3');

            username.classList.add('d-none');
            nameInput.classList.remove('d-none');
            btns.classList.remove('d-none');
            btns.classList.add('d-flex');
        }

        const error = document.querySelector('input#error');
        Swal.fire({
            icon: 'error',
            title: error.value,
        })
    </script>

    {{-- @if ($errors->first())
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ $errors->first() }}',
            })
        </script>
    @endif --}}
@endsection
