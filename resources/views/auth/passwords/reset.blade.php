@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white v-centered" style="background-color: #1c1c1c; max-width: 90%; width: 500px;">
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <blockquote class="blockquote">
                        <strong><p>Alterar senha</p></strong>
                    </blockquote>
                    <div class="form-group mb-3">
                        <input id="email" type="email" class="form-input" name="email" value="{{ $email }}" required autofocus readonly>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn button rounded-pill">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
