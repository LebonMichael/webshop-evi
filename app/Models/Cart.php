<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($product, $product_id)
    {

        if ($product->discount->percentage === 0) {
            $discountPrice = $product->price;
             } else {
            $discountPrice = $product->price / 100;
            $discountPrice = $discountPrice * (100 - $product->discount->percentage);
             }

        $shopItems = [
            'quantity' => 0,
            'product_id' => 0,
            'product_name' => Product::findOrFail($product_id)->name,
            'product' => Product::findOrFail($product_id),
            'productDiscount' => $product->discount->percentage,
            'product_price' => $product->price,
            'product_discountPrice' =>$discountPrice,
            'product_body' => $product->body,
            'productDetails' => $product,
            'color' => $product->colors,
            'gender' => Product::findOrFail($product_id)->gender->name,
            'stock' => $product->stock,
        ];
        if ($this->products) {
            if (array_key_exists($product_id, $this->products)) {
                $shopItems = $this->products[$product_id];
            }
        }
        if($shopItems['stock'] >= 1){
            $shopItems['quantity']++;
            $shopItems['product_id'] = $product_id;
            $shopItems['product_discount'] = $product->discount->percentage;
            $shopItems['product_price'] = $discountPrice;
            $shopItems['product_discountPrice'] = $discountPrice;
            $shopItems['product_body'] = Product::findOrFail($product_id)->body;
            $shopItems['stock']--;
            $this->totalQuantity++;
            $this->totalPrice += $discountPrice;
            $this->products[$product_id] = $shopItems;
        }
    }

    public function remove($product, $product_id)
    {
        if ($product->discount->percentage === 0) {
            $discountPrice = $product->price;
        } else {
            $discountPrice = $product->price / 100;
            $discountPrice = $discountPrice * (100 - $product->discount->percentage);
        }

        $shopItems = [
            'quantity' => 0,
            'product_id' => 0,
            'product' => Product::findOrFail($product_id),
            'product_name' => Product::findOrFail($product_id)->name,
            'productDiscount' => $product->discount,
            'product_price' => $product->price,
            'product_discountPrice' =>$discountPrice,
            'product_body' => $product->description,
            'productDetails' => $product,
            'color' => $product->colors,
            'gender' => Product::findOrFail($product_id)->gender->name,
            'stock' => $product->stock,
        ];
        if ($this->products) {
            if (array_key_exists($product_id, $this->products)) {
                $shopItems = $this->products[$product_id];
            }
        }
        $shopItems['quantity']--;
        $shopItems['product_id'] = $product_id;
        $shopItems['product_name'] = Product::findOrFail($product_id);
        $shopItems['product_price'] = $product->price;
        $shopItems['product_discountPrice'] = $discountPrice;
        $shopItems['product_body'] = $product->body;
        $shopItems['stock']++;
        $this->totalQuantity--;
        $this->totalPrice -= $discountPrice;
        $this->products[$product_id] = $shopItems;
    }

    public function updateQuantity($id, $quantity)
    {
        //telt het totaal aantal items in de winkelwagen
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalQuantity += $quantity;

        if ($this->products[$id]['quantity'] < $quantity) {
            $this->totalPrice -= ($this->products[$id]['quantity'] * $this->products[$id]['product_price']);
            $this->totalPrice += $quantity * $this->products[$id]['product_price'];
        } else {
            $this->totalPrice -= ($this->products[$id]['quantity'] - $quantity) * $this->products[$id]['product_price'];
        }
        $this->products[$id]['quantity'] = $quantity;
    }

    public function removeItem($id)
    {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= ($this->products[$id]['quantity'] * $this->products[$id]['product_price']);
        unset($this->products[$id]);
    }
}
