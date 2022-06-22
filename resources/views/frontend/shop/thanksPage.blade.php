@extends('layouts.frontendNav')
@section('content')

   <div class="row">
       <div class="col-md-10 offset-md-1">
           <div class="div my-11 text-center">
               <h1 class="text-success"> Thanks for buy at Webshop-Evi</h1>
               <div>
                   <img class="img-fluid" src="{{asset('img/gallery/ThankYou.png')}}" alt="">
               </div>
               <div class="my-3">
                   <a href="/"
                      class="btn btn-primary btn-sm m-1">Home
                   </a>
                   <a href="{{route('shop.index')}}"
                      class="btn btn-success btn-sm m-1">Verder
                       winkelen
                   </a>
               </div>
           </div>

       </div>
   </div>

@endsection
