<?php

// app/Models/NewResidence.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FamMember;


class NewResidence extends Model
{
    protected $table = 'new_residence';
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id', 'first_name', 'last_name', 'middle_name', 'alias_name',
        'gender', 'marital_status', 'spouse_name', 'purok', 'employment_status',
        'birth_date', 'birth_place', 'place', 'height', 'weight', 'religion',
        'religion_other', 'voters_status', 'has_disability', 'blood_type',
        'occupation', 'educational_attainment', 'phone_number', 'land_number',
        'email', 'address'
    ];

    public function familyMembers()
    {
        return $this->hasMany(FamMember::class, 'residence_id', 'id');
    }
}
