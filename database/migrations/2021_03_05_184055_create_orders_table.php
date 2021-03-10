<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->integer('order_number');
            $table->integer('order_year');
            $table->date('order_date');
            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_phone')->nullable();
            $table->string('seller_oib')->nullable();
            $table->string('seller_iban');
            $table->string('delivery_due')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('payment_due')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
