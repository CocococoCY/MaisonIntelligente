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
            <p><strong>Type :</strong> {{ $objet->typeObjet->nom ?? '-' }}</p>
            <p><strong>Zone :</strong> {{ $objet->zone->nom ?? '-' }}</p>
            <p><strong>État :</strong> {{ $objet->etat }}</p>
        </div>
    @elseif(isset($query))
        <p>Aucun objet trouvé avec ce nom.</p>
    @endif
</div>
@endsection
