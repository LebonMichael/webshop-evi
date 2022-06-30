@extends('layouts.admin')
@section('content')
    <div class="col">
        @if(session('post_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('post_message')}}
            </div>
        @endif
    </div>
        <div class="row">
            <div class="border border-2 rounded-3 bg-black my-3">
                <h1 class="text-center text-white">All Post</h1>
            </div>
            <div class="border border-2 rounded-3 my-3">
                <form>
                    <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                           placeholder="Search for..." aria-label="Search">
                </form>
            </div>
            <div class="col-12 my-3">
                <a href="{{route('posts.create')}}" class="btn btn-info">Create post</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Owner</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($posts)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                <img width="62" height="62" src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'http://via.placeholder.com/62'}}" alt="{{$post->title}}">
                            </td>
                            <td>{{$post->user ? $post->user->first_name . " " . $post->user->last_name : 'Username not known'}}</td>
                            <td>
                                @if($post->categories)
                                    @foreach($post->categories as $category)
                                        <span class="badge rounded-pill bg-secondary m-1">{{$category->name}}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{Str::limit($post->body,150,'...')}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm m-1" href="{{route('posts.show', $post)}}">Show</a>
                                    <a class="btn btn-info btn-sm m-1" href="{{route('posts.edit', $post->id)}}">Edit</a>
                                </div>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="alert alert-warning">
                            {{session('user_message')}}
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div>
                {{$posts->links()}}
            </div>
        </div>

@stop
