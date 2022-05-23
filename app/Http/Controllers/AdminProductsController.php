<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Brand;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use App\Models\ShoeSize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{

    public function index()
    {
        $products = Product::with('photo','brand','productCategory','gender')->withTrashed()->orderBy('updated_at', 'desc')->filter(request(['search']))->paginate(20);
        $brands = Brand::all();
        return view('admin.products.index', compact('products','brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        $clothSizes = ClothSizes::all();
        $productCategories = ProductCategory::all();
        $discounts = Discount::all();
        return view('admin.products.create', compact('brands','colors','genders','clothSizes','productCategories','discounts'));
    }

    public function createProductDetailsImages($id){
        $product = Product::findOrFail($id);
        $images = Image::where('product_id', $id)->get();
        $oldColor = 0;

        return view ('admin.productsDetails.createImages', compact('product','images','oldColor'));
    }

    public function createProductDetails($id){
        $product = Product::findOrFail($id);
        $discounts = Discount::all();
        $clothSizes = ClothSizes::all();
        return view ('admin.productsDetails.create', compact('product','discounts','clothSizes'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->body = $request->body;
        $product->brand_id = $request->brand_id;
        $product->gender_id = $request->gender_id;
        $product->product_category_id = $request->productCategory_id;

        $request->validate([
            'name'=>'required|string|max:255',
            'body'=>'required|string|max:255',
            'photo' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        /** photo opslaan **/
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/products', $name);
            $photo = Photo::create(['file' => $name]);
            $product->photo_id = $photo->id;
        }
        $product->save();

        $product->colors()->sync($request->colors,false);

        Session::flash('product_message','Product ' . $request->name . ' was created!');
        return redirect(route('productDetails.create', $product->id));
    }

    public function storeProductDetailsImages(Request $request , $id){

        $product = Product::findOrFail($id);
        $color = Color::findorFail($request->color_id);
        /** photo opslaan **/
        if ($image = $request->file('image1')) {
            $imageName = time() . $image->getClientOriginalName();
            $image->move('img/productsDetails/'. $color->name, $imageName);
            Image::create([
                'product_id' => $product->id,
                'color_id' => $color->id,
                'image' => $imageName,
            ]);
        }
        if ($image = $request->file('image2')) {
            $imageName = time() . $image->getClientOriginalName();
            $image->move('img/productsDetails/'. $color->name, $imageName);
            Image::create([
                'product_id' => $product->id,
                'color_id' => $color->id,
                'image' => $imageName,
            ]);
        }
        if ($image = $request->file('image3')) {
            $imageName = time() . $image->getClientOriginalName();
            $image->move('img/productsDetails/'. $color->name, $imageName);
            Image::create([
                'product_id' => $product->id,
                'color_id' => $color->id,
                'image' => $imageName,
            ]);
        }
        if ($image = $request->file('image4')) {
            $imageName = time() . $image->getClientOriginalName();
            $image->move('img/productsDetails/'. $color->name, $imageName);
            Image::create([
                'product_id' => $product->id,
                'color_id' => $color->id,
                'image' => $imageName,
            ]);
        }

        Session::flash('product_message','Product Detail Images were created!');
        return redirect('admin/products');
    }

    public function storeProductDetails(Request $request , $id){
        $productDetails = new ProductDetails();
        $product = Product::findOrFail($id);
        $productDetails->product_id = $product->id;
        $productDetails->color_id = $request->color_id;
        $productDetails->clothSize_id = $request->clothSize;
        $productDetails->discount_id = $request->discount_id;
        $productDetails->stock = $request->stock;
        $productDetails->price = $request->price;

        $request->validate([
            'stock' => 'required|integer|max:255',
            'price' => 'required|integer|max:255',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        $productDetails->save();



        if($request->has('image')){
            foreach ($request->file('image') as $image){
                $imageName = time() . $image->getClientOriginalName();
                $image->move('img/productsDetails/colors', $imageName);
                Image::create([
                    'product_details_id' => $productDetails->id,
                    'image' => $imageName,
                ]);

            }
        }

        $productDetails->colors()->sync($request->color_id,false);

        Session::flash('product_message','Product ' . $request->name . ' was created!');
        return redirect('admin/products');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        $productDetails = ProductDetails::where('product_id', $id)->with('colors','clothSize','discount')->orderBy('clothSize_id')->get();

        return view('admin.products.show', compact('product', 'productDetails','images'));
    }

    public function edit($id)
    {
        $brands = Brand::all();
        $colors = Color::all();
        $genders = Gender::all();
        $clothSizes = ClothSizes::all();
        $productCategories = ProductCategory::all();
        $discounts = Discount::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product','brands','colors','genders','clothSizes','productCategories','discounts'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->body = $request->body;
        $product->brand_id = $request->brand_id;
        $product->gender_id = $request->gender_id;
        $product->product_category_id = $request->productCategory_id;

        /**photo opslaan**/
        if($file = $request->file('photo')){
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
        $product->colors()->sync($request->colors,true);
        Session::flash('product_message', 'Product ' . $request->name . ' was updated!');
        return redirect()->route('products.index');
    }

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
        $products = Product::with('photo','gender','brand','discount','productCategory')
            ->where('brand_id', $id)
            ->paginate(10);
        return view('admin.products.index', compact('products','brands'));
    }

}
