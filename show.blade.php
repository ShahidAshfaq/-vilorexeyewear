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

                                Rs {{ number_format($product->price) }}

                            </span>

                            @if ($product->cut_price)
                                <span class="old-price">

                                    Rs {{ number_format($product->cut_price) }}

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

                            <div>

                                <i class="fas fa-sync"></i>

                                7 Days Return

                            </div>

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


                {{-- Section Header --}}

                <div class="text-center mb-5">

                    <span class="text-uppercase small fw-semibold" style="color:var(--gold-dark);">

                        You May Also Like

                    </span>

                    <h2 class="fw-bold mt-2">
                        Related Products
                    </h2>

                    <p class="text-muted">
                        Explore more eyewear from the same collection.
                    </p>

                </div>


                {{-- Product Grid --}}

                <div class="row g-4">

                    @foreach ($relatedProducts as $related)
                        @php

                            $relatedImages = json_decode($related->image, true) ?? [];

                            $relatedImage = $relatedImages[0] ?? 'default-product.jpg';

                            $relatedOnSale = $related->on_sale && $related->sale_price;

                        @endphp


                        <div class="col-xl-3 col-lg-3 col-md-6 col-6">

                            <div class="product-card h-100 position-relative">


                                {{-- Sale Badge --}}

                                @if ($relatedOnSale)
                                    <span class="sale-badge">

                                        <i class="fas fa-fire me-1"></i>

                                        Sale

                                    </span>
                                @endif


                                {{-- Out Of Stock --}}

                                @if ($related->stock <= 0)
                                    <span class="position-absolute top-0 end-0 badge bg-danger m-2" style="z-index:5;">

                                        Out of Stock

                                    </span>
                                @endif


                                {{-- Image --}}

                                <div class="product-image-wrapper">

                                    <a href="{{ route('product.show', $related->id) }}">

                                        <img src="{{ asset('/storage/app/public/' . $relatedImage) }}" class="product-img"
                                            alt="{{ $related->title }}">

                                    </a>

                                </div>


                                {{-- Details --}}

                                <div class="product-body">

                                    {{-- Category --}}

                                    <span class="product-category">

                                        {{ $category->name ?? 'Eyewear' }}

                                    </span>


                                    {{-- Name --}}

                                    <h5>

                                        <a href="{{ route('product.show', $related->id) }}">

                                            {{ Str::limit($related->title, 35) }}

                                        </a>

                                    </h5>


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


                                    {{-- Price --}}

                                    <div class="price-area mb-3">

                                        @if ($relatedOnSale)
                                            <span class="price text-danger">

                                                Rs {{ number_format($related->sale_price) }}

                                            </span>

                                            <span class="old-price">

                                                Rs {{ number_format($related->price) }}

                                            </span>
                                        @else
                                            <span class="price">

                                                Rs {{ number_format($related->price) }}

                                            </span>
                                        @endif

                                    </div>


                                    {{-- Button --}}

                                    @if ($related->stock > 0)
                                        <a href="{{ route('product.show', $related->id) }}" class="btn btn-primary w-100">

                                            View Product

                                        </a>
                                    @else
                                        <button class="btn btn-secondary w-100" disabled>

                                            Out of Stock

                                        </button>
                                    @endif

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif


@endsection
