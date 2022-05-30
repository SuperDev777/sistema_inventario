<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'codigo',
        'tipo',
        'marca',
        'descripcion',
        'stock',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
