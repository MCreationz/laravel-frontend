<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_assignment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('evaluation_parameter_id')->constrained()->cascadeOnDelete();
            $table->integer('score');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_scores');
    }
};
