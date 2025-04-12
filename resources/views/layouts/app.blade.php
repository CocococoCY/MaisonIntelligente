@php
    $settings = \App\Models\Setting::first();
    $color = $settings->couleur_principale ?? '#0d6efd'; 
    $nomPlateforme = $settings->nom_plateforme ?? 'Maison Connectée';
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', $nomPlateforme)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: url("/storage/smart-home.jpg") no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(5px);
            color: #f8f9fa;
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.85);
        }

        .navbar-brand {
            font-weight: bold;
            color: {{ $color }};
        }

        .dropdown-menu {
            background-color: #1f1f1f;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: {{ $color }};
        }

        .btn-logout {
            border: none;
            background-color: #dc3545;
            color: white;
            border-radius: 4px;
            padding: 6px 10px;
        }

        .container {
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('menu') }}">{{ $nomPlateforme }}</a>

        <!-- Menu burger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav text-end">
                @if(auth()->check() && (auth()->user()->type === 'expert' ||auth()->user()->type === 'avancé'|| auth()->user()->email === 'corent1.lebris@gmail.com'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('objets.index') }}">Objets</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('objets.recherche') }}"> Rechercher</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profil.edit') }}"> Mon profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"> Membres</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('niveau.index') }}"> Mon niveau</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('boutique.connexion') }}"> Boutique</a></li>
                @if(auth()->check() && (auth()->user()->type === 'expert' || auth()->user()->email === 'corent1.lebris@gmail.com'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"> Admin</a></li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration: none;">
                             Déconnexion
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
