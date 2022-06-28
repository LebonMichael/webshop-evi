@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th>Order Number</th>
                <th>Client Number</th>
                <th>User</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <th>{{$order->user_id}}</th>
                    <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                    <td>&euro;{{$order->total_amount}}</td>
                    <td>
                        @if($order->payed === 'payed')
                            <span class="text-success">payed</span>
                        @else
                            <span class="text-danger">Not payed</span>
                        @endif

                    </td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->updated_at}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-info btn-sm m-1" href="{{route('orders.show', $order->id)}}">Show</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$orders->render()}}
</div>

@endsection
