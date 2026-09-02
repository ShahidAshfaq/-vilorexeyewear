@extends('user.partials.layout')

@section('content')

    @php
        $images = json_decode($product->image, true);
    @endphp

    <section class="product-details py-5 mt-5">

        <div class="container">

            <div class="row g-5">

                <!--==========================
    Product Gallery
    ===========================-->

                <div class="col-lg-6">

                    <div class="gallery-wrapper">

                        <div class="main-image">

                            <img id="mainProductImage"
                                src="{{ asset('/storage/app/public/' . ($images[0] ?? 'default-product.jpg')) }}"
                                class="img-fluid">

                            @if ($product->cut_price > $product->price)
                                <span class="discount-badge">

                                    SALE

                                </span>
                            @endif

                        </div>

                        @if (count($images) > 1)
                            <div class="thumbnail-wrapper mt-3">

                                @foreach ($images as $image)
                                    <img src="{{ asset('/storage/app/public/' . $image) }}" class="thumbnail-image"
                                        onclick="changeImage(this)">
                                @endforeach

                            </div>
                        @endif

                    </div>

                </div>

                <!--==========================
    Product Info
    ===========================-->

                <div class="col-lg-6">

                    <div class="product-content">

                        <span class="product-category">

                            {{ $categories->firstWhere('id', $product->category)->name ?? 'Category' }}

                        </span>

                        <h1>

                            {{ $product->title }}

                        </h1>

                        <div class="rating-area">

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star-half-alt"></i>

                            <span>

                                (4.8 Reviews)

                            </span>

                        </div>

                        <div class="price-area">

                            <span class="current-price">

                                Rs {{ number_format($product->sale_price) }}

                            </span>

                            @if ($product->price)
                                <span class="old-price">

                                    Rs {{ number_format($product->price) }}

                                </span>
                            @endif

                        </div>

                        <p class="description">

                            {!! $product->description !!}

                        </p>

                        <!-- Quantity -->

                        <div class="quantity-box">

                            <label>

                                Quantity

                            </label>

                            <div class="qty-control">

                                <button type="button" class="qty-btn" id="minus">

                                    -

                                </button>

                                <input type="number" id="qty" value="1" min="1">

                                <button type="button" class="qty-btn" id="plus">

                                    +

                                </button>

                            </div>

                        </div>

                        <!-- Buttons -->

                        <div class="product-buttons">

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">

                                @csrf

                                <input type="hidden" name="quantity" id="cartQuantity" value="1">

                                <button class="btn cart-btn">

                                    <i class="fas fa-shopping-cart me-2"></i>

                                    Add To Cart

                                </button>

                            </form>

                            <button class="btn wishlist-detai">

                                 <a href="{{ route('product.index') }}"
                           class="continue-shopping">

                            <i class="fas fa-arrow-left me-1"></i>
                            Continue Shopping

                        </a>

                            </button>
                            {{-- <button class="btn wishlist-detail">

                                <i class="far fa-heart"></i>

                                Wishlist

                            </button> --}}
                           

                        </div>

                        <!-- Features -->

                        <div class="product-features mt-5">

                            <div>

                                <i class="fas fa-truck"></i>

                                Free Delivery

                            </div>

                            <div>

                                <i class="fas fa-shield-alt"></i>

                                Secure Payment

                            </div>

                            {{-- <div>

                                <i class="fas fa-sync"></i>

                                7 Days Return

                            </div> --}}

                            <div>

                                <i class="fas fa-headset"></i>

                                24/7 Support

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

   @if ($relatedProducts->count() > 0)
    <section class="related-products py-5">

        <div class="container">

            {{-- ================= SECTION HEADER ================= --}}
            <div class="text-center mb-5">

                <span class="text-uppercase small fw-semibold"
                    style="color:var(--gold-dark);">

                    You May Also Like

                </span>

                <h2 class="fw-bold mt-2">
                    Related Products
                </h2>

                <p class="text-muted">
                    Explore more eyewear from the same collection.
                </p>

            </div>


            {{-- ================= PRODUCT GRID ================= --}}
            <div class="row g-4">

                @foreach ($relatedProducts as $related)

                    @php

                        $relatedImages = json_decode($related->image, true) ?? [];

                        $relatedImage = $relatedImages[0] ?? 'default-product.jpg';

                        $relatedOnSale = $related->on_sale && $related->sale_price;

                        $relatedOutOfStock = $related->stock <= 0;

                    @endphp


                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">

                        <div class="hover-product-card">


                            {{-- ================= IMAGE ================= --}}
                            <div class="hover-product-image">

                                <a href="{{ route('product.show', $related->slug) }}">

                                    <img
                                        src="{{ asset('/storage/app/public/' . $relatedImage) }}"
                                        alt="{{ $related->title }}"
                                    >

                                </a>


                                {{-- ================= SALE ================= --}}
                                @if ($relatedOnSale)

                                    <span class="hover-sale-badge">

                                        <i class="fas fa-fire"></i>

                                        Sale

                                    </span>

                                @endif


                                {{-- ================= OUT OF STOCK ================= --}}
                                @if ($relatedOutOfStock)

                                    <span class="hover-stock-badge">

                                        Out of Stock

                                    </span>

                                @endif


                                {{-- ================= WISHLIST ================= --}}
                                <button
                                    type="button"
                                    class="hover-wishlist"
                                    data-product="{{ $related->id }}"
                                    title="Add to Wishlist"
                                >

                                    <i class="far fa-heart"></i>

                                </button>


                                {{-- ================= HOVER OVERLAY ================= --}}
                                <div class="hover-product-overlay">

                                    <div class="hover-product-content">


                                        {{-- Product Name --}}
                                        <h3>

                                            {{ Str::limit($related->title, 35) }}

                                        </h3>


                                        {{-- Price --}}
                                        <div class="hover-price">

                                            @if ($relatedOnSale)

                                                <span class="sale-price">

                                                    Rs {{ number_format($related->sale_price) }}

                                                </span>

                                                <span class="original-price text-danger">

                                                    Rs {{ number_format($related->price) }}

                                                </span>

                                            @else

                                                <span class="normal-price">

                                                    Rs {{ number_format($related->price) }}

                                                </span>

                                            @endif

                                        </div>


                                        {{-- ================= STOCK ================= --}}
                                        <div class="hover-stock">

                                            @if ($relatedOutOfStock)

                                                <span class="stock-out">

                                                    <i class="fas fa-times-circle"></i>

                                                    Out of Stock

                                                </span>

                                            @elseif ($related->stock <= 5)

                                                <span class="stock-low">

                                                    <i class="fas fa-exclamation-circle"></i>

                                                    Only {{ $related->stock }} left

                                                </span>

                                            @else

                                                <span class="stock-in">

                                                    <i class="fas fa-check-circle"></i>

                                                    In Stock

                                                </span>

                                            @endif

                                        </div>


                                        {{-- ================= ACTIONS ================= --}}
                                        <div class="hover-actions">


                                            {{-- VIEW PRODUCT --}}
                                            <a
                                                href="{{ route('product.show', $related->slug) }}"
                                                class="hover-action-btn"
                                                title="View Product"
                                            >

                                                <i class="far fa-eye"></i>

                                            </a>


                                            {{-- ADD TO CART --}}
                                            @if (!$relatedOutOfStock)

                                                <form
                                                    action="{{ route('cart.add', $related->id) }}"
                                                    method="POST"
                                                >

                                                    @csrf

                                                    <input
                                                        type="hidden"
                                                        name="quantity"
                                                        value="1"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="hover-action-btn"
                                                        title="Add to Cart"
                                                    >

                                                        <i class="fas fa-shopping-cart"></i>

                                                    </button>

                                                </form>

                                            @else

                                                <button
                                                    type="button"
                                                    class="hover-action-btn disabled"
                                                    disabled
                                                    title="Out of Stock"
                                                >

                                                    <i class="fas fa-ban"></i>

                                                </button>

                                            @endif


                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- ================= BASIC INFO ================= --}}
                            <div class="hover-product-footer">


                                {{-- Product Name --}}
                                <h5>

                                    <a href="{{ route('product.show', $related->slug) }}">

                                        {{ Str::limit($related->title, 40) }}

                                    </a>

                                </h5>


                                {{-- Category --}}
                                <small class="text-muted d-block mb-1">

                                    {{ $category->name ?? 'Eyewear' }}

                                </small>


                                {{-- Attributes --}}
                                <div class="d-flex flex-wrap gap-1 mb-2">

                                    @if ($related->frame)

                                        <span class="badge bg-light text-dark border">

                                            {{ $related->frame }}

                                        </span>

                                    @endif


                                    @if ($related->lens)

                                        <span class="badge bg-light text-dark border">

                                            {{ $related->lens }}

                                        </span>

                                    @endif

                                </div>


                                {{-- ================= FOOTER PRICE ================= --}}
                                <div class="footer-price">

                                    @if ($relatedOnSale)

                                        <span>

                                            Rs {{ number_format($related->sale_price) }}

                                        </span>

                                        <del class="text-danger">

                                            Rs {{ number_format($related->price) }}

                                        </del>

                                    @else

                                        <span>

                                            Rs {{ number_format($related->price) }}

                                        </span>

                                    @endif

                                </div>


                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>
