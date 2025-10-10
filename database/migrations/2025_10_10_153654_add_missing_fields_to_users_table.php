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
        Schema::table('users', function (Blueprint $table) {
            // Add mobile field if it doesn't exist
            if (!Schema::hasColumn('users', 'mobile')) {
                $table->string('mobile')->unique()->after('email');
            }
            
            // Add user_type field if it doesn't exist
            if (!Schema::hasColumn('users', 'user_type')) {
                $table->string('user_type')->default('user')->after('mobile');
            }
            
            // Add status field if it doesn't exist
            if (!Schema::hasColumn('users', 'status')) {
                $table->boolean('status')->default(1)->after('user_type'); // 1 = active, 0 = inactive
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['mobile', 'user_type', 'status']);
        });
    }
};
