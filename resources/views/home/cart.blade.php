@extends('home.home_template')

@section('main')
    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Cart Page</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-organic-farm.html">Home</a></li>
                    <li>Cart Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
                                                                                                                                                                                                        Cart Area
                                                                                                                                                                                                        ==============================-->
    <div class="th-cart-wrapper  space-top space-extra-bottom">
        <div class="container">
            <form action="#" class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    @if (session('cart') !== null)
                        <tbody>
                            @php
                                $total_amount = 0;
                                $is_check = false;
                            @endphp
                            @foreach (session('cart') as $id => $item)
                                @php
                                    $is_check = true;
                                @endphp
                                <tr class="cart_item">
                                    <td data-title="Product">
                                        <a class="cart-productimage" href="shop-detailis.html"><img width="91"
                                                height="91" src="{{ Storage::url($item['image']) }}" alt="Image"></a>
                                    </td>
                                    <td data-title="Name">
                                        <a class="cart-productname" href="shop-detailis.html">{{ $item['name'] }}</a>
                                    </td>
                                    <td data-title="Price">
                                        <span class="amount"><bdi><span>Rp.
                                                </span>{{ number_format($item['price']) }}</bdi></span>
                                    </td>
                                    <td data-title="Quantity">
                                        <div class="quantity">
                                            <a href="{{ route('beranda.cart.min', $id) }}" class="qty-btn">
                                                <i class="far fa-minus"></i>
                                            </a>
                                            <input type="number" class="qty-input" value="{{ $item['quantity'] }}"
                                                min="1" max="99" readonly>
                                            <a href="{{ route('beranda.cart.add', $id) }}" class="qty-btn">
                                                <i class="far fa-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td data-title="Total">
                                        @php
                                            $total_price = $item['quantity'] * $item['price'];
                                            $total_amount += $total_price;
                                        @endphp
                                        <span class="amount"><bdi><span>Rp.
                                                </span>{{ number_format($total_price) }}</bdi></span>
                                    </td>
                                    <td data-title="Remove">
                                        <a href="{{ route('beranda.cart.remove', $id) }}" class="remove"><i
                                                class="fal fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @if ($is_check)
                            <tfoot>
                                <tr class="order-total">
                                    <td colspan="3"></td>
                                    <td>Order Total</td>
                                    <td data-title="Total">
                                        <strong><span class="amount"><bdi><span>Rp.
                                                    </span>{{ number_format($total_amount) }}</bdi></span></strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('customer.checkout') }}" class="th-btn">Proceed to checkout</a>
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
                    @endif
                </table>
            </form>
        </div>
    </div>
@endsection
