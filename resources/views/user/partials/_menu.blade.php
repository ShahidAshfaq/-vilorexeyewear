<div class="row g-4">

    @foreach ($products as $product)
        @php
            $images = json_decode($product->image, true);
            $firstImage = $images[0] ?? 'default-product.jpg';

            // Category
            $categoryName = $categories->firstWhere('id', $product->category_id)?->name;

            // Sale
            $isOnSale = $product->on_sale && $product->sale_price;

            // Stock
            $outOfStock = $product->stock <= 0;
        @endphp


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">

            <div class="product-card position-relative">


                {{-- ==========================================
                 SALE BADGE
            =========================================== --}}

                @if ($isOnSale)
                    <span class="sale-badge">

                        <i class="fas fa-fire me-1"></i>

                        Sale

                    </span>
                @endif


                {{-- ==========================================
                 OUT OF STOCK BADGE
            =========================================== --}}

                @if ($outOfStock)
                    <span class="stock-badge position-absolute"
                        style="
                        top: 45px;
                        left: 15px;
                        z-index: 5;
                        background:#dc3545;
                        color:white;
                        padding:5px 10px;
                        border-radius:4px;
                        font-size:12px;
                    ">

                        Out of Stock

                    </span>
                @endif


                {{-- ==========================================
                 WISHLIST
            =========================================== --}}

                <button class="wishlist-btn" data-product="{{ $product->id }}">

                    <i class="far fa-heart"></i>

                </button>


                {{-- ==========================================
                 PRODUCT IMAGE
            =========================================== --}}

                <div class="product-image-wrapper">

                    <a href="{{ route('product.show', $product->id) }}">

                        <img src="{{ asset('/storage/app/public/' . $firstImage) }}" class="product-img"
                            alt="{{ $product->title }}">

                    </a>


                    {{-- Hover Actions --}}

                    <div class="product-actions">

                        {{-- View --}}

                        <a href="{{ route('product.show', $product->id) }}" class="action-btn" title="View Product">

                            <i class="far fa-eye"></i>

                        </a>


                        {{-- Add To Cart --}}

                        @if (!$outOfStock)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">

                                @csrf

                                <input type="hidden" name="quantity" value="1">

                                <button type="submit" class="action-btn"
                                    style="
                                    border:none;
                                    background:none;
                                    padding:0;
                                "
                                    title="Add to Cart">

                                    <i class="fas fa-shopping-bag"></i>

                                </button>

                            </form>
                        @else
                            <button type="button" class="action-btn" disabled
                                style="
                                border:none;
                                background:none;
                                padding:0;
                                opacity:.5;
                            "
                                title="Out of Stock">

                                <i class="fas fa-ban"></i>

                            </button>
                        @endif

                    </div>

                </div>


                {{-- ==========================================
                 PRODUCT INFO
            =========================================== --}}

                <div class="product-body">


                    {{-- Category --}}

                    @if ($categoryName)
                        <span class="product-category">

                            <i class="fas fa-glasses me-1"></i>

                            {{ $categoryName }}

                        </span>
                    @else
                        <span class="product-category">
                            Eyewear
                        </span>
                    @endif


                    {{-- Product Name --}}

                    <h5>

                        <a href="{{ route('product.show', $product->id) }}">

                            {{ Str::limit($product->title, 40) }}

                        </a>

                    </h5>


                    {{-- ======================================
                     PRODUCT ATTRIBUTES
                ======================================= --}}

                    <div class="product-meta mb-2">

                        @if ($product->frame)
                            <span class="badge bg-light text-dark border">

                                {{ $product->frame }}

                            </span>
                        @endif


                        @if ($product->lens)
                            <span class="badge bg-light text-dark border">

                                {{ $product->lens }}

                            </span>
                        @endif


                        @if ($product->gender)
                            <span class="badge bg-light text-dark border">

                                {{ $product->gender }}

                            </span>
                        @endif

                    </div>


                    {{-- ======================================
                     RATING
                ======================================= --}}

                    <div class="rating">

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star-half-alt"></i>

                        <span>(24)</span>

                    </div>


                    {{-- ======================================
                     PRICE
                ======================================= --}}

                    <div class="price-area">


                        @if ($isOnSale)
                            {{-- Sale Price --}}

                            <span class="price text-danger">

                                Rs {{ number_format($product->sale_price) }}

                            </span>


                            {{-- Original Price --}}

                            <span class="old-price">

                                Rs {{ number_format($product->price) }}

                            </span>
                        @else
                            {{-- Normal Price --}}

                            <span class="price">

                                Rs {{ number_format($product->price) }}

                            </span>
                        @endif

                    </div>


                    {{-- ======================================
                     STOCK
                ======================================= --}}

                    <div class="mb-2">

                        @if ($outOfStock)
                            <small class="text-danger fw-semibold">

                                <i class="fas fa-times-circle me-1"></i>

                                Out of Stock

                            </small>
                        @elseif ($product->stock <= 5)
                            <small class="text-warning fw-semibold">

                                <i class="fas fa-exclamation-circle me-1"></i>

                                Only {{ $product->stock }} left

                            </small>
                        @else
                            <small class="text-success">

                                <i class="fas fa-check-circle me-1"></i>

                                In Stock

                            </small>
                        @endif

                    </div>


                    {{-- ======================================
                     ADD TO CART BUTTON
                ======================================= --}}

                    @if ($outOfStock)
                        <button type="button" class="btn btn-secondary w-100" disabled>

                            <i class="fas fa-times-circle me-2"></i>

                            Out of Stock

                        </button>
                    @else
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">

                            @csrf

                            <input type="hidden" name="quantity" value="1">

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="fas fa-shopping-cart me-2"></i>

                                Add to Cart

                            </button>

                        </form>
                    @endif

                </div>

            </div>

        </div>
        
    @endforeach
</div>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">

            <div class="modal-header border-0">
                <h5 class="modal-title">Product Details</h5>

                <button class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div id="quickViewContent">

                    <div class="text-center py-5">

                        <div class="spinner-border text-warning"></div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
