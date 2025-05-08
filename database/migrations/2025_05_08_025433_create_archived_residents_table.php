
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedResidentsTable extends Migration
{
    public function up()
    {
        Schema::create('archived_residents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('gender');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('purok');
            $table->string('employment_status')->nullable();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('place');
            $table->integer('height');
            $table->integer('weight');
            $table->string('religion');
            $table->string('religion_other')->nullable();
            $table->string('voters_status');
            $table->boolean('has_disability')->default(false);
            $table->string('blood_type');
            $table->string('occupation');
            $table->string('educational_attainment');
            $table->string('phone_number');
            $table->string('land_number')->nullable();
            $table->string('email');
            $table->string('address');
            $table->timestamp('archived_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('archived_residents');
    }
}