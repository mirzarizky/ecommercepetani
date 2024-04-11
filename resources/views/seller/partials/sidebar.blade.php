<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('beranda.index') }}">
            <img src="{{ asset('frontend/img/logo.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('frontend/img/logo.svg') }}" class="white_logo" alt="logo">
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        @php
            $route = Route::currentRouteName();
        @endphp
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">HOME</li>
            <li class="">
                <a href="{{ route('seller.dashboard') }}"
                    class="navItem {{ $route == 'seller.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Home</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">CORE</li>
            <li class="">
                <a href="{{ route('seller.product.index') }}"
                    class="navItem {{ $route == 'seller.product.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:book-open"></iconify-icon>
                        <span>Product</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('seller.order.index') }}"
                    class="navItem {{ $route == 'seller.order.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:banknotes"></iconify-icon>
                        <span>Order</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('seller.log-money.index') }}"
                    class="navItem {{ $route == 'seller.log-money.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:currency-dollar"></iconify-icon>
                        <span>Riwayat Uang</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('seller.withdraw.index') }}"
                    class="navItem {{ $route == 'seller.withdraw.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:arrow-path"></iconify-icon>
                        <span>Penukaran Saldo</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
