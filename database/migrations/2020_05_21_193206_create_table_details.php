<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('code_id');
            $table->string('Firstname_TH');
            $table->string('Lastname_TH');
            $table->string('Firstname_EN');
            $table->string('Lastname_EN');
            $table->string('gender');
            $table->string('birthdate');
            $table->string('phone');
            $table->string('status');
            $table->string('address');
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
        Schema::dropIfExists('details');
    }
}
