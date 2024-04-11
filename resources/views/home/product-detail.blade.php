@extends('home.home_template')

@section('main')
    <!--==============================
                                                                                                                                                    Breadcumb
                                                                                                                                                    ============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('frontend/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Product Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('beranda.index') }}">Home</a></li>
                    <li><a href="{{ route('beranda.product') }}">Product</a></li>
                    <li>{{ $title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                                                                                                                                                    Product Details
                                                                                                                                                    ==============================-->
    <section class="product-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img"><img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"></div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">Rp. {{ number_format($product->price) }}</p>
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <div class="product-rating">
                            {{-- <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                        class="rating">1</span> customer rating</span></div> --}}
                            <a href="#" class="woocommerce-review-link">(<span
                                    class="count">{{ count($product->comments) }}</span>
                                customer reviews)</a>
                        </div>
                        <p class="text">{{ Str::limit($product->description, 290) }}</p>
                        <div class="mt-2 link-inherit">
                            <p>
                                <strong class="text-title me-3">Availability:</strong>
                                <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>In Stock</span>
                            </p>
                            @if (@$product->unit)
                                <p>
                                    <strong class="text-title me-3">Satuan:</strong>
                                    <span class="stock in-stock">{{ $product->unit }}</span>
                                </p>
                            @endif
                        </div>
                        <div class="actions">
                            <a href="{{ route('beranda.cart.add', $product->id) }}"><button class="th-btn">Add to
                                    Cart</button></a>
                            {{-- <a href="#" class="icon-btn"><i class="far fa-heart"></i></a> --}}
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->slug }}</span></span>
                            <span class="posted_in">Kategori: <a href="shop.html">{{ $product->category->name }}</a></span>
                            <span class="posted_in">Nomor HP Seller: <a
                                    href="shop.html">{{ $product->user->phone_number }}</a></span>
                            {{-- <span>Tags: <a href="shop.html">Fruits</a><a href="shop.html">Organic</a></span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav product-tab-style1" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                        aria-controls="description" aria-selected="false">Product Description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link th-btn active" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                        aria-controls="reviews" aria-selected="true">Customer Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="productTabContent">
                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    {{ $product->description }}
                </div>
                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="woocommerce-Reviews">
                        <div class="th-comments-wrap ">
                            <ul class="comment-list">
                                @foreach ($product->comments as $comment)
                                    <li class="review th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                @php
                                                    $image = null;
                                                    if (Storage::exists($comment->user->profile_photo)) {
                                                        $image = Storage::url($comment->user->profile_photo);
                                                    } else {
                                                        $image = Avatar::create($comment->user->name)->toBase64();
                                                    }
                                                @endphp
                                                <img src="{{ $image }}" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <h4 class="name">{{ $comment->user->name }}</h4>
                                                <span class="commented-on"><i
                                                        class="far fa-calendar"></i>{{ \Carbon\Carbon::parse($comment->updated_at)->format('d M, Y') }}</span>
                                                {{-- <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out
                                                        of
                                                        5 based on <span class="rating">1</span> customer rating</span>
                                                </div> --}}
                                                <p class="text">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
