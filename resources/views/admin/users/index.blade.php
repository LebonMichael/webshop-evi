@extends('layouts.admin')
@section('content')
    <div class="col">
        @if(session('user_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('user_message')}}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">All Users</h1>
        </div>
        <div class="border border-2 rounded-3 my-3">
            <form>
                <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                       placeholder="Search for..." aria-label="Search">
            </form>
        </div>
        <div class="col-12 my-3">
            <a href="{{route('users.create')}}" class="btn btn-info">Create User</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <img height="62" width="62" src="{{$user->photo ? asset('img/users') . $user->photo->file : 'https://via.placeholder.com/62'}}" alt="{{$user->name}}">
                    </td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge rounded-pill bg-primary">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <span class="badge rounded-pill @if($user->is_active == 1) bg-success @else bg-danger @endif" >
                              {{$user->is_active ? 'Active' : 'Not Active'}}
                        </span>
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-info btn-sm m-1" href="{{route('users.show', $user->id)}}">Show</a>
                            <a class="btn btn-warning btn-sm m-1" href="{{route('users.edit', $user->id)}}">Edit</a>
                            @if($user->deleted_at != null)
                                <a class="btn btn-success btn-sm m-1" href="{{route('users.restore',$user->id)}}">Restore</a>
                            @else
                                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->render()}}
    </div>
@endsection
