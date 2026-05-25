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
        Schema::table('organization_funders', function (Blueprint $table) {
            // Adding the missing fields from the modal form
            $table->string('category')->after('name');
            $table->text('purpose')->nullable()->after('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organization_funders', function (Blueprint $table) {
            // Drop the columns if the migration is rolled back
            $table->dropColumn(['category', 'purpose']);
        });
    }
};
