<div class="row g-4">

    @foreach ($products as $product)

        @php
            $images = json_decode($product->image, true);
            $firstImage = $images[0] ?? 'default-product.jpg';

            $isOnSale = $product->on_sale && $product->sale_price;

            $outOfStock = $product->stock <= 0;
        @endphp

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">

            <div class="hover-product-card">

                {{-- ================= IMAGE ================= --}}
                <div class="hover-product-image">

                    <a href="{{ route('product.show',  $product->slug) }}">

                        <img
                            src="{{ asset('/storage/app/public/' . $firstImage) }}"
                            alt="{{ $product->title }}"
                        >

                    </a>


                    {{-- SALE --}}
                    @if ($isOnSale)

                        <span class="hover-sale-badge">
                            <i class="fas fa-fire"></i>
                            Sale
                        </span>

                    @endif


                    {{-- OUT OF STOCK --}}
                    @if ($outOfStock)

                        <span class="hover-stock-badge">
                            Out of Stock
                        </span>

                    @endif


                    {{-- WISHLIST --}}
                    <button
                        class="hover-wishlist"
                        data-product="{{ $product->id }}"
                    >

                        <i class="far fa-heart"></i>

                    </button>


                    {{-- ================= HOVER DETAILS ================= --}}
                    <div class="hover-product-overlay">

                        <div class="hover-product-content">

                            {{-- Product Name --}}

                            <h3>
                                {{ Str::limit($product->title, 35) }}
                            </h3>


                            {{-- Price --}}

                            <div class="hover-price">

                                @if ($isOnSale)

                                    <span class="sale-price">
                                        Rs {{ number_format($product->sale_price) }}
                                    </span>

                                    <span class="original-price">
                                        Rs {{ number_format($product->price) }}
                                    </span>

                                @else

                                    <span class="normal-price">
                                        Rs {{ number_format($product->sale_price) }}
                                    </span>

                                    <del class="text-danger">
                                        Rs {{ number_format($product->price) }}
                                    </del>
                                @endif

                            </div>


                            {{-- Stock --}}

                            <div class="hover-stock">

                                @if ($outOfStock)

                                    <span class="stock-out">
                                        <i class="fas fa-times-circle"></i>
                                        Out of Stock
                                    </span>

                                @elseif ($product->stock <= 5)

                                    <span class="stock-low">
                                        <i class="fas fa-exclamation-circle"></i>
                                        Only {{ $product->stock }} left
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

                                {{-- VIEW --}}

                                <a
                                    href="{{ route('product.show',  $product->slug) }}"
                                    class="hover-action-btn"
                                    title="View Product"
                                >

                                    <i class="far fa-eye"></i>

                                </a>


                                {{-- CART --}}

                                @if (!$outOfStock)

                                    <form
                                        action="{{ route('cart.add', $product->slug) }}"
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

                    <h5>

                        <a href="{{ route('product.show',  $product->slug) }}">

                            {{ Str::limit($product->title, 40) }}

                        </a>

                    </h5>


                    <div class="footer-price">

                        @if ($isOnSale)

                            <span>
                                Rs {{ number_format($product->sale_price) }}
                            </span>

                            <del>
                                Rs {{ number_format($product->price) }}
                            </del>

                        @else

                            <span>
                                Rs {{ number_format($product->sale_price) }}
                            </span>
                            <del class="text-danger">
                                Rs {{ number_format($product->price) }}
                            </del>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

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