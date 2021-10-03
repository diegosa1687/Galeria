@extends('layouts.mail')

@section('header')
    Aqui está o header.
@endsection

@section('content')
    <a href="{{ $url }}" class="btn btn-info">Recuperar Senha</a>
@endsection

@section('footer')
    Aqui está o footer.
@endsection