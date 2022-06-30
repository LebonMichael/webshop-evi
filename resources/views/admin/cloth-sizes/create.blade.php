@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Create Cloth Size</h1>
        </div>
        <div class="col-4 offset-4 img-thumbnail bg-black">
            @include('includes.form_error')
            <form action="{{route('cloth-sizes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-white" for="size">Cloth Size : </label>
                    <input type="number" name="size" id="size" class="form-control" placeholder="Cloth Size...">
                </div>
                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Add Cloth Size</button>
                </div>
            </form>
        </div>
    </div>
@endsection

