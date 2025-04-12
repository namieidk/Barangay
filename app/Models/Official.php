<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $table = 'officials'; // Explicitly set table name

    protected $fillable = [
        'position',
        'term_start',
        'term_end',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'gender',
        'contact_number',
        'address',
        'photo',
    ];

    protected $casts = [
        'term_start' => 'date',
        'term_end' => 'date',
        'birthdate' => 'date',
    ];
}