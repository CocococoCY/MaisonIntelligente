<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestion des Objets')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("{{ asset('storage/smart-home.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #1a1a1a;
        }

        .nav-link {
            color: #fff !important;
            margin-left: 15px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .main-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            margin-top: 2rem;
            border-radius: 15px;
        }

        .table-dark th, .table-dark td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('menu') }}">Maison Connectée</a>
        <div class="d-flex">
            <a href="{{ route('objets.create') }}" class="nav-link">➕ Ajouter un objet</a>
            <a href="{{ route('statistiques.index') }}" class="nav-link">📊 Statistiques</a>
            <a href="{{ route('rapports.index') }}" class="nav-link">📋 Rapports</a>
           
        </div>
    </div>
</nav>

<div class="container main-container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
