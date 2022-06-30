<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
    <script src="{{asset('vendor/fontawesome/js/all.js')}}" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="">Webshop Evi</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                   aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <div class="nav-profile-text">
                    <p class="mb-1">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('users.settings', Auth::user()->id)}}">Settings</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="{{route('orders.index')}}">Orders</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{route('homebackend')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{route('webshop')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Frontend
                    </a>

                @if(Auth::user()->isAdmin())
                    <!--start Users-->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                       aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUsers"
                         data-bs-parent="#collapseUsers">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('users.index')}}">All Users</a>
                            <a class="nav-link" href="{{route('users.create')}}">Create User</a>
                        </nav>
                    </div>
                    <!--end users-->

                    <!--start posts-->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts"
                       aria-expanded="false" aria-controls="collapsePosts">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Posts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapsePosts"
                         data-bs-parent="#collapsePosts">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordion-1-Pages">
                            <a class="nav-link" href="{{route('posts.index')}}">All Posts</a>
                            <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapsePostCategories" aria-expanded="false"
                               aria-controls="collapsePostCategories">
                                Post Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePostCategories"
                                 data-bs-parent="#sidenavAccordion-1-Pages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('postCategories.index')}}">All
                                        PostCategories</a>
                                    <a class="nav-link" href="{{route('postCategories.create')}}">Create
                                        PostCategory</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <!-- end posts-->

                    <!--start products-->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseProducts"
                       aria-expanded="false" aria-controls="collapseProducts">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Products
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseProducts"
                         data-bs-parent="#collapseProducts">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordion-2-Pages">
                            <a class="nav-link" href="{{route('products.index')}}">All Products</a>
                            <a class="nav-link" href="{{route('products.create')}}">Create Product</a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapseProductCategories" aria-expanded="false"
                               aria-controls="collapseProductCategories">
                                Product Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProductCategories"
                                 data-bs-parent="#sidenavAccordion-2-Pages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('productCategories.index')}}">All Product
                                        Categories Sizes</a>
                                    <a class="nav-link" href="{{route('productCategories.create')}}">Create Product
                                        Category</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapseBrands" aria-expanded="false"
                               aria-controls="collapseBrands">
                                Product Brands
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBrands"
                                 data-bs-parent="#sidenavAccordion-2-Pages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('brands.index')}}">All Product Brands</a>
                                    <a class="nav-link" href="{{route('brands.create')}}">Create Product Brand</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapsePostColor" aria-expanded="false"
                               aria-controls="collapsePostColor">
                                Product Colors
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePostColor"
                                 data-bs-parent="#sidenavAccordion-2-Pages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('colors.index')}}">All Product Colors</a>
                                    <a class="nav-link" href="{{route('colors.create')}}">Create Product Color</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapseClothSize" aria-expanded="false"
                               aria-controls="collapseClothSize">
                                Product Cloth Size
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseClothSize"
                                 data-bs-parent="#sidenavAccordion-2-Pages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('cloth-sizes.index')}}">All Product Cloth
                                        Sizes</a>
                                    <a class="nav-link" href="{{route('cloth-sizes.create')}}">Create Product Cloth
                                        Size</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapseGenders" aria-expanded="false"
                               aria-controls="collapseGenders">
                                Product Genders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseGenders"
                                 data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('genders.index')}}">All Product Genders</a>
                                    <a class="nav-link" href="{{route('genders.create')}}">Create Product Gender</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#collapseDiscounts" aria-expanded="false"
                               aria-controls="collapseDiscounts">
                                Product Discounts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseDiscounts"
                                 data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('discounts.index')}}">All Product Discount</a>
                                    <a class="nav-link" href="{{route('discounts.create')}}">Create Product
                                        Discount</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <!-- end products-->
                @endif

                <!--start orders-->
                    <a class="nav-link" href="{{route('orders.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                        Orders
                    </a>
                    <!--end orders-->

                    <a class="nav-link" href="{{route('users.settings', Auth::user()->id)}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                        Settings
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->first_name}} {{ Auth::user()->last_name}}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row row-cols-4">
                    <div>
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex justify-content-between fs-5">
                                <div>
                                    <p class="m-0">Aantal Users</p>
                                </div>
                                <div>
                                    ({{$user}})
                                </div>
                            </div>
                            @if(Auth::user()->isAdmin())
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('users.index')}}">View
                                        Users</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body d-flex justify-content-between fs-5">
                                <div>
                                    <p class="m-0">Aantal Producten</p>
                                </div>
                                <div>
                                   ({{$product}})
                                </div>
                            </div>
                            @if(Auth::user()->isAdmin())
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('products.index')}}">View
                                        Producten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex justify-content-between fs-5">
                                <div>
                                    <p class="m-0">Aantal Orders</p>
                                </div>
                                <div>
                                    ({{$order}})
                                </div>
                            </div>
                            @if(Auth::user()->isAdmin())
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('orders.index')}}">View
                                        Orders</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body d-flex justify-content-between fs-5">
                                <div>
                                    <p class="m-0">Aantal Posts</p>
                                </div>
                                <div>
                                    ({{$post}})
                                </div>
                            </div>
                            @if(Auth::user()->isAdmin())
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('posts.index')}}">View
                                        Posts</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $(document).ready(function () {
        $(".dropify").dropify()
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>
</html>
