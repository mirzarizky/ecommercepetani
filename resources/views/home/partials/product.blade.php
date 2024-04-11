<div class="th-product product-grid">
    <div class="product-img">
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
        <span class="product-tag">Hot</span>
        <div class="actions">
            <a href="{{ route('beranda.cart.add', $product->id) }}" class="icon-btn"><i class="far fa-cart-plus"></i></a>
        </div>
    </div>
    <div class="product-content">
        <a href="{{ route('beranda.category', $product->category->slug) }}"
            class="product-category">{{ $product->category->name }}</a>
        <h3 class="product-title"><a
                href="{{ route('beranda.product.detail', $product->slug) }}">{{ $product->name }}</a></h3>
        <span class="price">Rp. {{ number_format($product->price) }}
            {{ @$product->unit ? "/ $product->unit" : '' }}</span>
        {{-- <div class="woocommerce-product-rating">
                <span class="count">(120 Reviews)</span>
                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                            class="rating">1</span> customer rating</span>
                </div>
            </div> --}}
    </div>
</div>
