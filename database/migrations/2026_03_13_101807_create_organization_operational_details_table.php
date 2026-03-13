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
        Schema::create('organization_operational_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organization_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('organization_type'); // For-profit / Non-profit
            $table->string('state')->nullable();

            // Profit fields
            $table->string('registration_type')->nullable();
            $table->string('current_stage')->nullable();
            $table->string('product_category')->nullable();
            $table->boolean('dpiit_recognition')->nullable();
            $table->boolean('msme_registered')->nullable();
            $table->boolean('gstin_registration')->nullable();

            // Non-profit fields
            $table->string('domain_of_expertise')->nullable();
            $table->boolean('status_12a')->nullable();
            $table->boolean('status_80g')->nullable();
            $table->boolean('status_fcra')->nullable();
            $table->boolean('csr_1_registration')->nullable();

            // Track record
            $table->integer('years_of_operation_months')->nullable();
            $table->integer('total_beneficiaries')->nullable();
            $table->text('key_achievements')->nullable();

            // Financial record
            $table->decimal('lifetime_revenue_lakh', 12, 2)->nullable();
            $table->decimal('ongoing_year_revenue_lakh', 12, 2)->nullable();
            $table->decimal('last_year_revenue_lakh', 12, 2)->nullable();
            $table->decimal('last_to_last_year_revenue_lakh', 12, 2)->nullable();

            // Funding
            $table->decimal('grants_received', 12, 2)->nullable();
            $table->decimal('equity_raised', 12, 2)->nullable();
            $table->decimal('bootstrapped_friends_family', 12, 2)->nullable();
            $table->decimal('debt', 12, 2)->nullable();

            // Donation (for non-profit)
            $table->decimal('govt_grants', 12, 2)->nullable();
            $table->decimal('foreign_donations_institutional', 12, 2)->nullable();
            $table->decimal('promoters_money', 12, 2)->nullable();
            $table->decimal('individual_donations', 12, 2)->nullable();

            $table->decimal('total_funding_lakh', 12, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_operational_details');
    }
};
