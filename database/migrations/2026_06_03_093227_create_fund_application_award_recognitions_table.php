<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_application_award_recognitions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_application_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('award_name');
            $table->string('awarding_organization');
            $table->year('year');

            $table->string('certificate')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_application_award_recognitions');
    }
};