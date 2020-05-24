<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->dateTime('date');//วันชำระเงิน
            $table->decimal('price',10,2); //ยอดเงิน
            $table->text('status'); //สถานะการสั่งซื้อ
            $table->string('Firstname_TH');
            $table->string('Lastname_TH');
            $table->string('Firstname_EN');
            $table->string('Lastname_EN');
            $table->text('address');
            $table->text('phone');
            $table->text('email');
            $table->integer('user_id');
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
