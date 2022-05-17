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
    public function create($id)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

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
        $productDetail = ProductDetails::findOrFail($id);
        $clothSizes = ClothSizes::all();
        return view('admin.productsDetails.edit', compact('productDetail','clothSizes'));
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
        $productDetail = ProductDetails::findOrFail($id);
        $productDetail->price = $request->price;
        $productDetail->stock = $request->stock;

        if($request->has('images')){
            if($productDetail->images){
                foreach ($productDetail->images as $image){
                    $oldImage = $image->image;
                    unlink('img/productsDetails/colors/' . $oldImage);
                    $image->delete();
                };
            }
            foreach ($request->file('images') as $image){
                $imageName = time() . $image->getClientOriginalName();
                $image->move('img/productsDetails/colors', $imageName);
                Image::create([
                    'product_details_id' => $productDetail->id,
                    'image' => $imageName,
                ]);

            }
        }


        $productDetail->update();

        return redirect()->route('products.index');

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