@extends('layouts.gestionlayout')

@section('content')
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-white">
          
            Objets Connectés
        </h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="table-container p-4 rounded" style="background: rgba(0, 0, 0, 0.6); width: 90%;">
            <table class="table table-dark table-striped text-center align-middle rounded overflow-hidden">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>État</th>
                        <th>Zone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objets as $objet)
                        <tr>
                            <td>{{ $objet->nom }}</td>
                            <td>{{ $objet->type }}</td>
                            <td>
                                @if(strtolower($objet->etat) === 'actif')
                                    <span class="badge bg-success text-uppercase">{{ $objet->etat }}</span>
                                @else
                                    <span class="badge bg-danger text-uppercase">{{ $objet->etat }}</span>
                                @endif
                            </td>

                            <td>{{ $objet->zone?->nom ?? 'Non attribuée' }}</td>
                            <td>
                                <a href="{{ route('objets.edit', $objet->id) }}" class="btn btn-warning btn-sm">✏️</a>
                                @php
                                    $demandeExistante = \App\Models\DemandeSuppression::where('objet_connecte_id', $objet->id)
                                                            ->where('user_id', auth()->id())
                                                            ->exists();
                                @endphp

                                @if (!$demandeExistante)
                                    <form action="{{ route('demande.suppression', $objet->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                                    </form>
                                @else
                                    <span class="btn btn-outline-light btn-sm disabled" style="border: 1px solid white;">📨 Demande envoyée</span>

                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
