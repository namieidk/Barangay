<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarrativeTable extends Migration
{
    public function up()
    {
        Schema::create('narrative', function (Blueprint $table) {
            $table->id();
            $table->string('res_person_data_id');
            $table->dateTime('date_time');
            $table->string('place_of_incident');
            $table->text('incident_narrative');
            $table->timestamps();

            $table->foreign('res_person_data_id')
                  ->references('id')
                  ->on('reporting_person_data')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('narrative');
    }
}