<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/galeria.png') }}" alt="Logo" width="30px" height="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Início</a>
            </li>
            <li class="nav-item" data-toggle="modal" data-target="#image">
            <a class="nav-link" href="#"><i class="fas fa-plus-circle" style="margin-right: 6px"></i>Nova Imagem</a>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="image" tabindex="-1" aria-labelledby="imageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageLabel">Selecione a Imagem</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('enviar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>