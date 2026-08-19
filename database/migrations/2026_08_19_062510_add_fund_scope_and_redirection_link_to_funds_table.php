<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('funds', function (Blueprint $table) {
            $table->string('fund_scope')->nullable()->after('about_fund');
            $table->string('redirection_link')->nullable()->after('fund_scope');
        });
    }

    public function down(): void
    {
        Schema::table('funds', function (Blueprint $table) {
            $table->dropColumn([
                'fund_scope',
                'redirection_link',
            ]);
        });
    }
};