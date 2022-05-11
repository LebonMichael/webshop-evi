@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Edit User</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                <div class="row">
                    <div class="col-8">
                        @include('includes.form_error')
                        <form action="{{route('products.update', $product->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <div class="form-group pe-2">
                                    <label class="text-white" for="name">Product Name:</label>
                                    <input type="text" name="name" id="title"
                                           class="form-control" value="{{$product->name}}"
                                           placeholder="First Name..">
                                </div>
                            </div>
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
                                            value="{{$product->price}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group pe-2 col-6">
                                    <label class="text-white" for="price">Stock: </label>
                                    <input type="number" name="stock" id="stock"
                                           class="form-control" value="{{$product->stock}}"
                                           placeholder="{{$product->stock}}">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-6">
                                    <label class="text-white" for="discount_id">Discount: </label>
                                    <div class="input-group pe-2">
                                        <select name="discount_id" class="form-control custom-select" >
                                            @foreach($discounts as $discount)
                                                <option value="{{$discount->id}}" @if($product->discount->id == $discount->id) selected @endif >
                                                    {{$discount->percentage}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-6 pe-2">
                                    <label class="text-white" for="gender_id">Gender: </label>
                                    <select name="gender_id" class="form-control custom-select">
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}" @if($product->gender->id == $gender->id) selected @endif>
                                                {{$gender->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="form-group pe-2 col-6">
                                    <label class="text-white" for="brand_id">Brand: </label>
                                    <select name="brand_id" class="form-control custom-select">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"  @if($product->brand->id == $brand->id) selected @endif>
                                                {{$brand->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group pe-2 col-6">
                                    <label class="text-white" for="productCategory_id">Product Category: </label>
                                    <select name="productCategory_id" class="form-control custom-select">
                                        @foreach($productCategories as $productCategory)
                                            <option value="{{$productCategory->id}}"
                                                    @if($product->productCategory->id == $productCategory->id) selected @endif >
                                                {{$productCategory->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="colors[]">Colours: (CTRL + CLICK multiple select)</label>
                                <select name="colors[]" class="form-control custom-select" multiple>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}"
                                                @if($product->colors->contains($color->id)) selected @endif>
                                            {{$color->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="shoeSize[]">Shoe Size: (CTRL + CLICK multiple
                                    select)</label>
                                <select name="shoeSize[]" class="form-control custom-select" multiple>
                                    @foreach($shoeSizes as $shoeSize)
                                        <option value="{{$shoeSize->id}}"
                                                @if($product->shoeSize->contains($shoeSize->id)) selected @endif >
                                            {{$shoeSize->size}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="clothSize[]">Cloth Size: (CTRL + CLICK multiple
                                    select)</label>
                                <select name="clothSize[]" class="form-control custom-select" multiple>
                                    @foreach($clothSizes as $clothSize)
                                        <option value="{{$clothSize->id}}"
                                                @if($product->clothSizes->contains($clothSize->id)) selected @endif>
                                            {{$clothSize->size}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="body">Description: </label>
                                <textarea class="form-control" name="body" id="body" cols="100%" rows="10"
                                          placeholder="Description..."
                                >{{$product->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="text-white me-3" for="file">Product Photo:</label>
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Your Product Picture</h5>
                                            <input type="file" name="photo_id" class="dropify"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </div>


                        </form>
                    </div>
                    <div class="col-4">
                        <p class="text-white">Product Photo:</p>
                        <img class="img-fluid img-thumbnail bg-black"
                             src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/500'}}"
                             alt="{{$product->name}}">
                    </div>
                </div>

            </div>
        </div>
@endsection
