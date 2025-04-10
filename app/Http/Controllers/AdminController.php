<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeNiveau;
use App\Models\User;

class AdminController extends Controller
{
    public function voirDemandes()
    {
        $demandes = DemandeNiveau::with('user')->latest()->get();
        return view('admin.demandes-niveau', compact('demandes'));
    }

    public function accepterDemande($id)
    {
        $demande = DemandeNiveau::findOrFail($id);
        $user = $demande->user;

        $user->niveau = $demande->niveau_demande;
        $user->save();
        $demande->delete();

        return redirect()->back()->with('success', 'Niveau accepté pour ' . $user->email);
    }

    public function refuserDemande($id)
    {
        $demande = DemandeNiveau::findOrFail($id);
        $demande->delete();

        return redirect()->back()->with('error', 'Demande refusée.');
    }
}
