<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentReportsTable extends Migration
{
    public function up()
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB for foreign key support
            $table->id();
            $table->foreignId('reporting_person_data_id')->constrained('reporting_person_data')->onDelete('cascade');
            $table->string('incident_type');
            $table->dateTime('incident_date_time');
            $table->string('incident_place');
            $table->string('reporting_person_name');
            $table->string('reporting_person_address');
            $table->dateTime('report_date_time');
            $table->text('certification_text');
            $table->string('signature_path')->nullable();
            $table->string('signatory_name')->nullable();
            $table->string('signatory_position')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incident_reports');
    }
}
