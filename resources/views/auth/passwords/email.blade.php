@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white v-centered" style="background-color: #1c1c1c; max-width: 90%; width: 500px;">
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <blockquote class="blockquote">
                        <strong><p>Recuperar senha</p></strong>
                    </blockquote>
                    <div class="form-group mb-3">
                        <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu E-Mail">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn button rounded-pill">Enviar link para recuperar senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('status'))
    <div id="message-alert" class="alert alert-dark" role="alert">
        <i class="fas fa-check-circle check"></i>
        {{ session('status') }}
    </div>
@endif

@error('email')
    <div id="message-alert" class="alert alert-dark" role="alert">
        <i class="fas fa-times-circle times"></i>
        {{ $message }}
    </div>
@enderror
@endsection