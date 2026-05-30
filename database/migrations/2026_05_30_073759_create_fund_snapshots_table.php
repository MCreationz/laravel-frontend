<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fund_snapshots', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('eligible_states')->nullable();
            $table->text('eligibility_instruction')->nullable();

            $table->boolean('is_npo')->default(false);
            $table->boolean('is_startup')->default(false);

            $table->decimal('fund_outlay', 15, 2)->nullable();
            $table->string('fund_type')->nullable();
            $table->decimal('single_entity_cap', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fund_snapshots');
    }
};