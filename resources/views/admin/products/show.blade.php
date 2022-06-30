@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @include('includes.form_error')
        <div class="card mb-3" style="width:auto;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="m-3 align-items-stretch">
                        <img class="img-fluid img-thumbnail bg-black"
                             src="{{$product->photo ? asset('img/products') . $product->photo->file : 'http://via.placeholder.com/500x500'}}"
                             alt="{{$product->name}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body img-thumbnail bg-black m-3">
                        <div>
                            <h5 class="card-title text-white">Name Product: {{$product->name}}</h5>
                            <p class="card-text text-white">Gender : <span class="badge rounded-pill"
                                                                           @if($product->gender->name === "Meisjes") style="background: deeppink"
                                                                           @else style="background: deepskyblue" @endif >{{$product->gender->name}}</span>
                            </p>
                            <p class="card-text text-white">Brand : <span
                                    class="badge rounded-pill bg-primary">{{$product->brand->name}}</span></p>
                            <p class="card-text text-white">Category : {{$product->productCategory->name}}</p>
                            <p class="card-text text-white" >Colors:</p>
                            <ul class="nav nav-pills mb-3" id="pills-tab-colors" role="tablist">
                                @foreach($product->colors as $color)

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-{{$color->name}}-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-{{$color->name}}"
                                                type="button"
                                                role="tab"
                                                aria-controls="pills-{{$color->name}}"
                                                aria-selected="true">
                                            <i style="color:{{$color->code}}"
                                               class="rounded-circle border border-dark fas fa-circle"></i>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @foreach($product->colors as $color)
                                    <div class="tab-pane fade" id="pills-{{$color->name}}"
                                         role="tabpanel"
                                         aria-labelledby="pills-{{$color->name}}-tab">
                                        <p class="card-text text-white" >Sizes:
                                        </p>
                                        <ul class="nav nav-pills mb-3" id="pills-tab-{{$color->name}}" role="tablist">
                                            @foreach($productDetails as $productDetail)
                                                @if($color->id === $productDetail->color_id)

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link"
                                                                id="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}-tab"
                                                                data-bs-toggle="pill"
                                                                data-bs-target="#pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}"
                                                                type="button" role="tab"
                                                                aria-controls="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}"
                                                                aria-selected="true">{{$productDetail->clothSize->size}}
                                                        </button>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent-{{$color->name}}">
                                            @foreach($productDetails as $productDetail)
                                                @if($color->id === $productDetail->color_id)
                                                    <div class="tab-pane fade" id="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}"
                                                         role="tabpanel" aria-labelledby="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}-tab" tabindex="0">
                                                        <p class="card-text text-white">Stock : {{$productDetail->stock}} stuk</p>
                                                        <p class="card-text text-white">Price : &euro;{{$productDetail->price}}</p>
                                                        <p class="card-text text-white">Sold : {{$productDetail->sold}}</p>
                                                        <p class="card-text text-white">Percentage
                                                            : {{$productDetail->discount->percentage}}%</p>
                                                        <div class="col-12 my-3">
                                                            <a href="{{route('productsDetails.edit', $productDetail->id)}}" class="btn btn-info">Edit ProductDetails</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="row row-cols-4">
                                                @foreach($images as $image)
                                                    @if($image->product_id === $product->id and $image->color_id === $color->id)
                                                    <div>
                                                        <img class="img-fluid m-2 border border-2 rounded"
                                                             src="{{asset('img/productsDetails/') . '/' . $color->name . '/' . $image->image}}"
                                                             alt="">
                                                        <a href="{{route('productDetailsImages.edit', $image->id)}}">Edit</a>
                                                    </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <a href="{{route('productColor', $product->id)}}" class="btn btn-info">Create Product Details</a>

                            <a href="{{route('productDetailsImages.create', $product->id)}}" class="btn btn-info">Create Color Images</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
