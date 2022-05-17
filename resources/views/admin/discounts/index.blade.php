@extends('layouts.admin')
@section('content')

    <div class="col">
        @if(session('gender_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('gender_message')}}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">All Product Percentage</h1>
        </div>
        <table class="table table-striped bg-gradient">
            <thead>
                <tr>
                    <th>Discount</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <td>{{$discount->percentage}}%</td>
                    <td>{{$discount->created_at->diffForHumans()}}</td>
                    <td>{{$discount->updated_at->diffForHumans()}}</td>
                    <td>{{$discount->deleted_at}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-warning btn-sm m-1"
                           href="{{route('discounts.edit', $discount->id)}}">Edit</a>
                        @if($discount->deleted_at != null)
                            <a class="btn btn-success btn-sm m-1" href="{{route('discounts.restore',$discount->id)}}">Restore</a>
                        @else
                            <form action="{{route('discounts.destroy', $discount->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$discounts->links()}}
    </div>

@endsection
