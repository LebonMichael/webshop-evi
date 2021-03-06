<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Models\Photo;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo','user','categories')->filter(request(['search']))->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($post->title, '-');
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        /**photo opslaan**/
        if ($file = $request->file('photo_id')) {
            /**wegschrijven naar de img folder**/
            $name = time() . $file->getClientOriginalName();
            $file->move('img/posts', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file' => $name]);
            $post['photo_id'] = $photo->id;
        }
        /** wegschrijven naar de posts table **/
        $post->save();

        /** de gekozen categoriëen wegschrijven naar de tussentabel category_post**/
        $post->categories()->sync($request->categories, false);
        Session::flash('post_message', 'Post ' . $request->name . ' was created!');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = PostCategory::all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($post->title,'-');
        $post->body = $request->body;
        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            /** opvragen oude image **/
            $oldImage = Photo::find($post->photo_id);
            if($oldImage){
                unlink(public_path() . '/img/posts/' . $oldImage->file);
                $oldImage->delete();
            }
            /**wegschrijven naar de img folder**/
            $name = time(). $file->getClientOriginalName();
            $file->move('img/posts', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file'=>$name]);
            $post->photo_id = $photo->id;
        }
        $post->update();
        //categoriëen syncen
        $post->categories()->sync($request->categories,true);
        Session::flash('post_message', 'Post ' . $request->name . ' was updated!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //fysisch verwijderen img tabel
        if($post->photo){
            unlink(public_path() . '/img/posts/' . $post->photo->file);
            //photo deleten uit photo tabel
            $post->photo->delete();
        }
        //de posts zelf deleten
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function post(Post $post){

        return view('frontend.blogs.show',compact('post'));
    }
}
