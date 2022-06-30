@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Edit Product Category</h1>
        </div>
        <div class="row">
            <div class="col-4 offset-4 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('productCategories.update', $productCategory->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group ">
                        <label class="text-white" for="name">Category Name : </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$productCategory->name}}"
                               placeholder="Color...">
                    </div>
                    <div class="text-center m-2">
                        <button type="submit" class="btn btn-primary">Update Product Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
