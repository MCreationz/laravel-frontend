<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_application_documents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fund_application_id');
            $table->unsignedBigInteger('fund_document_id');

            $table->string('uploaded_file')->nullable();
            $table->string('status')->default('pending');
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_application_documents');
    }
};