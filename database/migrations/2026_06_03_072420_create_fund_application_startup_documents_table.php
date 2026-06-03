<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_application_startup_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_application_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('organization_name');

            // Registration
            $table->string('registration_certificate')->nullable();
            $table->string('registration_number')->nullable();

            // DPIIT
            $table->string('dpiit_certificate')->nullable();
            $table->string('dpiit_registration_number')->nullable();

            // Patent
            $table->boolean('patent_available')->default(false);
            $table->string('patent_number')->nullable();
            $table->string('application_number')->nullable();
            $table->date('date_of_filing')->nullable();
            $table->string('patentee_name')->nullable();
            $table->date('patent_validity')->nullable();

            // GST
            $table->string('gst_registration_number')->nullable();
            $table->string('gst_certificate')->nullable();

            // MSME
            $table->string('msme_registration_number')->nullable();
            $table->date('msme_registration_validity')->nullable();

            $table->timestamps();

            $table->unique('fund_application_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_application_startup_documents');
    }
};