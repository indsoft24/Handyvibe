<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('orders') && !Schema::hasColumn('orders', 'address_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('address_id')->nullable()->after('user_id');
                $table->index('address_id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'address_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex(['address_id']);
                $table->dropColumn('address_id');
            });
        }
    }
};


