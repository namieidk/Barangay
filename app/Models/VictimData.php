<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VictimData extends Model
{
    // Specify the table name (optional if it matches Laravel's convention, but explicit is safer)
    protected $table = 'victim_data';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'res_person_data_id',
        'type_of_incident',
        'surname',
        'last_name',
        'middle_name',
        'nickname',
        'gender',
        'citizenship',
        'birthdate',
        'age',
        'place_of_birth',
        'telephone',
        'email_address',
        'civil_status',
        'house_no',
        'village',
        'barangay',
        'town_city',
        'province',
        'postal_code',
        'other_house_no',
        'other_village',
        'other_barangay',
        'other_town_city',
        'other_province',
        'other_postal_code',
        'date_time_reported',
        'date_time_incident',
        'highest_education',
        'occupation',
    ];

    // Define default attributes
    protected $attributes = [
        'barangay' => 'Barangay Incio',
        'town_city' => 'Incio City',
        'province' => 'Incio Province',
        'postal_code' => '9800',
    ];

    // Cast fields to specific types
    protected $casts = [
        'birthdate' => 'date',
        'date_time_reported' => 'datetime',
        'date_time_incident' => 'datetime',
        'gender' => 'string', // Enum treated as string
        'civil_status' => 'string', // Enum treated as string
        'highest_education' => 'string', // Enum treated as string
    ];

    // Define the relationship with ResPersonData
    public function reportingPerson(): BelongsTo
    {
        return $this->belongsTo(ResPersonData::class, 'res_person_data_id');
    }
}