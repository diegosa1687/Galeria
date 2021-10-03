<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Galeria</title>
</head>
<body>
<div class="mail">
    <header class="mail-header">
        @hasSection ('header') @yield('header') @endif
    </header>

    <div class="mail-body">
        @hasSection ('content') @yield('content') @endif
    </div>

    <footer class="mail-footer">
        @hasSection ('footer') @yield('footer') @endif
    </footer>
</div>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>