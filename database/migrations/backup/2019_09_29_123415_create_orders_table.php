<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->enum('order_type',['collection','home_delivery']);
            $table->enum('payment_method',['cash_on_collection']);
            $table->dateTime('collection_date_time');
            $table->tinyInteger('paid')->default(0);
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->integer('status');

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
