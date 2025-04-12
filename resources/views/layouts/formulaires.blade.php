// Nouveau layout pour les formulaires d'édition/création
// resources/views/layouts/formulaires.blade.php

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Formulaire')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background: url('/storage/images/smart-home.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.75);
            border-radius: 12px;
            padding: 30px;
            max-width: 700px;
            margin: 60px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">@yield('title')</h2>
        @yield('content')
    </div>
</body>
</html>
