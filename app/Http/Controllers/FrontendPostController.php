<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo','categories')->paginate(9);
        $categories = PostCategory::all();
        $users = User::with('photo','roles')->get();
        return view('frontend.blogs.index', compact('posts', 'categories','users'));
    }

    public function blogsPerCategory($id){
        $categories = PostCategory::all();

        $users = User::with('photo','roles')->get();

        $posts = Post::with('photo','categories')
            ->whereHas('categories', function($q) use ($id){
                $q->where('post_category_id', '=', $id);
            })->paginate(9);

        return view('frontend.blogs.index', compact('posts', 'categories','users'));

    }

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
    public function show(Post $post)
    {

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
