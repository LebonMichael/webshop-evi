@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Edit User</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                <div class="row">
                    <div class="col-10 offset-1">
                        @include('includes.form_error')
                        <form action="{{route('productsDetails.update', $productDetail->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="d-flex">
                                <div class="col-6">
                                    <label class="text-white" for="price">Price: </label>
                                    <div class="input-group pe-2">
                                        <span class="input-group-text">&euro;</span>
                                        <input
                                            type="number"
                                            step="0.05"
                                            name="price" id="price"
                                            class="form-control"
                                            placeholder="Price"
                                            value="{{$productDetail->price}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="text-white" for="price">Stock: </label>
                                    <input type="number" name="stock" id="stock"
                                           class="form-control" value="{{$productDetail->stock}}"
                                           placeholder="{{$productDetail->stock}}">
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                                <div class="form-group">
                                    <label class="text-white me-3" for="file">Product Color Photos:</label>
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Your Pictures</h5>
                                                <input
                                                    type="file"
                                                    name="images[]"
                                                    class="form-control"
                                                    accept="image/*"
                                                    multiple
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-lg-10 offset-lg-1">
                                <div class="row row-cols-4">
                                    @foreach($productDetail->images as $image)
                                        <div>
                                            <img class="img-fluid m-2 border border-2 rounded"
                                                 src="{{asset('img/productsDetails/colors') . '/' . $image->image}}"
                                                 alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection
