<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narrative extends Model
{
    use HasFactory;

    protected $table = 'narrative';

    protected $fillable = [
        'res_person_data_id',
        'date_time',
        'place_of_incident',
        'incident_narrative',
    ];

    protected $dates = ['date_time'];

    public function reportingPerson()
    {
        return $this->belongsTo(ResPersonData::class, 'res_person_data_id', 'id');
    }
}