@endif

<style>
        /* ==========================================
   HOVER PRODUCT CARD
========================================== */

.hover-product-card {
    position: relative;
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--border);
    transition: all .35s ease;
}

.hover-product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
}


/* ==========================================
   IMAGE
========================================== */

.hover-product-image {
    position: relative;
    height: 280px;
    overflow: hidden;
    background: #f5f5f5;
}

.hover-product-image > a {
    display: block;
    width: 100%;
    height: 100%;
}

.hover-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;

    transition: transform .5s ease;
}

.hover-product-card:hover .hover-product-image img {
    transform: scale(1.08);
}


/* ==========================================
   OVERLAY
========================================== */

.hover-product-overlay {
    position: absolute;

    inset: 0;

    display: flex;
    align-items: flex-end;

    background: linear-gradient(
        to top,
        rgba(0, 0, 0, .85),
        rgba(0, 0, 0, .35),
        transparent
    );

    opacity: 0;

    visibility: hidden;

    transition: all .35s ease;
}

.hover-product-card:hover .hover-product-overlay {
    opacity: 1;
    visibility: visible;
}


/* ==========================================
   HOVER CONTENT
========================================== */

.hover-product-content {
    width: 100%;
    padding: 25px 20px 20px;

    color: #fff;

    transform: translateY(25px);

    transition: transform .35s ease;
}

