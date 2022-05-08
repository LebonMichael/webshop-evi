<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Brand;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\Discount;
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
        $products = Product::with('photo','brand','productCategory','gender','colors','discount')->withTrashed()->orderBy('updated_at', 'desc')->filter(request(['search']))->paginate(20);
        $brands = Brand::all();
        return view('admin.products.index', compact('products','brands'));
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
        $discounts = Discount::all();
        return view('admin.products.create', compact('brands','colors','genders','shoeSizes','clothSizes','productCategories','discounts'));
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
        $product->discount_id = $request->discount_id;
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
        $product->clothSizes()->sync($request->clothSize, false);

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
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        $shoeSizes = ShoeSize::all();
        $clothSizes = ClothSizes::all();
        $productCategories = ProductCategory::all();
        $discounts = Discount::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product','brands','colors','genders','shoeSizes','clothSizes','productCategories','discounts'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->body = $request->body;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount_id = $request->discount_id;
        $product->brand_id = $request->brand_id;
        $product->gender_id = $request->gender_id;
        $product->product_category_id = $request->productCategory_id;

        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            /** opvragen oude image **/
            $oldImage = Photo::find($product->photo_id);
            if($oldImage){
                unlink(public_path() . '/img/products/' . $oldImage->file);
                $oldImage->delete();
            }
            /**wegschrijven naar de img folder**/
            $name = time(). $file->getClientOriginalName();
            $file->move('img/products', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file'=>$name]);
            $product->photo_id = $photo->id;
        }
        $product->update();
        //categoriëen syncen
        $product->shoeSize()->sync($request->shoeSize,true);
        $product->clothSizes()->sync($request->clothSize,true);
        $product->colors()->sync($request->colors,true);
        Session::flash('product_message', 'Product ' . $request->name . ' was updated!');
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
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('product_message', $product->name . ' was deleted!');
        return redirect('/admin/products');
    }

    public function restore($id)
    {
        Product::onlyTrashed()->where('id', $id)->restore();
        $product = User::findOrFail($id);
        Session::flash('product_message', $product->name . ' was restored!');
        return redirect('/admin/products');
    }

    public function productsPerBrand($id){
        $brands = Brand::all();
        $products = Product::with('photo','gender','brand','discount','productCategory')->where('brand_id', $id)->paginate(10);
        return view('admin.products.index', compact('products','brands'));
    }
}
