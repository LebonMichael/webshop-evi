@extends('layouts.frontendNav')
@section('content')
    <section class="py-5 bg-light-gradient border-bottom border-white border-5">
        <div class="container">
            <div class="row">
                <h1 class="text-center my-5">Blogs</h1>
                <div class="col-12 justify-content-center">
                    <div class="d-flex justify-content-center mb-7">
                        <div class="row row-cols-md-3 row-cols-sm-2">
                            <a href="{{route('blogs.index')}}"
                               class="badge badge-primary  fs-lg-3 fs-sm-2 fs-1 p-3 text-black">All
                                @php $a = 0 @endphp
                                @foreach($allPost as $post)
                                    @foreach($post->categories as $postCategory)
                                            @php $a++ @endphp
                                    @endforeach
                                @endforeach
                                <span class="badge bg-success">{{$a++}}</span>
                            </a>
                            @foreach($categories as $category)
                                <a href="{{route('blogsPerCategory', $category->id)}}"
                                   class="badge badge-danger fs-lg-3 fs-sm-2 fs-1 my-auto p-3 text-black">{{$category->name}}
                                    @php $a = 0 @endphp
                                    @foreach($allPost as $post)
                                        @foreach($post->categories as $postCategory)
                                            @if($postCategory->id === $category->id )
                                                @php $a++ @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <span class="badge bg-success">{{$a++}}</span>
                                </a>
                            @endforeach
                        </div>

                    </div>
                    <div class="row row-cols-md-3 row-cols-sm-2">
                        @foreach($posts as $post)
                            @foreach($users->where('id', $post->user_id) as $user)
                                @php($postUser = $user)
                            @endforeach
                            <div class="mb-3">
                                <div class="border border-3 rounded rounded-3 card card-span shadow-sm">
                                    <img class="img-fluid img-thumbnail m-2"
                                         src="{{$post->photo ? asset('img/posts') . $post->photo->file : 'https://via.placeholder.com/200'}}"
                                         alt="..."/>
                                    <div class="card-body px-xl-5 px-md-3 pt-0 pb-7">
                                        <div class="d-flex justify-content-between align-items-center bg-100 mt-n5 my-3 me-auto">
                                            <img
                                                height="60"
                                                src="{{$user->photo ? asset('img/users') . $user->photo->file : 'https://via.placeholder.com/62'}}"
                                                alt="..."/>
                                            <div class="d-flex flex-1 justify-content-around">
                                                <span class="text-900 text-center">
                                                    <i data-feather="eye"> </i>
                                                    <span class="text-900 ms-2">
                                                        35
                                                    </span>
                                                </span>
                                                <span
                                                    class="text-900 text-center">
                                                    <i data-feather="heart"> </i>
                                                    <span
                                                        class="text-900 ms-2">
                                                        23
                                                    </span>
                                                </span>
                                                <span
                                                    class="text-900 text-center">
                                                    <i data-feather="corner-up-right"> </i>
                                                    <span
                                                        class="text-900 ms-2">
                                                        14
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="text-900 mt-3">{{$user->first_name}} {{$user->last_name}}</h6>
                                        <div class="my-5">
                                            <p>
                                                @foreach($user->roles as $role)
                                                    <span
                                                        class="badge rounded-pill bg-primary">{{$role->name}}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                        <p>
                                            @foreach($post->categories as $role)
                                                <span
                                                    class="badge rounded-pill bg-secondary">{{$role->name}}</span>
                                            @endforeach
                                        </p>
                                        <h3 class="fw-bold text-1000 mt-5 text-truncate">{{$post->title}}</h3>
                                        <p class="text-900 mt-3">{{$post->body}}</p>
                                        <a
                                            class="btn btn-lg text-900 fs-1 px-0 hvr-icon-forward"
                                            href="{{route('blogs.post',$post)}}" role="button">Read
                                            more
                                            <svg class="bi bi-arrow-right-short hover-icon"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 width="30" height="30" fill="currentColor"
                                                 viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-2">
                    {{$posts->render()}}
                </div>

            </div>
        </div>
    </section>
@endsection


