<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Update existing 'active' status to 1, others to 0
            DB::statement("UPDATE users SET status = CASE WHEN status = 'active' THEN 1 ELSE 0 END");
            
            // Change column type to boolean
            $table->boolean('status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Convert back to string
            $table->string('status')->default('active')->change();
            
            // Update 1 to 'active', 0 to 'inactive'
            DB::statement("UPDATE users SET status = CASE WHEN status = 1 THEN 'active' ELSE 'inactive' END");
        });
    }
};
