<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            $table->string('organization_name', 100);
            $table->string('work_email', 50)->unique();
            $table->enum('role', ['funder', 'fund_seeker']);
            $table->string('referral_source')->nullable();

            $table->string('password');

            $table->string('otp_code', 6)->nullable();
            $table->timestamp('otp_expires_at')->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->boolean('is_step1_completed')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};