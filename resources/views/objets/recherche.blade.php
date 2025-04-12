@extends('layouts.app')


@section('content')

<div class="container">
    <h2>Recherche d'un objet connecté</h2>

    <form action="{{ route('objets.recherche') }}" method="GET">
    <select name="etat" class="form-select">
    <option value="">Tous les états</option>
    <option value="actif" {{ request('etat') == 'actif' ? 'selected' : '' }}>Actif</option>
    <option value="inactif" {{ request('etat') == 'inactif' ? 'selected' : '' }}>Inactif</option>
    </select>

    <select name="type" class="form-select">
    <option value="">Tous les types</option>
    @foreach($types as $type)
        <option value="{{ $type->nom }}" {{ request('type') == $type->nom ? 'selected' : '' }}>
        {{ ucfirst($type->nom) }}
        </option>
    @endforeach
    </select>

    <select name="zone" class="form-select">
    <option value="">Toutes les zones</option>
    @foreach($zones as $zone)
        <option value="{{ $zone->id }}" {{ request('zone') == $zone->id ? 'selected' : '' }}>
        {{ $zone->nom }}
        </option>
    @endforeach
    </select>

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
