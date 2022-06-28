@extends('layouts.admin')
@section('content')

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


@endsection
