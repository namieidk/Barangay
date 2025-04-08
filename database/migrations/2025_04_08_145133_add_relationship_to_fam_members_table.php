<?php

// database/migrations/2025_04_08_add_relationship_to_fam_members_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToFamMembersTable extends Migration
{
    public function up()
    {
        Schema::table('fam_members', function (Blueprint $table) {
            $table->string('relationship')->nullable()->after('residence_id');
        });
    }

    public function down()
    {
        Schema::table('fam_members', function (Blueprint $table) {
            $table->dropColumn('relationship');
        });
    }
}