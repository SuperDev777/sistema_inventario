<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detailorders';

    protected $fillable = [
        'cantidad',
        'unidadmedida',
        'descripcion',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
