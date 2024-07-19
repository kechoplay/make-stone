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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->nullable();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('main_image');
            $table->text('sub_image')->nullable();
            $table->integer('bidding_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
