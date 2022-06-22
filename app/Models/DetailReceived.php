<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReceived extends Model
{
    use HasFactory;

    protected $table = 'detailreceives';

    protected $fillable = [
        'cantidad',
        'unidadmedida',
        'descripcion',
        'received_id'
    ];

    public function received()
    {
        return $this->belongsTo(Received::class);
    }
}
