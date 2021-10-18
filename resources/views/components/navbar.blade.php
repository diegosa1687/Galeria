<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('img/galeria.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="input-box">
            <input class="input-field" type="search" placeholder="Pesquisar" aria-label="Search">
            <a href="#" class="input-button">
                <span class="input-span"><i class="fas fa-search input-img" aria-hidden="true"></i></span>
            </a>
        </div>
        <div class="navbar-nav">
            @guest
                <a class="btn button btn-light rounded-pill" href="{{ route('login') }}" data-toggle="modal" data-target="#login-register" id="btn-login">Entrar</a>
                <a class="btn button btn-light rounded-pill" href="{{ route('register') }}" data-toggle="modal" data-target="#login-register" id="btn-register">Cadastrar</a>
            @else
                <a id="navbarUser" class="navbar-brand navbar-user" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('img/user.png') }}" class="d-inline-block align-top">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                    <a class="dropdown-item" href="{{ route('my-profile', Auth::user()->username) }}">Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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
                    <div class="input-file">
                        <label class="input-file-button" id="input-file-button">
                            <i class="fas fa-cloud-upload-alt mr-2"></i>
                            <span class="input-file-text" id="input-file-name">Selecionar</span>
                            <input type="file" id="image" class="input-file-field" name="image">
                        </label>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn button rounded-pill w-auto mr-2" id="enviar">Enviar</button>
                        <button type="button" class="btn button rounded-pill w-auto " data-dismiss="modal">Cancelar</button>
                    </div>
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
            <!-- LOGIN -->
            <div class="tab-content" id="login-register-tabsContent">
                <div class="tab-pane fade m-5 show" id="login" style="margin-top: 20px !important;" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <blockquote class="blockquote">
                            <strong><p>Entrar</p></strong>
                        </blockquote>
                        <div class="mb-3 input-box">
                            <input type="email" class="input-field" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu E-Mail">
                        </div>

                        <div class="mb-3 input-box">
                            <input type="password" class="input-field" name="password" required autocomplete="current-password" placeholder="Digite sua senha">
                        </div>

                        <div class="input-check mb-3">
                            <input class="check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="check-label" for="remember">Lembrar de mim</label>
                        </div>

                        <div class="input-group mb-3">
                            <button type="submit" class="btn button rounded-pill">Entrar</button>
                        </div>

                        <div class="input-group mb-3">
                            <a class="btn button rounded-pill" href="{{ route('password.request') }}">Esqueci a senha</a>
                        </div>
                    </form>
                </div>
                <!-- REGISTER -->
                <div class="tab-pane fade m-5" id="register" role="tabpanel" style="margin-top: 20px !important;" aria-labelledby="register-tab">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <blockquote class="blockquote">
                            <strong><p>Cadastrar</p></strong>
                        </blockquote>
                        <div class="input-box mb-3">
                            <input type="text" class="input-field" name="name" value="{{ old('name') }}" placeholder="Digite seu nome" required>
                        </div>
                        <div class="input-box mb-3">
                            <input type="text" class="input-field" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Digite seu username">
                        </div>
                        <div class="input-box mb-3">
                            <input type="email" class="input-field" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Digite o seu email">
                        </div>
                        <div class="input-box mb-3">
                            <input type="password" class="input-field" name="password" required autocomplete="new-password" placeholder="Digite sua senha">
                        </div>
                        <div class="input-box mb-3">
                            <input type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="Digite sua senha novamente">
                        </div>
                        <div class="input-check">
                            <input class="check-input" type="checkbox" id="accept-terms" name="accept-terms">
                            <label class="check-label" for="accept-terms">Li e aceito os termos e condições do site</label>
                            <p><a href="#">Termos e condições</a></p>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn button rounded-pill">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>