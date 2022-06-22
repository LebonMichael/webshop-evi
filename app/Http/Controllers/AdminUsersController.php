<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{


    public function index()
    {

        $users = User::with('photo', 'roles')->withTrashed()->orderBy('updated_at', 'desc')->filter(request(['search']))->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UsersRequest $request)
    {
        dd($request);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->is_active = $request->is_active;

        /** photo opslaan **/
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/users', $name);
            $photo = Photo::create(['file' => $name]);
            $user->photo_id = $photo->id;
        }
        $user->save();

        $user->roles()->sync($request->roles, false);
        Session::flash('user_message', 'User ' . $request->name . ' was created!');
        return redirect('admin/users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function changeSettings($id)
    {
        if (Auth::user()->id == $id) {
            $user = User::findOrFail($id);
            $roles = Role::all();
            return view('admin.users.changeSettings', compact('user', 'roles'));
        } else {
            return redirect('admin');
        }

    }

    public function settingsUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all;
            $input['password'] = Hash::make($request['password']);
        }

        /** opvragen oude image **/
        $oldImage = Photo::find($user->photo_id);
        if ($oldImage) {
            //fysisch verwijderen uit img directory
            unlink(public_path() . '/img/users' . $oldImage->file);
            //oude image uit de tabel photos verwijderen
            $oldImage->delete();
        }
        /** photo overschrijven **/
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/users', $name);
            $photo = Photo::create(['file' => $name]);
            $user->photo_id = $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        Session::flash('user_message', 'User ' . $request->name . ' was updated!');

        if (Auth::user()->id == $id) {
            $user = User::findOrFail($id);
            $roles = Role::all();
            return view('admin.users.changeSettings', compact('user', 'roles'));
        } else {
            return redirect('admin');
        }
    }

    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all;
            $input['password'] = Hash::make($request['password']);
        }
        /** opvragen oude image **/
        $oldImage = Photo::find($user->photo_id);
        if ($oldImage) {
            //fysisch verwijderen uit img directory
            unlink(public_path() . '/img/users' . $oldImage->file);
            //oude image uit de tabel photos verwijderen
            $oldImage->delete();
        }
        /** photo overschrijven **/
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/users', $name);
            $photo = Photo::create(['file' => $name]);
            $user->photo_id = $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        /** Wegschrijven tussentabel met de nieuwe rollen **/
        $user->roles()->sync($request->roles, true);
        Session::flash('user_message', 'User ' . $request->name . ' was updated!');
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('user_message', $user->first_name . $user->last_name . ' was deleted!');
        return redirect('/admin/users');
    }

    public function restore($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        $user = User::findOrFail($id);
        Session::flash('user_message', $user->first_name . $user->last_name . ' was restored!');
        return redirect('/admin/users');
    }
}

