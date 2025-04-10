<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeNiveau extends Model
{
    use HasFactory;

    protected $table = 'demande_niveau';

    protected $fillable = [
        'user_id',
        'niveau_demande',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
