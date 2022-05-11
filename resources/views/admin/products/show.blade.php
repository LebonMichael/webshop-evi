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
                            <p class="card-text text-white">
                                Colors :
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                @foreach($productDetails as $productDetail)
                                    @if($productDetail->color and $productDetail->product_id === $product->id)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-{{$productDetail->color->id}}-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-{{$productDetail->color->id}}" type="button"
                                                    role="tab"
                                                    aria-controls="pills-{{$productDetail->color->id}}"
                                                    aria-selected="true">
                                                <i style="color:{{$productDetail->color->code}}"
                                                   class="rounded-circle border border-dark fas fa-circle"></i>
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @foreach($productDetails as $productDetail)
                                    @if($productDetail->product_id === $product->id)
                                        <div class="tab-pane fade" id="pills-{{$productDetail->color->id}}"
                                             role="tabpanel"
                                             aria-labelledby="pills-{{$productDetail->color->id}}-tab">
                                            <p class="card-text text-white">Color : {{$productDetail->color->name}}</p>
                                            <p class="card-text text-white">
                                                Size :
                                                @if($productDetail->clothSize and $productDetail->product_id === $product->id)
                                                    <span
                                                        class="badge rounded-pill bg-primary">{{$productDetail->clothSize->size}}</span>
                                                @endif
                                            </p>
                                            <p class="card-text text-white">Stock : {{$productDetail->stock}} stuk</p>
                                            <p class="card-text text-white">Price : &euro;{{$productDetail->price}}</p>
                                            <p class="card-text text-white">Sold : {{$productDetail->sold}}</p>
                                            <p class="card-text text-white">Percentage
                                                : {{$productDetail->discount->percentage}}%</p>
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
                                            <div class="col-12 my-3">
                                                <a href="" class="btn btn-info">Edit ProductDetails</a>
                                            </div>
                                            <p class="card-text my-3"><small
                                                    class="text-muted">{{$productDetail->updated_at->diffForhumans()}}</small>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                                    <div class="col-12 my-3">
                                        <a href="{{route('productsDetails.create')}}" class="btn btn-info">Create Product Details</a>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
