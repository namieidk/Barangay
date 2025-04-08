<?php

// database/migrations/2025_04_08_create_fam_members_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamMembersTable extends Migration
{
    public function up()
    {
        Schema::create('fam_members', function (Blueprint $table) {
            $table->id();
            $table->string('residence_id', 4);
            $table->string('relationship'); // Added relationship column
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

            $table->foreign('residence_id')->references('id')->on('new_residence')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fam_members');
    }
}