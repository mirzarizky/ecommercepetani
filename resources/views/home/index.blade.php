@extends('home.home_template')

@section('main')
    <div class="th-hero-wrapper hero-1" id="hero" data-bg-src="{{ asset('frontend/img/hero/hero_bg_1_2.jpg') }}">
        <div class="swiper th-slider" id="heroSlide1" data-slider-options='{"effect":"fade"}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="{{ asset('frontend/img/theme-img/title_icon.svg') }}" alt="shape">100%
                                    Quality
                                    Foods</span>
                                <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img" src="{{ asset('frontend/img/hero/hero_title_shape.svg') }}"
                                            alt="icon">
                                        Welcome <span class="text-theme">to veggies world</span> </span>
                                    <span class="title2" data-ani="slideinup" data-ani-delay="0.5s">Langsung dari
                                        petani</span>
                                </h1>
                                <a href="{{ route('beranda.product') }}" class="th-btn" data-ani="slideinup"
                                    data-ani-delay="0.7s">Discover
                                    More<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                        <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_1_1.png') }}" alt="Image">
                        </div>
                        <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_1.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_2.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_3.png') }}" alt="shape">
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="{{ asset('frontend/img/theme-img/title_icon.svg') }}" alt="shape">100%
                                    Organic
                                    Foods</span>
                                <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img" src="{{ asset('frontend/img/hero/hero_title_shape.svg') }}"
                                            alt="icon">
                                        Your <span class="text-theme">marketplace,</span> </span>
                                    <span class="title2" data-ani="slideinup" data-ani-delay="0.5s">start now</span>
                                </h1>
                                <a href="{{ route('beranda.product') }}" class="th-btn" data-ani="slideinup"
                                    data-ani-delay="0.7s">Discover
                                    More<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                        <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_1_2.png') }}" alt="Image">
                        </div>
                        <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_1.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_2.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_3.png') }}" alt="shape">
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="{{ asset('frontend/img/theme-img/title_icon.svg') }}" alt="shape">100%
                                    Fresh
                                    Foods</span>
                                <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img"
                                            src="{{ asset('frontend/img/hero/hero_title_shape.svg') }}" alt="icon">
                                        veggies world, <span class="text-theme">ease of</span> </span>
                                    <span class="title2" data-ani="slideinup" data-ani-delay="0.5s">shopping</span>
                                </h1>
                                <a href="{{ route('beranda.product') }}" class="th-btn" data-ani="slideinup"
                                    data-ani-delay="0.7s">Discover
                                    More<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                        <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_1_3.png') }}" alt="Image">
                        </div>
                        <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_1.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_2.png') }}" alt="shape">
                        </div>
                        <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                            <img src="{{ asset('frontend/img/hero/hero_shape_1_3.png') }}" alt="shape">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="hero-shape4">
            <img class="svg-img" src="{{ asset('frontend/img/hero/hero_shape_1_4.svg') }}" alt="shape">
        </div>
    </div>

    {{-- <section class="space-top">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                        alt="Icon">Food
                    Category</span>
                <h2 class="sec-title">What We’re Offering</h2>
            </div>
            <div class="swiper th-slider"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="category-card">
                            <div class="box-shape" data-bg-src="{{ asset('frontend/img/bg/category_card_bg.png') }}">
                            </div>
                            <div class="box-icon"
                                data-mask-src="{{ asset('frontend/img/bg/category_card_icon_bg.png') }}">
                                <img src="{{ asset('frontend/img/icon/category_card_1.svg') }}" alt="Image">
                            </div>
                            <p class="box-subtitle">Product (08)</p>
                            <h3 class="box-title"><a href="shop.html">Fresh Vegetable</a></h3>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="category-card">
                            <div class="box-shape" data-bg-src="{{ asset('frontend/img/bg/category_card_bg.png') }}">
                            </div>
                            <div class="box-icon"
                                data-mask-src="{{ asset('frontend/img/bg/category_card_icon_bg.png') }}">
                                <img src="{{ asset('frontend/img/icon/category_card_2.svg') }}" alt="Image">
                            </div>
                            <p class="box-subtitle">Product (05)</p>
                            <h3 class="box-title"><a href="shop.html">Natural Fruits</a></h3>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="category-card">
                            <div class="box-shape" data-bg-src="{{ asset('frontend/img/bg/category_card_bg.png') }}">
                            </div>
                            <div class="box-icon"
                                data-mask-src="{{ asset('frontend/img/bg/category_card_icon_bg.png') }}">
                                <img src="{{ asset('frontend/img/icon/category_card_3.svg') }}" alt="Image">
                            </div>
                            <p class="box-subtitle">Product (04)</p>
                            <h3 class="box-title"><a href="shop.html">Dairy Products</a></h3>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="category-card">
                            <div class="box-shape" data-bg-src="{{ asset('frontend/img/bg/category_card_bg.png') }}">
                            </div>
                            <div class="box-icon"
                                data-mask-src="{{ asset('frontend/img/bg/category_card_icon_bg.png') }}">
                                <img src="{{ asset('frontend/img/icon/category_card_4.svg') }}" alt="Image">
                            </div>
                            <p class="box-subtitle">Product (07)</p>
                            <h3 class="box-title"><a href="shop.html">Tea & Coffee</a></h3>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="category-card">
                            <div class="box-shape" data-bg-src="{{ asset('frontend/img/bg/category_card_bg.png') }}">
                            </div>
                            <div class="box-icon"
                                data-mask-src="{{ asset('frontend/img/bg/category_card_icon_bg.png') }}">
                                <img src="{{ asset('frontend/img/icon/category_card_5.svg') }}" alt="Image">
                            </div>
                            <p class="box-subtitle">Product (10)</p>
                            <h3 class="box-title"><a href="shop.html">Meat and Fish</a></h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

    <div class="overflow-hidden space" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset('frontend/img/normal/about_1_1.jpg') }}" alt="About">
                        </div>
                        <div class="img2">
                            <img src="{{ asset('frontend/img/normal/about_1_2.jpg') }}" alt="Image">
                        </div>
                        <div class="shape1 movingX">
                            <img src="{{ asset('frontend/img/normal/about_1_3.png') }}" alt="Image">
                        </div>
                        <div class="year-counter">
                            <div class="year-counter_number"><span class="counter-number">23</span>+</div>
                            <p class="year-counter_text">Years Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ps-xxl-5 ps-xl-2 ms-xl-1 text-center text-xl-start">
                        <div class="title-area mb-32">
                            <span class="sub-title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                                    alt="shape">About
                                Our Company</span>
                            <h2 class="sec-title">Eating Right Start With Organic Food</h2>
                            <p class="sec-text">Organic foods are produced through a farming system that avoids the use
                                of synthetic pesticides, herbicides, genetically modified organism (GMOs), and
                                artificial fertilizers. Instead, organic farmers rely on natural methods like crop
                                rotation. composting, and biological pest control.</p>
                        </div>
                        <div class="about-feature-wrap">
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="{{ asset('frontend/img/icon/about_feature_1.svg') }}" alt="Icon">
                                </div>
                                <h3 class="box-title">The Agriculture Leader</h3>
                            </div>
                            <div class="about-feature">
                                <div class="box-icon">
                                    <img src="{{ asset('frontend/img/icon/about_feature_2.svg') }}" alt="Icon">
                                </div>
                                <h3 class="box-title">Smart Organic Solutions</h3>
                            </div>
                        </div>
                        {{-- <div>
                            <a href="about.html" class="th-btn">Discover More<i
                                    class="fas fa-chevrons-right ms-2"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-smoke2 space" id="shop-sec">
        <div class="shape-mockup" data-top="0" data-left="0"><img
                src="{{ asset('frontend/img/shape/vector_shape_1.png') }}" alt="shape"></div>
        <div class="shape-mockup" data-bottom="0" data-right="0"><img
                src="{{ asset('frontend/img/shape/vector_shape_2.png') }}" alt="shape"></div>
        <div class="container text-center">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                        alt="Icon">Organic
                    Products</span>
                <h2 class="sec-title">Organic & Fresh Products Daily!</h2>
            </div>
            {{-- <div class="filter-menu indicator-active filter-menu-active">
                <button data-filter="*" class="th-btn tab-btn active" type="button">ALL</button>
                <button data-filter=".cat1" class="th-btn tab-btn" type="button">Fruits</button>
                <button data-filter=".cat2" class="th-btn tab-btn" type="button">Vegetable</button>
                <button data-filter=".cat3" class="th-btn tab-btn" type="button">Meat & Fish</button>
                <button data-filter=".cat4" class="th-btn tab-btn" type="button">Fruit Juice</button>
                <button data-filter=".cat5" class="th-btn tab-btn" type="button">Salads</button>
            </div> --}}
            <div class="row gy-4 filter-active">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-sm-6 filter-item">
                        @include('home.partials.product')
                    </div>
                @endforeach
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat5 cat2">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <img src="{{ asset('frontend/img/product/product_1_2.jpg') }}" alt="Product Image">
                            <span class="product-tag">New</span>
                            <div class="actions">
                                <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <a href="shop-details.html" class="product-category">Vegetables</a>
                            <h3 class="product-title"><a href="shop-details.html">Green Cauliflower</a></h3>
                            <span class="price">$39.85</span>
                            <div class="woocommerce-product-rating">
                                <span class="count">(120 Reviews)</span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    {{-- <div class="overflow-hidden space">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 text-center text-xl-start">
                    <div class="title-area">
                        <span class="sub-title"><img src="assets/img/theme-img/title_icon.svg" alt="shape">Why
                            Choose Us</span>
                        <h2 class="sec-title">Nourish Your Body with Pure Organic Goodness!</h2>
                        <p class="sec-text">Governments have regulations in place to ensure that products labeled as
                            organic meet specific standards. Regular inspections and audits are conducted to maintain
                            the integrity of the organic label.</p>
                    </div>
                </div>
            </div>
            <div class="text-center text-xl-start">
                <div class="choose-feature-area">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="choose-feature-wrap">
                                <div class="choose-feature">
                                    <div class="box-icon">
                                        <img src="{{ asset('frontend/img/icon/choose_feature_1.svg') }}" alt="Icon">
                                    </div>
                                    <h3 class="box-title">100% Organic</h3>
                                    <p class="box-text">Our products are certified by reputable organic.</p>
                                </div>
                                <div class="choose-feature">
                                    <div class="box-icon">
                                        <img src="{{ asset('frontend/img/icon/choose_feature_2.svg') }}" alt="Icon">
                                    </div>
                                    <h3 class="box-title">Fresh Products</h3>
                                    <p class="box-text">Our products are certified by reputable organic.</p>
                                </div>
                                <div class="choose-feature">
                                    <div class="box-icon">
                                        <img src="{{ asset('frontend/img/icon/choose_feature_3.svg') }}" alt="Icon">
                                    </div>
                                    <h3 class="box-title">Biodynamic Food</h3>
                                    <p class="box-text">Our products are certified by reputable organic.</p>
                                </div>
                                <div class="choose-feature">
                                    <div class="box-icon">
                                        <img src="{{ asset('frontend/img/icon/choose_feature_4.svg') }}" alt="Icon">
                                    </div>
                                    <h3 class="box-title">Secured Payment</h3>
                                    <p class="box-text">Our products are certified by reputable organic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 d-none d-xl-block">
                            <div class="img-box2-wrap">
                                <div class="img-box2">
                                    <div class="img1">
                                        <img src="assets/img/normal/why_1_1.png" alt="Why">
                                    </div>
                                    <div class="img2">
                                        <img src="assets/img/normal/why_1_2.png" alt="Why">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <section class="space" id="blog-sec">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><img src="assets/img/theme-img/title_icon.svg" alt="shape">Blog &
                    News</span>
                <h2 class="sec-title">Latest Updates News & Articles</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_1.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>15 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Change Your Eating Habits With
                                            Organic Food</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_2.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>16 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Transform Your Nutrition with
                                            Organic Meal</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_3.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>17 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Improve Your Health By Organic
                                            Eating</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_4.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>19 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Organic Eating Is Great For
                                            Better Health</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_1.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>15 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Change Your Eating Habits With
                                            Organic Food</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="assets/img/blog/blog_1_2.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i>By Frutin</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i>16 March, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">Transform Your Nutrition with
                                            Organic Meal</a></h3>
                                    <a href="blog-details.html" class="th-btn btn-sm style4">Read More<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#blogSlider1" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section> --}}
@endsection
