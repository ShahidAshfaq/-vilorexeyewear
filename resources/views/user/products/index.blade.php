@extends('user.partials.layout')

@section('content')

<section id="menu" class="menu section mt-5 mb-5">

    {{-- PAGE TITLE --}}
    <div class="container section-title mt-4" data-aos="fade-up">

        <h1 class="text-center fw-bold mb-5 shop-title">
            Our Collection
        </h1>

    </div>


    <div class="container">

        {{-- MOBILE FILTER BUTTON --}}
        <div class="d-lg-none mb-4">

            <button
                class="mobile-filter-btn"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#filterOffcanvas">

                <i class="fas fa-sliders-h me-2"></i>
                Filters

            </button>

        </div>


        {{-- MOBILE FILTER --}}
        <div
            class="offcanvas offcanvas-start filter-offcanvas"
            tabindex="-1"
            id="filterOffcanvas">

            <div class="offcanvas-header">

                <h5 class="offcanvas-title">

                    <i class="fas fa-sliders-h me-2"></i>
                    Filters

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas">
                </button>

            </div>

            <div class="offcanvas-body">

                @include('user.partials.shop-filters')

            </div>

        </div>


        {{-- SHOP LAYOUT --}}
        <div class="row g-4 align-items-start">


            {{-- ================= DESKTOP FILTER ================= --}}
            <div class="col-lg-3">

                <aside class="shop-filter-sidebar">

                    @include('user.partials.shop-filters')

                </aside>

            </div>


            {{-- ================= PRODUCTS ================= --}}
            <div class="col-lg-9">

                <div class="products-container">

                    @include('user.partials._menu')

                </div>


                {{-- PAGINATION --}}
                @if ($products->hasPages())

                    <div class="d-fle justify-content-cente mt-5">

                        {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
                        {{ $products->links('pagination') }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


<style>

/* =========================================
   PRODUCTS CONTAINER
========================================= */

.products-container {
    width: 100%;
}


/* =========================================
   PRODUCT GRID
========================================= */

.products-container .row {
    justify-content: center;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 991px) {

    .products-container {
        width: 100%;
    }

}

</style>

@endsection