<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::withTrashed()->paginate(15);

        return view('admin.productCategories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($productCategory->name,'-');
        $productCategory->save();
        Session::flash('product_category_message','Product Category ' . $request->name . ' was created!');
        return redirect()->route('productCategories.index');
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
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.productCategories.edit', compact('productCategory'));
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
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($productCategory->name, '-');
        $productCategory->update();
        Session::flash('product_category_message', 'Brand ' . $request->name . ' was updated!');
        return redirect()->route('productCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        Session::flash('product_category_message', $productCategory->name . ' was deleted!');
        $productCategory->delete();
        return redirect()->route('productCategories.index');
    }

    public function restore($id)
    {
        ProductCategory::onlyTrashed()->where('id', $id)->restore();
        $productCategory = ProductCategory::findOrFail($id);
        Session::flash('product_category_message', $productCategory->name . ' was restored!');
        return redirect()->route('productCategories.index');
    }
}
