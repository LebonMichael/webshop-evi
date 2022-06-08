@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Create Product</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('productColorStore', $product->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center text-white my-2">Product Details</h2>

                    <label class="text-white" for="color_id">Select Color for product details: </label>
                    <select class="form-select" name="color_id" aria-label="Default select example">
                        @foreach($product->colors as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Go To Product Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

