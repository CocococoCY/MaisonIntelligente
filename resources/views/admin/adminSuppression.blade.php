@extends('layouts.adminlayout')

@section('content')
    <div class="container mt-4">
    

        <h1>📋 Demandes de suppression</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        @if ($demandes->isEmpty())
            <p>Aucune demande pour le moment.</p>
        @else
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Objet</th>
                        <th>Utilisateur</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandes as $demande)
                        <tr>
                            <td>{{ $demande->objet->nom ?? 'Objet supprimé' }}</td>
                            <td>{{ $demande->user->name ?? 'Utilisateur inconnu' }}</td>
                            <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.demandes.accepter', $demande->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-success btn-sm">✅ Accepter</button>
                                </form>
                                <form action="{{ route('admin.demandes.refuser', $demande->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">❌ Refuser</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
ion
