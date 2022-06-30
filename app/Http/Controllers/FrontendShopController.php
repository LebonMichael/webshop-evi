<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\ClothSizes;
use App\Models\Color;
use App\Models\ImagesProduct;
use App\Models\Order;
use App\Models\OrderAdress;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendShopController extends Controller
{


    public function index()
    {
        $brands = Brand::all();
        $sizes = ClothSizes::all();
        $categories = ProductCategory::all();
        $productDetails = ProductDetails::with('discount', 'colors')->orderBy('discount_id', 'DESC')->get();
        $products = Product::with('photo', 'gender', 'productCategory', 'brand', 'colors')->paginate(9);



        return view('frontend.shop.index', compact('products', 'categories', 'brands', 'sizes', 'productDetails'));
    }

    public function shoppingCart()
    {
        if (Session::has('cart')) {
            $shoppingCarts = Session::get('cart')->products;
        } else {
            $shoppingCarts = '';
        }
        return view('frontend.shop.cart', compact('shoppingCarts'));
    }

    public function shopFilter(Request $request)
    {
        $brands = Brand::all();
        $sizes = ClothSizes::all();
        $categories = ProductCategory::all();
        $productDetails = ProductDetails::with('discount', 'colors')->orderBy('discount_id', 'DESC')->get();

        $filterCategory = $request->category;
        $filterBrands = $request->brands;
        $filterSizes = $request->sizes;
        if ($filterCategory) {

            if ($filterBrands) {

                if($filterSizes){
                    $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                        ->where([
                            ['product_category_id', $filterCategory],
                        ])
                        ->whereIn('brand_id', $filterBrands)
                        ->whereHas('productDetails', function ($query) use ($filterSizes){
                            $query->where('clothSize_id', 'like', $filterSizes);
                        })
                        ->paginate(9);
                }else{
                    $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                        ->where([
                            ['product_category_id', $filterCategory],
                        ])
                        ->whereIn('brand_id', $filterBrands)
                        ->paginate(9);
                }

            }elseif ($filterSizes){
                $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                    ->where([
                        ['product_category_id', $filterCategory],
                    ])
                    ->whereHas('productDetails', function ($query) use ($filterSizes){
                        $query->where('clothSize_id', 'like', $filterSizes);
                    })
                    ->paginate(9);
            }
            else{
                $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                    ->where([
                        ['product_category_id', $filterCategory],
                    ])
                    ->paginate(9);
            }
        }
        elseif($filterBrands){
            if($filterSizes){
                $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                    ->whereIn('brand_id', $filterBrands)
                    ->whereHas('productDetails', function ($query) use ($filterSizes){
                        $query->where('clothSize_id', 'like', $filterSizes);
                    })
                    ->paginate(9);
            }else{
                $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                    ->whereIn('brand_id', $filterBrands)
                    ->paginate(9);
            }


        }
        elseif ($filterSizes){
            $products = Product::with('photo','colors', 'gender', 'brand', 'discount', 'productCategory')
                ->whereHas('productDetails', function ($query) use ($filterSizes){
                    $query->where('clothSize_id', 'like', $filterSizes);
                })
                ->paginate(9);
        }
        else{
            $products = Product::with('photo', 'gender', 'productCategory', 'brand', 'colors')->paginate(9);
        }


        /*    if(empty($filterCategory && $filterBrands && $filterSizes)){
                $products = Product::with('photo', 'gender', 'productCategory', 'brand', 'colors')->paginate(9);

            }elseif($filterSizes){

                dd($brands);
            }*/


        return view('frontend.shop.index', compact('products', 'categories', 'brands', 'sizes', 'productDetails'));
    }

    public function checkout()
    {
        $user = Auth::user();

        return view('frontend.shop.checkout', compact('user'));

    }

    public function orderAdress(Request $request)
    {

        $orderAdress = new OrderAdress();
        $orderAdress->street = $request->street;
        $orderAdress->street_number = $request->street_number;
        $orderAdress->city = $request->city;
        $orderAdress->zip_code = $request->zip_code;
        $orderAdress->country = $request->country;

        Session::put('orderAdress', $orderAdress);

        return redirect(route('mollie.payment'));
    }

    public function thanksPage()
    {

        return view('frontend.shop.thanksPage');
    }

    public function addToCart($id)
    {
        $product = ProductDetails::with('colors')->where('id', $id)->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);


        $cart->add($product, $id);
        Session::put('cart', $cart);


        return redirect()->back();

    }

    public function removeFromCart($id)
    {
        $product = ProductDetails::with('colors')->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($product, $id);
        foreach ($cart->products as $productControl) {
            if ($productControl['quantity'] === 0) {
                $cart->removeItem($id);
            }
        }
        Session::put('cart', $cart);
        if (empty(Session::get('cart')->products)) {
            Session::remove('cart');
        }
        return redirect()->back();
    }

    public function removeAllFromCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        if (empty(Session::get('cart')->products)) {
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
        $images = ImagesProduct::where('product_id', $id)->orderBy('color_id', 'ASC')->get();
        $oldColor = 0;
        $colors = ProductDetails::where('product_id', $id)->whereHas('colors')->orderBy('color_id', 'ASC')->get();
        $color = ProductDetails::select('color_id')->where('product_id', $id)->orderBy('color_id', 'ASC')->take(1)->get();
        $name = 0;
        $productDetails = ProductDetails::with('clothSize', 'colors', 'discount')->orderBy('clothSize_id', 'ASC')->where('product_id', $id)->where('color_id', $color[0])->get();


        return view('frontend.shop.show', compact('product', 'productDetails', 'colors', 'oldColor', 'images', 'brand', 'color', 'name'));
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

    public function productsPerColor($id, $name)
    {
        $product = Product::findOrFail($id);
        $images = ImagesProduct::where('product_id', $id)->orderBy('color_id', 'ASC')->get();
        $brands = Brand::all();
        $colors = ProductDetails::where('product_id', $id)->get();
        $color = Color::select('id')->where('name', $name)->get()->toArray();
        $oldColor = 0;
        $productDetails = ProductDetails::with('clothSize', 'colors', 'discount')->orderBy('clothSize_id', 'ASC')->where('product_id', $id)->where('color_id', $color[0])->get();

        return view('frontend.shop.show', compact('product', 'colors', 'oldColor', 'brands', 'images', 'productDetails', 'name'));
    }
}
