<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectDataTable extends Migration
{
    public function up()
    {
        Schema::create('suspect_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('res_person_data_id')->constrained('reporting_person_data')->onDelete('cascade');
            $table->string('type_of_incident');
            $table->string('surname');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('nickname')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('citizenship');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('place_of_birth');
            $table->string('telephone');
            $table->string('email_address');
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('house_no');
            $table->string('village');
            $table->string('barangay')->default('Barangay Incio');
            $table->string('town_city')->default('Incio City');
            $table->string('province')->default('Incio Province');
            $table->string('postal_code')->default('9800')->nullable();
            $table->string('other_house_no')->nullable();
            $table->string('other_village')->nullable();
            $table->string('other_barangay')->nullable();
            $table->string('other_town_city')->nullable();
            $table->string('other_province')->nullable();
            $table->string('other_postal_code')->nullable();
            $table->dateTime('date_time_reported');
            $table->dateTime('date_time_incident');
            $table->enum('highest_education', ['elementary', 'high-school', 'vocational', 'college', 'graduate']);
            $table->string('occupation');
            $table->string('relation_to_victim');
            $table->integer('height_cm');
            $table->integer('weight_kg');
            $table->string('eye_color');
            $table->string('eye_description');
            $table->string('hair_color');
            $table->string('hair_description');
            $table->string('influence');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suspect_data');
    }
}