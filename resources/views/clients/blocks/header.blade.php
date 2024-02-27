@php
    $number_cart = is_array(session('cart')) ? count(session('cart')) : 0;

@endphp
<header>
    <nav class="navbar navbar-expand-lg shadow-sm bg-white">
        <div class="container-fluid d-flex justify-content-sm-between">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product_page') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.list') }}">Category</a>
                    </li>


                </ul>
                <form class="d-flex" style="margin-left: 150px" method="GET" action="{{route('product_page')}}" role="search">
                    <input class="form-control me-2" type="search" name="key" placeholder="Search" aria-label="Search">
                    <button type="submit" class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="contain_user_cart">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Thông tin</a></li>
                                <li><a class="dropdown-item" href="{{ route('bill_list') }}">Đơn hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>

                <a href="{{ route('cart') }}" class="cart_icon_wrapper">
                    <i class="fa badge fa-lg icon_cart" value="{{ $number_cart }}">&#xf07a;</i>
                </a>

            </div>

        </div>
    </nav>
</header>
