@extends('layouts.frontendNav')
@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <h1 class="text-center my-5">Shop</h1>
                <!--START FILTER-->
                <div class="col-md-2">
                    <section id="filterShop" class="p-0 mb-lg-0 mb-3">
                        <form action="{{route('shopFilter')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                Categories
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                             aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                @csrf
                                                @foreach($categories as $category)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               value="{{$category->id}}" name="category"
                                                               id="flexRadioDefault{{$category->id}}">
                                                        <label class="form-check-label"
                                                               for="flexRadioDefault{{$category->id}}">
                                                            {{$category->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                                    aria-controls="panelsStayOpen-collapseTwo">
                                                Brands
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                             aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                @foreach($brands as $brand)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="{{$brand->id}}" name="brands[]"
                                                               id="flexRadioDefault{{$brand->id}}">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{$brand->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-heading3">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3"
                                                    aria-expanded="false" aria-controls="panelsStayOpen-collapse3">
                                                Size
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse"
                                             aria-labelledby="panelsStayOpen-heading3">
                                            <div class="accordion-body">
                                                @foreach($sizes as $size)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="{{$size->id}}" name="sizes[]"
                                                               id="flexRadioDefault{{$size->id}}">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{$size->size}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </form>
                    </section>

                </div>
                <!--STOP FILTER-->

                <!--START PRODUCTEN-->
                <div class="col-md-8">
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-xl-3">
                        @foreach($products as $product)
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top img-fluid"
                                         src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                         alt="{{$product->name}}">
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{$product->name}}</h5>
                                            <!-- Product category,brand,gender-->
                                            <div class="d-xl-flex justify-content-center">
                                                <p class="mx-auto">
                                                        <span
                                                            class="badge rounded-pill bg-success">{{$product->productCategory->name}}</span>
                                                </p>
                                                <p class="mx-auto">
                                                        <span
                                                            class="badge rounded-pill bg-black">{{$product->brand->name}}</span>
                                                </p>
                                                <p class="mx-auto">
                                                        <span class="badge rounded-pill"
                                                              @if($product->gender->name == 'Meisjes') style="background: deeppink"
                                                              @else style="background: deepskyblue" @endif>
                                                             {{$product->gender->name}}
                                                        </span>
                                                </p>
                                            </div>
                                            <div class="my-3">
                                                <p class="m-0 fw-bold">Kleuren</p>
                                                @foreach($product->colors as $color)
                                                    <i style="color:{{$color->code}}"
                                                       class="rounded-circle border border-dark fas fa-circle">
                                                    </i>
                                                @endforeach
                                            </div>
                                            <div>
                                                <p>{{Str::limit($product->body,100,'...')}}</p>
                                            </div>
                                            <!-- Product price-->
                                            <div>
                                                @foreach($productDetails as $productDetail)
                                                    @if($productDetail->product_id === $product->id and $productDetail->discount->percentage > 0)
                                                        <span
                                                            class="text-600 me-2 text-decoration-line-through">&euro; {{$productDetail->price}}
                                                             </span>
                                                        <span
                                                            class="text-primary">
                                                                    @php
                                                                        $discountPrice = $productDetail->price/100;
                                                                        $discountPrice = $discountPrice * (100 - $productDetail->discount->percentage);
                                                                    @endphp
                                                                    &euro; {{$discountPrice}}

                                                            </span>
                                                        @break
                                                    @elseif($productDetail->product_id === $product->id and $productDetail->discount->percentage === 0)
                                                        <span
                                                            class="text-600 me-2 text-decoration">&euro; {{$productDetail->price}}
                                                             </span>
                                                        @break
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        @php
                                            foreach($productDetails as $productDetail){
                                                 if($productDetail->product_id === $product->id ){
                                                     foreach($productDetail->colors as $color){
                                                         $name = $color->name;
                                                     }
                                                 }
                                            }


                                        @endphp
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto"
                                               href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}">View
                                                product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--STOP PRODUCTEN-->

                <!--START CART-->
                <div class="col-md-2 border border-2 border-black rounded-2 shadow-lg mb-2 h-100">
                    <div class="text-center mt-3">
                        <p class="pt-3">Total products
                            ({{Session::has('cart') ? Session::get('cart')->totalQuantity : '0'}})</p>
                        <p class="fw-bold">
                            &euro;{{Session::has('cart') ? Session::get('cart')->totalPrice + 4.99 : '0'}}</p>
                        <p>Verzendingskosten</p>
                        <p class="fw-bold">&euro;{{Session::has('cart') ? 4.99 : '0'}}</p>
                        <p>Totaal</p>
                        <p>&euro;{{Session::has('cart') ? Session::get('cart')->totalPrice + 4.99 : '0'}}</p>
                        <div class="row mb-3">
                            <div>
                                <a href="{{route('shoppingCart')}}" class="btn btn-primary btn-sm m-1">Winkelkar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--STOP CART-->
            </div>
            <div class="my-2">
                {{$products->render()}}
            </div>
            <div>
                {{$products->render()}}
            </div>
        </div>

@endsection
