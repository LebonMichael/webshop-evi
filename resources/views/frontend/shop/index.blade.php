@extends('layouts.frontendNav')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="row">
                    <!--START FILTER-->
                    <div class="col-sm-3">
                        <section id="filterShop">
                            <div class="mt-5">
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($categories as $category)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   value="{{$category->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$category->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$category->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($brands as $brand)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{$brand->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$brand->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$brand->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($sizes as $size)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{$size->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$size->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$size->size}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <!--STOP FILTER-->

                    <!--START ITEMS-->
                    <div class="col-sm-6 mx-auto">
                        <section id="productList">
                            <div class="row row-cols-md-3 row-cols-sm-2 mt-5">
                                @foreach($products as $product)

                                    <div>
                                        <a href="{{route('shop.show', $product->id)}}">
                                            <div style="height: auto"
                                                 class="m-2 p-3 text-center border border-2 rounded-3 border-black">
                                                <img class="img-fluid rounded-3"
                                                     src="{{$product->photo ? asset('img/products') . $product->photo->file : 'https://via.placeholder.com/62'}}"
                                                     alt="{{$product->name}}">
                                                <div class="my-2">
                                                    <h3 class="fw-bold">{{$product->name}}</h3>
                                                    <div class="d-flex">
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

                                                    <div>
                                                        <p>{{Str::limit($product->body,40,'...')}}</p>
                                                    </div>
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
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                    <!--STOP ITEMS-->

                    <!--START SHOPPING CART-->
                    <div class="col-sm-3">
                        <section id="shoppingCart">
                            <div class="mt-5">
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($categories as $category)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   value="{{$category->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$category->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$category->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($brands as $brand)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{$brand->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$brand->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$brand->name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
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
                                                <form action="">
                                                    @csrf
                                                    @foreach($sizes as $size)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{$size->id}}" name="flexRadioDefaul"
                                                                   id="flexRadioDefault{{$size->id}}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{$size->size}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <!--STOP SHOPPING CART-->
                </div>
            </div>
        </div>
    </div>

@endsection
