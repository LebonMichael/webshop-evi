@extends('layouts.admin')
@section('content')

    <div class="col">
        @if(session('category_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="btn-close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('category_message')}}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">All Product Brands</h1>
        </div>
        <table class="table table-striped bg-gradient">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->created_at->diffForHumans()}}</td>
                    <td>{{$brand->updated_at->diffForHumans()}}</td>
                    <td>{{$brand->deleted_at}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-warning btn-sm m-1"
                           href="{{route('brands.edit', $brand->id)}}">Edit</a>
                        @if($brand->deleted_at != null)
                            <a class="btn btn-success btn-sm m-1" href="{{route('brands.restore',$brand->id)}}">Restore</a>
                        @else
                            <form action="{{route('brands.destroy', $brand->id)}}" method="POST">
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
        {{$brands->links()}}
    </div>

@endsection
