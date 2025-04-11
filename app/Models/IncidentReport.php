<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;

    protected $table = 'incident_reports';

    protected $fillable = [
        'blotter_entry_number',
        'incident_type',
        'incident_date_time',
        'incident_place',
        'reporting_person_name',
        'reporting_person_address',
        'report_date_time',
        'certification_text',
        'signature_path',
        'signatory_name',
        'signatory_position',
    ];

    protected $casts = [
        'incident_date_time' => 'datetime',
        'report_date_time' => 'datetime',
    ];

    // Relationship with Reporting Person Data
    public function reportingPerson()
    {
        return $this->belongsTo(ResPersonData::class, 'blotter_entry_number', 'id');
    }
}