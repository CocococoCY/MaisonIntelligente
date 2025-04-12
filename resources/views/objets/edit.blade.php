@extends('layouts.formulaires')

@section('content')
<div class="form-container">
    <h2>✏️ Modifier un objet</h2>
    <form method="POST" action="{{ route('objets.update', $objet->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'objet</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $objet->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type" required>
                @foreach(['Lampe', 'Thermostat', 'Volets', 'Portail', 'Caméra', 'Aspirateur', 'Interphone'] as $type)
                    <option value="{{ $type }}" @if($objet->type === $type) selected @endif>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone</label>
            <select class="form-select" id="zone_id" name="zone_id">
                @foreach($zones as $zone)
                    <option value="{{ $zone->id }}" @if($objet->zone_id == $zone->id) selected @endif>{{ $zone->nom }}</option>
                @endforeach
            </select>
        </div>

        <div id="champs-supplementaires">
            <!-- Champs dynamiques (curseurs) ajoutés via JS -->
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>

<script>
    const typeSelect = document.getElementById('type');
    const champs = document.getElementById('champs-supplementaires');
    const typeInitial = '{{ $objet->type }}';

    function genererChamps() {
        const type = typeSelect.value;
        champs.innerHTML = '';

        if (type === 'Lampe') {
            champs.innerHTML += `
                <label for="intensite" class="form-label">Intensité lumineuse</label>
                <input type="range" class="form-range" id="intensite" name="intensite" min="0" max="100" value="{{ $objet->intensite ?? 50 }}">
            `;
        } else if (type === 'Thermostat') {
            champs.innerHTML += `
                <label for="temperature" class="form-label">Température cible</label>
                <input type="range" class="form-range" id="temperature" name="temperature" min="10" max="30" value="{{ $objet->temperature ?? 20 }}">
            `;
        } else if (type === 'Volets') {
            champs.innerHTML += `
                <label for="position" class="form-label">Position</label>
                <input type="range" class="form-range" id="position" name="position" min="0" max="100" value="{{ $objet->position ?? 0 }}">
            `;
        }
    }

    typeSelect.addEventListener('change', genererChamps);
    genererChamps();
</script>
@endsection
