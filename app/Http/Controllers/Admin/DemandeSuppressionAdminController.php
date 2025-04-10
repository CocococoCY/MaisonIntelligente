<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeSuppression;

class DemandeSuppressionAdminController extends Controller
{
    public function index()
    {
        $demandes = DemandeSuppression::with('objet', 'user')->latest()->get();
        return view('admin.adminSuppression', compact('demandes'));
    }

    public function accepter($id)
    {
        $demande = DemandeSuppression::findOrFail($id);
        $demande->objet?->delete(); // Supprime l’objet s’il existe
        $demande->delete();

        return back()->with('success', 'Demande acceptée et objet supprimé.');
    }

    public function refuser($id)
    {
        DemandeSuppression::findOrFail($id)->delete();
        return back()->with('info', 'Demande refusée.');
    }
}