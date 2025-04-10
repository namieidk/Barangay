<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResPersonData extends Model
{
    use HasFactory;

    protected $table = 'reporting_person_data';
    protected $primaryKey = 'id';
    public $incrementing = false; // Since ID is a string
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type_of_incident',
        'first_name',
        'last_name',
        'middle_name',
        'nickname',
        'gender',
        'citizenship',
        'birthdate',
        'age',
        'place_of_birth',
        'telephone',
        'house_no',
        'village',
        'barangay',
        'town_city',
        'province',
        'other_house_no',
        'other_village',
        'other_barangay',
        'other_town_city',
        'other_province',
        'date_reported',
        'date_incident',
        'email_address',
        'occupation',
        'education',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'date_reported' => 'datetime',
        'date_incident' => 'datetime',
        'age' => 'integer',
    ];

    public function suspects()
    {
        return $this->hasMany(SuspectData::class, 'res_person_data_id', 'id');
    }
}