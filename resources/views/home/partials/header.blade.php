<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo.svg') }}" alt="Frutin"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('beranda.index') }}">Home</a>
                </li>
                @php
                    $categories = App\Models\Category::orderBy('name', 'ASC')->get();
                @endphp
                <li class="menu-item-has-children">
                    <a href="#">Category</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('beranda.category', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('beranda.product') }}">Product</a>
                </li>
                <li>
                    <a href="{{ route('beranda.cart') }}">Cart</a>
                </li>

                @auth
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login.role', 'seller') }}">Seller Login</a>
                    </li>
                    <li>
                        <a href="{{ route('login.role', 'customer') }}">Customer Login</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</div>
<!--==============================
Header Area
==============================-->
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <p class="header-notice">Orders of $50 or more qualify for free shipping!</p>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-sm-inline-block"><i class="fal fa-location-dot"></i><a
                                    href="https://www.google.com/maps">8502 Preston Rd. Inglewood, Maine 98380</a>
                            </li>
                            <li>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo.svg') }}"
                                    alt="Frutin" height="69"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="{{ route('beranda.index') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Category</a>
                                    <ul class="sub-menu">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a
                                                    href="{{ route('beranda.category', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('beranda.product') }}">Product</a>
                                </li>
                                <li>
                                    <a href="{{ route('beranda.cart') }}">Cart</a>
                                </li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button type="button" class="simple-icon searchBoxToggler"><i
                                    class="far fa-search"></i></button>
                            <a href="{{ route('beranda.cart') }}">
                                <button type="button" class="simple-icon">
                                    @if (session('cart') !== null)
                                        <span class="badge">{{ count(session('cart')) ?? '0' }}</span>
                                    @else
                                        <span class="badge">0</span>
                                    @endif
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </button>
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="th-btn style4">Dashboard<i
                                        class="fas fa-chevrons-right ms-2"></i></a>
                            @else
                                <a href="{{ route('login.role', 'seller') }}">Seller Login</a>
                                <a href="{{ route('login.role', 'customer') }}" class="th-btn style4">Customer Login<i
                                        class="fas fa-chevrons-right ms-2"></i></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
