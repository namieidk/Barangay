<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewResidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_photo',
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

    protected $casts = [
        'birth_date' => 'date',
        'has_disability' => 'boolean',
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    protected $table = 'new_residences';
}