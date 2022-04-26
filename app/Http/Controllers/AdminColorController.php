<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::withTrashed()->paginate(15);

        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $color = new Color();
        $color->name = $request->name;
        $color->slug = Str::slug($color->name, '-');
        $color->code = $request->code;
        $color->save();
        Session::flash('category_message', 'Color ' . $request->name . ' was created!');
        return redirect()->route('colors.index');
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
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', compact('color'));
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
        $color = Color::findOrFail($id);
        $color->name = $request->name;
        $color->slug = Str::slug($color->name,'-');
        $color->code = $request->code;
        $color->update();
        Session::flash('category_message','Color ' . $request->name . ' was created!');
        return redirect()->route('colors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colour = Color::findOrFail($id);
        Session::flash('category_message', $colour->name . ' was deleted!');
        $colour->delete();
        return redirect()->route('colors.index');
    }

    public function restore($id)
    {
        Color::onlyTrashed()->where('id', $id)->restore();
        $colour = Color::findOrFail($id);
        Session::flash('category_message', $colour->name . ' was restored!');
        return redirect()->route('colors.index');
    }
}
