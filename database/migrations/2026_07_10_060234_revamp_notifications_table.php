<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notifications', function (Blueprint $table) {

            $table->string('notifiable_type')->nullable()->after('id');
            $table->unsignedBigInteger('notifiable_id')->nullable()->after('notifiable_type');

        });

        // Migrate existing data
        DB::table('notifications')
            ->whereNotNull('organization_id')
            ->update([
                'notifiable_type' => \App\Models\Organization::class,
                'notifiable_id' => DB::raw('organization_id'),
            ]);

        DB::table('notifications')
            ->whereNotNull('reviewer_id')
            ->update([
                'notifiable_type' => \App\Models\Reviewer::class,
                'notifiable_id' => DB::raw('reviewer_id'),
            ]);

        DB::table('notifications')
            ->whereNotNull('admin_id')
            ->update([
                'notifiable_type' => \App\Models\ClientAdmin::class,
                'notifiable_id' => DB::raw('admin_id'),
            ]);

        Schema::table('notifications', function (Blueprint $table) {

            $table->dropIndex(['organization_id']);
            $table->dropIndex(['reviewer_id']);
            $table->dropIndex(['admin_id']);

            $table->dropColumn([
                'organization_id',
                'reviewer_id',
                'admin_id',
            ]);

            $table->index([
                'notifiable_type',
                'notifiable_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->index('organization_id');
            $table->index('reviewer_id');
            $table->index('admin_id');
        });

        Schema::table('notifications', function (Blueprint $table) {

            $table->dropIndex([
                'notifiable_type',
                'notifiable_id',
            ]);

            $table->dropColumn([
                'notifiable_type',
                'notifiable_id',
            ]);
        });
    }
};