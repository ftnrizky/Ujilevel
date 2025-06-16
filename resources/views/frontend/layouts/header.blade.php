<style>
    /* ========== BASE STYLES ========== */
    .logo-link {
        display: flex;
        text-decoration: none;
        gap: 10px;
        align-items: center;
    }

    .logo-img {
        max-width: 80px;
        height: auto;
        object-fit: contain;
        padding: 10px;
        margin-top: -15px;
        position: relative;
        top: -7px;
        transition: transform 0.3s ease;
    }

    .logo-img:hover {
        transform: scale(1.05);
    }

    .logo-text {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        color: #333;
        white-space: nowrap;
    }

    /* ========== HEADER STRUCTURE ========== */
    .header.shop {
        background: #fff;
        position: relative;
        z-index: 100;
    }

    .header.shop .middle-inner {
        background: #ffffff;
        border-top: 1px solid #eee;
        padding: 15px 0;
        position: relative;
    }

    .header.shop .header-inner {
        background: #e1e1da;
        padding: 20px 0;
    }

    /* ========== SEARCH BAR STYLES ========== */
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
        max-width: 100%;
    }

    .header.shop .search-bar form {
        display: flex;
        width: 100%;
        height: 100%;
    }

    .header.shop .search-bar input {
        flex: 1;
        height: 48px;
        background: transparent;
        color: #666;
        border-radius: 0;
        border: none;
        font-size: 14px;
        font-weight: 400;
        padding: 0 20px;
    }

    .header.shop .search-bar .btnn {
        height: 50px;
        line-height: 53px;
        width: 62px;
        text-align: center;
        font-size: 18px;
        color: #fff;
        background: #333333;
        border: none;
        border-radius: 0 5px 5px 0;
        transition: all 0.4s ease;
        flex-shrink: 0;
    }

    .header.shop .search-bar .btnn:hover {
        color: #fff;
        background: #E94B4B;
    }

    /* ========== MOBILE SEARCH TOGGLE ========== */
    .mobile-search-toggle {
        display: none;
        background: none;
        border: none;
        color: #333;
        font-size: 20px;
        padding: 8px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .mobile-search-toggle:hover {
        color: #E94B4B;
    }

    .mobile-search-form {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        transform-origin: top;
        transform: scaleY(0);
        opacity: 0;
        height: 0;
        overflow: hidden;
    }

    .mobile-search-form.active {
        transform: scaleY(1);
        opacity: 1;
        height: auto;
    }

    .mobile-search-form .search-bar {
        transform: translateY(-20px);
        opacity: 0;
        transition: all 0.3s ease 0.1s;
    }

    .mobile-search-form.active .search-bar {
        transform: translateY(0);
        opacity: 1;
    }

    /* ========== HEADER ICONS ========== */
    .header-icons {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-left: auto;
        position: relative;
    }

    .icon-btn {
        position: relative;
        color: #333;
        font-size: 20px;
        padding: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        text-decoration: none;
        border-radius: 5px;
    }

    .icon-btn:hover {
        color: #E94B4B;
        transform: translateY(-2px);
        background: rgba(233, 75, 75, 0.1);
    }

    .badge-counter {
        position: absolute;
        top: -2px;
        right: -2px;
        background: #E94B4B;
        color: #fff;
        font-size: 11px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    /* ========== AUTH BUTTONS ========== */
    .auth-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
        padding-left: 15px;
    }

    .auth-btn {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 5px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        border: 1px solid #E94B4B;
        min-width: 100px;
        justify-content: center;
    }

    .auth-btn.login {
        background: #E94B4B;
        color: #fff;
    }

    .auth-btn.register {
        background: transparent;
        color: #E94B4B;
    }

    .auth-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(233, 75, 75, 0.3);
    }

    .auth-btn.register:hover {
        background: rgba(233, 75, 75, 0.1);
    }

    /* ========== ACCOUNT DROPDOWN ========== */
    .account-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
        border-radius: 8px;
        min-width: 180px;
        z-index: 1000;
        margin-top: 8px;
        border: 1px solid #eee;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }

    .account-dropdown.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .account-dropdown ul {
        list-style: none;
        margin: 0;
        padding: 8px 0;
    }

    .account-dropdown .dropdown-item {
        display: block;
        padding: 10px 16px;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 13px;
    }

    .account-dropdown .dropdown-item:hover {
        background: #f8f9fa;
        color: #E94B4B;
    }

    .account-dropdown .dropdown-divider {
        margin: 5px 0;
        border-color: #eee;
    }

    /* ========== NAVIGATION ========== */
    .header-inner .container {
        max-width: 1300px;
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
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .header-inner .nav.main-menu li a {
        position: relative;
        padding: 20px 0;
        font-size: 16px;
        color: #000000;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
    }

    .header-inner .nav.main-menu li a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #E94B4B;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .header-inner .nav.main-menu li:hover a::after,
    .header-inner .nav.main-menu li.active a::after {
        width: 100%;
    }

    .header-inner .nav.main-menu li:hover a {
        color: #E94B4B;
    }

    /* ========== MOBILE MENU HAMBURGER ========== */
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        color: #333;
        font-size: 24px;
        padding: 8px;
        cursor: pointer;
        position: relative;
        isolation: isolate; /* Creates stacking context */
    }

    .mobile-menu-toggle:hover {
        color: #E94B4B;
    }

    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
        isolation: isolate;
    }

    .mobile-menu {
        position: fixed;
        top: 0;
        right: -300px;
        width: 300px;
        height: 100vh;
        background: #fff;
        box-shadow: -2px 0 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        overflow-y: auto;
        transform: translateX(100%);
        isolation: isolate;
    }

    /* Add new wrapper for mobile menu system */
    .mobile-menu-system {
        position: relative;
        isolation: isolate;
        z-index: 9999; /* This will be isolated due to isolation property */
    }

    /* ========== RESPONSIVE BREAKPOINTS ========== */

    /* LAPTOP (1200px - 1440px) */
    @media (min-width: 1200px) and (max-width: 1440px) {
        .header.shop .search-bar {
            width: 400px; /* Reduced from 500px */
        }
        
        .header-inner .nav.main-menu {
            gap: 35px;
        }
        
        .header-inner .nav.main-menu li a {
            font-size: 15px;
        }
        
        .auth-btn {
            padding: 9px 16px;
            font-size: 13px;
        }
    }

    /* TABLET (768px - 1199px) */
    @media (min-width: 768px) and (max-width: 1199px) {
        /* Logo */
        .logo-img {
            max-width: 65px;
            padding: 8px;
        }
        
        .logo-text {
            font-size: 19px;
        }
        
        /* Search Bar */
        .header.shop .search-bar {
            width: 320px; /* Reduced from 420px */
        }
        
        .header.shop .search-bar input {
            font-size: 13px;
            padding: 0 15px;
        }
        
        .header.shop .search-bar .btnn {
            width: 55px;
            font-size: 16px;
        }
        
        /* Header Icons */
        .header-icons {
            gap: 12px;
        }
        
        .icon-btn {
            font-size: 18px;
            padding: 6px;
        }
        
        .badge-counter {
            width: 16px;
            height: 16px;
            font-size: 10px;
        }
        
        /* Auth Buttons */
        .auth-buttons {
            margin-left: auto;
            gap: 6px; /* Reduced gap between login/register buttons */
        }
        
        .auth-btn {
            padding: 8px 12px; /* Reduced padding */
            font-size: 13px;
            min-width: 90px; /* Reduced minimum width */
        }
        
        /* Navigation */
        .header-inner .nav.main-menu {
            gap: 25px;
        }
        
        .header-inner .nav.main-menu li a {
            font-size: 14px;
            padding: 18px 0;
        }
    }

    /* MOBILE (max-width: 767px) */
    @media (max-width: 767px) {
        /* Header Structure */
        .header.shop .middle-inner {
            padding: 10px 0;
        }
        
        .header.shop .middle-inner .row {
            align-items: center;
        }
        
        /* Logo */
        .logo-img {
            max-width: 45px;
            padding: 5px;
            margin-top: -8px;
            top: -3px;
        }
        
        .logo-text {
            font-size: 16px;
        }
        
        /* Hide desktop search, show mobile search toggle */
        .header.shop .search-bar-top {
            display: none;
        }
        
        .mobile-search-toggle {
            display: block;
        }
        
        /* Header Icons - Smaller */
        .header-icons {
            gap: 8px;
            margin-left: 10px;
        }
        
        .icon-btn {
            font-size: 16px;
            padding: 6px;
        }
        
        .badge-counter {
            width: 14px;
            height: 14px;
            font-size: 9px;
            top: -1px;
            right: -1px;
        }
        
        /* Hide desktop auth buttons */
        .auth-buttons {
            display: none;
        }
        
        /* Show mobile menu toggle */
        .mobile-menu-toggle {
            display: block;
            margin-left: 10px;
        }
        
        /* Navigation - Hide desktop menu */
        .header-inner .nav.main-menu {
            display: none;
        }
        
        /* Account dropdown adjustment */
        .account-dropdown {
            right: -20px;
            min-width: 160px;
        }
        
        /* Mobile menu */
        .mobile-menu,
        .mobile-menu-overlay {
            display: block;
        }
    }

    /* SMALL MOBILE (max-width: 480px) */
    @media (max-width: 480px) {
        .header.shop .middle-inner {
            padding: 8px 0;
        }
        
        .logo-img {
            max-width: 40px;
            padding: 4px;
        }
        
        .logo-text {
            font-size: 14px;
        }
        
        .header-icons {
            gap: 6px;
        }
        
        .icon-btn {
            font-size: 15px;
            padding: 5px;
        }
        
        .mobile-menu {
            width: 280px;
        }
        
        .account-dropdown {
            right: -30px;
            min-width: 150px;
        }
        
        .account-dropdown .dropdown-item {
            padding: 8px 12px;
            font-size: 12px;
        }
    }

    /* ========== STICKY HEADER ========== */
    .header.sticky .header-inner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #ffffff;
        animation: fadeInDown 1s both 0.2s;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 0;
    }

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

    /* ========== DROPDOWN STYLES ========== */
    .header .nav li .dropdown {
        background: #fff;
        width: 220px;
        position: absolute;
        top: 100%;
        box-shadow: 0px 3px 5px #3333334d;
        transform-origin: 0 0 0;
        transform: scaleY(0.2);
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
        text-decoration: none;
    }

    .header .nav li .dropdown li a:before {
        display: none;
    }

    .header .nav li .dropdown li:last-child a {
        border-bottom: 0px;
    }

    .header .nav li .dropdown li:hover a {
        color: #fff;
        background: #d5d0ad;
    }

    .header .nav li .dropdown li a:hover {
        border-color: transparent;
    }
