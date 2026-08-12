@extends('user.partials.layout')

@section('content')

<section class="velorix-cart py-5">

    <div class="container">

        <!-- PAGE HEADER -->
        <div class="cart-header text-center mb-5">

            <span class="cart-label">
                VELORIX
            </span>

            <h1>
                Your Shopping Cart
            </h1>

            <p>
                Review your selected eyewear before checkout.
            </p>

        </div>


        @if($cartItems->count())

        <div class="row g-4">


            <!-- =========================
                 CART PRODUCTS
            ========================== -->

            <div class="col-lg-8">

                <div class="cart-box">

                    <div class="cart-box-header">

                        <div>
                            <h5>
                                Shopping Cart
                            </h5>

                            <small>
                                {{ $cartItems->sum('quantity') }} item(s)
                            </small>
                        </div>

                        <a href="{{ route('product.index') }}"
                           class="continue-shopping">

                            <i class="fas fa-arrow-left me-1"></i>
                            Continue Shopping

                        </a>

                    </div>


                    @foreach($cartItems as $item)

                    <div class="cart-product">

                        <!-- PRODUCT IMAGE -->

                        <div class="cart-product-image">

                            @php
                                $images = json_decode($item->product->image, true);
                                $firstImage = is_array($images) && count($images)
                                    ? $images[0]
                                    : $item->product->image;
                            @endphp

                            <img
                                src="{{ asset('/storage/app/public/' . $firstImage) }}"
                                alt="{{ $item->product->title }}"
                            >

                        </div>


                        <!-- PRODUCT DETAILS -->

                        <div class="cart-product-info">

                            <h5>
                                {{ $item->product->title }}
                            </h5>

                            <p class="product-category">

                                {{ $categories->firstWhere(
                                    'id',
                                    $item->product->category
                                )->name ?? 'Eyewear' }}

                            </p>


                            <div class="product-price">

                                Rs. {{ number_format($item->price) }}

                            </div>
{{-- 
                            <div class="price-area">

                            <span class="current-price">

                                Rs {{ number_format($item->sale_price) }}

                            </span>

                            @if ($item->price)
                                <span class="old-price">

                                    Rs {{ number_format($item->price) }}

                                </span>
                            @endif

                        </div> --}}
                            <!-- MOBILE PRICE -->

                            <div class="mobile-subtotal">

                                Subtotal:
                                <strong>
                                    Rs. {{ number_format($item->sale_price * $item->quantity) }}
                                </strong>

                            </div>

                        </div>


                        <!-- QUANTITY -->

                        <div class="cart-quantity">

                            <label>
                                Quantity
                            </label>

                            <form
                                action="{{ route('cart.update', $item->id) }}"
                                method="POST"
                            >

                                @csrf

                                <div class="quantity-control">

                                    <input
                                        type="number"
                                        name="quantity"
                                        value="{{ $item->quantity }}"
                                        min="1"
                                    >

                                    <button
                                        type="submit"
                                        title="Update Quantity"
                                    >

                                        <i class="fas fa-sync-alt"></i>

                                    </button>

                                </div>

                            </form>

                        </div>


                        <!-- SUBTOTAL -->

                        <div class="cart-subtotal">

                            <small>
                                Subtotal
                            </small>
{{-- @dd($item->product->sale_price) --}}
                            <strong>
                                Rs.
                                {{ number_format($item->product->sale_price * $item->quantity) }}
                            </strong>

                        </div>


                        <!-- REMOVE -->

                        <div class="cart-remove">

                            <a
                                href="{{ route('cart.remove', $item->id) }}"
                                title="Remove Product"
                                onclick="return confirm('Remove this product from your cart?')"
                            >

                                <i class="fas fa-trash-alt"></i>

                            </a>

                        </div>

                    </div>

                    @endforeach


                    <!-- CLEAR CART -->

                    <div class="cart-footer">

                        <a
                            href="{{ route('cart.clear') }}"
                            class="clear-cart"
                            onclick="return confirm('Are you sure you want to clear your cart?')"
                        >

                            <i class="fas fa-trash-alt me-1"></i>
                            Clear Cart

                        </a>

                    </div>

                </div>

            </div>



            <!-- =========================
                 ORDER SUMMARY
            ========================== -->

            <div class="col-lg-4">

                <div class="summary-box">

                    <h4>
                        Order Summary
                    </h4>


                    <!-- SUBTOTAL -->

                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            Rs. {{ number_format($total) }}
                        </strong>

                    </div>


                    <!-- DISCOUNT -->

                    @if(session('discount'))

                    <div class="summary-row discount-row">

                        <span>
                            Discount
                        </span>

                        <strong>
                            - Rs. {{ number_format(session('discount')) }}
                        </strong>

                    </div>

                    @endif


                    <div class="summary-divider"></div>


                    <!-- TOTAL -->

                    <div class="summary-total">

                        <span>
                            Total
                        </span>

                        <strong>

                            Rs.
                            {{ number_format(
                                $total - session('discount', 0)
                            ) }}

                        </strong>

                    </div>


                    <!-- CHECKOUT -->

                    <a
                        href="{{ route('checkout.index') }}"
                        class="checkout-btn"
                    >

                        Proceed to Checkout

                        <i class="fas fa-arrow-right"></i>

                    </a>


                    <!-- PAYMENT INFO -->

                    <div class="secure-payment">

                        <i class="fas fa-lock"></i>

                        <div>

                            <strong>
                                Secure Checkout
                            </strong>

                            <small>
                                Your information is protected.
                            </small>

                        </div>

                    </div>

                </div>



                <!-- =========================
                     COUPON
                ========================== -->

                <div class="coupon-box">

                    <h5>

                        <i class="fas fa-tag"></i>

                        Have a Coupon?

                    </h5>

                    <p>
                        Enter your discount code below.
                    </p>


                    <form
                        action="{{ route('coupon.apply') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="coupon-input">

                            <input
                                type="text"
                                name="coupon_code"
                                placeholder="Coupon Code"
                                value="{{ old('coupon_code') }}"
                            >

                            <button type="submit">
                                Apply
                            </button>

                        </div>

                    </form>


                    @if(session('coupon'))

                    <div class="coupon-success">

                        <i class="fas fa-check-circle"></i>

                        Coupon
                        <strong>
                            {{ session('coupon.code') }}
                        </strong>
                        applied successfully.

                    </div>

                    @endif

                </div>


            </div>

        </div>


        @else


        <!-- =========================
             EMPTY CART
        ========================== -->

        <div class="empty-cart text-center">

            <div class="empty-cart-icon">

                <i class="fas fa-shopping-bag"></i>

            </div>

            <h2>
                Your Cart is Empty
            </h2>

            <p>
                Looks like you haven't added any eyewear yet.
                Explore our collection and find your perfect pair.
            </p>

            <a
                href="{{ route('product.index') }}"
                class="shop-now-btn"
            >

                <i class="fas fa-glasses me-2"></i>

                Explore Eyewear

            </a>

        </div>

        @endif

    </div>

</section>


@endsection