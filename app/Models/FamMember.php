<?php

// app/Models/FamMember.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamMember extends Model
{
    protected $table = 'fam_members';

    protected $fillable = [
        'residence_id', 
        'relationship', // Ensure this is present
        'first_name', 
        'last_name', 
        'middle_name', 
        'alias_name',
        'gender', 
        'marital_status', 
        'spouse_name', 
        'purok', 
        'employment_status',
        'birth_date', 
        'birth_place', 
        'place', 
        'height', 
        'weight', 
        'religion',
        'religion_other', 
        'voters_status', 
        'has_disability', 
        'blood_type',
        'occupation', 
        'educational_attainment', 
        'phone_number', 
        'land_number',
        'email', 
        'address'
    ];

    public function residence()
    {
        return $this->belongsTo(NewResidence::class, 'residence_id', 'id');
    }
}
