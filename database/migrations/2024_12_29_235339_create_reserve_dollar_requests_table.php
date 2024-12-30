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
        Schema::create('reserve_dollar_requests', function (Blueprint $table) {
            $table->id();
            $table->string('governorate');
            $table->string('receive_place');
            $table->float('name');
            $table->float('destination');
            $table->string('travel_type');
            $table->date('travel_date');
            $table->date('passport_expiry_date');
            $table->string('phone_number');
            $table->string('passport_photo');
            $table->string('ticket_photo');
            $table->string('card_front_photo');
            $table->string('residence_card_front_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_dollar_requests');
    }
};