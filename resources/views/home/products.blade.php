@extends('home.home_template')

@section('main')
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('frontend/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Shop</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        @php
                            $paginate = $products->links()->paginator;
                        @endphp
                        <p class="woocommerce-result-count">Showing
                            {{ $paginate->firstItem() . '-' . $paginate->lastItem() . ' of ' . $paginate->total() }} results
                        </p>
                    </div>

                    {{-- <div class="col-md-auto">
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby" aria-label="Shop order">
                                <option value="menu_order" selected="selected">Default Sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </form>
                    </div> --}}
                </div>
            </div>
            <div class="row gy-40">

                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        @include('home.partials.product')
                    </div>
                @endforeach
            </div>
            <div class="th-pagination text-center pt-50">

                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
