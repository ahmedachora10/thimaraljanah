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
        Schema::create('modify_transfer_requests', function (Blueprint $table) {
            $table->id();

            $table->float('amount');
            $table->string('currency');
            $table->string('recipient_name');
            $table->string('sender_name');
            $table->string('recipient_phone_number');
            $table->string('sender_phone_number');
            $table->string('transaction_purpose');
            $table->string('location');
            // $table->string('service_provider');
            $table->string('passport');
            // $table->string('transfer_number')->nullable();
            // $table->string('payment_method');
            $table->string('ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modify_transfer_requests');
    }
};