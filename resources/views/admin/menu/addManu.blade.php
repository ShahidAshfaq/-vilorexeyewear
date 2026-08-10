@extends('admin.partials.layout')

@section('content')

<div class="card">

<div class="card-header">
    <h3>Add Product</h3>
</div>

<div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <!-- Product Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Product Name</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    required
                >
            </div>


            <!-- SKU -->
            <div class="col-md-6 mb-3">
                <label class="form-label">SKU</label>

                <input
                    type="text"
                    name="sku"
                    class="form-control"
                    placeholder="RB-1001"
                    value="{{ old('sku') }}"
                    required
                >
            </div>


            <!-- Price -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"
                    value="{{ old('price') }}"
                    required
                >
            </div>


            <!-- Sale Price -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Sale Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="sale_price"
                    class="form-control"
                    value="{{ old('sale_price') }}"
                >
            </div>


            <!-- Stock -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Stock</label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock', 0) }}"
                    required
                >
            </div>


            <!-- Category -->
            <div class="col-md-12 mb-3">

                <label class="form-label">Category</label>

                <select name="category_id" class="form-select" required>

                    <option value="">Select Category</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Brand -->
            {{-- <div class="col-md-6 mb-3">

                <label class="form-label">Brand</label>

                <select name="brand_id" class="form-select">

                    <option value="">Select Brand</option>

                    
                    @foreach($brands as $brand)

                        <option
                            value="{{ $brand->id }}"
                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}
                        >
                            {{ $brand->name }}
                        </option>

                    @endforeach
                   

                </select>

            </div> --}}


            <!-- Frame -->
            <div class="col-md-4 mb-3">

                <label class="form-label">Frame</label>

                <select name="frame" class="form-select">

                    <option value="">Select Frame</option>

                    <option value="Full Rim"
                        {{ old('frame') == 'Full Rim' ? 'selected' : '' }}>
                        Full Rim
                    </option>

                    <option value="Half Rim"
                        {{ old('frame') == 'Half Rim' ? 'selected' : '' }}>
                        Half Rim
                    </option>

                    <option value="Rimless"
                        {{ old('frame') == 'Rimless' ? 'selected' : '' }}>
                        Rimless
                    </option>

                </select>

            </div>


            <!-- Lens -->
            <div class="col-md-4 mb-3">

                <label class="form-label">Lens</label>

                <select name="lens" class="form-select">

                    <option value="">Select Lens</option>

                    <option value="Single Vision"
                        {{ old('lens') == 'Single Vision' ? 'selected' : '' }}>
                        Single Vision
                    </option>

                    <option value="Blue Cut"
                        {{ old('lens') == 'Blue Cut' ? 'selected' : '' }}>
                        Blue Cut
                    </option>

                    <option value="Progressive"
                        {{ old('lens') == 'Progressive' ? 'selected' : '' }}>
                        Progressive
                    </option>

                    <option value="Sunglasses"
                        {{ old('lens') == 'Sunglasses' ? 'selected' : '' }}>
                        Sunglasses
                    </option>

                    <option value="No Power"
                        {{ old('lens') == 'No Power' ? 'selected' : '' }}>
                        No Power
                    </option>

                </select>

            </div>


            <!-- Gender -->
            <div class="col-md-4 mb-3">

                <label class="form-label">Gender</label>

                <select name="gender" class="form-select">

                    <option value="">Select Gender</option>

                    <option value="Men"
                        {{ old('gender') == 'Men' ? 'selected' : '' }}>
                        Men
                    </option>

                    <option value="Women"
                        {{ old('gender') == 'Women' ? 'selected' : '' }}>
                        Women
                    </option>

                    <option value="Unisex"
                        {{ old('gender') == 'Unisex' ? 'selected' : '' }}>
                        Unisex
                    </option>

                    <option value="Kids"
                        {{ old('gender') == 'Kids' ? 'selected' : '' }}>
                        Kids
                    </option>

                </select>

            </div>


            <!-- On Sale -->
            <div class="col-md-4 mb-3">

                <label class="form-label d-block">
                    On Sale
                </label>

                <div class="form-check form-switch">

                    <input
                        type="checkbox"
                        name="on_sale"
                        value="1"
                        class="form-check-input"
                        id="on_sale"
                        {{ old('on_sale') ? 'checked' : '' }}
                    >

                    <label class="form-check-label" for="on_sale">
                        This product is on sale
                    </label>

                </div>

            </div>


            <!-- Featured -->
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Featured Product
                </label>

                <select name="featured" class="form-select">

                    <option value="0"
                        {{ old('featured', 0) == 0 ? 'selected' : '' }}>
                        No
                    </option>

                    <option value="1"
                        {{ old('featured') == 1 ? 'selected' : '' }}>
                        Yes
                    </option>

                </select>

            </div>


            <!-- Status -->
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Status
                </label>

                <select name="status" class="form-select">

                    <option value="1"
                        {{ old('status', 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>


            <!-- Description -->
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                    required
                >{{ old('description') }}</textarea>

            </div>


            <!-- Images -->
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Product Images
                </label>

                <input
                    type="file"
                    name="image[]"
                    class="form-control"
                    multiple
                >

                <small class="text-muted">
                    You can select multiple images.
                </small>

            </div>

        </div>


        <!-- Submit -->
        <button type="submit" class="btn btn-primary">
            Save Product
        </button>

    </form>

</div>


</div>

@endsection
