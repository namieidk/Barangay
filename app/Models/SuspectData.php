<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuspectData extends Model
{
    protected $fillable = [
        'res_person_data_id', 'type_of_incident', 'surname', 'last_name', 'middle_name', 'nickname',
        'gender', 'citizenship', 'birthdate', 'age', 'place_of_birth', 'telephone', 'email_address',
        'civil_status', 'house_no', 'village', 'barangay', 'town_city', 'province', 'postal_code',
        'other_house_no', 'other_village', 'other_barangay', 'other_town_city', 'other_province',
        'other_postal_code', 'date_time_reported', 'date_time_incident', 'highest_education',
        'occupation', 'relation_to_victim', 'height_cm', 'weight_kg', 'eye_color', 'eye_description',
        'hair_color', 'hair_description', 'influence',
    ];

    // Define default attributes
    protected $attributes = [
        'barangay' => 'Barangay Incio',
        'town_city' => 'Incio City',
        'province' => 'Incio Province',
        'postal_code' => '9800',
    ];

    public function reportingPerson()
    {
        return $this->belongsTo(ResPersonData::class, 'res_person_data_id');
    }
}