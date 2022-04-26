<?php

namespace App\Http\Controllers;

use App\Models\ClothSizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminClothSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothSizes = ClothSizes::withTrashed()->paginate(15);

        return view('admin.cloth-sizes.index', compact('clothSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cloth-sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clothSize = new ClothSizes();
        $clothSize->size = $request->size;
        $clothSize->save();
        Session::flash('clothSize_message','Cloth Size ' . $request->size . ' was created!');
        return redirect()->route('cloth-sizes.index');
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
        $clothSize = ClothSizes::findOrFail($id);
        return view('admin.cloth-sizes.edit', compact('clothSize'));
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
        $clothSize = ClothSizes::findOrFail($id);
        $clothSize->size = $request->size;
        $clothSize->update();
        Session::flash('clothSize_message', 'Cloth Size ' . $request->size . ' was Updated!');
        return redirect()->route('cloth-sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clothSize = ClothSizes::findOrFail($id);
        Session::flash('clothSize_message', $clothSize->size . ' was deleted!');
        $clothSize->delete();
        return redirect()->route('cloth-sizes.index');
    }

    public function restore($id)
    {
        ClothSizes::onlyTrashed()->where('id', $id)->restore();
        $clothSize = ClothSizes::findOrFail($id);
        Session::flash('clothSize_message', $clothSize->name . ' was restored!');
        return redirect()->route('cloth-sizes.index');
    }
}
