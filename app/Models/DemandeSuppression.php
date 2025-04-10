<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeSuppression extends Model
{
    use HasFactory;

    
    
    protected $table = 'demande_suppression'; // ← force Laravel à utiliser le bon nom

    protected $fillable = ['objet_connecte_id', 'user_id'];
    // Dans DemandeSuppression.php
    public function objet() {
        return $this->belongsTo(ObjetConnecte::class, 'objet_connecte_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
