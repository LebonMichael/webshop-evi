<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('css/cssfront/theme.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>


<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block"
         data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            <a class="navbar-brand d-inline-flex" href="/">
                <img height="62" class="d-inline-block"
                     src="{{asset('img/logos/eviVermote.jpg')}}"
                     alt="logo"/>
            </a>
            <a class="navbar-brand d-inline-flex" href="/">
                <span class="text-1000 fs-0 fw-bold ms-2">Webshop Evi</span>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="#collection">Collection</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{route('blogs.index')}}">Blogs</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{route('shop.index')}}">Shop</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{route('contact.index')}}">Contact</a></li>


                </ul>
                <form class="d-flex"><a class="text-1000" href="{{route('contact.index')}}">
                        <svg class="feather feather-phone me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </a><a class="text-1000" href="#!">
                        <svg class="feather feather-shopping-cart me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a><a class="text-1000" href="#!">
                        <svg class="feather feather-search me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a><a class="text-1000" href="{{route('homebackend')}}">
                        <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a><a class="text-1000" href="#!">
                        <svg class="feather feather-heart me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </a></form>
            </div>
        </div>
    </nav>
</header>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- <section> close ============================-->
    <!-- ============================================-->

    <section class="py-11">
        <div class="bg-holder overlay overlay-0"
             style="background-image:url(assets/img/gallery/cta.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="carousel slide carousel-fade" id="carouseCta" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <div class="row h-100 align-items-center g-2">
                                    <div class="col-12">
                                        <div class="text-light text-center py-2">
                                            <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets
                                                in</h5>
                                            <h1 class="display-1 text-white fw-normal mb-8">London</h1><a
                                                class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg"
                                                     width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <div class="row h-100 align-items-center g-2">
                                    <div class="col-12">
                                        <div class="text-light text-center py-2">
                                            <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets
                                                in</h5>
                                            <h1 class="display-1 text-white fw-normal mb-8">Bristol</h1><a
                                                class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg"
                                                     width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="row h-100 align-items-center g-2">
                                    <div class="col-12">
                                        <div class="text-light text-center py-2">
                                            <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets
                                                in</h5>
                                            <h1 class="display-1 text-white fw-normal mb-8">Birmingham</h1><a
                                                class="btn btn-lg text-light fs-1" href="#!" role="button">See Addresses
                                                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg"
                                                     width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouseCta"
                                        data-bs-slide="prev"><span class="carousel-control-prev-icon"
                                                                   aria-hidden="true"></span><span
                                        class="visually-hidden">Previous</span></button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouseCta"
                                        data-bs-slide="next"><span class="carousel-control-next-icon"
                                                                   aria-hidden="true"></span><span
                                        class="visually-hidden">Next </span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0 pt-7">

        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="lh-lg fw-bold text-1000">Company Info</h5>
                    <ul class="list-unstyled mb-md-4 mb-lg-0">
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">About Us</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Affiliate</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Fashion Blogger</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="lh-lg fw-bold text-1000">Help &amp; Support</h5>
                    <ul class="list-unstyled mb-md-4 mb-lg-0">
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Shipping Info</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Refunds</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">How to Order</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">How to Track</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Size Guides</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="lh-lg fw-bold text-1000">Customer Care</h5>
                    <ul class="list-unstyled mb-md-4 mb-lg-0">
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Contact Us</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Payment Methods</a></li>
                        <li class="lh-lg"><a class="text-800 text-decoration-none" href="#!">Bonus Point</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-auto ms-auto">
                    <h5 class="lh-lg fw-bold text-1000">Signup For The Latest News</h5>
                    <div class="row input-group-icon mb-5">
                        <div class="col-12">
                            <input class="form-control input-box" type="email" placeholder="Enter Email"
                                   aria-label="email"/>
                            <svg class="bi bi-arrow-right-short input-box-icon" xmlns="http://www.w3.org/2000/svg"
                                 width="23" height="23" fill="#424242" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-800">
                        <svg class="feather feather-phone me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span class="text-800">+3930219390</span>
                    </p>
                    <p class="text-800">
                        <svg class="feather feather-mail me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class="text-800">something@gmail.com</span>
                    </p>
                </div>
            </div>
            <div class="border-bottom border-3"></div>
            <div class="row flex-center my-3">
                <div class="col-md-6 order-1 order-md-0">
                    <p class="my-2 text-1000 text-center text-md-start"> Made with&nbsp;
                        <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                             fill="#EB6453" viewBox="0 0 16 16">
                            <path
                                d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                        </svg>&nbsp;by&nbsp;<a class="text-800" href="https://themewagon.com/"
                                               target="_blank">ThemeWagon </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end"><a href="#!"><span class="me-4" data-feather="facebook"></span></a><a
                            href="#!"> <span class="me-4" data-feather="instagram"></span></a><a href="#!"> <span
                                class="me-4" data-feather="youtube"></span></a><a href="#!"> <span class="me-4"
                                                                                                   data-feather="twitter"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('vendor/@popperjs/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/is/is.min.js')}}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('vendor/feather-icons/feather.min.js')}}"></script>
<script>
    feather.replace();
</script>
<script src="{{asset('js/jsfront/theme.js')}}"></script>

<link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap"
      rel="stylesheet">
</body>

</html>
