@extends('layouts.app')

@section('title', 'Menu Principal')

@section('content')
<div class="text-center text-light">
    <h1 class="mb-5">Bienvenue dans votre maison connectée</h1>

    @foreach($pieces as $piece)
        <div class="card bg-dark text-white mb-4">
            <div class="card-header">
                <h5 class="mb-0">🛋 {{ $piece->nom }}</h5>
            </div>
            <div class="card-body">
                @forelse($piece->appareils as $appareil)
                    <p>🔌 {{ $appareil->nom }}</p>
                @empty
                    <p class="text-muted">Aucun appareil dans cette pièce.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection
