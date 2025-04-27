<style>
    /* Logo */
    /* Logo Link (gambar + text sejajar) */
    .logo-link {
        display: flex;
        /* Flex supaya gambar dan teks sejajar horizontal */
        align-items: center;
        /* Tengah-tengah vertikal */
        text-decoration: none;
        /* Hilangin underline link */
        gap: 10px;
        /* Jarak antara logo dan teks */
    }

    /* Logo Image */
    .logo-img {
        max-width: 80px;
        height: auto;
        object-fit: contain;
        padding: 10px;

    }

    .logo-img:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    /* Logo Text */
    .logo-text {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        color: #333;
        /* Sesuaikan warna */
    }

    /* Responsive setting */
    @media (max-width: 768px) {
        .logo-img {
            max-width: 60px;
        }

        .logo-text {
            font-size: 18px;
        }
    }


    .header .navbar {
        padding: 0;
    }

    /* Main Menu */
    .navbar-expand-lg .navbar-collapse {
        display: block !important;
    }

    .header.v3 .navbar-expand-lg .navbar-collapse {
        display: block !important;
        background: #333;
    }

    .header .nav li a i {
        margin-left: 6px;
        font-size: 10px;
    }

    /* Dropdown Menu */
    .header .nav li .dropdown {
        background: #fff;
        width: 220px;
        position: absolute;
        top: 100%;
        z-index: 999;
        -webkit-box-shadow: 0px 3px 5px #3333334d;
        -moz-box-shadow: 0px 3px 5px #3333334d;
        box-shadow: 0px 3px 5px #3333334d;
        transform-origin: 0 0 0;
        transform: scaleY(0.2);
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        opacity: 0;
        visibility: hidden;
        padding: 10px;
        left: 0;
        margin: 0;
    }

    .header .nav li:hover .dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0px);
    }

    .header .nav li .dropdown li {
        float: none;
        margin: 0;
    }

    .header .nav li .dropdown li a {
        padding: 8px 15px;
        color: #666;
        display: block;
        font-weight: 400;
        text-transform: capitalize;
        background: transparent;
    }

    .header .nav li .dropdown li a:before {
        display: none;
    }

    .header .nav li .dropdown li:last-child a {
        border-bottom: 0px;
    }

    .header .nav li .dropdown li:hover a {
        color: #fff;
        background: #1d86f7;
    }

    .header .nav li .dropdown li a:hover {
        border-color: transparent;
    }

    .header .nav li .dropdown li i {
        float: right;
        margin-top: 8px;
        font-size: 10px;
        z-index: 5;
    }

    .header .nav li .dropdown.sub-dropdown {
        background: #fff;
        width: 220px;
        position: absolute;
        left: 200px;
        top: 0;
        z-index: 999;
        -webkit-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 3px 5px #3333334d;
        transform-origin: 0 0 0;
        transform: scaleY(0.2);
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        opacity: 0;
        visibility: hidden;
        padding: 10px;
    }

    .header .nav li .dropdown li:hover .dropdown.sub-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0px);
    }

    .header .nav li .dropdown.sub-dropdown li a {
        padding: 8px 15px;
        color: #666;
        display: block;
        font-weight: 400;
        text-transform: capitalize;
        background: transparent;
    }

    .header .nav li .dropdown li:hover .dropdown.sub-dropdown li a {
        background: transparent;
    }

    .header .nav li .dropdown li .dropdown.sub-dropdown li a:hover {
        color: #fff;
        background: #F7941D;
    }

    .header .nav li .dropdown.sub-dropdown li:last-child a {
        border-bottom: 0px solid;
    }

    .mobile-search {
        display: none;
    }

    /* Shop Header Styles */
    .header.shop .nav-inner {
        margin-right: 188px;
    }

    .header.shop .logo {
        float: left;
        margin-top: 35px;
    }

    /* Main Menu in Shop */
    .header.shop .nav li {
        margin-right: 5px;
        position: relative;
        float: none;
    }

    .header.shop .nav li:last-child {
        margin: 0 !important;
    }

    .header.shop .nav li .new {
        background: #F7941D;
        color: #fff;
        text-transform: uppercase;
        font-size: 10px;
        padding: 0px 9px;
        position: absolute;
        left: 0;
        top: 6px;
        font-weight: 500;
    }

    .header.shop .nav li .new::before {
        position: absolute;
        content: "";
        left: 4px;
        bottom: -8px;
        border: 4px solid #F7941D;
        border-bottom-color: transparent;
        border-left-color: transparent;
        border-right-color: transparent;
    }

    /* Shopping Cart */
    .header .shopping {
        display: inline-block;
        z-index: 9999;
    }

    .header .shopping .icon {
        position: relative;
        cursor: pointer;
        color: #222;
    }

    .header .shopping .shopping-item {
        position: absolute;
        top: 68px;
        right: 0;
        width: 300px;
        background: #fff;
        padding: 20px 25px;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        transform: translateY(10px);
        -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        z-index: 99;
    }

    .header .shopping:hover .shopping-item {
        transform: translateY(0px);
        opacity: 1;
        visibility: visible;
    }

    .header .shopping .dropdown-cart-header {
        padding-bottom: 10px;
        margin-bottom: 15px;
        border-bottom: 1px solid #e6e6e6;
    }

    .header .shopping .dropdown-cart-header span {
        text-transform: uppercase;
        color: #222;
        font-size: 13px;
        font-weight: 600;
    }

    .header .shopping .dropdown-cart-header a {
        float: right;
        text-transform: uppercase;
        color: #222;
        font-size: 13px;
        font-weight: 600;
    }

    .header .shopping .dropdown-cart-header a:hover {
        color: #F7941D;
    }

    .header .shopping-list li {
        overflow: hidden;
        border-bottom: 1px solid #e6e6e6;
        padding-bottom: 15px;
        margin-bottom: 15px;
        position: relative;
    }

    .header .shopping-list li .remove {
        position: absolute;
        left: 0;
        bottom: 16px;
        margin-top: -20px;
        height: 20px;
        width: 20px;
        line-height: 18px;
        text-align: center;
        background: #fff;
        color: #222;
        border-radius: 0;
        font-size: 11px;
        border: 1px solid #ededed;
    }

    .header .shopping-list li .remove:hover {
        background: #222;
        color: #fff !important;
        border-color: transparent;
    }

    .header .shopping-list .cart-img {
        float: right;
        border: 1px solid #ededed;
        overflow: hidden;
    }

    .header .shopping-list .cart-img img {
        width: 70px;
        height: 70px;
        border-radius: 0;
    }

    .header .shopping-list .cart-img:hover img {
        transform: scale(1.09);
    }

    .header .shopping-list .quantity {
        line-height: 22px;
        font-size: 13px;
        padding-bottom: 30px;
    }

    .header .shopping-list h4 {
        font-size: 14px;
    }

    .header .shopping-list h4 a {
        font-weight: 600;
        font-size: 13px;
        color: #333;
    }

    .header .shopping-list h4 a:hover {
        color: #F7941D;
    }

    .header .shopping-item .bottom {
        text-align: center;
    }

    .header .shopping-item .total {
        overflow: hidden;
        display: block;
        padding-bottom: 10px;
    }

    .header .shopping-item .total span {
        text-transform: uppercase;
        color: #222;
        font-size: 13px;
        font-weight: 600;
        float: left;
    }

    .header .shopping-item .total .total-amount {
        float: right;
        font-size: 14px;
    }

    .header .shopping-item .bottom .btn {
        background: #222;
        padding: 10px 20px;
        display: block;
        color: #fff;
        margin-top: 10px;
        border-radius: 0px;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 500;
    }

    .header .shopping-item .bottom .btn:hover {
        background: #F7941D;
        color: #fff;
    }

    /* Header Shop Styles */
    .header.shop {
        background: #fff;
    }

    .header.shop .nav-inner {
        margin: 0;
        float: left;
    }

    .header.shop .logo {
        float: left;
        margin: 19px 0 0;
    }

    /* Header Middle - Search bar */
    .header.shop .search-bar-top {
        text-align: center;
        margin-top: 10px;
    }

    .header.shop .search-bar {
        width: 535px;
        height: 50px;
        display: inline-block;
        background: #fff;
        position: relative;
        margin: 0;
        line-height: 45px;
        border-radius: 5px;
        border: 1px solid #ececec;
    }

    .header.shop .nice-select {
        clear: initial;
        margin: 0;
        height: 48px;
        width: 150px;
        border: none;
        text-align: center;
        background: transparent;
        text-transform: capitalize;
        padding: 0 0 0 20px;
        border-right: 1px solid #eee;
        line-height: 50px;
        font-size: 14px;
        font-weight: 400;
    }

    .header.shop .nice-select::after {
        border-color: #666;
        right: 20px;
    }

    .header.shop .nice-select .list {
        border-radius: 0px;
    }

    .header.shop .nice-select .list li.focus {
        font-weight: 400;
    }

    .header.shop .nice-select .list li {
        color: #666;
        border-radius: 0px;
        font-size: 14px;
        font-weight: 400;
    }

    .header.shop .nice-select .list li:hover {
        background: #F7941D;
        color: #fff;
    }

    .header.shop .search-bar form {
        display: inline-block;
        float: left;
        width: 260px;
    }

    .header.shop .search-bar input {
        height: 48px;
        background: transparent;
        color: #666;
        border-radius: 0;
        border: none;
        font-size: 14px;
        font-weight: 400;
        padding: 0 25px 0 20px;
        width: 328px;
    }

    .header.shop .search-bar .btnn {
        height: 50px;
        line-height: 53px;
        width: 62px;
        text-align: center;
        font-size: 18px;
        color: #fff;
        background: #333333;
        position: absolute;
        right: -2px;
        top: -1px;
        border: none;
        border-radius: 0 5px 5px 0;
        -webkit-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .header.shop .search-bar .btnn:hover {
        color: #fff;
        background: #F7941D;
    }

    /* Middle Inner */
    .header.shop .middle-inner {
        background: #ffffff;
        border-top: 1px solid #eee;
    }

    .header.shop.v3 .middle-inner {
        border: none;
    }

    .header.shop .header-inner {
        background: #8d8d8d;
    }

    /* Account Icon Styling in Middle Inner - Enhanced */
    .header .right-bar {
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0;
        margin: 0;
        top: 20px;
        float: right;
        position: relative;
    }

    .header .right-bar .sinlge-bar {
        display: inline-block;
        margin-right: 25px;
    }

    .header .right-bar .sinlge-bar:last-child {
        margin-right: 0px;
    }

    .header .right-bar .sinlge-bar .single-icon {
        color: #333;
        font-size: 20px;
        position: relative;
    }

    .header .right-bar .sinlge-bar .single-icon:hover {
        color: #F7941D;
    }

    .header .right-bar .sinlge-bar .single-icon .total-count {
        position: absolute;
        top: -7px;
        right: -8px;
        background: #f6931d;
        width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        color: #fff;
        border-radius: 100%;
        font-size: 11px;
    }

    /* Enhanced Account Styling */
    .header .right-bar .sinlge-bar .acount {
        display: flex;
        align-items: center;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.08);
    }

    .header .right-bar .sinlge-bar .acount:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .header .right-bar .sinlge-bar .acount i {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
    }

    .header .right-bar .sinlge-bar .acount i img {
        width: 28px;
        height: 28px;
        object-fit: cover;
        border-radius: 50%;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .header .right-bar .sinlge-bar .acount:hover i img {
        transform: scale(1.1);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .header .right-bar .sinlge-bar .acount span {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }

    .header .right-bar .sinlge-bar.shopping .acount {
        position: relative;
        margin-left: 15px;
    }

    /* Login/Register Button Styling */
    .header .right-bar .sinlge-bar.shopping {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header .right-bar .sinlge-bar.shopping .btn {
        padding: 8px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    /* Login Button */
    .header .right-bar .sinlge-bar.shopping .btn-primary {
        background: #F7941D;
        border-color: #F7941D;
        color: #fff;
    }

    .header .right-bar .sinlge-bar.shopping .btn-primary:hover {
        background: #e07c07;
        border-color: #e07c07;
        transform: translateY(-2px);
    }

    /* Register Button */
    .header .right-bar .sinlge-bar.shopping .btn-outline-primary {
        color: #F7941D;
        border-color: #F7941D;
        background: transparent;
    }

    .header .right-bar .sinlge-bar.shopping .btn-outline-primary:hover {
        background: #F7941D;
        color: #fff;
        transform: translateY(-2px);
    }

    /* Header Search */
    .header .search-top {
        display: none;
    }

    .header .search-top a {
        font-size: 17px;
    }

    .header .search-top a:hover {
        color: #F7941D;
    }

    .header .search-form {
        position: absolute;
        left: -128px;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
        top: 46px;
        background: #ffffff75;
        padding: 0;
        border-radius: 0;
        transform: scaleY(0);
        box-shadow: 0px 4px 7px #0000003b;
    }

    .header .search-top.active .search-form {
        opacity: 1;
        visibility: visible;
        transform: scaleY(1);
    }

    .header .search-form input {
        width: 220px;
        height: 45px;
        line-height: 45px;
        padding: 0 60px 0 15px;
        -webkit-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        border-radius: 0;
        border: none;
        background: #fff;
        color: #333;
    }

    .header .search-form button {
        position: absolute;
        right: 0;
        height: 45px;
        top: 0;
        width: 45px;
        background: transparent;
        border: none;
        color: #333;
        border-radius: 0;
        border-left: 1px solid #eee;
        font-size: 15px;
        -webkit-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .header .search-form button:hover {
        color: #fff;
        background: #f71d1d;
        border-color: transparent;
    }

    /* Header Sticky */
    .header .header-inner {
        width: 100%;
        z-index: 999;
        padding: 20px 0;
        /* Tambah padding supaya header lebih tinggi */
    }

    /* Center align header-inner content */
    .header-inner .container {
        max-width: 1300px;
        /* Sedikit lebih lebar */
        margin: 0 auto;
        padding: 0 20px;
    }

    .header-inner .menu-area {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-inner .nav-inner {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .header-inner .nav.main-menu {
        display: flex;
        justify-content: center;
        gap: 40px;
        /* Jarak antar menu dibesarkan */
        margin: 0;
        padding: 0;
    }

    /* Enhance menu items */
    .header-inner .nav.main-menu li a {
        position: relative;
        padding: 20px 0;
        /* Perbesar area klik */
        font-size: 18px;
        /* Ukuran teks diperbesar */
        color: #000000;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .header-inner .nav.main-menu li a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #F7941D;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .header-inner .nav.main-menu li:hover a::after,
    .header-inner .nav.main-menu li.active a::after {
        width: 100%;
    }

    /* Sticky Header States */
    .header.sticky .header-inner .nav li a {
        color: #ffffff;
        /* Warna abu-abu saat sticky */
    }

    .header.sticky.v3 .header-inner .nav li a {
        color: #ffffff;
    }

    .header.sticky .header-inner .nav li:hover a {
        color: #F7941D;
        /* Hover berubah jadi warna oranye */
    }

    .header.sticky.v2 .header-inner .nav li:hover a {
        color: #F7941D;
    }

    .header.sticky .header-inner .nav li .dropdown li a {
        color: #333;
    }

    .header.sticky.v2 .header-inner .nav li .dropdown li a {
        color: #333;
    }

    .header.sticky .header-inner .nav li .dropdown li a:hover {
        color: #F7941D;
    }

    .header.sticky .header-inner .nav li.active a {
        color: #F7941D;
    }

    /* Sticky Header Background */
    .header.sticky .header-inner {
        position: fixed;
        top: 0;
        left: 0;
        background: #ffffff;
        /* Putih */
        animation: fadeInDown 1s both 0.2s;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        /* Bayangan lebih halus */
        z-index: 999;
    }

    .header.sticky.v3 .header-inner {
        box-shadow: none;
    }

    .header.sticky.v3 .navbar-expand-lg .navbar-collapse {
        animation: fadeInDown 1s both 0.2s;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Animasi FadeInDown */
    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<header class="header shop">
    <div class="logo">
        @php
            $settings = DB::table('settings')->get();
        @endphp
        <a href="{{ route('home') }}" class="logo-link">
            <img src="@foreach ($settings as $data) {{ $data->logo }} @endforeach" alt="logo" class="logo-img">
            <h3 class="logo-text">Stret Stradiers</h3>
        </a>

    </div>
    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2 col-6">
                    <!-- Logo -->
                    <!--/ End Logo -->
                </div>

                <div class="col-lg-8 col-md-7 d-none d-md-block">
                    <!-- Search Bar -->
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>All Category</option>
                                @foreach (Helper::getAllCategory() as $cat)
                                    <option>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{ route('product.search') }}">
                                @csrf
                                <input name="search" placeholder="Cari Produk Anda....." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!--/ End Search Bar -->
                </div>

                <div class="col-lg-2 col-md-3 col-6">
                    <div class="right-bar d-flex justify-content-end align-items-center">
                        <!-- Wishlist -->
                        <div class="sinlge-bar shopping me-2">
                            <a href="{{ route('wishlist') }}" class="single-icon">
                                <i class="fa fa-heart-o"></i>
                                <span class="total-count">{{ Helper::wishlistCount() }}</span>
                            </a>
                        </div>

                        <!-- Cart -->
                        <div class="sinlge-bar shopping me-2">
                            <a href="{{ route('cart') }}" class="single-icon">
                                <i class="ti-bag"></i>
                                <span class="total-count">{{ Helper::cartCount() }}</span>
                            </a>
                        </div>

                        <!-- Account Dropdown -->
                        @auth
                            <!-- Show account icon and dropdown when logged in -->
                            <div class="sinlge-bar shopping position-relative">
                                <a href="javascript:void(0);" class="single-icon" id="accountDropdownToggle">
                                    <i><img src="{{ asset('image/asset -ujilevel/user.png') }}" alt="Account" /></i>
                                </a>
                                <div id="accountDropdown" class="account-dropdown"
                                    style="display: none; position: absolute; right: 0; background: white; box-shadow: 0px 2px 10px rgba(0,0,0,0.15); min-width: 150px; z-index: 100;">
                                    <ul class="list-unstyled m-0 p-2">
                                        <li><a href="{{ route('order.track') }}">Track Order</a></li>
                                        @if (Auth::user()->role == 'admin')
                                            <li><a href="{{ route('admin') }}" target="_blank">Dashboard</a></li>
                                        @else
                                            <li><a href="{{ route('user') }}" target="_blank">Dashboard</a></li>
                                        @endif
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="sinlge-bar shopping">
                                <a href="{{ route('login.form') }}" class="btn btn-sm btn-primary me-2">Login</a>
                                <a href="{{ route('register.form') }}" class="btn btn-sm btn-outline-primary">Register</a>
                            </div>
                        @endauth

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::path() == 'home' ? 'active' : '' }}"><a
                                                    href="{{ route('home') }}">Home</a></li>
                                            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}"><a
                                                    href="{{ route('about-us') }}">About Us</a></li>
                                            <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif"><a
                                                    href="{{ route('product-grids') }}">Products</a><span
                                                    class="new">New</span></li>
                                            {{ Helper::getHeaderCategory() }}
                                            <li class="{{ Request::path() == 'blog' ? 'active' : '' }}"><a
                                                    href="{{ route('blog') }}">Blog</a></li>

                                            <li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a
                                                    href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<script>
    const accountToggle = document.getElementById('accountDropdownToggle');
    const accountDropdown = document.getElementById('accountDropdown');

    accountToggle.addEventListener('click', function() {
        accountDropdown.style.display = accountDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function(e) {
        if (!accountToggle.contains(e.target) && !accountDropdown.contains(e.target)) {
            accountDropdown.style.display = 'none';
        }
    });
</script>
