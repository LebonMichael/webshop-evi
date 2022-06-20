<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendShopController extends Controller
{


    public function index()
    {
        $brands = Brand::all();
        $sizes = ClothSizes::all();
        $categories = ProductCategory::all();
        $products = Product::with('photo', 'gender','productCategory','brand')->get();
        $productDetails = ProductDetails::with('discount')->orderBy('discount_id', 'DESC')->get();

        return view('frontend.shop.index', compact('products','categories','brands','sizes','productDetails'));
    }

    public function addToCart($id){
        $product = ProductDetails::with('colors')->where('id',$id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return redirect()->back();

    }

    public function removeFromCart($id){
        $product = ProductDetails::with('colors')->where('id',$id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->remove($product, $id);
        foreach ($cart->products as $productControl){
            if ($productControl['quantity'] === 0){
                $cart->removeItem($id);
            }
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeAllFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        if (empty(Session::get('cart')->products)){
            Session::remove('cart');
        }
        return redirect()->back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $brand = Brand::all();
        $images = Image::where('product_id',$id)->orderBy('color_id', 'ASC')->get();
        $oldColor = 0;
        $colors = ProductDetails::where('product_id',$id)->whereHas('colors')->orderBy('color_id', 'ASC')->get();
        $color = ProductDetails::select('color_id')->where('product_id',$id)->orderBy('color_id', 'ASC')->take(1)->get();
        $name  = 0;
        $productDetails = ProductDetails::with('clothSize','colors','discount')->orderBy('clothSize_id', 'ASC')->where('product_id', $id)->where('color_id', $color[0])->get();

        return view('frontend.shop.show', compact('product','productDetails','colors', 'oldColor','images','brand','color','name'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function productsPerColor($id,$name){
        $product = Product::findOrFail($id);
        $images = Image::where('product_id',$id)->orderBy('color_id', 'ASC')->get();
        $brands = Brand::all();
        $colors = ProductDetails::where('product_id',$id)->get();
        $color = Color::select('id')->where('name',$name)->get()->toArray();
        $oldColor = 0;
        $productDetails = ProductDetails::with('clothSize','colors','discount')->orderBy('clothSize_id', 'ASC')->where('product_id', $id)->where('color_id', $color[0])->get();

        return view('frontend.shop.show', compact('product','colors', 'oldColor','brands','images','productDetails','name'));
    }
}
