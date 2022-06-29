<?php

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('images_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Color::class);
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images_products');
    }
};
