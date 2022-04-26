@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Edit Cloth Size</h1>
        </div>
        <div class="row">
            <div class="col-4 offset-4 img-thumbnail bg-black">
                @include('includes.form_error')
                <form action="{{route('cloth-sizes.update', $clothSize->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group ">
                        <label class="text-white" for="size">Cloth Size: </label>
                        <input type="number" name="size" class="form-control" value="{{$clothSize->size}}"
                               placeholder="Cloth Size...">
                    </div>
                    <div class="text-center m-2">
                        <button type="submit" class="btn btn-primary">Update Cloth Size</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
