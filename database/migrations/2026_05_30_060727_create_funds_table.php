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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')
                ->constrained('client_admins')
                ->cascadeOnDelete();

            // Fund Details
            $table->string('fund_name');
            $table->string('fund_owner');
            $table->string('fund_owner_email');
            $table->longText('about_fund')->nullable();

            // Fund Timeline
            $table->date('project_start')->nullable();
            $table->date('project_end')->nullable();
            $table->integer('maximum_project_duration')->nullable(); // months

            // Fund Branding
            $table->string('fund_logo')->nullable();
            $table->string('fund_banner')->nullable();

            // Multi-step progress tracking
            $table->enum('current_step', [
                'overview',
                'snapshot',
                'questionnaire',
                'completed',
            ])->default('overview');

            // Fund status
            $table->enum('status', [
                'active',
                'inactive',
                'draft',
                'archived',
            ])->default('active');

            $table->boolean('is_completed')->default(false);

            $table->timestamps();

            $table->index('client_id');
            $table->index('current_step');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
