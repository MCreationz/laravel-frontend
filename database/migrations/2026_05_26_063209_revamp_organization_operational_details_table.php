<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('organization_operational_details', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Remove old columns
            |--------------------------------------------------------------------------
            */
            $table->dropColumn([
                'organization_type',
                'product_category',

                'dpiit_recognition',
                'msme_registered',

                'grants_received',
                'equity_raised',
                'bootstrapped_friends_family',
                'debt',

                'govt_grants',
                'foreign_donations_institutional',
                'promoters_money',
                'individual_donations',

                'total_funding_lakh',
                'last_to_last_year_revenue_lakh',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Add new startup fields
            |--------------------------------------------------------------------------
            */
            $table->string('idea_falls_in')->nullable()->after('current_stage');

            $table->boolean('dpiit_registration')
                ->default(0)
                ->after('idea_falls_in');

            $table->boolean('msme_registration')
                ->default(0)
                ->after('dpiit_registration');

            $table->boolean('patent_available')
                ->default(0)
                ->after('gstin_registration');
        });
    }

    public function down(): void
    {
        Schema::table('organization_operational_details', function (Blueprint $table) {

            $table->string('organization_type')->nullable();

            $table->string('product_category')->nullable();

            $table->boolean('dpiit_recognition')->nullable();
            $table->boolean('msme_registered')->nullable();

            $table->decimal('grants_received', 12, 2)->nullable();
            $table->decimal('equity_raised', 12, 2)->nullable();
            $table->decimal('bootstrapped_friends_family', 12, 2)->nullable();
            $table->decimal('debt', 12, 2)->nullable();

            $table->decimal('govt_grants', 12, 2)->nullable();
            $table->decimal('foreign_donations_institutional', 12, 2)->nullable();
            $table->decimal('promoters_money', 12, 2)->nullable();
            $table->decimal('individual_donations', 12, 2)->nullable();

            $table->decimal('total_funding_lakh', 12, 2)->nullable();
            $table->decimal('last_to_last_year_revenue_lakh', 12, 2)->nullable();

            $table->dropColumn([
                'idea_falls_in',
                'dpiit_registration',
                'msme_registration',
                'patent_available',
            ]);
        });
    }
};