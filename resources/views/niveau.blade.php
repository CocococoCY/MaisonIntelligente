@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Mon niveau & points</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <p><strong>Niveau actuel :</strong> {{ $user->niveau }}</p>
  <p><strong>Points :</strong> {{ $user->points }}</p>

  @php
    $niveaux = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
    $pointsRequis = ['Débutant' => 0, 'Intermédiaire' => 5, 'Avancé' => 10, 'Expert' => 15];
    $indexActuel = array_search($user->niveau, $niveaux);
    $prochain = $indexActuel + 1 < count($niveaux) ? $niveaux[$indexActuel + 1] : null;
  @endphp

  @if($prochain && $user->points >= $pointsRequis[$prochain])
    <form action="{{ route('niveau.demander') }}" method="POST">
      @csrf
      <button class="btn btn-success">Demander le niveau : {{ $prochain }}</button>
    </form>
    @elseif($prochain && $user->points < $pointsRequis[$prochain])
     <p>Vous n'avez pas encore assez de points pour le prochain niveau.</p>
    @elseif($user->niveau === 'Expert' || $user->points >= 15)
     <p>Vous avez atteint le niveau maximum !</p>
    @endif

</div>
@endsection
