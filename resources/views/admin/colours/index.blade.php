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
            <h1 class="text-center text-white">All Product Colours</h1>
        </div>
        <table class="table table-striped bg-gradient">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Preview</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($colours as $colour)
                <tr>
                    <td>{{$colour->id}}</td>
                    <td>{{$colour->name}}</td>
                    <td>
                        <i style="color:{{$colour->code}}" class="fas fa-circle"></i>
                    </td>
                    <td>{{$colour->created_at->diffForHumans()}}</td>
                    <td>{{$colour->updated_at->diffForHumans()}}</td>
                    <td>{{$colour->deleted_at}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-warning btn-sm m-1"
                           href="{{route('colours.edit', $colour->id)}}">Edit</a>
                        @if($colour->deleted_at != null)
                            <a class="btn btn-success btn-sm m-1" href="{{route('colours.restore',$colour->id)}}">Restore</a>
                        @else
                            <form action="{{route('colours.destroy', $colour->id)}}" method="POST">
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
        {{$colours->links()}}
    </div>

@endsection
