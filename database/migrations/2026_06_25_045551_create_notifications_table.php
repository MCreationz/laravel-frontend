<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->string('type', 50);

            $table->string('title');
            $table->text('message');

            $table->json('data')->nullable();

            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();

            $table->timestamps();

            $table->index('organization_id');
            $table->index('reviewer_id');
            $table->index('admin_id');
            $table->index('type');
            $table->index('is_read');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};