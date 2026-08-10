@extends('admin.partials.layout')

@section('content')

<div class="container-fluid py-4">

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">Edit Product</h3>
        <p class="text-muted mb-0">
            Update {{ $product->title }} details
        </p>
    </div>

    <a href="{{ route('products.index') }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Back
    </a>

</div>


@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Please fix the following errors:</strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<form action="{{ route('products.update', $product->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')


    <!-- =========================
         BASIC INFORMATION
    ========================== -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Product Information
            </h5>

        </div>


        <div class="card-body">

            <div class="row">

                <!-- Product Name -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $product->title) }}"
                        required
                    >

                </div>


                <!-- SKU -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        SKU
                    </label>

                    <input
                        type="text"
                        name="sku"
                        class="form-control"
                        value="{{ old('sku', $product->sku) }}"
                        required
                    >

                </div>


                <!-- Price -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Price
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            Rs
                        </span>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            class="form-control"
                            value="{{ old('price', $product->price) }}"
                            required
                        >

                    </div>

                </div>


                <!-- Sale Price -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Sale Price
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            Rs
                        </span>

                        <input
                            type="number"
                            step="0.01"
                            name="sale_price"
                            class="form-control"
                            value="{{ old('sale_price', $product->sale_price) }}"
                        >

                    </div>

                </div>


                <!-- Stock -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        value="{{ old('stock', $product->stock) }}"
                        required
                    >

                </div>


                <!-- Category -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Brand -->
                {{-- <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Brand
                    </label>

                    <select
                        name="brand_id"
                        class="form-select"
                    >

                        <option value="">
                            Select Brand
                        </option>

                        {{-- 
                        @foreach($brands as $brand)

                            <option
                                value="{{ $brand->id }}"
                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}
                            >
                                {{ $brand->name }}
                            </option>

                        @endforeach
                        --}}

                    </select>

                </div> --}}

            </div>

        </div>

    </div>


    <!-- =========================
         EYEWEAR DETAILS
    ========================== -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Eyewear Details
            </h5>

        </div>


        <div class="card-body">

            <div class="row">

                <!-- Frame -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Frame
                    </label>

                    <select
                        name="frame"
                        class="form-select"
                    >

                        <option value="">
                            Select Frame
                        </option>

                        <option value="Full Rim"
                            {{ old('frame', $product->frame) == 'Full Rim' ? 'selected' : '' }}>
                            Full Rim
                        </option>

                        <option value="Half Rim"
                            {{ old('frame', $product->frame) == 'Half Rim' ? 'selected' : '' }}>
                            Half Rim
                        </option>

                        <option value="Rimless"
                            {{ old('frame', $product->frame) == 'Rimless' ? 'selected' : '' }}>
                            Rimless
                        </option>

                    </select>

                </div>


                <!-- Lens -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Lens
                    </label>

                    <select
                        name="lens"
                        class="form-select"
                    >

                        <option value="">
                            Select Lens
                        </option>

                        <option value="Single Vision"
                            {{ old('lens', $product->lens) == 'Single Vision' ? 'selected' : '' }}>
                            Single Vision
                        </option>

                        <option value="Blue Cut"
                            {{ old('lens', $product->lens) == 'Blue Cut' ? 'selected' : '' }}>
                            Blue Cut
                        </option>

                        <option value="Progressive"
                            {{ old('lens', $product->lens) == 'Progressive' ? 'selected' : '' }}>
                            Progressive
                        </option>

                        <option value="Sunglasses"
                            {{ old('lens', $product->lens) == 'Sunglasses' ? 'selected' : '' }}>
                            Sunglasses
                        </option>

                        <option value="No Power"
                            {{ old('lens', $product->lens) == 'No Power' ? 'selected' : '' }}>
                            No Power
                        </option>

                    </select>

                </div>


                <!-- Gender -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Gender
                    </label>

                    <select
                        name="gender"
                        class="form-select"
                    >

                        <option value="">
                            Select Gender
                        </option>

                        <option value="Men"
                            {{ old('gender', $product->gender) == 'Men' ? 'selected' : '' }}>
                            Men
                        </option>

                        <option value="Women"
                            {{ old('gender', $product->gender) == 'Women' ? 'selected' : '' }}>
                            Women
                        </option>

                        <option value="Unisex"
                            {{ old('gender', $product->gender) == 'Unisex' ? 'selected' : '' }}>
                            Unisex
                        </option>

                        <option value="Kids"
                            {{ old('gender', $product->gender) == 'Kids' ? 'selected' : '' }}>
                            Kids
                        </option>

                    </select>

                </div>


                <!-- On Sale -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold d-block">
                        Sale Status
                    </label>

                    <div class="form-check form-switch mt-2">

                        <input
                            type="checkbox"
                            name="on_sale"
                            value="1"
                            class="form-check-input"
                            id="on_sale"
                            {{ old('on_sale', $product->on_sale) ? 'checked' : '' }}
                        >

                        <label
                            class="form-check-label"
                            for="on_sale"
                        >
                            Product is on sale
                        </label>

                    </div>

                </div>


                <!-- Featured -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Featured Product
                    </label>

                    <select
                        name="featured"
                        class="form-select"
                    >

                        <option value="1"
                            {{ old('featured', $product->featured) == 1 ? 'selected' : '' }}>
                            Yes
                        </option>

                        <option value="0"
                            {{ old('featured', $product->featured) == 0 ? 'selected' : '' }}>
                            No
                        </option>

                    </select>

                </div>


                <!-- Status -->
                <div class="col-md-4 mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="1"
                            {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================
         DESCRIPTION
    ========================== -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Description
            </h5>

        </div>

        <div class="card-body">

            <textarea
                name="description"
                rows="6"
                class="form-control"
                required
            >{{ old('description', $product->description) }}</textarea>

        </div>

    </div>


    <!-- =========================
         PRODUCT IMAGES
    ========================== -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Product Images
            </h5>

        </div>


        <div class="card-body">

            <!-- Current Images -->

            <label class="form-label fw-semibold">
                Current Images
            </label>

            <div class="d-flex flex-wrap gap-3 mb-4">

                @php
                    $images = json_decode($product->image, true);
                @endphp


                @if($images)

                    @foreach($images as $image)

                        <div class="border rounded-3 p-1">

                            <img
                                src="{{ asset('storage/' . $image) }}"
                                width="120"
                                height="120"
                                class="rounded-2"
                                style="object-fit:cover;"
                                alt="{{ $product->title }}"
                            >

                        </div>

                    @endforeach

                @else

                    <p class="text-muted mb-0">
                        No images available.
                    </p>

                @endif

            </div>


            <!-- Upload New Images -->

            <label class="form-label fw-semibold">
                Upload New Images
            </label>

            <input
                type="file"
                name="image[]"
                class="form-control"
                multiple
            >

            <small class="text-muted">
                Leave empty if you don't want to change the current images.
            </small>

        </div>

    </div>


    <!-- Buttons -->

    <div class="d-flex justify-content-end gap-2">

        <a
            href="{{ route('products.index') }}"
            class="btn btn-light border"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="btn btn-primary px-4"
        >
            <i class="bi bi-check-lg me-1"></i>
            Update Product
        </button>

    </div>

</form>


</div>

@endsection
