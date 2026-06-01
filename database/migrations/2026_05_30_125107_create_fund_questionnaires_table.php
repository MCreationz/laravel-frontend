<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_questionnaires', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fund_id')->index();

            $table->string('question');
            $table->text('description')->nullable();
            $table->integer('word_limit')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Optional FK if needed
            // $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_questionnaires');
    }
};