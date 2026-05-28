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
        Schema::table('client_admins', function (Blueprint $table) {

            // Login password
            $table->string('password')
                  ->nullable()
                  ->after('email');

            // Email verification
            $table->timestamp('email_verified_at')
                  ->nullable()
                  ->after('password');

            // Remember me token
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_admins', function (Blueprint $table) {

            $table->dropColumn([
                'password',
                'email_verified_at',
                'remember_token',
            ]);
        });
    }
};