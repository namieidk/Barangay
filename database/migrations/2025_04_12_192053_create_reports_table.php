<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Barangay Clearance - Juan Dela Cruz"
            $table->string('type'); // e.g., "clearance", "residents_information"
            $table->string('google_doc_id')->nullable(); // Google Docs document ID
            $table->string('status')->default('draft'); // draft, generated, printed, emailed
            $table->text('description')->nullable(); // Optional notes
            $table->json('metadata')->nullable(); // Additional data (e.g., resident ID)
            $table->timestamp('last_updated_at')->nullable(); // Last modification
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}