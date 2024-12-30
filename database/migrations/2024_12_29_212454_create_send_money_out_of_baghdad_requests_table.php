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
        Schema::create('send_money_out_of_baghdad_requests', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->float('amount');
            $table->string('source_of_funds');
            $table->string('transaction_purpose');
            $table->string('payment_method');
            $table->string('account_info')->nullable();
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_money_out_of_baghdad_requests');
    }
};