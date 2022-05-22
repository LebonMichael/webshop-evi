@extends('layouts.frontendNav')
@section('content')

    <div class="row mt-10">
        <div class="col-8 offset-2">
            <h1>{{$product->name}}</h1>
            <p><span>Merk: {{$product->brand->name}}</span></p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-10">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-indicators">
                                @foreach($productDetails as $productDetail)
                                    @foreach($productDetail->images as $image)
                                        <img height="62" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}"
                                             class="img-fluid m-2 border border-2 rounded @if($loop->index === 0) active @endif"
                                             src="{{asset('img/productsDetails/colors') . '/' . $image->image}}"
                                             alt="">
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="carousel-inner" >
                                <div class="carousel-item active img-fluid">
                                    <img src="{{asset('img/productsDetails/colors') . '/' }}" class="d-block"
                                         alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('img/productsDetails/colors') . '/' }}" class="d-block w-10"
                                         alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3 my-lg-0">
                    <label for="discount_id">Color: </label>
                    <ul class="nav nav-pills mb-3" id="pills-tab-colors" role="tablist">
                        @foreach($product->colors as $color)
                            @foreach($colors as $colorD)
                                @if($colorD->color_id === $color->id && $oldColor !== $color->id )
                                    @php $oldColor = $color->id @endphp
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if($loop->index === 0) active @endif"
                                                id="pills-{{$color->name}}-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#pills-{{$color->name}}" type="button"
                                                role="tab"
                                                aria-controls="pills-{{$color->name}}"
                                                aria-selected="true">
                                            <i style="color:{{$color->code}}"
                                               class="rounded-circle border border-dark fas fa-circle"></i>
                                        </button>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($product->colors as $color)
                            <div class="tab-pane fade @if($loop->index === 0) active show @endif"
                                 id="pills-{{$color->name}}"
                                 role="tabpanel"
                                 aria-labelledby="pills-{{$color->name}}-tab">
                                <p class="card-text">Sizes:
                                </p>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @foreach($productDetails as $productDetail)
                                        @if($color->id === $productDetail->color_id)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link @if($loop->index === 0) active @endif"
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
                                <div class="tab-content" id="pills-tabContent-size">
                                    @foreach($productDetails as $productDetail)
                                        @if($color->id === $productDetail->color_id)
                                            <div class="tab-pane fade @if($loop->index == 0)active show @endif "
                                                 id="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-{{$productDetail->id}}-{{$productDetail->clothSize->size}}-tab"
                                                 tabindex="0">
                                                <p class="card-text">Stock : @if($productDetail->stock <= 6) <span
                                                        class="badge rounded-pill bg-warning"> Nog paar op voorraad </span> @else
                                                        <span
                                                            class="badge rounded-pill bg-success"> Op Voorraad </span> @endif
                                                </p>
                                                <p class="card-text">Price : &euro;{{$productDetail->price}}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection
