<?php

use App\Models\Product;
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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->decimal('price',8,2);
            $table->integer('stock');
            $table->integer('sold')->default(0);
            $table->integer("color_id");
            $table->integer('discount_id');
            $table->integer('clothSize_id');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_details_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_details_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
            $table->unique(['product_details_id', 'color_id']);
            $table->foreign('product_details_id')->references('id')->on('product_details')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
};
