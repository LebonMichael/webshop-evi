@extends('layouts.frontendNav')
@section('content')
    <section class="py-11 bg-light-gradient border-bottom border-white border-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach($posts as $post)
                            @foreach($post->categories as $category)
                            @if($category !== $oldCategory)
                                @php $oldCategory = $category; @endphp
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-home" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Home
                                    </button>
                                </li>
                            @endif
                            @endforeach
                        @endforeach
                        @php $oldCategory = 0 @endphp
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


