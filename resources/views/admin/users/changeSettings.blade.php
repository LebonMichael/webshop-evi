@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Settings</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @if(session('user_message'))
                    <div class="alert alert-info alert-dismissible">
                        <a href="{{route('users.settings', Auth::user()->id)}}" class="btn-close" data-dismiss="alert" aria-label="close"></a>
                        <strong>Info!</strong>  {{session('user_message')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-8">
                        @include('includes.form_error')
                        <form action="{{route('users.settingsUpdate', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row row-cols-2 my-1">
                                <div class="form-group">
                                    <label class="text-white" for="first_name">First Name:</label>
                                    <input value="{{$user->first_name}}" type="text" name="first_name" id="first_name"
                                           class="form-control"
                                           placeholder="{{$user->first_name}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-white" for="last_name">Last Name:</label>
                                    <input value="{{$user->last_name}}" type="text" name="last_name" id="last_name"
                                           class="form-control"
                                           placeholder="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="row row-cols-2 my-1">
                                <div class="form-group">
                                    <label class="text-white" for="email">E-mail:</label>
                                    <input value="{{$user->email}}" type="text" name="email" id="email"
                                           class="form-control"
                                           placeholder="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="text-white">Phone:</label>
                                    <input type="text" class="form-control"  value="{{$user->phone}}" id="phone">
                                </div>
                            </div>
                            <div class="row row-cols-3 my-1">
                                <div class="form-group">
                                    <label for="street" class="text-white">Street:</label>
                                    <input type="text" class="form-control" name="street" value="{{$user->street}}" id="street">
                                </div>
                                <div class="form-group">
                                    <label for="streetNumber" class="text-white">Street Number:</label>
                                    <input type="text" class="form-control" name="street_number" value="{{$user->street_number}}" id="streetNumber">
                                </div>
                                <div class="form-group">
                                    <label for="city" class="text-white">City:</label>
                                    <input type="text" class="form-control" name="city" value="{{$user->city}}" id="city">
                                </div>
                            </div>
                            <div class="row row-cols-2 my-1">
                                <div class="form-group">
                                    <label for="zipCode" class="text-white">Zip Code:</label>
                                    <input type="text" class="form-control" name="zip_code" value="{{$user->zip_code}}" id="zipCode">
                                </div>
                                <div class="form-group">
                                    <label for="country" class="text-white">Country:</label>
                                    <input type="text" class="form-control" name="country" value="{{$user->country}}" id="country">
                                </div>
                            </div>
                            <div class="form-group my-1">
                                <label class="text-white" for="is_active">Status:</label>
                                <select name="is_active" class="form-select" id="is_active">
                                    <option value="1" >
                                        Active
                                    </option>
                                    <option value="0">
                                        Not Active
                                    </option>
                                </select>
                            </div>
                            <div class="form-group my-1">
                                <label class="text-white" for="password">Password:</label>
                                <input value="" type="password" name="password" id="password"
                                       class="form-control "
                                       placeholder="Password...">
                            </div>
                            <div class="form-group my-1">
                                <label class="text-white me-3" for="file">Profile Photo:</label>
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Change Your Profile Photo</h4>
                                            <input type="file" name="photo_id" id="file" class="dropify" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit User</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <p class="text-white">Profile Photo:</p>
                        <img class="img-fluid img-thumbnail bg-black"
                             src="{{$user->photo ? asset('img/users') . $user->photo->file : 'https://via.placeholder.com/500'}}"
                             alt="{{$user->name}}">
                    </div>
                </div>

            </div>
        </div>
@endsection
