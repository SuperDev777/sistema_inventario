<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Received extends Model
{
    use HasFactory;

    protected $table = 'receives';

    protected $fillable = [
        'area_id',
        'user_id',
        'jefeinmediato',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailReceived()
    {
        return $this->hasMany(DetailReceived::class);
    }
}
