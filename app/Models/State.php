<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = [
        'id',
        'name'
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'id_state');
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class, 'state_id');
    }
}
