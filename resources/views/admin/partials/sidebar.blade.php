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
            <li class="sidebar-menu-title">BERANDA</li>
            <li class="">
                <a href="{{ route('admin.dashboard') }}"
                    class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Beranda</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">Fitur Utama</li>
            <li class="">
                <a href="{{ route('admin.seller.index') }}"
                    class="navItem {{ $route == 'admin.seller.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:circle-stack"></iconify-icon>
                        <span>Konfirmasi Penjual</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.order.index') }}"
                    class="navItem {{ $route == 'admin.order.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:shopping-bag"></iconify-icon>
                        <span>Order Data</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.category.index') }}"
                    class="navItem {{ $route == 'admin.category.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                        <span>Kategori</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.payment-method.index') }}"
                    class="navItem {{ $route == 'admin.payment-method.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:newspaper"></iconify-icon>
                        <span>Metode Pembayaran</span>
                    </span>
                </a>
            </li>

            {{-- <li class="">
                <a href="{{ route('admin.category.index') }}"
                    class="navItem {{ $route == 'admin.category.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:newspaper"></iconify-icon>
                        <span>News</span>
                    </span>
                </a>
            </li> --}}

            <li class="">
                <a href="{{ route('admin.log-money.index') }}"
                    class="navItem {{ $route == 'admin.log-money.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:currency-dollar"></iconify-icon>
                        <span>Riwayat Transaksi</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.withdraw.index') }}"
                    class="navItem {{ $route == 'admin.withdraw.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:arrow-path"></iconify-icon>
                        <span>Penukaran Saldo</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">USER</li>
            <li class="">
                <a href="{{ route('admin.user.index') }}"
                    class="navItem {{ $route == 'admin.user.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:users"></iconify-icon>
                        <span>User</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
