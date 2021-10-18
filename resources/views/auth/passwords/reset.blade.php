@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white v-centered" style="background: linear-gradient(#468faf, #014f86); width: 500px;">
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <blockquote class="blockquote">
                        <strong><p>Alterar senha</p></strong>
                    </blockquote>
                    <div class="input-box mb-3">
                        <input id="email" type="email" class="input-field" name="email" value="{{ $email }}" required autofocus readonly>
                    </div>
                    <div class="input-box mb-3">
                        <input id="password" type="password" class="input-field" name="password" required autocomplete="new-password" placeholder="Nova senha">
                    </div>
                    <div class="input-box mb-3">
                        <input id="password-confirm" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn button rounded-pill">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
