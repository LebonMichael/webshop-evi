@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Create test</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('productDetailsImages.update', $images->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center text-white my-2">Product Details Images</h2>
                    <div class="d-flex">
                        <div class="col-lg-4 offset-4">
                            <label class="text-white" for="color">Colour:</label>
                            <select name="color_id" class="form-control custom-select">
                                        <option value="{{$color->id}}">
                                            {{$color->name}}
                                        </option>
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                            <div>
                                <p class="text-white mx-2">Image:</p>
                                <img class="img-fluid m-2 border border-2 rounded"
                                     src="{{asset('img/productsDetails/') . '/' . $color->name . '/' . $images->image}}"
                                     alt="">
                            </div>
                            <div class="form-group">
                                <label class="text-white me-3" for="file">Choose other image:</label>
                                <div class="grid-margin stretch-card">
                                    <div>
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <input
                                                    type="file"
                                                    name="image"
                                                    class="form-control dropify"
                                                    accept="image/*"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>


                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-primary">Edit Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
