<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_addresses', function (Blueprint $table) {

            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();

            // Office Address
            $table->string('office_house_floor_no')->nullable();
            $table->text('office_address_line_1');
            $table->text('office_address_line_2')->nullable();
            $table->string('office_city');
            $table->string('office_district');
            $table->string('office_state');
            $table->string('office_pin_code', 10);

            // Portal Address
            $table->string('portal_house_floor_no')->nullable();
            $table->text('portal_address_line_1')->nullable();
            $table->text('portal_address_line_2')->nullable();
            $table->string('portal_city')->nullable();
            $table->string('portal_district')->nullable();
            $table->string('portal_state')->nullable();
            $table->string('portal_pin_code', 10)->nullable();

            $table->boolean('is_portal_same_as_office')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_addresses');
    }
};