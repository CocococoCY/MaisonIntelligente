@php
    $user = auth()->user();
    $settings = \App\Models\Setting::first();
    $color = $settings->couleur_principale ?? '#0d6efd';
    $nomPlateforme = $settings->nom_plateforme ?? 'Maison Connectée';
    $logo = $settings->logo ?? null;
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', $nomPlateforme)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/fond/smart-home.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .navbar {
            background-color: black !important;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.2);
        }
        
        body {
            background: url("{{ asset('images/smart-home.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
    </style>

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark px-3">
    <a class="navbar-brand text-white" href="{{ route('menu') }}">Maison Connectée</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

            @auth
                
                <li class="nav-item"><a class="nav-link" href="{{ route('objets.recherche') }}"> Recherche</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('niveau.index') }}"> Mon niveau</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"> Membres</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profil.edit') }}"> Mon profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('boutique.connexion') }}"> Boutique</a></li>

                @if($user->niveau === 'Avancé' || $user->niveau === 'Expert')
                    <li class="nav-item"><a class="nav-link" href="{{ route('objets.index') }}"> Objets</a></li>
                @endif

                @if($user->niveau === 'Expert')
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"> Admin</a></li>
                @endif

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link btn btn-link text-white" type="submit"> Déconnexion</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('connexion') }}">Se connecter</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('inscription') }}">S'inscrire</a></li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
