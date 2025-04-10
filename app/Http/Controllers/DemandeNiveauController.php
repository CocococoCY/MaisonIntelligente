<?php

namespace App\Http\Controllers;

use App\Models\DemandeNiveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeNiveauController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::find(Auth::id());

        return view('niveau', ['user' => $user]);
    }

    public function demander(Request $request)
    {
        $user = Auth::user();

        // Déterminer le prochain niveau
        $niveaux = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
        $points_requis = [
            'Débutant' => 0,
            'Intermédiaire' => 5,
            'Avancé' => 10,
            'Expert' => 15,
        ];

        $index_actuel = array_search($user->niveau, $niveaux);
        $prochain = $niveaux[$index_actuel + 1] ?? null;

        if ($prochain && $user->points >= $points_requis[$prochain]) {
            DemandeNiveau::create([
                'user_id' => $user->id,
                'niveau_demande' => $prochain,
                'statut' => 'en_attente',
            ]);
            return back()->with('success', 'Demande de montée en niveau envoyée.');
        }

        return back()->with('error', 'Points insuffisants ou niveau max atteint.');
    }
}
