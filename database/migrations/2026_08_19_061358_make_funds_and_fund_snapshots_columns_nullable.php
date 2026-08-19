<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('funds', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable()->change();
            $table->string('fund_name')->nullable()->change();
            $table->string('fund_owner')->nullable()->change();
            $table->string('fund_owner_email')->nullable()->change();
            $table->text('about_fund')->nullable()->change();
            $table->date('project_start')->nullable()->change();
            $table->date('project_end')->nullable()->change();
            $table->string('maximum_project_duration')->nullable()->change();
            $table->string('fund_logo')->nullable()->change();
            $table->string('fund_banner')->nullable()->change();
            $table->integer('current_step')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->boolean('is_completed')->nullable()->change();
        });

        Schema::table('fund_snapshots', function (Blueprint $table) {
            $table->unsignedBigInteger('fund_id')->nullable()->change();
            $table->text('eligible_states')->nullable()->change();
            $table->text('eligibility_instruction')->nullable()->change();
            $table->boolean('is_npo')->nullable()->change();
            $table->boolean('is_startup')->nullable()->change();
            $table->decimal('fund_outlay', 15, 2)->nullable()->change();
            $table->string('fund_type')->nullable()->change();
            $table->decimal('single_entity_cap', 15, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('funds', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable(false)->change();
            $table->string('fund_name')->nullable(false)->change();
            $table->string('fund_owner')->nullable(false)->change();
            $table->string('fund_owner_email')->nullable(false)->change();
            $table->text('about_fund')->nullable(false)->change();
            $table->date('project_start')->nullable(false)->change();
            $table->date('project_end')->nullable(false)->change();
            $table->string('maximum_project_duration')->nullable(false)->change();
            $table->string('fund_logo')->nullable(false)->change();
            $table->string('fund_banner')->nullable(false)->change();
            $table->integer('current_step')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->boolean('is_completed')->nullable(false)->change();
        });

        Schema::table('fund_snapshots', function (Blueprint $table) {
            $table->unsignedBigInteger('fund_id')->nullable(false)->change();
            $table->text('eligible_states')->nullable(false)->change();
            $table->text('eligibility_instruction')->nullable(false)->change();
            $table->boolean('is_npo')->nullable(false)->change();
            $table->boolean('is_startup')->nullable(false)->change();
            $table->decimal('fund_outlay', 15, 2)->nullable(false)->change();
            $table->string('fund_type')->nullable(false)->change();
            $table->decimal('single_entity_cap', 15, 2)->nullable(false)->change();
        });
    }
};