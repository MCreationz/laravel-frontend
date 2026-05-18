<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('organization_profiles', function (Blueprint $table) {
            $table->string('contact_name')->after('linkedin_url');
            $table->string('designation')->after('contact_name');
            $table->string('mobile_no', 10)->after('designation');
        });
    }

    public function down(): void
    {
        Schema::table('organization_profiles', function (Blueprint $table) {
            $table->dropColumn(['contact_name', 'designation', 'mobile_no']);
        });
    }
};