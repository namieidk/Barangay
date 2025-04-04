// database/migrations/2025_04_02_create_new_residences_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewResidencesTable extends Migration
{
    public function up()
    {
        Schema::create('new_residences', function (Blueprint $table) {
            $table->id();
            $table->string('profile_photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('marital_status', ['married', 'single', 'divorced', 'widowed'])->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('purok');
            $table->enum('employment_status', ['worker', 'self_employed', 'employee'])->nullable();
            $table->date('birth_date');
            $table->string('birth_place'); // Ensure this column exists
            $table->string('place');
            $table->decimal('height', 5, 2);
            $table->decimal('weight', 5, 2);
            $table->string('religion');
            $table->enum('voters_status', ['registered', 'not_registered'])->nullable();
            $table->boolean('has_disability')->default(false);
            $table->string('blood_type');
            $table->string('occupation');
            $table->enum('educational_attainment', ['elementary', 'highschool', 'college', 'postgraduate'])->nullable();
            $table->string('phone_number');
            $table->string('land_number')->nullable();
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_residences');
    }
}