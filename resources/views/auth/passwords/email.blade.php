@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white v-centered" style="background: linear-gradient(#468faf, #014f86); max-width: 90%; width: 500px;">
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <blockquote class="blockquote">
                        <strong><p>Recuperar senha</p></strong>
                    </blockquote>
                    <div class="input-box mb-3">
                        <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu E-Mail">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn button rounded-pill">Enviar link para recuperar senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection