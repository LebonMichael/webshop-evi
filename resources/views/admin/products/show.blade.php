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
                            <p class="card-text text-white">Gender : {{$product->gender->name}}</p>
                            <p class="card-text text-white">Brand : {{$product->brand->name}}</p>
                            <p class="card-text text-white">
                                Size :
                                @if($product->clothSize)
                                    @foreach($product->clothSize as $clothSize)
                                        <span class="badge rounded-pill bg-primary">{{$clothSize->size}}</span>
                                    @endforeach
                                @endif
                            </p>
                            <p class="card-text text-white">
                                Color :
                                @if($product->colors)
                                    @foreach($product->colors as $color)
                                        <i style="color:{{$color->code}}" class="rounded-circle border border-dark fas fa-circle"></i>
                                    @endforeach
                                @endif
                            </p>
                            <p class="card-text my-3"><small
                                    class="text-muted">{{$product->updated_at->diffForhumans()}}</small>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
