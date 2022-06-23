<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetails;
use App\Models\User;
use Illuminate\Database\Query\Builder;
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
        $genders = Gender::all();
        $productGirls = Product::where('gender_id', 1)->orderBy('product_category_id', 'ASC')->with('productCategory','photo')->get();
        $productBoys = Product::where('gender_id', 2)->orderBy('product_category_id', 'ASC')->with('productCategory','photo')->get();
        $products = Product::with('photo', 'gender','productDetails')->get();
        $newArrivals = Product::with('productCategory','photo')->orderBy('created_at', 'DESC')->get();
        $productDetails = ProductDetails::with('discount')->get();
        $posts = Post::with('user.photo','user','categories','photo',)->orderBy('created_at', 'ASC')->get();
        $users = User::with('photo','roles')->whereHas('posts')->get();
        return view('frontend.home.index', compact('products', 'oldCategory','genders','productGirls','productBoys','productDetails','posts','users','newArrivals'));
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
