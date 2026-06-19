<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fund_reviewer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('reviewer_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_reviewer');
    }
};