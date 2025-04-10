@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Recherche d'un objet connecté</h2>

    <form action="{{ route('objets.recherche') }}" method="GET">
        <input type="text" name="q" placeholder="Nom de l'objet" value="{{ old('q', $query ?? '') }}">
        <button type="submit">Rechercher</button>
    </form>

    @if(isset($objet))
        <div style="margin-top: 20px;">
            <h4>Résultat :</h4>
            <p><strong>Nom :</strong> {{ $objet->nom }}</p>
            <a href="{{ route('objets.show', $objet->id) }}" class="btn btn-primary">Voir l’objet</a>
        </div>
    @elseif(isset($query))
        <p>Aucun objet trouvé avec ce nom.</p>
    @endif
</div>
@endsection
