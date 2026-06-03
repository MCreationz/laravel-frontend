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
        Schema::create('fund_application_financial_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_application_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('last_year_turnover', 15, 2)->nullable();
            $table->string('last_year_balance_sheet')->nullable();

            $table->decimal('last_to_last_year_turnover', 15, 2)->nullable();
            $table->string('last_to_last_year_balance_sheet')->nullable();

            $table->string('last_year_itr')->nullable();
            $table->string('last_to_last_year_itr')->nullable();

            $table->timestamps();

            $table->unique('fund_application_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_application_financial_documents');
    }
};
