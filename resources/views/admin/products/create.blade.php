@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Create Product</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="form-group pe-2">
                            <label class="text-white" for="name">Product Name:</label>
                            <input type="text"
                                   name="name"
                                   id="title"
                                   class="form-control"
                                   placeholder="Product Name.."
                            >
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group pe-2 col-6">
                            <label class="text-white" for="gender_id">Gender: </label>
                            <select name="gender_id" class="form-select">
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">
                                        {{$gender->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pe-2 col-6">
                            <label class="text-white" for="brand_id">Brand: </label>
                            <select name="brand_id" class="form-select">
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">
                                        {{$brand->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group pe-2 col-6">
                            <label class="text-white" for="productCategory_id">Product Category: </label>
                            <select name="productCategory_id" class="form-select">
                                @foreach($productCategories as $productCategory)
                                    <option value="{{$productCategory->id}}">
                                        {{$productCategory->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="text-white" for="color">Colour:</label>
                        <select name="colors[]" class="form-control custom-select" multiple>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">
                                    {{$color->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="body">Description: </label>
                        <textarea class="form-control" name="body" id="body" cols="100%" rows="10"
                                  placeholder="Description..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-white me-3" for="file">Product Photo:</label>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Your Product Picture</h5>
                                    <input
                                        type="file"
                                        name="photo"
                                        accept="image/*"
                                        class="dropify"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
