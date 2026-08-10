@extends('user.partials.layout')

@section('content')
<section id="menu" class="menu section mt-5">
    <div class="container section-title mt-4" data-aos="fade-up">
        <h1 class="text-center fw-bold mb-5 shop-title">Our Collection</h1>
    </div>

    <div class="container">
        <div class="row g-4">
            <!-- Sidebar (Large screens) -->
            <!-- =========================================
     SHOP FILTER SYSTEM
========================================= -->



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
        @if ($products->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
@endif
    </div>

</div>
        </div>
    </div>
</section>
@endsection
