<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('organization_profiles', function (Blueprint $table) {
            // Change both columns to TEXT to support long URLs
            $table->text('website_url')->nullable()->change();
            $table->text('linkedin_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('organization_profiles', function (Blueprint $table) {
            // Revert back to shorter length if needed (not recommended)
            $table->string('website_url', 255)->nullable()->change();
            $table->string('linkedin_url', 255)->nullable()->change();
        });
    }
};