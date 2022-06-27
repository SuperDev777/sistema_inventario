<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'campus_id',
        'codigo',
        'tipo',
        'marca',
        'modelo',
        'numserie',
        'mac',
        'procesador',
        'ram',
        'tipodisco',
        'capacidaddisco',
        'sistemaoperativo',
        'adquisicion',
        'observacion',
        'user_id',
    ];
    
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
