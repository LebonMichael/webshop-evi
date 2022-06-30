@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Edit Post</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                <div class="row">
                    <div class="col-7">
                        @include('includes.form_error')
                        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="text-white" for="title">Title</label>
                                <input value="{{$post->title}}" type="text" name="title" id="title"
                                       class="form-control"
                                       placeholder="Title...">
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="category">Category (CTRL + CLICK multiple select)</label>
                                <select name="categories[]" class="form-control custom-select" id="category" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($post->categories->contains($category->id)) selected @endif>
                                            {{$category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="body">Post :</label>
                                <textarea class="form-control " name="body" id="body" cols="20" rows="10"
                                          placeholder="Description...">{{$post->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="file">Photo Product:</label>
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Your Upload Photo</h4>
                                            <input type="file" name="photo_id" id="file" class="dropify"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-3">
                                <button type="submit" class="btn btn-primary">Add Post</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-5">
                        <p class="text-white">Post Photo:</p>
                        <img class="img-fluid img-thumbnail bg-black my-3"
                             src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'http://via.placeholder.com/400'}}"
                             alt="{{$post->title}}">
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
