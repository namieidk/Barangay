<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportingPersonDataTable extends Migration
{
    public function up()
    {
        Schema::create('reporting_person_data', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id(); // unsignedBigInteger primary key
            $table->string('type_of_incident');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('nickname');
            $table->string('gender');
            $table->string('citizenship');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('place_of_birth');
            $table->string('telephone');
            $table->string('house_no');
            $table->string('village');
            $table->string('barangay');
            $table->string('town_city');
            $table->string('province');
            $table->string('other_house_no');
            $table->string('other_village');
            $table->string('other_barangay');
            $table->string('other_town_city');
            $table->string('other_province');
            $table->dateTime('date_reported');
            $table->dateTime('date_incident');
            $table->string('email_address');
            $table->string('occupation');
            $table->string('education');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reporting_person_data');
    }
}
