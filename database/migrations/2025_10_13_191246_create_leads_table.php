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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('message');
            $table->string('source')->default('website'); // website, phone, email, social, referral
            $table->string('status')->default('new'); // new, contacted, qualified, converted, lost
            $table->string('priority')->default('medium'); // low, medium, high, urgent
            $table->string('type')->default('service'); // service, product, general
            $table->unsignedBigInteger('service_id')->nullable(); // Reference to service/product
            $table->string('service_name')->nullable(); // Service/product name for reference
            $table->text('notes')->nullable(); // Admin notes
            $table->unsignedBigInteger('assigned_to')->nullable(); // Admin user assigned
            $table->timestamp('contacted_at')->nullable();
            $table->timestamp('follow_up_at')->nullable();
            $table->json('metadata')->nullable(); // Additional data like IP, user agent, etc.
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('assigned_to')->references('id')->on('admins')->onDelete('set null');
            $table->index(['status', 'priority']);
            $table->index(['type', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
