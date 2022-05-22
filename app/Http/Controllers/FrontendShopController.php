<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ClothSizes;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

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
        $oldColor = 0;
        $colors = ProductDetails::where('product_id',$id)->whereHas('colors')->orderBy('color_id', 'ASC')->get();
        $productDetails = ProductDetails::with('images','clothSize')->orderBy('clothSize_id', 'ASC')->where('product_id', $id)->get();

        return view('frontend.shop.show', compact('product','productDetails','colors', 'oldColor'));
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
}
