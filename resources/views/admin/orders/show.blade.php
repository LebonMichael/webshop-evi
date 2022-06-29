@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Order Details</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>User</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders->orderDetails as $details)

                <tr>
                    <td>{{$details->user_name}}</td>
                    <td>{{$details->product_name}}</td>
                    <td>&euro;{{$details->product_price}}</td>
                    <td>{{$details->aantal}}</td>
                    <td>&euro;{{$details->total_price}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
