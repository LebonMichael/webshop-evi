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
        Schema::create('cloth_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer("size");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_cloth_size', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cloth_sizes_id');
            $table->timestamps();
            $table->unique(['product_id','cloth_sizes_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('cloth_sizes_id')->references('id')->on('cloth_sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cloth_sizes');
    }
};
