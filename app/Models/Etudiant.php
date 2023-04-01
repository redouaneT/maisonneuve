<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nom', 'phone', 'date_de_naissance', 'adresse', 'ville_id', 'user_id'];

    /**
     * Get the ville that owns the Etudiant
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function ville()
    {
        return $this->belongsTo(Ville::class, "ville_id");
    }

    /**
     * Get the user that owns the Etudiant
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
