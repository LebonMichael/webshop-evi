<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_mollie_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_details_id');
            $table->bigInteger('client_number');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('product_name');
            $table->bigInteger('product_price');
            $table->bigInteger('aantal');
            $table->bigInteger('total_price');
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
        Schema::dropIfExists('order_details');
    }
};
