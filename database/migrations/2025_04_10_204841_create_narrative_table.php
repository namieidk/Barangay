<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarrativeTable extends Migration
{
    public function up()
    {
        Schema::create('narrative', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB for foreign key support
            $table->id();
            $table->foreignId('res_person_data_id')->constrained('reporting_person_data')->onDelete('cascade');
            $table->dateTime('date_time');
            $table->string('place_of_incident');
            $table->text('incident_narrative');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('narrative');
    }
}
