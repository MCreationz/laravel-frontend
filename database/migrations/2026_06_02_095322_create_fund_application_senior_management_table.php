<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_application_senior_management', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_application_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('nature_of_engagement')->nullable();
            $table->string('gender')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->date('date_of_appointment')->nullable();

            $table->string('highest_qualification')->nullable();

            $table->text('roles_and_responsibilities')->nullable();

            $table->integer('total_years_of_experience')->nullable();

            $table->string('resume_cv')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_application_senior_management');
    }
};