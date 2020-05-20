<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_option_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->foreign('product_option_id')->references('id')->on('product_options');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('parent_id')->references('id')->on('order_items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
