<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            // PAN is 10 characters in India
            $table->string('pan_number', 10)->unique();

            // GST is 15 characters in India
            $table->string('gst_number', 15)->nullable();

            $table->foreignId('sector_id')
                  ->nullable()
                  ->constrained('sectors')
                  ->nullOnDelete();

            $table->text('address');

            $table->string('city');
            $table->string('state');
            $table->string('pincode', 10);

            $table->string('contact_person_name');
            $table->string('contact_email');
            $table->string('contact_mobile', 20);

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};