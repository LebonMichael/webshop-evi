@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 my-3 bg-black">
            <h1 class="text-center text-white">Create Product</h1>
        </div>
        <div class="row py-3">
            <div class="col-8 offset-2 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('productDetails.store', $product->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center text-white my-2">Product Details</h2>


                    <div class="bg-gradient rounded-3">
                        <ul class="nav nav-pills p-2" id="pills-tab" role="tablist">
                            @foreach($product->colors as $color)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link my-3"
                                            id="pills-{{$color->name}}-tab"
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
                        <div class="tab-content p-2" id="pills-tabContent">
                            @foreach($product->colors as $color)
                                <div class="tab-pane fade"
                                     id="pills-{{$color->name}}"
                                     role="tabpanel"
                                     aria-labelledby="pills-{{$color->name}}-tab"
                                     tabindex="0">
                                    <div class="d-flex">
                                        <div class="col-6">
                                            <label class="text-white" for="price">Price: </label>
                                            <div class="input-group pe-2">
                                                <span class="input-group-text">&euro;</span>
                                                <input
                                                    type="number"
                                                    step="0.05"
                                                    min="1"
                                                    name="price"
                                                    id="price"
                                                    class="form-control"
                                                    placeholder="Price"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="text-white" for="price">Stock: </label>
                                            <input type="number" name="stock" id="stock"
                                                   class="form-control"
                                                   placeholder="Stock">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-6">
                                            <label class="text-white" for="discount_id">Discount: </label>
                                            <div class="input-group pe-2">
                                                <select name="discount_id" class="form-control custom-select">
                                                    @foreach($discounts as $discount)
                                                        <option value="{{$discount->id}}">
                                                            {{$discount->percentage}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="text-white" for="color">Colour:</label>
                                            <select name="color_id" class="form-control">
                                                <option value="{{$color->id}}">
                                                    {{$color->name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-6 pe-2">
                                            <label class="text-white" for="color">Size:</label>
                                            <select name="clothSize" class="form-control custom-select">

                                                @foreach($clothSizes as $clothSize)
                                                    @if($productDetails->contains('color_id',$color->id))
                                                        @if($productDetails->doesntContain('clothSize_id',$clothSize->id))
                                                        <option value="{{$clothSize->id}}">
                                                            {{$clothSize->size}}
                                                        </option>
                                                        @endif
                                                    @else
                                                        <option value="{{$clothSize->id}}">
                                                            {{$clothSize->size}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
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
