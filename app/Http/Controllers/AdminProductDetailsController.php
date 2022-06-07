<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
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

    public function index()
    {
        //
    }

    public function create($id)
    {


    }

    public function chooseColor($id){


    }

    public function store(Request $request, $id)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $productDetail = ProductDetails::findOrFail($id);
        $discounts = Discount::all();
        return view('admin.productsDetails.edit', compact('productDetail','discounts'));
    }

    public function update(Request $request, $id)
    {
        $productDetail = ProductDetails::findOrFail($id);
        $productDetail->price = $request->price;
        $productDetail->stock = $request->stock;
        $productDetail->discount_id = $request->discount_id;

        $request->validate([
            'stock' => 'required',
            'price' => 'required',
            'discount_id' => 'required|integer',
        ]);

        if($request->has('image')){
            if ($request)
            if($productDetail->images){
                foreach ($productDetail->images as $image){
                    $oldImage = $image->image;
                    unlink('img/productsDetails/colors/' . $oldImage);
                    $image->delete();
                }
            }
            foreach ($request->file('image') as $image){
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

    public function destroy($id)
    {
        //
    }

}
