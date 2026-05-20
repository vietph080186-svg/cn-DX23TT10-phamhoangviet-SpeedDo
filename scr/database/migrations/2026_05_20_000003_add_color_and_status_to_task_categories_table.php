<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('task_categories', function (Blueprint $table) {
            $table->string('color')->nullable()->after('description');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('color');
        });
    }

    public function down(): void
    {
        Schema::table('task_categories', function (Blueprint $table) {
            $table->dropColumn(['color', 'status']);
        });
    }
};
