@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détail de l'objet connecté</h2>

    <p><strong>Nom :</strong> {{ $objet->nom }}</p>
    <p><strong>Type :</strong> {{ $objet->typeObjet->nom ?? '-' }}</p>
    <p><strong>Zone :</strong> {{ $objet->zone->nom ?? '-' }}</p>
    <p><strong>État :</strong> {{ $objet->etat }}</p>

    <a href="{{ route('objets.recherche') }}" class="btn btn-secondary">🔙 Retour à la recherche</a>
</div>
@endsection
