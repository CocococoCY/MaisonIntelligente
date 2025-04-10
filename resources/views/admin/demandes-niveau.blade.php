@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📋 Demandes de montée de niveau</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($demandes->isEmpty())
        <p>Aucune demande de niveau en attente.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead style="background-color: #f8f9fa; color: #333;">
                <tr>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Niveau actuel</th>
                    <th>Niveau demandé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->user->name ?? 'Nom inconnu' }}</td>
                        <td>{{ $demande->user->email }}</td>
                        <td>{{ $demande->user->niveau }}</td>
                        <td>{{ $demande->niveau_demande }}</td>
                        <td>
                            <form action="{{ route('admin.niveau.accepter', $demande->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">✅ Accepter</button>
                            </form>
                            <form action="{{ route('admin.niveau.refuser', $demande->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">❌ Refuser</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">⬅ Retour</a>
</div>
@endsection
