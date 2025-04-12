<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Liste tous les utilisateurs sauf l'utilisateur connecté
        $users = User::all(); // Inclut tous les utilisateurs, y compris celui connecté
        
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function niveau()
    {
        $user = \App\Models\User::find(Auth::id()); // ⚠️ rechargement depuis la BDD
        return view('users.niveau', compact('user'));
    }

}
