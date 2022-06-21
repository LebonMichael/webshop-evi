@extends('layouts.frontendNav')
@section('content')

    <div class="row mt-5">
        <h1 class="my-5 text-center">Winkelkar</h1>
        <div class="col-10 offset-1">
            <div class="accordion my-3" id="accordionPanelsStayOpenExample">
                @if(Session::has('cart'))
                    @foreach($shoppingCarts as $product)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-head-{{$product['productDetails']->id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse-{{$product['productDetails']->id}}"
                                        aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapse-{{$product['productDetails']->id}}">
                                    <img class="me-2" height="62" width="auto"
                                         src="{{$product['product']->photo ? asset('img/products') . $product['product']->photo->file : 'https://via.placeholder.com/62'}}"
                                         alt=" {{$product['product']->name}}">
                                    {{$product['product']->name}}
                                    ({{$product['quantity']}})

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse-{{$product['productDetails']->id}}"
                                 class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-head-{{$product['productDetails']->id}}">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Naam</th>
                                            <th scope="col">Kleur</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Maat</th>
                                            <th scope="col">Prijs/st</th>
                                            <th scope="col">Aantal</th>
                                            <th scope="col">Add/Remove</th>
                                            <th scope="col">Totaal</th>
                                            <th scope="col">Acties</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$product['product']->name}}</td>
                                            <td>
                                                @foreach($product['color'] as $color)
                                                    {{$color->name}}
                                                @endforeach
                                            </td>
                                            <td>{{$product['gender']}}</td>
                                            <td>{{$product['productDetails']->clothSize->size}}</td>
                                            <td>&euro;{{$product['product_price']}}</td>
                                            <td>{{$product['quantity']}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if(Session::has('cart'))
                                                        @php
                                                            $oldCart = Session::get('cart')->products;
                                                            $controleCart = 0;
                                                            $cart = '';
                                                            foreach($oldCart as $cart){

                                                                if ($cart['productDetails']->id === $product['productDetails']->id){
                                                                   $controleCart =  1;

                                                                }
                                                            }
                                                        @endphp
                                                        @if($controleCart ===  1)
                                                            <div class="text-center"><a class="btn-sm mt-auto"
                                                                                        href="{{route('removeFromCart',$product['productDetails']->id)}}"><i
                                                                        class="fas fa-minus-square text-warning"></i></a></div>
                                                            @php
                                                                $controleCart = 0;
                                                            @endphp
                                                        @endif
                                                    @endif

                                                    @if(Session::has('cart'))
                                                        @php $controleCarts = Session::get('cart')->products;
                                                $enoughStock = 1;
                                                foreach($controleCarts as $controleCart ){
                                                    if ($controleCart['productDetails']->id == $product['productDetails']->id){
                                                        if ($controleCart['stock'] >= 1 ){
                                                         $enoughStock = 1;
                                                        }else{
                                                            $enoughStock = 0;
                                                        }
                                                    }
                                                }
                                                        @endphp
                                                        @if($enoughStock === 1)
                                                            <div class="text-center"><a class="btn-sm mt-auto"
                                                                                        href="{{route('addToCart',$product['productDetails']->id)}}"><i
                                                                        class="fas fa-plus-square text-success"></i></a></div>
                                                        @endif
                                                    @else
                                                        <div class="text-center">
                                                            <a class="btn btn-outline-dark mt-auto"
                                                               href="{{route('addToCart',$details->id)}}">
                                                                <i class="fas fa-plus-square text-success"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $totaalPrice = $product['quantity'] * $product['product_price'];
                                                @endphp
                                                &euro;{{$totaalPrice}}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-warning btn-sm m-1"
                                                       href="{{route('removeAllFromCart',$product['productDetails']->id)}}"><i
                                                            class="fa-solid fa-trash-can"></i></a>

                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center mt-3">
                        <p class="pt-3">Total products
                            ({{Session::has('cart') ? Session::get('cart')->totalQuantity : '0'}})</p>
                        <p class="fw-bold"> &euro;{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}</p>
                        <p>Verzendingskosten</p>
                        <p class="fw-bold">&euro;{{Session::has('cart') ? 4.99 : '0'}}</p>
                        <p>Totaal</p>
                        <p class="fw-bold">
                            &euro;{{Session::has('cart') ? Session::get('cart')->totalPrice + 4.99 : '0'}}</p>
                    </div>
                        <div class="text-center mb-md-10 mb-3">
                            <a class="btn btn-info btn-sm m-1" href="{{route('checkout')}}">Checkout</a>
                            <a href="{{route('shop.index')}}"
                               class="btn btn-success btn-sm m-1">Verder
                                winkelen
                            </a>
                        </div>
                @else
                    <div class="text-center my-3">
                        <h3 class="text-danger">Winkelkar is leeg!</h3>
                        <a href="{{route('shop.index')}}"
                           class="btn mb-3 mx-auto rounded btn-outline-success">Verder
                            winkelen
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection
