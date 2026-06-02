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
       Schema::create('fund_application_answers', function (Blueprint $table) {
    $table->id();

    $table->foreignId('fund_application_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('fund_questionnaire_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->longText('answer')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_application_answers');
    }
};
