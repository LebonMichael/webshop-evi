@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Create Product Category</h1>
        </div>
        <div class="col-4 offset-4 img-thumbnail bg-black">
            @include('includes.form_error')
            <form action="{{route('productCategories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-white" for="name">Product Category Name : </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Product Category...">
                </div>
                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Add Product Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection

