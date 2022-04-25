@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3">
            <h1 class="text-center">Edit Post</h1>
        </div>
        <div class="row">
            <div class="col-6 img-thumbnail">
                @include('includes.form_error')
                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="text-black" for="title">Title</label>
                        <input value="{{$post->title}}" type="text" name="title" id="title"
                               class="form-control bg-black"
                               placeholder="Title...">
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="category">Category (CTRL + CLICK multiple select)</label>
                        <select name="categories[]" class="form-control custom-select bg-black" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($post->categories->contains($category->id)) selected @endif>
                                    {{$category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="category">Post :</label>
                        <textarea class="form-control bg-black" name="body" id="body" cols="100%" rows="10"
                                  placeholder="Description...">{{$post->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="photo_id">Photo Product:</label>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Your Upload Photo</h4>
                                    <input type="file" name="photo_id" class="dropify"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </form>
            </div>
            <div class="col-6 ">
                <label for="">Featured Image</label>
                <br>
                <img class="img-fluid img-thumbnail my-3"
                     src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'http://via.placeholder.com/400'}}"
                     alt="{{$post->title}}">
            </div>
        </div>


    </div>

@endsection
