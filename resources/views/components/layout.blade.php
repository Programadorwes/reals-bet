<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.6/dist/inputmask.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    @if (!empty($title))
        <title>{{ $title }}</title>
    @else
        <title>RealsBet</title>
    @endif
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('users.index') }}">
                <img src="{{ asset('imageS/realsbet-logo.png') }}" alt="LOGO" style="height: 50px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('users*') ? 'text-white' : '' }}"
                                href="{{ route('users.index') }}">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('affiliates*') ? 'text-white' : '' }}"
                                href="{{ route('affiliates.index') }}">Afiliados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('commissions*') ? 'text-white' : '' }}"
                                href="{{ route('commissions.index') }}">Comissões</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </nav>

    <div class="container">
        @if (!empty($title))
            <h1 class="mt-3">{{ $title }}</h1>
        @endif

        {{ $slot }}
    </div>
    <script src="{{asset('js/custom.js')}}">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
