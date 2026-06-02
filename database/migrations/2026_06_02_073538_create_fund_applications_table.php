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
        Schema::create('fund_applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')->constrained()->cascadeOnDelete();

            $table->unsignedBigInteger('organization_id');

            $table->unsignedBigInteger('theme_id')->nullable();
            $table->unsignedBigInteger('sub_theme_id')->nullable();

            $table->integer('project_duration')->nullable();
            $table->decimal('total_budget', 15, 2)->nullable();

            $table->text('additional_info')->nullable();

            $table->string('current_step')->default('questions');
            $table->string('status')->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_applications');
    }
};
