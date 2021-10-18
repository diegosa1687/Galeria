@extends('layouts.app')

@section('content')
    {{ $username }}
    {{ Auth::user()->username }}
@endsection