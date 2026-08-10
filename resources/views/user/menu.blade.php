@extends('user.partials.layout')

@section('content')
<section id="menu" class="menu section mt-5">
    <div class="container section-title mt-4" data-aos="fade-up">
        <h1 class="text-center fw-bold mb-5 shop-title">Our Collection</h1>
    </div>

    <div class="container">
        {{-- <div class="row g-4">
            <!-- Sidebar (Large screens) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block">
                <div class="category-card shadow-sm p-3 rounded-4">
                    <h5 class="fw-bold mb-3 text-center text-uppercase" style="color:#5A3E2B;">Categories</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('product.index') }}" class="text-decoration-none category-link">All Products</a>
                        </li>
                        @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('product.index', ['category_id' => $category->id]) }}" class="text-decoration-none category-link">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Dropdown (Small screens) -->
            <div class="col-12 d-lg-none mb-3">
                <div class="dropdown">
                    <button class="btn btn-amber dropdown-toggle w-100" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Category
                    </button>
                    <ul class="dropdown-menu w-100 rounded-4 border-0 shadow-sm" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="{{ route('product.index') }}">All Products</a></li>
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('product.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="product-grid">
                    @include('user.partials._menu')
                </div>
            </div> --}}
            <!-- =========================================
     SHOP FILTER SYSTEM
========================================= -->

<style>
    .shop-filter-sidebar {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
        position: sticky;
        top: 110px;
    }

    .filter-title {
        color: var(--black);
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .filter-heading {
        color: var(--black);
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .filter-section {
        padding-bottom: 22px;
        margin-bottom: 22px;
        border-bottom: 1px solid var(--border);
    }

    .filter-section:last-child {
        border-bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .category-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 10px;
        margin-bottom: 3px;
        border-radius: 8px;
        color: var(--muted);
        text-decoration: none;
        font-size: 14px;
        transition: .25s ease;
    }

    .category-link:hover,
    .category-link.active {
        background: rgba(200, 165, 106, .12);
        color: var(--gold-dark);
    }

    .category-count {
        font-size: 11px;
        color: #999;
    }

    .filter-check {
        margin-bottom: 10px;
    }

    .filter-check label {
        color: var(--muted);
        font-size: 14px;
        cursor: pointer;
    }

    .filter-check .form-check-input {
        border-color: #d8c9b5;
        cursor: pointer;
    }

    .filter-check .form-check-input:checked {
        background-color: var(--gold);
        border-color: var(--gold);
    }

    .price-input {
        border: 1px solid var(--border);
        border-radius: 8px;
        font-size: 13px;
        padding: 9px 10px;
    }

    .price-input:focus {
        border-color: var(--gold);
        box-shadow: none;
    }

    .filter-btn {
        width: 100%;
        background: var(--black);
        color: #fff;
        border: 0;
        border-radius: 50px;
        padding: 11px 15px;
        font-size: 13px;
        font-weight: 600;
        transition: .3s ease;
    }

    .filter-btn:hover {
        background: var(--gold);
        color: #fff;
    }

    .clear-filter {
        display: block;
        text-align: center;
        margin-top: 10px;
        color: var(--muted);
        text-decoration: none;
        font-size: 13px;
    }

    .clear-filter:hover {
        color: var(--gold-dark);
    }

    /* Mobile Filter Button */

    .mobile-filter-btn {
        background: var(--black);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 11px 20px;
        font-size: 14px;
        font-weight: 600;
    }

    .mobile-filter-btn:hover {
        background: var(--gold);
        color: #fff;
    }

    /* Mobile Offcanvas */

    .filter-offcanvas {
        width: 320px !important;
        background: var(--cream);
    }

    .offcanvas-header {
        border-bottom: 1px solid var(--border);
    }

    .offcanvas-title {
        font-weight: 700;
        color: var(--black);
    }

    @media (max-width: 991px) {
        .shop-filter-sidebar {
            display: none;
        }
    }
</style>


<!-- =========================================
     MOBILE FILTER BUTTON
========================================= -->

<div class="d-lg-none mb-4">

    <button
        class="mobile-filter-btn"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#filterOffcanvas"
    >
        <i class="fas fa-sliders-h me-2"></i>
        Filters
    </button>

</div>


<!-- =========================================
     MOBILE FILTER OFFCANVAS
========================================= -->

<div
    class="offcanvas offcanvas-start filter-offcanvas"
    tabindex="-1"
    id="filterOffcanvas"
>

    <div class="offcanvas-header">

        <h5 class="offcanvas-title">
            <i class="fas fa-sliders-h me-2"></i>
            Filters
        </h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
        ></button>

    </div>


    <div class="offcanvas-body">

        @include('user.partials.shop-filters')

    </div>

</div>


<!-- =========================================
     DESKTOP SIDEBAR + PRODUCTS
========================================= -->

<div class="row g-4">

    <!-- DESKTOP SIDEBAR -->

    <div class="col-lg-3">

        <aside class="shop-filter-sidebar">

            @include('user.partials.shop-filters')

        </aside>

    </div>


    <!-- PRODUCTS -->

    <div class="col-lg-9">

        {{-- Your product grid here --}}

        @include('user.partials._menu')

    </div>

</div>
        </div>
    </div>
</section>
@endsection
{{-- 
@push('styles')
<style>
/* ---------- Global Colors ---------- */
:root {
    --amber: #FFB347;
    --cocoa: #5A3E2B;
    --cream: #FFF9F3;
    --sand: #EBD8C3;
    --dark-text: #3C2F2F;
}

/* ---------- Page Base ---------- */
body {
    background-color: var(--cream);
    font-family: 'Poppins', sans-serif;
    color: var(--dark-text);
}

.shop-title {
    font-size: 2.3rem;
    color: var(--cocoa);
    letter-spacing: 1px;
}

/* ---------- Category Sidebar ---------- */
.category-card {
    background-color: #fff;
    border: 1px solid var(--sand);
}

.category-link {
    color: var(--dark-text);
    display: block;
    padding: 0.5rem 0;
    transition: all 0.3s ease;
}

.category-link:hover {
    color: var(--amber);
    transform: translateX(4px);
}

/* ---------- Dropdown ---------- */
.btn-amber {
    background-color: var(--amber);
    border: none;
    color: #fff;
    font-weight: 600;
}

.btn-amber:hover {
    background-color: var(--cocoa);
    color: #fff;
}

/* ---------- Product Grid ---------- */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
    gap: 1.5rem;
}

/* ---------- Product Card (Shopify Look) ---------- */
.product-card {
    background-color: #fff;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--sand);
    box-shadow: 0 4px 8px rgba(90, 62, 43, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 18px rgba(90, 62, 43, 0.15);
}

.product-card img {
    height: 250px;
    width: 100%;
    object-fit: cover;
}

.product-card .card-body {
    padding: 1.2rem;
    text-align: center;
}

.product-card h5 {
    font-size: 1.1rem;
    color: var(--cocoa);
    margin-bottom: 5px;
    font-weight: 600;
}

.product-card .price {
    color: var(--dark-text);
    font-weight: 700;
}

.product-card .btn {
    background-color: var(--amber);
    color: #fff;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.product-card .btn:hover {
    background-color: var(--cocoa);
}

/* ---------- Wishlist Heart ---------- */
.wishlist-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background-color: #fff;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    border: none;
    color: var(--amber);
    font-size: 1.2rem;
    box-shadow: 0 3px 6px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.wishlist-btn.active {
    background-color: var(--amber);
    color: white;
}

.wishlist-btn:hover {
    background-color: var(--cocoa);
    color: white;
}
</style>
@endpush --}}
