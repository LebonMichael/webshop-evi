<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldCategory = '';
        $productCategories = ProductCategory::with('products.photo', 'products.gender')->get();
        $productGirl = Product::where('gender_id', 1)->orderBy('product_category_id', 'ASC')->with('productCategory','photo')->get();
        $productBoy = Product::where('gender_id', 2)->orderBy('product_category_id', 'ASC')->with('productCategory','photo')->get();
        $products = Product::with('photo', 'gender')->get();
        $productDetails = ProductDetails::all();

        return view('frontend.home.index', compact('productCategories', 'products', 'oldCategory','productGirl','productBoy','productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
