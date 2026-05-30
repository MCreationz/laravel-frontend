<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_documents', function (Blueprint $table) {
            $table->id();

            $table->string('document_name');
            $table->text('instruction')->nullable();

            $table->string('document_type'); // PDF, JPG, DOCX etc
            $table->unsignedInteger('max_file_size_mb'); // size rule

            $table->string('uploaded_file')->nullable(); // stored file path (if needed)

            $table->boolean('is_required')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_documents');
    }
};