<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'resident_id',
        'purpose',
        'status',
        'date_requested',
    ];

    protected $casts = [
        'date_requested' => 'datetime',
    ];

    public function resident()
    {
        return $this->belongsTo(NewResidence::class, 'resident_id');
    }
}