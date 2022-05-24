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
                            <div class="d-md-flex">
                                <div class="col-md-4">
                                    <label class="text-white" for="price">Price: </label>
                                    <div class="input-group pe-md-2">
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
                                <div class="form-group col-md-4">
                                    <label class="text-white" for="price">Stock: </label>
                                    <input type="number" name="stock" id="stock"
                                           class="form-control" value="{{$productDetail->stock}}"
                                           placeholder="{{$productDetail->stock}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-white px-md-2" for="discount_id">Discount: </label>
                                    <div class="input-group px-md-2">
                                        <select name="discount_id" class="form-select">
                                            @foreach($discounts as $discount)
                                                <option value="{{$discount->id}}"
                                                        @if($productDetail->discount->id == $discount->id) selected @endif >
                                                    {{$discount->percentage}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text">%</span>
                                    </div>
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
