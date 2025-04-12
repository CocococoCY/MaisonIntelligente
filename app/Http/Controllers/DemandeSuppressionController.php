<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ObjetConnecte;
use App\Models\DemandeSuppression;

class DemandeSuppressionController extends Controller
{
    public function store(Request $request, $objetId)
    {
        $objet = ObjetConnecte::findOrFail($objetId);

        DemandeSuppression::create([
            'objet_connecte_id' => $objet->id,
            'user_id' => Auth::id(),
            'statut' => 'en attente',
        ]);

        // 🔔 Message flash affiché après redirection
        return redirect()->route('objets.index')->with('success');
    }
}
