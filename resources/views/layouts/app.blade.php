<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/galeria.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <title>Galeria de Imagens</title>
</head>
<body>

<div id="app">
    <header class="app-navbar">
        @component('components/navbar') @endcomponent
    </header>

    <div class="app-main">
        @hasSection ('content') @yield('content') @endif
        @component('components/add-image-button') @endcomponent
        @component('components/alerts') @endcomponent
    </div>

    <footer class="app-footer">
        @component('components/footer') @endcomponent
    </footer>
</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/style.js') }}" type="text/javascript"></script>
@hasSection ('script') @yield('script') @endif
</body>
</html>