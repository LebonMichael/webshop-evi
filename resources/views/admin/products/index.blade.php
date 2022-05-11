@extends('layouts.admin')
@section('content')
    <div class="col">
        @if(session('product_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('product_message')}}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">All Products</h1>
        </div>
        <div class="border border-2 rounded-3 my-3">
            <form>
                <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{route('products.index')}}"
               class="badge badge-primary m-1 p-3 text-black">All</a>
            @foreach($brands as $brand)
                <a href="{{route('productsPerBrand', $brand->id)}}"
                   class="badge badge-primary m-1 p-3 text-black">{{$brand->name}}</a>
            @endforeach
        </div>
        <div class="col-12 my-3">
            <a href="{{route('products.create')}}" class="btn btn-info">Create Product</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name Product</th>
                <th>Description</th>
                <th>Gender</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Updated</th>
                <th>Created</th>
                <th>Deleted</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        <img height="62" width="auto" src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}" alt="{{$product->name}}">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{Str::limit($product->body,40,'...')}}</td>
                    <td>{{$product->gender->name}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->productCategory->name}}</td>
                    <td>{{$product->created_at->diffForHumans()}}</td>
                    <td>{{$product->updated_at->diffForHumans()}}</td>
                    <td>{{$product->deleted_at}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-info btn-sm m-1" href="{{route('products.show', $product->id)}}">Show</a>
                            <a class="btn btn-warning btn-sm m-1" href="{{route('products.edit', $product->id)}}">Edit</a>
                            @if($product->deleted_at != null)
                                <a class="btn btn-success btn-sm m-1" href="{{route('products.restore',$product->id)}}">Restore</a>
                            @else
                                <form action="{{route('products.destroy', $product->id)}}" method="POST">
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
        {{$products->render()}}
    </div>
@endsection
