<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBirthPlaceToNewResidencesTable extends Migration
{
    public function up()
    {
        Schema::table('new_residences', function (Blueprint $table) {
            $table->string('birth_place')->after('birth_date'); // Add after birth_date
        });
    }

    public function down()
    {
        Schema::table('new_residences', function (Blueprint $table) {
            $table->dropColumn('birth_place');
        });
    }
}