<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $fillable = [
        'id',
        'name',
        'id_state',
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'id_state');
    }

     public function inscriptions(){
        return $this->hasMany(Inscription::class, 'municipality_id');
    }
}
