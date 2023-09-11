@extends('layout.template')
@section('content-page')
<h1>歡迎，{{Auth::user()->name}}</h1>
@endsection
