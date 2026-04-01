<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscriptionStatus extends Model
{
    protected $table = "inscriptions_status";
    protected $fillable = [
        'id_inscription',
        'id_graduate',
        'status',
        'motivo',
        'id_user',
    ];

    public function inscription()
    {
        return $this->belongsTo(Inscription::class, 'id_inscription');
    }

    public function graduate()
    {
        return $this->belongsTo(Graduate::class, 'id_graduate');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
