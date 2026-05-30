<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_themes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')
                ->constrained('funds')
                ->cascadeOnDelete();

            $table->string('theme_name');
            $table->string('sub_theme_name')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_themes');
    }
};