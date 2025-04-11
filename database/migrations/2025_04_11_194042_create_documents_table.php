<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('type'); // 'certificate' or 'clearance'
            $table->string('resident_id'); // Foreign key referencing new_residence(id)
            $table->string('purpose'); // Purpose of the request
            $table->timestamp('date_requested')->useCurrent(); // Date Requested, defaults to current timestamp
            $table->string('status')->default('pending'); // Status: pending, approved, rejected
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('resident_id')
                  ->references('id')
                  ->on('new_residence')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}