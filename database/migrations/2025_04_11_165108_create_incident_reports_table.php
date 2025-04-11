<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentReportsTable extends Migration
{
    public function up()
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->string('blotter_entry_number')->unique(); // Links to reporting_person_data.id
            $table->string('incident_type');
            $table->dateTime('incident_date_time');
            $table->string('incident_place');
            $table->string('reporting_person_name');
            $table->string('reporting_person_address');
            $table->dateTime('report_date_time');
            $table->text('certification_text');
            $table->string('signature_path')->nullable(); // Path to uploaded signature image
            $table->string('signatory_name')->nullable();
            $table->string('signatory_position')->nullable();
            $table->timestamps();

            // Foreign key to reporting_person_data
            $table->foreign('blotter_entry_number')->references('id')->on('reporting_person_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('incident_reports');
    }
}