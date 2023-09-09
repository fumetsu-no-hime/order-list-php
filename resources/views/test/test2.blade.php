@extends('layout.template-front')
@section('user')
    <div class="container d-flex flex-column gap-3">
        <div>step2</div>
        <div>電話:{{ $phone }}</div>
        <a href="{{ route('test.step1') }}"><button>step1</button></a>
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
