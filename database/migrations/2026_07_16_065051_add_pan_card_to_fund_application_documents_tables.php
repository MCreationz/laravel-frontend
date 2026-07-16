<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fund_application_npo_documents', function (Blueprint $table) {
            $table->string('pan_card')->nullable()->after('registration_certificate');
        });

        Schema::table('fund_application_startup_documents', function (Blueprint $table) {
            $table->string('pan_card')->nullable()->after('registration_certificate');
        });
    }

    public function down(): void
    {
        Schema::table('fund_application_npo_documents', function (Blueprint $table) {
            $table->dropColumn('pan_card');
        });

        Schema::table('fund_application_startup_documents', function (Blueprint $table) {
            $table->dropColumn('pan_card');
        });
    }
};
