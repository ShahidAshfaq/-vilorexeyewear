@extends('admin.partials.layout')

@section('content')

<div class="container-fluid py-4">

<!-- Header -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">{{ $product->title }}</h2>

        <div class="text-muted">
            Product Details
            <span class="mx-2">•</span>
            SKU: <strong>{{ $product->sku }}</strong>
        </div>
    </div>

    <a href="{{ route('products.index') }}"
       class="btn btn-outline-secondary mt-2 mt-md-0">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Products
    </a>

</div>


<div class="row g-4">

    <!-- =========================
         LEFT SIDE - PRODUCT IMAGES
    ========================== -->
    <div class="col-lg-5">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                @php
                    $images = json_decode($product->image, true);
                @endphp


                @if($images && count($images) > 0)

                    <!-- Main Image -->
                    <div class="bg-light rounded-3 mb-3 d-flex align-items-center justify-content-center"
                         style="height:420px;">

                        <img
                            id="mainProductImage"
                            src="{{ asset('/storage/app/public/' . $images[0]) }}"
                            class="img-fluid rounded-3"
                            style="width:100%; height:100%; object-fit:contain;"
                            alt="{{ $product->title }}"
                        >

                    </div>


                    <!-- Thumbnails -->
                    <div class="row g-2">

                        @foreach($images as $index => $image)

                            <div class="col-3">

                                <button
                                    type="button"
                                    class="border rounded-3 bg-white p-1 w-100 image-thumb"
                                    onclick="changeImage('{{ asset('/storage/app/public/' . $image) }}')"
                                >

                                    <img
                                        src="{{ asset('/storage/app/public/' . $image) }}"
                                        class="img-fluid rounded-2"
                                        style="height:80px;width:100%;object-fit:cover;"
                                        alt="{{ $product->title }}"
                                    >

                                </button>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                         style="height:420px;">

                        <div class="text-center text-muted">

                            <i class="bi bi-image fs-1"></i>

                            <p class="mt-2 mb-0">
                                No images available
                            </p>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>


    <!-- =========================
         RIGHT SIDE - PRODUCT INFO
    ========================== -->
    <div class="col-lg-7">

        <!-- Price Card -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="d-flex flex-wrap justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-1">
                            Product Price
                        </p>

                        @if($product->on_sale && $product->sale_price)

                            <div class="d-flex align-items-center gap-2">

                                <h2 class="fw-bold text-danger mb-0">
                                    Rs {{ number_format($product->sale_price) }}
                                </h2>

                                <span class="text-muted text-decoration-line-through">
                                    Rs {{ number_format($product->price) }}
                                </span>

                            </div>

                        @else

                            <h2 class="fw-bold mb-0">
                                Rs {{ number_format($product->price) }}
                            </h2>

                        @endif

                    </div>


                    <!-- Status -->
                    <div>

                        @if($product->status)

                            <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                                <i class="bi bi-check-circle me-1"></i>
                                Active
                            </span>

                        @else

                            <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2">
                                <i class="bi bi-x-circle me-1"></i>
                                Inactive
                            </span>

                        @endif

                    </div>

                </div>


                <!-- Sale Badge -->
                @if($product->on_sale)

                    <div class="mt-3">

                        <span class="badge bg-danger rounded-pill px-3 py-2">
                            <i class="bi bi-tag me-1"></i>
                            On Sale
                        </span>

                    </div>

                @endif

            </div>

        </div>


        <!-- Product Information -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white border-0 pt-4 px-4">

                <h5 class="fw-bold mb-0">
                    Product Information
                </h5>

            </div>


            <div class="card-body px-4">

                <div class="row g-3">

                    <!-- Category -->
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted d-block mb-1">
                                Category
                            </small>

                            <strong>

                                @foreach($categories as $category)

                                    @if($product->category_id == $category->id)
                                        {{ $category->name }}
                                    @endif

                                @endforeach

                            </strong>

                        </div>

                    </div>


                    <!-- SKU -->
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted d-block mb-1">
                                SKU
                            </small>

                            <strong>
                                {{ $product->sku }}
                            </strong>

                        </div>

                    </div>


                    <!-- Frame -->
                    <div class="col-md-4">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted d-block mb-1">
                                Frame
                            </small>

                            <strong>
                                {{ $product->frame ?? '-' }}
                            </strong>

                        </div>

                    </div>


                    <!-- Lens -->
                    <div class="col-md-4">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted d-block mb-1">
                                Lens
                            </small>

                            <strong>
                                {{ $product->lens ?? '-' }}
                            </strong>

                        </div>

                    </div>


                    <!-- Gender -->
                    <div class="col-md-4">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted d-block mb-1">
                                Gender
                            </small>

                            <strong>
                                {{ $product->gender ?? '-' }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Inventory & Features -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white border-0 pt-4 px-4">

                <h5 class="fw-bold mb-0">
                    Inventory & Features
                </h5>

            </div>


            <div class="card-body px-4">

                <div class="row g-3">

                    <!-- Stock -->
                    <div class="col-md-4">

                        <div class="text-center p-3 border rounded-3">

                            <div class="text-muted small">
                                Stock
                            </div>

                            <h4 class="fw-bold mb-0 mt-1">
                                {{ $product->stock }}
                            </h4>

                            @if($product->stock > 0)

                                <small class="text-success">
                                    In Stock
                                </small>

                            @else

                                <small class="text-danger">
                                    Out of Stock
                                </small>

                            @endif

                        </div>

                    </div>


                    <!-- Featured -->
                    <div class="col-md-4">

                        <div class="text-center p-3 border rounded-3">

                            <div class="text-muted small">
                                Featured
                            </div>

                            <div class="mt-2">

                                @if($product->featured)

                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-star-fill me-1"></i>
                                        Yes
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        No
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- Sale -->
                    <div class="col-md-4">

                        <div class="text-center p-3 border rounded-3">

                            <div class="text-muted small">
                                Sale
                            </div>

                            <div class="mt-2">

                                @if($product->on_sale)

                                    <span class="badge bg-danger">
                                        On Sale
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Regular
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Description -->
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 pt-4 px-4">

                <h5 class="fw-bold mb-0">
                    Description
                </h5>

            </div>

            <div class="card-body px-4">

                <p class="text-muted mb-0" style="line-height:1.8;">
                    {{ $product->description }}
                </p>

            </div>

        </div>

    </div>

</div>


</div>

<!-- Image Gallery Script -->

<script>

    function changeImage(image) {

        document.getElementById('mainProductImage').src = image;

    }

</script>

@endsection
