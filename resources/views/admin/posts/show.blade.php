@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @include('includes.form_error')
        <div class="card mb-3" style="width:auto;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="m-3 align-items-stretch">
                        <img class="img-fluid img-thumbnail"
                             src="{{$post->photo ? asset($post->photo->file): 'http://via.placeholder.com/1000x1000'}}"
                             alt="{{$post->title}}">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card-body text-center">

                        <h3 class="fw-bold">Title</h3>
                        <div class="img-thumbnail my-2">
                            <p class="card-text text-black">{{$post->title}}</p>
                        </div>

                        <h4 class="fw-bold fs-5">User</h4>
                        <div class="img-thumbnail my-2">
                            <p class="card-text text-black">{{$post->user->name}}</p>
                        </div>


                        <h4 class="fw-bold fs-5">Post Categories</h4>
                        <div class="img-thumbnail my-2">
                            @if($post->categories)
                                @foreach($post->categories as $category)
                                    <span class="badge badge-pill badge-info">{{$category->name}}</span>
                                @endforeach
                            @endif
                        </div>

                        <h4 class="fw-bold fs-5">Post</h4>
                        <div class="img-thumbnail my-2">
                            <p class="card-text text-black">{{$post->body}}</p>
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
