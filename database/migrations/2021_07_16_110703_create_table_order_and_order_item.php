<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderAndOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("customer_tel");
            $table->string("customer_address");
            $table->unsignedBigInteger("city_id");
            $table->decimal("grand_total", 14, 2)->default(0);
            $table->tinyInteger("status")->default(0);
            $table->timestamps();
            $table->foreign("city_id")->references("id")->on("cities");
        });

        Schema::create('orders_item', function (Blueprint $table) {
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("qty")->default(1);
            $table->decimal("price", 14, 2)->default(0);
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("product_id")->references("id")->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_item');
        Schema::dropIfExists('orders');
    }
}
