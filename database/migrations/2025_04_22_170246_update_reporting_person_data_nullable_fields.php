<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReportingPersonDataNullableFields extends Migration
{
    public function up()
    {
        Schema::table('reporting_person_data', function (Blueprint $table) {
            $table->string('other_house_no')->nullable()->change();
            $table->string('other_village')->nullable()->change();
            $table->string('other_barangay')->nullable()->change();
            $table->string('other_town_city')->nullable()->change();
            $table->string('other_province')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('reporting_person_data', function (Blueprint $table) {
            $table->string('other_house_no')->nullable(false)->change();
            $table->string('other_village')->nullable(false)->change();
            $table->string('other_barangay')->nullable(false)->change();
            $table->string('other_town_city')->nullable(false)->change();
            $table->string('other_province')->nullable(false)->change();
        });
    }
}