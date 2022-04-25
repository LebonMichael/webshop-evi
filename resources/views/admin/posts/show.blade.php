@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @include('includes.form_error')
        <div class="card mb-3" style="width:auto;">
            <div class="row no-gutters bg-black">
                <div class="col-md-4">
                    <div class="m-3 align-items-stretch">
                        <img class="img-fluid img-thumbnail my-3"
                             src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'http://via.placeholder.com/400'}}"
                             alt="{{$post->title}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <h3 class="fw-bold text-white">Title</h3>
                        <div class="img-thumbnail my-2">
                            <p class="card-text">{{$post->title}}</p>
                        </div>

                        <h4 class="fw-bold fs-5 text-white">User</h4>
                        <div class="img-thumbnail my-2">
                            <p class="card-text">{{$post->user->first_name}} {{$post->user->last_name}}</p>
                        </div>


                        <h4 class="fw-bold fs-5 text-white">Post Categories</h4>
                        <div class="img-thumbnail my-2">
                            @if($post->categories)
                                @foreach($post->categories as $category)
                                    <span class="badge rounded-pill bg-secondary">{{$category->name}}</span>
                                @endforeach
                            @endif
                        </div>

                        <h4 class="fw-bold fs-5 text-white">Post</h4>
                        <div class="img-thumbnail my-2">
                            <p class="card-text">{{$post->body}}</p>
                        </div>
                        <br>
                        <p class="card-text"><small class="text-muted">{{$post->updated_at->diffForhumans()}}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
