@extends('layout.template-front')
@section('user')
    <div class="container d-flex flex-column gap-3">
        {{-- <button type="button" class="btn btn-primary" onclick="fetchData()">test</button> --}}
        <div>step1</div>
        <form action="{{ route('test.step1Store') }}" method="POST">
            @csrf
            <input type="tel" name="phone" value="{{ $phone }}">
            <button type="submit">下一步</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        function fetchData() {
            const formdata = new formData();
            formData.append('test', 123456);
            formData.append('_token', '{{ csrf_token() }}');
            fetch('/fetch/test', {
                method: 'POST',
                body: formdata,
            });
        }
    </script>
@endsection
