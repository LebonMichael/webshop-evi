@extends('layouts.frontendNav')
@section('content')

    <div class="container">
        <div class="row flex-center">
            <div class="col-12 mt-3 mb-5">
                <div class="d-flex align-items-center flex-column">
                    <h1 class="fs-4 fs-lg-8 fs-md-6 fw-bold">Webshop Evi</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================-->
    <!-- <section> Head images ============================-->
    <section class="py-0" id="header">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="img-fluid"
                                                                      src="{{asset('img/gallery/meisjesMain.png')}}"
                                                                      width="790" alt="..."/>
                        <div class="card-img-overlay d-flex flex-center"><a class="btn btn-lg btn-light"
                                                                            href="#categoryWomen_Men">Girls</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="img-fluid"
                                                                      src="{{asset('img/gallery/JongensMain.png')}}"
                                                                      width="790" alt="..."/>
                        <div class="card-img-overlay d-flex flex-center"><a class="btn btn-lg btn-light"
                                                                            href="#categoryWomen_Men">Boys</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> Head images ============================-->

    <!-- <section> Best Deals =================-->
    <section class="py-0">

        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Best Deals</h5>
                </div>
                <div class="col-12">
                    <div class="carousel slide" id="carouselBestDeals" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">

                            <div class="carousel-item active"
                                 data-bs-interval="10000">
                                <div class="row row-cols-md-4 row-cols-2 h-100 align-items-center g-2">
                                    @foreach($products as $product)
                                        @if($loop->index < 4)
                                            <div class="mb-3 mb-md-0 h-100 ">
                                                <div class="card card-span h-100 ">
                                                    <img class="img-fluid h-100"
                                                         src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                         alt="..."/>
                                                    <div class="card-body text-center ps-0 bg-200">
                                                        <h5 class="fw-bold text-1000 text-truncate">Flat Hill
                                                            Slingback</h5>
                                                        <div class="fw-bold">
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
                                                    @php
                                                        foreach($productDetails as $productDetail){
                                                             if($productDetail->product_id === $product->id ){
                                                                 foreach($productDetail->colors as $color){
                                                                     $name = $color->name;
                                                                 }
                                                             }
                                                        }


                                                    @endphp
                                                    <a class="stretched-link"
                                                       href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}"></a>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="carousel-item"
                                 data-bs-interval="10000">
                                <div class="row row-cols-md-4 row-cols-2 h-100 align-items-center g-2">
                                    @foreach($products as $product)
                                        @if($loop->index < 8 && $loop->index > 3)
                                            <div class=" mb-3 mb-md-0 h-100 ">
                                                <div class="card card-span h-100">
                                                    <img class="img-fluid h-100"
                                                         src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                         alt="..."/>
                                                    <div class="card-img-overlay ps-0"></div>
                                                    <div class="card-body text-center ps-0 bg-200">
                                                        <h5 class="fw-bold text-1000 text-truncate">Flat Hill
                                                            Slingback</h5>
                                                        <div class="fw-bold">
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
                                                    @php
                                                        foreach($productDetails as $productDetail){
                                                             if($productDetail->product_id === $product->id ){
                                                                 foreach($productDetail->colors as $color){
                                                                     $name = $color->name;
                                                                 }
                                                             }
                                                        }


                                                    @endphp
                                                    <a class="stretched-link"
                                                       href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}"></a>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="carousel-item"
                                 data-bs-interval="10000">
                                <div class="row row-cols-md-4 row-cols-2 h-100 align-items-center g-2">
                                    @foreach($products as $product)
                                        @if($loop->index < 12 && $loop->index > 7)
                                            <div class=" mb-3 mb-md-0 h-100">
                                                <div class="card card-span h-100">
                                                    <img class="img-fluid h-100"
                                                         src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                         alt="..."/>
                                                    <div class="card-img-overlay ps-0"></div>
                                                    <div class="card-body text-center ps-0 bg-200">
                                                        <h5 class="fw-bold text-1000 text-truncate">Flat Hill
                                                            Slingback</h5>
                                                        <div class="fw-bold">
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
                                                    @php
                                                        foreach($productDetails as $productDetail){
                                                             if($productDetail->product_id === $product->id ){
                                                                 foreach($productDetail->colors as $color){
                                                                     $name = $color->name;
                                                                 }
                                                             }
                                                        }


                                                    @endphp
                                                    <a class="stretched-link"
                                                       href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}"></a>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="row my-auto">
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestDeals"
                                        data-bs-slide="prev"><span class="carousel-control-prev-icon"
                                                                   aria-hidden="true"></span><span
                                        class="visually-hidden">Previous</span></button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselBestDeals"
                                        data-bs-slide="next"><span class="carousel-control-next-icon"
                                                                   aria-hidden="true"></span><span
                                        class="visually-hidden">Next </span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center mt-5"><a class="btn btn-lg btn-dark" href="#!">View
                        All </a></div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> Best Deals =================-->

    <!-- <section> Exclusive ============================-->
    <section>
        <div class="container">
            <div class="row h-100 g-0">
                <div class="col-md-6">
                    <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                        <h4 class="text-800">Exclusive collection 2022</h4>
                        <h2 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Be exclusive</h2>
                        <p class="mb-5 fs-1">The best everyday option in a Super Saver range within a reasonable price.
                            It is our responsibility to keep you 100 percent stylish. Be smart &amp; , trendy with
                            us.</p>
                        <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#"
                                                                role="button">Winkelen</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white">
                        <img class="card-img img-fluid"
                             src="{{asset('img/gallery/Be_Exclusive.jpg')}}"
                             alt="..."/>
                    </div>
                </div>
            </div>
            <div class="row h-100 d-none d-md-flex g-2 py-1">
                <div class="col-md-4">
                    <div class="card card-span text-white">
                        <img class="card-img img-fluid"
                             src="{{asset('img/gallery/Be_Exclusive_1.jpg')}}"
                             alt="..."/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-span text-white">
                        <img class="card-img img-fluid"
                             src="{{asset('img/gallery/Be_Exclusive_2.jpg')}}"
                             alt="..."/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-span text-white">
                        <img class="card-img img-fluid"
                             src="{{asset('img/gallery/Be_Exclusive_3.jpg')}}"
                             alt="..."/>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> Exclusive ============================-->

    <!-- <section> New Arrivals ============================-->
    <section class="py-5">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-6">
                    <h5 class="fs-3 fs-lg-5 lh-sm mb-3">Checkout New Arrivals</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row row-cols-md-4 row-cols-2">
                                    @foreach($newArrivals as $newArrival)
                                        @if($loop->index < 4)
                                            <img class="p-1 "
                                                 src="{{$newArrival->photo ? asset('img/products') . $newArrival->photo->file : 'https://via.placeholder.com/62'}}"
                                                 alt="..."/>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row row-cols-md-4 row-cols-2">
                                    @foreach($newArrivals as $newArrival)
                                        @if($loop->index < 8 && $loop->index > 3)
                                            <img class="p-1 "
                                                 src="{{$newArrival->photo ? asset('img/products') . $newArrival->photo->file : 'https://via.placeholder.com/62'}}"
                                                 alt="..."/>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row row-cols-md-4 row-cols-2">
                                    @foreach($newArrivals as $newArrival)
                                        @if($loop->index < 12 && $loop->index > 7)
                                            <img class="p-1 "
                                                 src="{{$newArrival->photo ? asset('img/products') . $newArrival->photo->file : 'https://via.placeholder.com/62'}}"
                                                 alt="..."/>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section> New Arrivals ============================-->

    <!-- <section> shop by categorgy ============================-->
    <section id="categoryWomen_Men">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-6">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Shop By Category</h5>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <ul class="nav nav-pills justify-content-center  mb-3" id="pills-tab-gender" role="tablist">
                            <li class="nav-item mx-3" role="presentation">
                                <button class="nav-link active" id="pills-Meisjes-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Meisjes" type="button" role="tab"
                                        aria-controls="pills-Meisjes"
                                        aria-selected="true">Meisjes
                                </button>
                            </li>
                            <li class="nav-item mx-3" role="presentation">
                                <button class="nav-link " id="pills-Jongens-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Jongens" type="button" role="tab"
                                        aria-controls="pills-Jongens"
                                        aria-selected="true">Jongens
                                </button>
                            </li>
                        </ul>


                        <div class="tab-content" id="pills-tabContent">
                            <!--meisjes-->
                            <div class="tab-pane fade show active" id="pills-Meisjes" role="tabpanel"
                                 aria-labelledby="pills-Meisjes-tab">

                                <ul class="nav nav-pills mb-3" id="pills-tab-categories-meisjes" role="tablist">
                                    @php $category = 0; @endphp
                                    @foreach($productGirls as $productGirl)
                                        @if($productGirl->productCategory->id !== $category)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link @if($loop->index === 0) active @endif "
                                                        id="pills-meisjes-{{$productGirl->productCategory->name}}-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#pills-meisjes-{{$productGirl->productCategory->name}}"
                                                        type="button" role="tab"
                                                        aria-controls="pills-meisjes-{{$productGirl->productCategory->name}}"
                                                        aria-selected="true">{{$productGirl->productCategory->name}}
                                                </button>
                                            </li>
                                        @endif
                                        @php $category = $productGirl->productCategory->id; @endphp
                                    @endforeach
                                </ul>

                                <div class="tab-content" id="pills-tabContent-Meisjes">
                                    @php $category = 0; @endphp
                                    @foreach($productGirls as $productGirl)
                                        @if($productGirl->productCategory->id !== $category)
                                            @php $category = $productGirl->productCategory->id; @endphp
                                            <div class="tab-pane fade show @if($loop->index === 0) active @endif "
                                                 id="pills-meisjes-{{$productGirl->productCategory->name}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-meisjes-{{$productGirl->productCategory->name}}-tab">
                                                <div class="row row-cols-md-4 row-cols-2">
                                                    @php $count = 1; @endphp
                                                    @foreach($productGirls as $product)
                                                        @if($product->productCategory->id === $category )

                                                            @if($count <= 4)
                                                                @php $count++; @endphp
                                                                <div>
                                                                    <div class="card m-2 card-span h-100">
                                                                        <img class="img-fluid h-100"
                                                                             src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                                             alt="..."/>
                                                                        <div class="card-img-overlay ps-0"></div>
                                                                        <div class="card-body text-center ps-0 bg-200">
                                                                            <h5 class="fw-bold text-1000 text-truncate">
                                                                                Flat Hill
                                                                                Slingback</h5>
                                                                            <div class="fw-bold">
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
                                                                        @php
                                                                            foreach($productDetails as $productDetail){
                                                                                 if($productDetail->product_id === $product->id ){
                                                                                     foreach($productDetail->colors as $color){
                                                                                         $name = $color->name;
                                                                                     }
                                                                                 }
                                                                            }


                                                                        @endphp
                                                                        <a class="stretched-link"
                                                                           href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}"></a>

                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @elseif($product->productCategory->id !== $category)
                                                            @php $count = 1; @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!--meisjes end-->

                            <!--jongens end-->
                            <div class="tab-pane fade show" id="pills-Jongens" role="tabpanel"
                                 aria-labelledby="pills-Jongens-tab">

                                <div class="nav nav-pills mb-3" id="pills-tab-categories-jongens" role="tablist">
                                    @php $category = 0; @endphp
                                    @foreach($productBoys as $productBoy)
                                        @if($productBoy->productCategory->id !== $category)
                                            <div class="nav-item" role="presentation">
                                                <button class="nav-link @if($loop->index === 0) active @endif"
                                                        id="pills-jongens-{{$productBoy->productCategory->name}}-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#pills-jongens-{{$productBoy->productCategory->name}}"
                                                        type="button" role="tab"
                                                        aria-controls="pills-jongens-{{$productBoy->productCategory->name}}"
                                                        aria-selected="true">{{$productBoy->productCategory->name}}
                                                </button>
                                            </div>
                                        @endif
                                        @php $category = $productBoy->productCategory->id; @endphp
                                    @endforeach
                                </div>

                                <div class="tab-content" id="pills-tabContent-Jongens">
                                    @php $category = 0; @endphp
                                    @foreach($productBoys as $productBoy)
                                        @if($productBoy->productCategory->id !== $category)
                                            @php $category = $productBoy->productCategory->id; @endphp
                                            <div class="tab-pane fade show @if($loop->index === 0) active @endif"
                                                 id="pills-jongens-{{$productBoy->productCategory->name}}"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-jongens-{{$productBoy->productCategory->name}}-tab">
                                                <div class="row row-cols-md-4 row-cols-2">
                                                    @php $count = 1; @endphp
                                                    @foreach($productBoys as $product)
                                                        @if($product->productCategory->id === $category )

                                                            @if($count <= 4)
                                                                @php $count++; @endphp
                                                                <div>
                                                                    <div class="card m-2 card-span h-100">
                                                                        <img class="img-fluid h-100"
                                                                             src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                                             alt="..."/>
                                                                        <div class="card-img-overlay ps-0"></div>
                                                                        <div class="card-body text-center ps-0 bg-200">
                                                                            <h5 class="fw-bold text-1000 text-truncate">
                                                                                Flat Hill
                                                                                Slingback</h5>
                                                                            <div class="fw-bold">
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
                                                                        @php
                                                                            foreach($productDetails as $productDetail){
                                                                                 if($productDetail->product_id === $product->id ){
                                                                                     foreach($productDetail->colors as $color){
                                                                                         $name = $color->name;
                                                                                     }
                                                                                 }
                                                                            }


                                                                        @endphp
                                                                        <a class="stretched-link"
                                                                           href="{{route('productsPerColor', ['id' => $product->id, 'name' => $name])}}"></a>

                                                                    </div>
                                                                </div>
                                                </div>
                                                @endif

                                                @elseif($product->productCategory->id !== $category)
                                                    @php $count = 1; @endphp
                                                @endif
                                                @endforeach
                                            </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!--jongens end-->
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- <section> shop by categorgy ============================-->


    <!-- <section> begin ============================-->
    <section class="py-0" id="collection">

        <div class="container">
            <div class="row h-100 gx-2">
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                      src="{{asset('img/gallery/Collection-Boy.jpg')}}"
                                                                      alt="..."/>
                        <div class="card-img-overlay bg-dark-gradient">
                            <div class="p-5 p-md-2 p-xl-5">
                                <h2 class="fs-md-4 fs-lg-7 text-light">Urban Stories </h2>
                                <h5 class="fs-2 text-light">collection</h5>
                            </div>
                        </div>
                        <a class="stretched-link" href="{{route('shop.index')}}"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                      src="{{asset('img/gallery/Collection-Girl.jpg')}}"
                                                                      alt="..."/>
                        <div class="card-img-overlay bg-dark-gradient">
                            <div
                                class="p-5 p-md-2 p-xl-5 d-flex flex-column flex-end-center align-items-baseline h-100">
                                <h2 class="fs-md-4 fs-lg-7 text-light">Urban Stories </h2>
                                <h5 class="fs-2 text-light">collection</h5>
                            </div>
                        </div>
                        <a class="stretched-link" href="{{route('shop.index')}}"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->

    <!-- <section> summer ============================-->
    <section class="py-5" id="outlet">

        <div class="container">
            <div class="row h-100 g-0">
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                      src="assets/img/gallery/summer.png" alt="..."/>
                        <div class="card-img-overlay bg-dark-gradient rounded-0">
                            <div
                                class="p-5 p-md-2 p-xl-5 d-flex flex-column flex-end-center align-items-baseline h-100">
                                <h2 class="fs-md-4 fs-lg-7 text-light">Summer of '22 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 h-100">
                    <div class="row h-100 g-0">
                        <div class="col-md-6 h-100">
                            <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                              src="{{asset('img/gallery/summer-1.jpg')}}"
                                                                              alt="..."/>
                                <div class="card-img-overlay p-1 bg-dark-gradient rounded-0">
                                    <div class="p-5 p-xl-5 p-md-0">
                                        <h3 class="text-primary tex">Short</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                              src="{{asset('img/gallery/summer-2.jpg')}}"
                                                                              alt="..."/>
                                <div class="card-img-overlay p-1 bg-dark-gradient rounded-0">
                                    <div class="p-5 p-xl-5 p-md-0">
                                        <h3 class="text-primary">Rokje</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                              src="{{asset('img/gallery/summer-3.jpg')}}"
                                                                              alt="..."/>
                                <div class="card-img-overlay p-1 bg-dark-gradient rounded-0">
                                    <div class="p-5 p-xl-5 p-md-0">
                                        <h3 class="text-primary">T-shirt</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                              src="{{asset('img/gallery/summer-4.jpg')}}"
                                                                              alt="..."/>
                                <div class="card-img-overlay p-1 bg-dark-gradient rounded-0">
                                    <div class="p-5 p-xl-5 p-md-0">
                                        <h3 class="text-primary">Kleedjes</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> summer ============================-->

    <!-- <section> blog ============================-->
    <section class="py-5 pb-8">

        <div class="container-fluid container-lg">
            <div class="row h-100 g-2 justify-content-center">
                @foreach($posts->take(3) as $post)
                    @foreach($users->where('id', $post->user_id) as $user)
                        @php($postUser = $user)
                    @endforeach
                    <div class="col-sm-9 col-md-4 mb-3 mb-md-0 h-100">
                        <div class="card card-span h-100">
                            <img class="img-fluid h-100"
                                 src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'https://via.placeholder.com/400'}}"
                                 alt="..."/>
                            <div class="card-body px-xl-5 px-md-3 pt-0 pb-7">
                                <div class="d-flex justify-content-between align-items-center bg-100 mt-n5 me-auto">
                                    <img
                                        height="60"
                                        src="{{$user->photo ? asset('img/users') . $user->photo->file : 'https://via.placeholder.com/62'}}"
                                        alt="..."/>
                                    <div class="d-flex flex-1 justify-content-around"><span
                                            class="text-900 text-center"><i
                                                data-feather="eye"> </i><span
                                                class="text-900 ms-2">35</span></span><span
                                            class="text-900 text-center"><i data-feather="heart"> </i><span
                                                class="text-900 ms-2">23</span></span><span
                                            class="text-900 text-center"><i
                                                data-feather="corner-up-right"> </i><span
                                                class="text-900 ms-2">14</span></span></div>
                                </div>
                                <h6 class="text-900 mt-3">{{$user->first_name}} {{$user->last_name}}</h6>
                                <p>
                                    @foreach($user->roles as $role)
                                        <span class="badge rounded-pill bg-primary">{{$role->name}}</span>
                                    @endforeach
                                </p>
                                <p>
                                    @foreach($post->categories as $role)
                                        <span class="badge rounded-pill bg-secondary">{{$role->name}}</span>
                                    @endforeach
                                </p>
                                <h3 class="fw-bold text-1000 mt-5 text-truncate">{{$post->title}}</h3>
                                <p class="text-900 mt-3">{{$post->body}}</p>
                                <a
                                    class="btn btn-lg text-900 fs-1 px-0 hvr-icon-forward"
                                    href="{{route('blogs.post',$post)}}" role="button">Read more
                                    <svg class="bi bi-arrow-right-short hover-icon" xmlns="http://www.w3.org/2000/svg"
                                         width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> blog ============================-->
@endsection
