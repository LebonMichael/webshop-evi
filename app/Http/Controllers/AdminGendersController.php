<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminGendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::withTrashed()->paginate(15);

        return view('admin.genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.genders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gender = new Gender();
        $gender->name = $request->name;
        $gender->slug = Str::slug($gender->name,'-');
        $gender->save();
        Session::flash('gender_message','Brand ' . $request->name . ' was created!');
        return redirect()->route('genders.index');
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
        $gender = Gender::findOrFail($id);
        return view('admin.genders.edit', compact('gender'));
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
        $gender = Gender::findOrFail($id);
        $gender->name = $request->name;
        $gender->slug = Str::slug($gender->name, '-');
        $gender->update();
        Session::flash('gender_message', 'Gender ' . $request->name . ' was updated!');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender = Gender::findOrFail($id);
        Session::flash('gender_message', $gender->name . ' was deleted!');
        $gender->delete();
        return redirect()->route('genders.index');
    }

    public function restore($id)
    {
        Gender::onlyTrashed()->where('id', $id)->restore();
        $gender = Brand::findOrFail($id);
        Session::flash('category_message', $gender->name . ' was restored!');
        return redirect()->route('brands.index');
    }
}