</style>

<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo Column -->
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="logo">
                        @php
                            try {
                                $settings = DB::table('settings')->get();
                            } catch (\Exception $e) {
                                $settings = collect();
                            }
                        @endphp
                        <a href="{{ route('home') }}" class="logo-link">
                            <img src="{{ $settings->first()->logo ?? asset('default-logo.png') }}" alt="logo" class="logo-img">
                            <h3 class="logo-text">Stret Stradiers</h3>
                        </a>
                    </div>
                </div>

                <!-- Search Column (Desktop/Tablet) -->
                <div class="col-lg-6 col-md-5 d-none d-md-block">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form method="POST" action="{{ route('product.search') }}">
                                @csrf
                                <input name="search" placeholder="Cari Produk Anda....." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Icons & Auth Column -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-flex align-items-center justify-content-end">
                        <!-- Mobile Search Toggle -->
                        <button class="mobile-search-toggle d-md-none" type="button" id="mobileSearchToggle">
                            <i class="ti-search"></i>
                        </button>

                        <!-- Header Icons -->
                        <div class="header-icons">
                            <!-- Wishlist Icon -->
                            <a href="{{ route('wishlist') }}" class="icon-btn">
                                <i class="far fa-heart"></i>
                                @if (Helper::wishlistCount() > 0)
                                    <span class="badge-counter">{{ Helper::wishlistCount() }}</span>
                                @endif
                            </a>

                            <!-- Cart Icon -->
                            <a href="{{ route('cart') }}" class="icon-btn">
                                <i class="fas fa-shopping-cart"></i>
                                @if (Helper::cartCount() > 0)
                                    <span class="badge-counter">{{ Helper::cartCount() }}</span>
                                @endif
                            </a>

                            <!-- Auth / Account (Desktop/Tablet) -->
                            @auth
                                <div class="icon-btn position-relative d-none d-md-block">
                                    <a href="javascript:void(0);" id="accountDropdownToggle">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                    <div id="accountDropdown" class="account-dropdown" style="display: none;">
                                        <ul class="list-unstyled m-0">
                                            @if (Auth::user()->role == 'admin')
                                                <li><a href="{{ route('admin') }}" target="_blank" class="dropdown-item">Dashboard</a></li>
                                            @else
                                                <li><a href="{{ route('user') }}" target="_blank" class="dropdown-item">Profile</a></li>
                                            @endif
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a href="{{ route('user.logout') }}" class="dropdown-item text-danger">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="auth-buttons d-none d-md-flex">
                                    <a href="{{ route('login.form') }}" class="auth-btn login">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Login</span>
                                    </a>
                                    <a href="{{ route('register.form') }}" class="auth-btn register">
                                        <i class="fas fa-user-plus"></i>
                                        <span>Register</span>
                                    </a>
                                </div>
                            @endauth
                        </div>

                        <!-- Mobile Menu Toggle -->
                        <button class="mobile-menu-toggle d-md-none" type="button" id="mobileMenuToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Search Form -->
            <div class="mobile-search-form position-relative" id="mobileSearchForm">
                <div class="search-bar">
                    <form method="POST" action="{{ route('product.search') }}">
                        @csrf
                        <input name="search" placeholder="Cari Produk Anda....." type="search">
                        <button class="btnn" type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Inner (Navigation) -->
    <div class="header-inner">
        <div class="container">
            <div class="menu-area">
                <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                        <div class="nav-inner">
                            <ul class="nav main-menu menu navbar-nav">
                                <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Beranda</a>
                                </li>
                                <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                                    <a href="{{ route('about-us') }}">Tentang Kami</a>
                                </li>
                                <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                                    <a href="{{ route('about-us') }}">Chat With Admin</a>
                                </li>
                                <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                                    <a href="{{ route('product-grids') }}">Produk</a>
                                </li>
                                {{ Helper::getHeaderCategory() }}
                                <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <h4>Menu</h4>
        <button class="mobile-menu-close" id="mobileMenuClose">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="mobile-menu-content">
        <!-- Auth Buttons for Mobile -->
        @auth
            <div class="auth-buttons">
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin') }}" target="_blank" class="auth-btn login">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('user') }}" target="_blank" class="auth-btn login">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                @endif
                <a href="{{ route('user.logout') }}" class="auth-btn register">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        @else
            <div class="auth-buttons">
                <a href="{{ route('login.form') }}" class="auth-btn login">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
                <a href="{{ route('register.form') }}" class="auth-btn register">
                    <i class="fas fa-user-plus"></i>
                    <span>Register</span>
                </a>
            </div>
        @endauth

        <!-- Mobile Navigation -->
        <ul class="mobile-nav-list">
            <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                <a href="{{ route('about-us') }}">Tentang Kami</a>
            </li>
            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                <a href="{{ route('about-us') }}">Chat With Admin</a>
            </li>
            <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                <a href="{{ route('product-grids') }}">Produk</a>
            </li>
            <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                <a href="{{ route('contact') }}">Kontak</a>
            </li>
        </ul>
    </div>
 </div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const header = document.querySelector('.header.shop');
    const searchBarTop = document.querySelector('.search-bar-top');
    const mobileSearchToggle = document.querySelector('.mobile-search-toggle');
    const mobileSearchForm = document.querySelector('.mobile-search-form');
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const accountDropdown = document.querySelector('#accountDropdown');

    let isSearchActive = false;
    let isMenuActive = false;

    // Search functionality
    function toggleMobileSearch(event) {
        event.preventDefault();
        event.stopPropagation();

        if (isMenuActive) {
            closeMobileMenu();
        }

        isSearchActive = !isSearchActive;
        mobileSearchForm.classList.toggle('active');
        
        if (isSearchActive) {
            setTimeout(() => {
                const searchInput = mobileSearchForm.querySelector('input[type="search"]');
                if (searchInput) searchInput.focus();
            }, 300);
        }
    }

    function closeMobileSearch() {
        if (isSearchActive) {
            isSearchActive = false;
            mobileSearchForm.classList.remove('active');
        }
    }

    // Mobile menu functionality
    function toggleMobileMenu(event) {
        event.preventDefault();
        event.stopPropagation();

        if (isSearchActive) {
            closeMobileSearch();
        }

        isMenuActive = !isMenuActive;
        
        if (isMenuActive) {
            openMobileMenu();
        } else {
            closeMobileMenu();
        }
    }

    function openMobileMenu() {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        if (isMenuActive) {
            isMenuActive = false;
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Event handlers
    if (mobileSearchToggle) {
        mobileSearchToggle.addEventListener('click', toggleMobileSearch);
    }

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        const isClickInside = mobileSearchForm?.contains(e.target) || 
                            mobileSearchToggle?.contains(e.target);

        if (!isClickInside && isSearchActive) {
            closeMobileSearch();
        }

        if (accountDropdown && !accountDropdown.contains(e.target) && 
            !e.target.matches('#accountDropdownToggle')) {
            accountDropdown.classList.remove('active');
        }
    });

    // Handle search form clicks
    if (mobileSearchForm) {
        mobileSearchForm.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // Prevent menu close when clicking inside
    if (mobileMenu) {
        mobileMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // Responsive handler
    function handleResponsive() {
        const windowWidth = window.innerWidth;
        
        if (windowWidth > 767) {
            closeMobileMenu();
            closeMobileSearch();
            if (searchBarTop) searchBarTop.style.display = 'block';
        } else {
            if (searchBarTop) searchBarTop.style.display = 'none';
        }
    }

    // Debounce resize handler
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(handleResponsive, 250);
    });

    // Initialize
    handleResponsive();
});
</script>
