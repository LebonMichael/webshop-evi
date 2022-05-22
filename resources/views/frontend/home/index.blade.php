@extends('layouts.frontendNav')
@section('content')
<section class="py-11 bg-light-gradient border-bottom border-white border-5">

    <!--/.bg-holder-->

    <div class="container">
        <div class="row flex-center">
            <div class="col-12 mb-10">
                <div class="d-flex align-items-center flex-column">
                    <h1 class="fw-normal"> With an outstanding style, only for you</h1>
                    <h2 class="fs-4 fs-lg-8 fs-md-6 fw-bold">Exclusively designed for you</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0" id="header" style="margin-top: -23rem !important;">

    <div class="container">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="img-fluid"
                                                                  src="{{asset('img/gallery/meisjesMain.png')}}"
                                                                  width="790" alt="..."/>
                    <div class="card-img-overlay d-flex flex-center"><a class="btn btn-lg btn-light"
                                                                        href="#nav-women">Girls</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="img-fluid"
                                                                  src="{{asset('img/gallery/JongensMain.png')}}"
                                                                  width="790" alt="..."/>
                    <div class="card-img-overlay d-flex flex-center"><a class="btn btn-lg btn-light"
                                                                        href="#nav-boy">Boys</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin Best Deals =================-->
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
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 4)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100 ">
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
                                                <a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="carousel-item"
                             data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 8 && $loop->index > 3)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100 ">
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
                                                <a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="carousel-item"
                             data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 12 && $loop->index > 7)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
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
                                                <a class="stretched-link" href="#"></a>
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
<!-- <section> close Best Deals =================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section>

    <div class="container">
        <div class="row h-100 g-0">
            <div class="col-md-6">
                <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                    <h4 class="text-800">Exclusive collection 2021</h4>
                    <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Be exclusive</h1>
                    <p class="mb-5 fs-1">The best everyday option in a Super Saver range within a reasonable price.
                        It is our responsibility to keep you 100 percent stylish. Be smart &amp; , trendy with
                        us.</p>
                    <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#"
                                                            role="button">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/outfit.png" alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div class="d-flex align-items-end justify-content-center h-100"><a
                                class="btn btn-lg text-light fs-1" href="#!" role="button">Outfit
                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23"
                                     height="23" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row h-100 g-2 py-1">
            <div class="col-md-4">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/vanity-bag.png"
                                                                  alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div class="d-flex align-items-end justify-content-center h-100"><a
                                class="btn btn-lg text-light fs-1" href="#!" role="button">Vanity Bags
                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23"
                                     height="23" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/hat.png" alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div class="d-flex align-items-end justify-content-center h-100"><a
                                class="btn btn-lg text-light fs-1" href="#!" role="button">Hats
                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23"
                                     height="23" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/high-heels.png"
                                                                  alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div class="d-flex align-items-end justify-content-center h-100"><a
                                class="btn btn-lg text-light fs-1" href="#!" role="button">High Heels
                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23"
                                     height="23" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<section class="py-0">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fs-3 fs-lg-5 lh-sm mb-3">Checkout New Arrivals</h5>
            </div>
            <div class="col-12">
                <div class="carousel slide" id="carouselNewArrivals" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/full-body.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Flat Hill Slingback</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/formal-coat.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Ocean Blue Ring</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/ocean-blue.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Brown Leathered Wallet</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/sweater.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Silverside Wristwatch</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row h-100 align-items-center g-2">
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/full-body.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Flat Hill Slingback</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/formal-coat.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Ocean Blue Ring</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/ocean-blue.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Brown Leathered Wallet</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/sweater.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Silverside Wristwatch</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="row h-100 align-items-center g-2">
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/full-body.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Flat Hill Slingback</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/formal-coat.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Ocean Blue Ring</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/ocean-blue.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Brown Leathered Wallet</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/sweater.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Silverside Wristwatch</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row h-100 align-items-center g-2">
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/full-body.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Flat Hill Slingback</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/formal-coat.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Ocean Blue Ring</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/ocean-blue.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Brown Leathered Wallet</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                                      src="assets/img/gallery/sweater.png"
                                                                                      alt="..."/>
                                        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                            <h6 class="text-primary">$175</h6>
                                            <p class="text-400 fs-1">Jumper set for Women</p>
                                            <h4 class="text-light">Silverside Wristwatch</h4>
                                        </div>
                                        <a class="stretched-link" href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselNewArrivals" data-bs-slide="prev"><span
                                    class="carousel-control-prev-icon" aria-hidden="true"></span><span
                                    class="visually-hidden">Previous</span></button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselNewArrivals" data-bs-slide="next"><span
                                    class="carousel-control-next-icon" aria-hidden="true"></span><span
                                    class="visually-hidden">Next </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="categoryWomen_Men">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Shop By Category</h5>
            </div>
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs majestic-tabs mb-4 justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-women-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-women" type="button" role="tab" aria-controls="nav-women"
                                aria-selected="true">For Girls
                        </button>
                        <button class="nav-link" id="nav-boy-tab" data-bs-toggle="tab" data-bs-target="#nav-boy"
                                type="button" role="tab" aria-controls="nav-boy" aria-selected="false">For Boys
                        </button>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-women" role="tabpanel"
                             aria-labelledby="nav-women-tab">
                            <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab-women"
                                role="tablist">
                                @foreach($productGirl as $product)
                                    @if($product->product_category_id !== $oldCategory)
                                        @php $oldCategory = $product->product_category_id; @endphp
                                        <li class="nav-item p-1 " role="presentation">
                                            <button class="nav-link @if($loop->index == 0) active @endif "
                                                    id="pills-{{$product->productCategory->name}}-Women-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-{{$product->productCategory->name}}-Women"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-{{$product->productCategory->name}}-Women"
                                                    aria-selected="true">{{$product->productCategory->name}}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                                @php $oldCategory = 0 @endphp
                            </ul>

                            <div class="tab-content" id="pills-tabContentGirl">
                                @foreach($productGirl as $product)
                                    @if($product->product_category_id !== $oldCategory)
                                        @php $oldCategory = $product->product_category_id;@endphp
                                        <div class="tab-pane fade @if($loop->index == 0 ) active show @endif"
                                             id="pills-{{$product->productCategory->name}}-Women" role="tabpanel"
                                             aria-labelledby="pills-{{$product->productCategory->name}}-Women-tab">
                                            <div class="row h-100 align-items-center g-2">
                                                @foreach($productGirl->where('product_category_id' , $oldCategory)->take(4) as $product)
                                                    <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100 shadow-lg">
                                                        <div class="card card-span h-100 text-center">
                                                            <img
                                                                class="img-fluid h-100"
                                                                src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                                alt="..."
                                                            />
                                                            <div class="card-body ps-0 bg-200">
                                                                <h5 class="fw-bold text-1000 text-truncate">
                                                                    {{$product->name}}</h5>
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
                                                            <a class="stretched-link" href="#"></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade show " id="nav-boy" role="tabpanel"
                             aria-labelledby="nav-boy-tab">
                            <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab-boy"
                                role="tablist">
                                @foreach($productBoy as $product)
                                    @if($product->product_category_id !== $oldCategory)
                                        @php $oldCategory = $product->product_category_id; @endphp
                                        <li class="nav-item p-1" role="presentation">
                                            <button class="nav-link @if($loop->index == 0 ) active @endif"
                                                    id="pills-{{$product->productCategory->name}}-boy-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-{{$product->productCategory->name}}-boy"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-{{$product->productCategory->name}}-boy"
                                                    aria-selected="true">{{$product->productCategory->name}}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                                @php $oldCategory = 0 @endphp
                            </ul>

                            <div class="tab-content" id="pills-tabContentBoy">
                                @foreach($productBoy as $product)
                                    @if($product->product_category_id !== $oldCategory)
                                        @php $oldCategory = $product->product_category_id; @endphp
                                        <div class="tab-pane fade @if($loop->index == 0 ) active show @endif"
                                             id="pills-{{$product->productCategory->name}}-boy" role="tabpanel"
                                             aria-labelledby="pills-{{$product->productCategory->name}}-boy-tab">
                                            <div class="row h-100 align-items-center g-2">
                                                @foreach($productBoy->where('product_category_id' , $oldCategory)->take(4) as $product)
                                                    <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100 shadow-lg">
                                                        <div class="card card-span h-100 text-center">
                                                            <img
                                                                class="img-fluid h-100"
                                                                src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                                alt="..."
                                                            />
                                                            <div class="card-body ps-0 bg-200">
                                                                <h5 class="fw-bold text-1000 text-truncate">
                                                                    {{$product->name}}
                                                                </h5>
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
                                                            <a class="stretched-link" href="#"></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0" id="collection">

    <div class="container">
        <div class="row h-100 gx-2">
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/urban.png" alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div class="p-5 p-md-2 p-xl-5">
                            <h1 class="fs-md-4 fs-lg-7 text-light">Urban Stories </h1>
                            <h5 class="fs-2 text-light">collection</h5>
                        </div>
                    </div>
                    <a class="stretched-link" href="#!"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/country.png" alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient">
                        <div
                            class="p-5 p-md-2 p-xl-5 d-flex flex-column flex-end-center align-items-baseline h-100">
                            <h1 class="fs-md-4 fs-lg-7 text-light">Urban Stories </h1>
                            <h5 class="fs-2 text-light">collection</h5>
                        </div>
                    </div>
                    <a class="stretched-link" href="#!"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<section>
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Best Sellers</h5>
            </div>
            <div class="col-12">
                <div class="carousel slide" id="carouselBestDeals" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">

                        <div class="carousel-item active"
                             data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 4)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white">
                                                <img class="img-fluid h-100"
                                                     src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                     alt="..."/>
                                                <div class="card-img-overlay ps-0"></div>
                                                <div class="card-body text-center ps-0 bg-200">
                                                    <h5 class="fw-bold text-1000 text-truncate">{{$product->name}}</h5>
                                                    <div class="fw-bold"><span
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
                                                <a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="carousel-item"
                             data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 8 && $loop->index > 3)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white">
                                                <img class="img-fluid h-100"
                                                     src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                     alt="..."/>
                                                <div class="card-img-overlay ps-0"></div>
                                                <div class="card-body text-center ps-0 bg-200">
                                                    <h5 class="fw-bold text-1000 text-truncate">Flat Hill
                                                        Slingback</h5>
                                                    <div class="fw-bold"><span
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
                                                <a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="carousel-item"
                             data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                @foreach($products as $product)
                                    @if($loop->index < 12 && $loop->index > 7)
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white">
                                                <img class="img-fluid h-100"
                                                     src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                     alt="..."/>
                                                <div class="card-img-overlay ps-0"></div>
                                                <div class="card-body text-center ps-0 bg-200">
                                                    <h5 class="fw-bold text-1000 text-truncate">Flat Hill
                                                        Slingback</h5>
                                                    <div class="fw-bold"><span
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
                                                <a class="stretched-link" href="#"></a>
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
        </div>
    </div>
