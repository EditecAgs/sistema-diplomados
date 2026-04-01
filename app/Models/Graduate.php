<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    protected $table = 'graduates';
    protected $fillable = [
        'name',
        'shortname_moodle',
        'initial_date',
        'finished_date',
    ];

    public function inscriptionStatuses()
    {
        return $this->hasMany(InscriptionStatus::class, 'id_graduate');
    }
}
