@extends('layouts.frontendNav')
@section('content')
    <section class="py-11 bg-light-gradient border-bottom border-white border-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-10">
                    <div class="d-flex align-items-center flex-column">

                    </div>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-5">
                                <img class="img-fluid img-thumbnail rounded-3"
                                     src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'https://via.placeholder.com/500'}}"
                                     alt="{{$post->title}}">
                            </div>
                            <div class="col-lg-7 img-thumbnail border rounded-3">
                                <h1 class="fs-4 fs-lg-6 fs-md-6 fw-bold">{{$post->title}}</h1>
                                <div>
                                    <p>
                                        {{$post->body}}
                                    </p>
                                    <p>{{$post->user->first_name}} {{$post->user->last_name}}</p>
                                    <div class="my-2">
                                        @if($post->categories)
                                            @foreach($post->categories as $category)
                                                <span class="badge rounded-pill bg-secondary">{{$category->name}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        <small>{{$post->updated_at->diffForhumans()}}</small>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


