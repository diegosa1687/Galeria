<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/galeria.png') }}" alt="Logo" width="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto mt-2 mt-sm-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Início</a>
            </li>
            <li class="nav-item" data-toggle="modal" data-target="#image">
                <a class="nav-link" href="#"><i class="fas fa-plus-circle" style="margin-right: 6px"></i>Nova Imagem</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-sm-0">
            @guest
                @if (Route::has('login'))
                    <a class="btn btn-outline-light mr-3 rounded-pill" href="{{ route('login') }}" data-toggle="modal" data-target="#login-register" id="btn-login">Entrar</a>
                @endif
                @if (Route::has('register'))
                    <a class="btn btn-outline-light rounded-pill" href="{{ route('register') }}" data-toggle="modal" data-target="#login-register" id="btn-register">Cadastrar</a>
                @endif
            @else
                <div class="nav-item dropdown">
                    <a id="navbarUser" class="navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('img/user.png') }}" width="35px" class="d-inline-block align-top">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>

<div class="modal fade" id="image" tabindex="-1" aria-labelledby="imageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="imageLabel">Selecione a Imagem</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('enviar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image"><span id="file-name">Selecione uma imagem</span></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-light rounded-pill" id="enviar">Enviar</button>
                    <button type="button" class="btn btn-outline-light rounded-pill" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login-register" tabindex="-1" aria-labelledby="login-registerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white">
            <ul class="nav nav-tabs" id="login-register-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Entrar</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Cadastrar</a>
                </li>
            </ul>
            <div class="tab-content" id="login-register-tabsContent">
                <div class="tab-pane fade m-5 show" id="login" style="margin-top: 20px !important;" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <blockquote class="blockquote">
                            <strong><p>Entrar</p></strong>
                        </blockquote>
                        <div class="form-group mb-3">
                            <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu E-Mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Digite sua senha">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input class="check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="check-label" for="remember">Lembrar de mim</label>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn button rounded-pill">Entrar</button>
                        </div>
                        <div class="form-group mb-3">
                            <a class="btn button rounded-pill" href="{{ route('password.request') }}">Esqueci a senha</a>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade m-5" id="register" role="tabpanel" style="margin-top: 20px !important;" aria-labelledby="register-tab">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <blockquote class="blockquote">
                            <strong><p>Cadastrar</p></strong>
                        </blockquote>
                        <div class="form-group">
                            <input type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Digite seu nome" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Digite seu username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Digite o seu email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Digite sua senha">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Digite sua senha novamente">
                        </div>
                        <div class="form-group form-check">
                            <input class="check-input" type="checkbox" id="accept-terms" name="accept-terms">
                            <label class="check-label" for="accept-terms">Li e aceito os termos e condições do site</label>
                            <p><a href="#">Termos e condições</a></p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn button rounded-pill">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>