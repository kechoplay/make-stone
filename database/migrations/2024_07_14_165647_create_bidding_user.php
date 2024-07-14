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
        Schema::create('bidding_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bidding_id');
            $table->integer('product_id');
            $table->dateTime('bidding_time');
            $table->integer('bidding_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidding_user');
    }
};
