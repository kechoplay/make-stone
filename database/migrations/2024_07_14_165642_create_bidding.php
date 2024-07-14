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
        Schema::create('bidding', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('start_price');
            $table->dateTime('start_time_bidding');
            $table->dateTime('end_time_bidding');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidding');
    }
};
