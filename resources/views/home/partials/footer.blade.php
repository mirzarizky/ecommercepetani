<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('frontend/img/bg/footer_bg_1.jpg') }}">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="home-organic-farm.html"><img src="{{ asset('frontend/img/logo-footer.svg') }}"
                                        alt="Frutin"></a>
                            </div>
                            <p class="about-text">We provide specialized winterization services to safeguard your
                                pool during the off-season, and when spring arrives, we handle the thorough opening
                                process.</p>
                            <div class="th-social">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                                alt="Icon">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ route('beranda.index') }}">Beranda</a></li>
                                <li><a href="{{ route('beranda.product') }}">Product</a></li>
                                <li><a href="{{ route('beranda.cart') }}">Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                                alt="Icon">Contact Us</h3>
                        <div class="th-widget-contact">
                            <div class="info-box">
                                <div class="info-box_icon">
                                    <i class="fas fa-location-dot"></i>
                                </div>
                                <p class="info-box_text">8502 Preston Rd. Inglewood, Maine 98380</p>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <p class="info-box_text">
                                    <a href="tel:+16326543564" class="info-box_link">+(163)-2654-3564</a>
                                    <a href="tel:+16326545432" class="info-box_link">+(163)-2654-5432</a>
                                </p>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <p class="info-box_text">
                                    <a href="mailto:help24/7@frutin.com" class="info-box_link">help24/7@frutin.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title"><img src="{{ asset('frontend/img/theme-img/title_icon.svg') }}"
                                alt="Icon">Instagram</h3>
                        <div class="sidebar-gallery">
                            <div class="gallery-thumb">
                                <img src="{{ asset('frontend/img/widget/gallery_1_1.jpg') }}"
                                    alt="Gallery Image">
                                <a href="{{ asset('frontend/img/widget/gallery_1_1.jpg') }}"
                                    class="gallery-btn popup-image"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="gallery-thumb">
                                <img src="{{ asset('frontend/img/widget/gallery_1_2.jpg') }}"
                                    alt="Gallery Image">
                                <a href="{{ asset('frontend/img/widget/gallery_1_2.jpg') }}"
                                    class="gallery-btn popup-image"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="gallery-thumb">
                                <img src="{{ asset('frontend/img/widget/gallery_1_3.jpg') }}"
                                    alt="Gallery Image">
                                <a href="{{ asset('frontend/img/widget/gallery_1_3.jpg') }}"
                                    class="gallery-btn popup-image"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="gallery-thumb">
                                <img src="{{ asset('frontend/img/widget/gallery_1_4.jpg') }}"
                                    alt="Gallery Image">
                                <a href="{{ asset('frontend/img/widget/gallery_1_4.jpg') }}"
                                    class="gallery-btn popup-image"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-6">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> {{ date('Y') }} <a
                            href="{{ route('beranda.index') }}">Frutin</a>. All Rights Reserved.</p>
                </div>
                {{-- <div class="col-md-6 text-center text-md-end">
                    <div class="payment-img">
                        <img src="{{ asset('frontend/img/normal/payment_methods.png') }}" alt="Image">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
