<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchivedResident extends Model
{
    use HasFactory, SoftDeletes;

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
    
    protected $dates = ['archived_at', 'deleted_at', 'birth_date'];
    
    /**
     * Get the resident's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
    
    /**
     * Get the resident's age based on birth date.
     *
     * @return int
     */
    public function getAgeAttribute()
    {
        return $this->birth_date->diffInYears(now());
    }
}