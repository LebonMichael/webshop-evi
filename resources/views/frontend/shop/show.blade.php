@extends('layouts.frontendNav')
@section('content')

    <div class="row mt-10">
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col-6">
                    <h1>{{$product->name}}</h1>
                    <p><span>Merk:{{$product->brand->name}}</span></p>
                    <div class="text-center">
                        <img
                             src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                             alt="{{$product->name}}">
                    </div>
                    <div class="row row-cols-4">
                        @foreach($productDetails as $productDetail)
                            @foreach($images as $image)
                                @if($image->product_id === $product->id and $image->color_id === $productDetail->color_id)
                                    <div>
                                        <a class="border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img class="img-fluid m-2 border border-2 rounded"
                                                 src="{{asset('img/productsDetails/') . '/' . $name . '/' . $image->image}}"
                                                 alt="">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                            @break
                        @endforeach
                    </div>
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Productbeschrijving:</p>
                    <div class="border-1 border border-black rounded-2 mb-2">
                        <div class="m-2">
                            <p>{{$product->body}}</p>
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="ms-2">
                        <div class="d-flex">
                            <p class="my-auto">Kies je kleur:</p>
                            @foreach($product->colors as $color)
                                @foreach($colors as $colorD)
                                    @if($colorD->color_id === $color->id && $oldColor !== $color->id )
                                        @php $oldColor = $color->id @endphp
                                        <a href="{{route('productsPerColor', ['id' => $product->id, 'name' => $color->name])}}"
                                           class="badge badge-primary m-1 p-3 text-black">
                                            <i style="color:{{$color->code}}"
                                               class="rounded-circle border border-dark fas fa-circle">
                                            </i>
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($productDetails as $details)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if($loop->index === 0) active @endif "
                                            id="pills-{{$details->clothSize->size}}-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-{{$details->clothSize->size}}" type="button"
                                            role="tab" aria-controls="pills-{{$details->clothSize->size}}"
                                            aria-selected="true">
                                        {{$details->clothSize->size}}
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            @foreach($productDetails as $details)
                                <div class="tab-pane fade show @if($loop->index === 0) active @endif  "
                                     id="pills-{{$details->clothSize->size}}" role="tabpanel"
                                     aria-labelledby="pills-{{$details->clothSize->size}}-tab" tabindex="0">
                                    <div>
                                        <div class="d-flex">
                                            <p class="pe-2">Price: </p>
                                            @if($details->discount->percentage > 0)
                                                <span
                                                    class="text-600 me-2 text-decoration-line-through">&euro; {{$details->price}}
                                                </span>
                                                <span
                                                    class="text-primary">
                                            @php
                                                $discountPrice = $details->price/100;
                                                $discountPrice = $discountPrice * (100 - $details->discount->percentage);
                                            @endphp
                                            &euro; {{$discountPrice}}
                                                </span>
                                            @elseif($details->discount->percentage === 0)
                                                <span
                                                    class="text-600 me-2 text-decoration">&euro; {{$details->price}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="d-flex">
                                            <p class="pe-2 m-0">Stock:</p>
                                            @if($details->stock >= 10)
                                                <span class="badge bg-success">Op voorraad!</span>
                                            @elseif($details->stock < 10 and $details->stock > 0 )
                                                <span class="badge bg-warning">Paar opvoorraad!</span>
                                            @else

                                                <span class="badge bg-danger">Sold out!</span>
                                            @endif

                                        </div>
                                        <div class="py-2">
                                            <p><span class="pe-1"><i class="fa-solid fa-check text-success"></i></span>Inclusief
                                                verzendkosten, verstuurd door Webshop-Evi.com</p>
                                            <p><span class="pe-1"><i class="fa-solid fa-check text-success"></i></span>30
                                                dagen bedenktijd en gratis retourneren</p>
                                            <p><span class="pe-1"><i class="fa-solid fa-check text-success"></i></span>Dag
                                                en nacht klantenservice</p>
                                            <p><span class="pe-1"><i class="fa-solid fa-check text-success"></i></span>Doordeweeks
                                                ook ’s avonds in huis</p>
                                        </div>
                                    </div>
                                    <div class="d-flex ">
                                        @if(Session::has('cart'))
                                            @php
                                                $oldCart = Session::get('cart')->products;
                                                $controleCart = 0;
                                                $cart = '';
                                                foreach($oldCart as $cart){

                                                    if ($cart['productDetails']->id === $details->id){
                                                       $controleCart =  1;

                                                    }
                                                }
                                            @endphp
                                            @if($controleCart ===  1)
                                                <div class="text-center mx-auto"><a class="btn btn-outline-dark mt-auto"
                                                                                    href="{{route('removeFromCart',$details->id)}}"><i
                                                            class="fas fa-minus-square text-warning"></i></a></div>
                                                <div class="text-center mx-auto">
                                                    <a
                                                        class="btn btn-outline-dark mt-auto"
                                                        href="{{route('removeAllFromCart',$details->id)}}">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                                @php
                                                    $controleCart = 0;
                                                @endphp
                                            @endif
                                        @endif
                                        @if(Session::has('cart'))
                                            @php $controleCarts = Session::get('cart')->products;
                                                $enoughStock = 1;
                                                foreach($controleCarts as $controleCart ){
                                                    if ($controleCart['productDetails']->id == $details->id){
                                                        if ($controleCart['stock'] >= 1 ){
                                                         $enoughStock = 1;
                                                        }else{
                                                            $enoughStock = 0;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            @if($enoughStock === 1)
                                                <div class="text-center mx-auto"><a class="btn btn-outline-dark mt-auto"
                                                                                    href="{{route('addToCart',$details->id)}}"><i
                                                            class="fas fa-plus-square text-success"></i></a></div>
                                            @endif
                                        @else
                                            <div class="text-center mx-auto">
                                                <a class="btn btn-outline-dark mt-auto"
                                                   href="{{route('addToCart',$details->id)}}">
                                                    <i class="fas fa-plus-square text-success"></i>
                                                </a>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 border border-2 border-black rounded-2 shadow-lg mb-2 h-100">
                    <div class="text-center mt-3">
                        <p class="pt-3">Total products
                            ({{Session::has('cart') ? Session::get('cart')->totalQuantity : '0'}})</p>
                        <p class="fw-bold"> &euro;{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}</p>
                        <p>Verzendingskosten</p>
                        <p class="fw-bold">&euro;{{Session::has('cart') ? 4.99 : '0'}}</p>
                        <p>Totaal</p>
                        <p>&euro;{{Session::has('cart') ? Session::get('cart')->totalPrice + 4.99 : '0'}}</p>
                        <div class="row mb-3">
                            <div>
                                <a href="{{route('shoppingCart')}}" class="btn btn-primary btn-sm m-1">Winkelkar</a>
                            </div>
                            <p class="my-3">of</p>
                            <div>
                                <a href="{{route('shop.index')}}"
                                   class="btn btn-success btn-sm m-1">Verder
                                    winkelen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
