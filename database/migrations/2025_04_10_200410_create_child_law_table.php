<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildLawTable extends Migration
{
    public function up()
    {
        Schema::create('child_law', function (Blueprint $table) {
            $table->id();
            $table->string('res_person_data_id'); // Matches reporting_person_data.id
            $table->string('type_of_incident');
            $table->string('guardian_first_name');
            $table->string('guardian_last_name');
            $table->string('guardian_address');
            $table->string('guardian_telephone', 20);
            $table->string('guardian_phone', 20);
            $table->text('diversion_mechanism');
            $table->text('distinguishing_features');
            $table->timestamps();

            $table->foreign('res_person_data_id')
                  ->references('id')
                  ->on('reporting_person_data')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('child_law');
    }
}