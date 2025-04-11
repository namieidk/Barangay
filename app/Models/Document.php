<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['type', 'resident_id', 'purpose', 'date_requested', 'status'];

    public function resident()
    {
        return $this->belongsTo(NewResidence::class, 'resident_id', 'id');
    }
}