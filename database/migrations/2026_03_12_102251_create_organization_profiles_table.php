<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_profiles', function (Blueprint $table) {

            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();

            $table->string('pan_number', 10)->unique();
            $table->string('legal_name');
            $table->date('date_of_incorporation')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('website_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_profiles');
    }
};