</section>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0" id="outlet">

    <div class="container">
        <div class="row h-100 g-0">
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/summer.png" alt="..."/>
                    <div class="card-img-overlay bg-dark-gradient rounded-0">
                        <div
                            class="p-5 p-md-2 p-xl-5 d-flex flex-column flex-end-center align-items-baseline h-100">
                            <h1 class="fs-md-4 fs-lg-7 text-light">Summer of '21 </h1>
                        </div>
                    </div>
                    <a class="stretched-link" href="#!"></a>
                </div>
            </div>
            <div class="col-md-6 h-100">
                <div class="row h-100 g-0">
                    <div class="col-md-6 h-100">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                          src="assets/img/gallery/sunglasses.png"
                                                                          alt="..."/>
                            <div class="card-img-overlay bg-dark-gradient rounded-0">
                                <div class="p-5 p-xl-5 p-md-0">
                                    <h3 class="text-light">Sunglasses</h3>
                                </div>
                            </div>
                            <a class="stretched-link" href="#!"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                          src="assets/img/gallery/footwear.png"
                                                                          alt="..."/>
                            <div class="card-img-overlay bg-dark-gradient rounded-0">
                                <div class="p-5 p-xl-5 p-md-0">
                                    <h3 class="text-light">Footwear</h3>
                                </div>
                            </div>
                            <a class="stretched-link" href="#!"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                          src="assets/img/gallery/hat-black-border.png"
                                                                          alt="..."/>
                            <div class="card-img-overlay bg-dark-gradient rounded-0">
                                <div class="p-5 p-xl-5 p-md-0">
                                    <h3 class="text-light">Hat</h3>
                                </div>
                            </div>
                            <a class="stretched-link" href="#!"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                          src="assets/img/gallery/watches.png"
                                                                          alt="..."/>
                            <div class="card-img-overlay bg-dark-gradient rounded-0">
                                <div class="p-5 p-xl-5 p-md-0">
                                    <h3 class="text-light">Watches</h3>
                                </div>
                            </div>
                            <a class="stretched-link" href="#!"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section>

    <div class="container">
        <div class="row h-100 g-0">
            <div class="col-md-6">
                <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                    <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Gentle Formal Looks </h1>
                    <p class="mb-5 fs-1">We provide the top formal apparel package to make your job look confident
                        and comfortable. Stay connect.</p>
                    <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#!" role="button">Explore
                            Collection</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                                                  src="assets/img/gallery/sharp-dress.png"
                                                                  alt="..."/><a class="stretched-link"
                                                                                href="#!"></a></div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 pb-8">

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
                            <div class="d-flex flex-1 justify-content-around"><span class="text-900 text-center"><i
                                        data-feather="eye"> </i><span class="text-900 ms-2">35</span></span><span
                                    class="text-900 text-center"><i data-feather="heart"> </i><span
                                        class="text-900 ms-2">23</span></span><span class="text-900 text-center"><i
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
                            class="btn btn-lg text-900 fs-1 px-0 hvr-icon-forward" href="{{route('blogs.post',$post)}}" role="button">Read more
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
@endsection
