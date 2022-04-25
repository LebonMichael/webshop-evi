<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminPostsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::withTrashed()->paginate(15);

        return view('admin.postCategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.postCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new PostCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($category->name,'-');
        $category->save();
        Session::flash('category_message','Category ' . $request->name . ' was created!');
        return redirect()->route('postCategories.index');
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
        $category= PostCategory::findOrFail($id);
        return view('admin.postCategories.edit', compact('category'));
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
        $category = PostCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($category->name,'-');
        $category->update();
        Session::flash('category_message','Category ' . $request->name . ' was created!');
        return redirect()->route('postCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PostCategory::findOrFail($id);
        Session::flash('category_message', $category->name . ' was deleted!');
        $category->delete();
        return redirect()->route('postCategories.index');
    }

    public function restore($id)
    {
        PostCategory::onlyTrashed()->where('id', $id)->restore();
        $category = PostCategory::findOrFail($id);
        Session::flash('category_message', $category->name . ' was restored!');
        return redirect()->route('postCategories.index');
    }
}
