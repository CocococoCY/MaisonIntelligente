<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cache;

class AddLoginPoints
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        // Ne pas ajouter de points aux admins (si tu veux les exclure)
        if ($user->role === 'admin') return;

        $key = 'user_last_login_' . $user->id;

        
            $user->ajouterPoints(1);


           
        
    }
}
