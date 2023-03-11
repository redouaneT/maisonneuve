<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'email', 'phone', 'date_de_naissance', 'adresse', 'ville_id'];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