.hover-product-card:hover .hover-product-content {
    transform: translateY(0);
}


.hover-product-content h3 {
    margin: 0 0 8px;

    font-size: 18px;
    font-weight: 600;

    color: #fff;
}


/* ==========================================
   PRICE
========================================== */

.hover-price {
    display: flex;
    align-items: center;

    gap: 10px;

    margin-bottom: 8px;
}

.sale-price,
.normal-price {
    font-size: 19px;
    font-weight: 700;
    color: #fff;
}

.original-price {
    font-size: 13px;
    color: rgba(255,255,255,.7);
    text-decoration: line-through;
}


/* ==========================================
   STOCK
========================================== */

.hover-stock {
    margin-bottom: 14px;

    font-size: 12px;
}

.stock-in {
    color: #72e6a0;
}

.stock-low {
    color: #ffd166;
}

.stock-out {
    color: #ff7b7b;
}


/* ==========================================
   ACTION BUTTONS
========================================== */

.hover-actions {
    display: flex;
    align-items: center;

    gap: 8px;
}

.hover-actions form {
    margin: 0;
}

.hover-action-btn {
    width: 38px;
    height: 38px;

    border: none;
    border-radius: 50%;

    background: #fff;
    color: var(--secondary);

    display: flex;
    align-items: center;
    justify-content: center;

    text-decoration: none;

    font-size: 14px;

    cursor: pointer;

    transition: all .25s ease;
}

.hover-action-btn:hover {
    background: var(--primary);
    color: #fff;

    transform: translateY(-2px);
}

.hover-action-btn.disabled {
    opacity: .5;
    cursor: not-allowed;
}


/* ==========================================
   SALE BADGE
========================================== */

.hover-sale-badge {
    position: absolute;

    top: 14px;
    left: 14px;

    z-index: 5;

    background: var(--primary);
    color: #fff;

    padding: 5px 10px;

    border-radius: 5px;

    font-size: 11px;
    font-weight: 600;
}


/* ==========================================
   OUT OF STOCK
========================================== */

.hover-stock-badge {
    position: absolute;

    top: 48px;
    left: 14px;

    z-index: 5;

    background: #dc3545;
    color: #fff;

    padding: 5px 9px;

    border-radius: 5px;

    font-size: 10px;
    font-weight: 600;
}


/* ==========================================
   WISHLIST
========================================== */

.hover-wishlist {
    position: absolute;

    top: 14px;
    right: 14px;

    z-index: 10;

    width: 35px;
    height: 35px;

    border: none;
    border-radius: 50%;

    background: #fff;

    color: var(--secondary);

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    box-shadow: 0 3px 10px rgba(0,0,0,.12);

    transition: all .25s ease;
}

.hover-wishlist:hover {
    color: var(--primary);
    transform: scale(1.1);
}


/* ==========================================
   FOOTER
========================================== */

.hover-product-footer {
    padding: 14px 15px;
}

.hover-product-footer h5 {
    margin: 0 0 6px;

    font-size: 15px;
    font-weight: 600;

    line-height: 1.4;
}

.hover-product-footer h5 a {
    color: var(--secondary);
    text-decoration: none;

    transition: .25s;
}

.hover-product-footer h5 a:hover {
    color: var(--primary);
}


/* ==========================================
   FOOTER PRICE
========================================== */

.footer-price {
    display: flex;
    align-items: center;

    gap: 8px;
}

.footer-price span {
    font-size: 16px;
    font-weight: 700;

    color: var(--primary);
}

.footer-price del {
    font-size: 12px;
    color: #999;
}


/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 991px) {

    .hover-product-image {
        height: 250px;
    }

}


@media (max-width: 767px) {

    .hover-product-image {
        height: 230px;
    }

    .hover-product-content {
        padding: 20px 15px 15px;
    }

    .hover-product-content h3 {
        font-size: 16px;
    }

}


@media (max-width: 576px) {

    .hover-product-image {
        height: 200px;
    }

    .hover-product-footer {
        padding: 12px;
    }

    .hover-product-footer h5 {
        font-size: 14px;
    }

}
</style>


@endsection
