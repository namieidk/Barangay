<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultsToSuspectDataTable extends Migration
{
    public function up()
    {
        Schema::table('suspect_data', function (Blueprint $table) {
            $table->string('barangay')->default('Barangay Incio')->change();
            $table->string('town_city')->default('Incio City')->change();
            $table->string('province')->default('Incio Province')->change();
            $table->string('postal_code')->default('9800')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('suspect_data', function (Blueprint $table) {
            $table->string('barangay')->default(null)->change();
            $table->string('town_city')->default(null)->change();
            $table->string('province')->default(null)->change();
            $table->string('postal_code')->default(null)->nullable()->change();
        });
    }
}