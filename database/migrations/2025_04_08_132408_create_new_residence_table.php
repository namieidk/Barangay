<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNewResidenceTable extends Migration
{
    public function up()
    {
        Schema::create('new_residence', function (Blueprint $table) {
            $table->string('id', 4)->primary(); // Custom string ID (e.g., '0001')
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('middle_name', 255)->nullable();
            $table->string('alias_name', 255)->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['married', 'single', 'divorced', 'widowed']);
            $table->string('spouse_name', 255)->nullable();
            $table->enum('purok', ['purok1', 'purok2', 'purok3', 'purok4']);
            $table->enum('employment_status', ['worker', 'self-employed', 'employee']);
            $table->date('birth_date');
            $table->string('birth_place', 255);
            $table->string('place', 255);
            $table->float('height');
            $table->float('weight');
            $table->string('religion');
            $table->string('religion_other', 255)->nullable();
            $table->enum('voters_status', ['registered', 'not_registered']);
            $table->boolean('has_disability')->default(false);
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('occupation', 255);
            $table->enum('educational_attainment', ['elementary', 'highschool', 'college', 'postgraduate']);
            $table->string('phone_number', 20);
            $table->string('land_number', 20)->nullable();
            $table->string('email', 255);
            $table->string('address', 255);
            $table->timestamps();
        });

        // Set the starting ID to '0001' using a sequence
        DB::statement("ALTER TABLE new_residence AUTO_INCREMENT = 1");
    }

    public function down()
    {
        Schema::dropIfExists('new_residence');
    }
};
