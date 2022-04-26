<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Brand;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ShoeSize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('photo','brand','productCategory','gender','colors','shoeSize','clothSize')->withTrashed()->orderBy('updated_at', 'desc')->filter(request(['search']))->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        $shoeSizes = ShoeSize::all();
        $clothSizes = ClothSizes::all();
        $productCategories = ProductCategory::all();
        return view('admin.products.create', compact('brands','colors','genders','shoeSizes','clothSizes','productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->body = $request->body;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->brand_id = $request->brand_id;
        $product->gender_id = $request->gender_id;
        $product->product_category_id = $request->productCategory_id;


        /** photo opslaan **/
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/products', $name);
            $photo = Photo::create(['file' => $name]);
            $product->photo_id = $photo->id;
        }
        $product->save();

        $product->colors()->sync($request->colors, false);
        $product->shoeSize()->sync($request->shoeSize, false);
        $product->clothSize()->sync($request->clothSize, false);

        Session::flash('user_message','Product ' . $request->name . ' was created!');
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
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
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
