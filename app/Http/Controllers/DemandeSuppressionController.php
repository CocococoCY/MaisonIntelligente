<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeSuppression;
use App\Models\ObjetConnecte;
use Illuminate\Support\Facades\Auth;

class DemandeSuppressionController extends Controller
{
    public function store($id)
    {
        $objet = ObjetConnecte::findOrFail($id);

        $existante = DemandeSuppression::where('objet_connecte_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existante) {
            return redirect()->back()->with('error', 'Une demande de suppression a déjà été envoyée pour cet objet.');
        }

        DemandeSuppression::create([
            'objet_connecte_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Demande de suppression envoyée à l’administrateur.');
    }
}