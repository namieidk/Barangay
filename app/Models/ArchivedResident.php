<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchivedResident extends Model
{
    use SoftDeletes;
    
    protected $table = 'archived_residents';

    protected $fillable = [
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
        'address',
        'archived_at',
    ];

    protected $casts = [
        'has_disability' => 'boolean',
        'birth_date' => 'date',
        'archived_at' => 'datetime',
    ];
}