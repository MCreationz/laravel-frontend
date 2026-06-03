<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fund_application_npo_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_application_id')
                ->constrained()
                ->cascadeOnDelete();

            // Organization Registration
            $table->string('organization_name');
            $table->string('registration_certificate')->nullable();
            $table->string('registration_number')->nullable();

            // 12A
            $table->string('certificate_12a')->nullable();
            $table->string('registration_number_12a')->nullable();
            $table->date('validity_12a')->nullable();

            // 80G
            $table->string('certificate_80g')->nullable();
            $table->string('registration_number_80g')->nullable();
            $table->date('validity_80g')->nullable();

            // FCRA
            $table->string('certificate_fcra')->nullable();
            $table->string('registration_number_fcra')->nullable();
            $table->date('validity_fcra')->nullable();

            // CSR-1
            $table->string('certificate_csr1')->nullable();
            $table->string('registration_number_csr1')->nullable();
            $table->date('validity_csr1')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_application_npo_documents');
    }
};
