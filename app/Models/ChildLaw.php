<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildLaw extends Model
{
    protected $table = 'child_law';

    protected $fillable = [
        'res_person_data_id',
        'type_of_incident',
        'guardian_first_name',
        'guardian_last_name',
        'guardian_address',
        'guardian_telephone',
        'guardian_phone',
        'diversion_mechanism',
        'distinguishing_features',
    ];

    public function reportingPerson(): BelongsTo
    {
        return $this->belongsTo(ResPersonData::class, 'res_person_data_id');
    }
}