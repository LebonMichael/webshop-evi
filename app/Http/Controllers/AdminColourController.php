<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours = Colour::withTrashed()->paginate(15);

        return view('admin.colours.index', compact('colours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $colour = new Colour();
        $colour->name = $request->name;
        $colour->code = $request->code;
        $colour->slug = Str::slug($colour->name, '-');
        $colour->save();
        Session::flash('category_message', 'Colour ' . $request->name . ' was created!');
        return redirect()->route('colours.index');
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
        $colour = Colour::findOrFail($id);
        Session::flash('category_message', $colour->name . ' was deleted!');
        $colour->delete();
        return redirect()->route('colours.index');
    }

    public function restore($id)
    {
        Colour::onlyTrashed()->where('id', $id)->restore();
        $colour = Colour::findOrFail($id);
        Session::flash('category_message', $colour->name . ' was restored!');
        return redirect()->route('colours.index');
    }
}
