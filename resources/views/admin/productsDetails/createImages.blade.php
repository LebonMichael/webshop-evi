@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Create test</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('productDetailsImages.store', $product->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center text-white my-2">Product Details Images</h2>
                    <div class="d-flex">
                        <div class="col-lg-4 offset-4">
                            <label class="text-white" for="color">Colour:</label>
                            <select name="color_id" class="form-control custom-select">
                                @foreach($product->colors as $color)
                                    @if(!in_array($color->id, $imageColors) )
                                        <option value="{{$color->id}}">
                                            {{$color->name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-white me-3" for="file">Product Color Images ( Only 4 Allowed ):</label>
                        <div class="row-cols-4 d-flex grid-margin stretch-card">
                            <div>
                                <div class="card m-2">
                                    <div class="card-body">
                                        <input
                                            type="file"
                                            name="image1"
                                            class="form-control"
                                            accept="image/*"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card m-2">
                                    <div class="card-body">
                                        <input
                                            type="file"
                                            name="image2"
                                            class="form-control dropify"
                                            accept="image/*"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card m-2">
                                    <div class="card-body">
                                        <input
                                            type="file"
                                            name="image3"
                                            class="form-control dropify"
                                            accept="image/*"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card m-2">
                                    <div class="card-body">
                                        <input
                                            type="file"
                                            name="image4"
                                            class="form-control dropify"
                                            accept="image/*"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Create Product Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
