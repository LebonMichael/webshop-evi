@extends('layouts.frontendNav')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 class="my-5 text-center">Checkout</h1>
            <div class="row">
                <div class="col-md-9 ">
                    <form action="{{route('orderAdress')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="my-3 text-center">Leverings Adres</h2>
                        <div class="input-group mb-3 row row-cols-2">
                            <div>
                                <label for="basic-url" class="form-label">First Name:</label>
                                <input type="text" class="form-control" value="{{$user->first_name}}" aria-label="first_name" aria-describedby="basic-addon1">
                            </div>
                            <div>
                                <label for="basic-url" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" value="{{$user->last_name}}" aria-label="last_name" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="input-group my-3 row row-cols-md-2">
                            <div>
                                <label for="basic-url" class="form-label">Phone:</label>
                                <input type="text" class="form-control"  value="{{$user->phone}}" aria-label="first_name" aria-describedby="basic-addon3">

                            </div>
                            <div>
                                <label for="basic-url" class="form-label">E-mail:</label>
                                <input type="text" class="form-control" value="{{$user->email}}" aria-label="first_name" aria-describedby="basic-addon4">
                            </div>
                        </div>
                        <div class="form-group my-3 row row-cols-md-3">
                            <div class="my-2">
                                <label for="basic-url" class="form-label">Street:</label>
                                <input type="text" class="form-control" name="street" value="{{$user->street}}" aria-label="first_name" aria-describedby="basic-addon5">
                            </div>
                            <div class="my-2">
                                <label for="basic-url" class="form-label">Street Number:</label>
                                <input type="text" class="form-control" name="street_number" value="{{$user->street_number}}" aria-label="first_name" aria-describedby="basic-addon6">
                            </div>
                            <div class="my-2">
                                <label for="basic-url" class="form-label">City:</label>
                                <input type="text" class="form-control" name="city" value="{{$user->city}}" aria-label="first_name" aria-describedby="basic-addon7">
                            </div>
                            <div class="my-2">
                                <label for="basic-url" class="form-label">Zip Code:</label>
                                <input type="text" class="form-control" name="zip_code" value="{{$user->zip_code}}" aria-label="first_name" aria-describedby="basic-addon8">
                            </div>
                            <div class="my-2">
                                <label for="basic-url" class="form-label">Country:</label>
                                <input type="text" class="form-control" name="country" value="{{$user->country}}" aria-label="first_name" aria-describedby="basic-addon9">
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-success btn-sm m-1">Betalen</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 border border-2 border-black rounded-2 shadow-lg mb-2 h-100">
                    <div class="text-center mt-3">
                        <p class="pt-3">Total products
                            ({{Session::has('cart') ? Session::get('cart')->totalQuantity : '0'}})</p>
                        <p class="fw-bold"> &euro;{{Session::has('cart') ? Session::get('cart')->totalPrice + 4.99 : '0'}}</p>
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
