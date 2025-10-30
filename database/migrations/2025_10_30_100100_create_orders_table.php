<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('address_id')->nullable()->constrained('addresses')->nullOnDelete();
                $table->string('status')->default('pending');
                $table->decimal('subtotal', 10, 2)->default(0);
                $table->decimal('tax', 10, 2)->default(0);
                $table->decimal('total', 10, 2)->default(0);
                $table->string('payment_method')->nullable();
                $table->string('payment_status')->default('unpaid');
                $table->json('metadata')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->cascadeOnDelete();
                $table->string('item_type'); // product or service
                $table->unsignedBigInteger('item_id');
                $table->string('name');
                $table->integer('quantity')->default(1);
                $table->decimal('price', 10, 2);
                $table->json('details')->nullable(); // duration, schedule, etc.
                $table->timestamps();
                $table->index(['item_type','item_id']);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('order_items')) {
            Schema::dropIfExists('order_items');
        }
        if (Schema::hasTable('orders')) {
            Schema::dropIfExists('orders');
        }
    }
};


