<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
