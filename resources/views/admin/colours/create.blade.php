@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="border border-2 rounded-3 bg-black my-3">
            <h1 class="text-center text-white">Create PostCategory</h1>
        </div>
        <div class="col-4 offset-4 img-thumbnail bg-black">
            @include('includes.form_error')
            <form action="{{route('colours.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-white" for="category">Colour Name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Colour...">
                </div>
                <div class="form-group">
                    <label class="text-white" for="code">Select your favorite color:</label>
                    <input class="m-2" type="color" id="code" name="code" value="#ff0000"><br><br>
                </div>


                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection

