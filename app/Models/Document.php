<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'type',
        'user_id',
        'original_name',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
