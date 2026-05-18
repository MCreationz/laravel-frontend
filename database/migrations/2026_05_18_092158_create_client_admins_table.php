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
        Schema::create('client_admins', function (Blueprint $table) {
            $table->id();

            // Organization Details
            $table->string('organization_name');
            $table->string('organization_type');

            // Primary Contact Details
            $table->string('primary_contact_name');
            $table->string('phone_number');
            $table->string('email')->unique();

            // Location & Status
            $table->string('state');
            $table->string('status')->default('verified');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_admins');
    }
};