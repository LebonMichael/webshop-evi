<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productDetails = new ProductDetails();
        $productDetails->product_id = $product->id;
        $productDetails->color_id = $request->color;
        $productDetails->clothSize_id = $request->clothSize;
        $productDetails->discount_id = $request->discount_id;
        $productDetails->stock = $request->stock;
        $productDetails->price = $request->price;

        $productDetails->save();

        if($request->has('images')){
            foreach ($request->file('images') as $image){
                $imageName = time() . $image->getClientOriginalName();
                $image->move('img/productsDetails/colors', $imageName);
                Image::create([
                    'product_details_id' => $productDetails->id,
                    'image' => $imageName,
                ]);

            }
        }
        Session::flash('product_message','Product ' . $request->name . ' was created!');
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
