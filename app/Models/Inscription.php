<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';

    protected $fillable = [
        'rfc',
        'curp',
        'first_name',
        'last_name',
        'gender',
        'email',
        'state_id',
        'municipality_id',
        'city',
        'sector',
        'job_function',
        'institution',
        'cv_path',
        'commitment_letter_path',
        'support_letter_path',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
     public function status()
    {
        return $this->hasOne(InscriptionStatus::class, 'id_inscription');
    }
}
