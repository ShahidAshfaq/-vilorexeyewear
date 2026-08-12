@extends('admin.partials.layout')

@section('content')

<div class="container-fluid py-4">


<!-- Header -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">Products</h3>
        <p class="text-muted mb-0">
            Manage your eyewear products
        </p>
    </div>

    <a href="{{ route('products.create') }}"
       class="btn btn-primary mt-2 mt-md-0">

        <i class="bi bi-plus-circle me-1"></i>
        Add Product

    </a>

</div>


<!-- Success Message -->
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


<!-- Product Card -->
<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">

                    <tr>

                        <th class="px-3">Image</th>

                        <th>Product</th>

                        <th>SKU</th>

                        <th>Category</th>

                        <th>Frame</th>

                        <th>Lens</th>

                        <th>Gender</th>

                        <th>Price</th>

                        <th>Sale</th>

                        <th>Stock</th>

                        <th>Status</th>

                        <th width="190">Action</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($products as $product)

                    <tr>

                        <!-- Image -->
                        <td class="px-3">

                            @php
                                $images = json_decode($product->image, true);
                            @endphp

                            @if(!empty($images))

                                <img
                                    src="{{ asset('/storage/app/public/' . $images[0]) }}"
                                    width="65"
                                    height="65"
                                    class="rounded-3 border"
                                    style="object-fit:cover;"
                                    alt="{{ $product->title }}"
                                >

                            @else

                                <div
                                    class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                    style="width:65px;height:65px;"
                                >
                                    <i class="bi bi-image text-muted fs-4"></i>
                                </div>

                            @endif

                        </td>


                        <!-- Product -->
                        <td>

                            <div class="fw-semibold">
                                {{ $product->title }}
                            </div>

                            @if($product->on_sale)

                                <span class="badge bg-danger-subtle text-danger mt-1">
                                    <i class="bi bi-tag me-1"></i>
                                    On Sale
                                </span>

                            @endif

                        </td>


                        <!-- SKU -->
                        <td>

                            <span class="text-muted">
                                {{ $product->sku }}
                            </span>

                        </td>


                        <!-- Category -->
                        <td>

                            @foreach($categories as $category)

                                @if($product->category_id == $category->id)

                                    <span class="badge bg-light text-dark border">
                                        {{ $category->name }}
                                    </span>

                                @endif

                            @endforeach

                        </td>


                        <!-- Frame -->
                        <td>

                            @if($product->frame)

                                <span class="badge bg-light text-dark border">
                                    {{ $product->frame }}
                                </span>

                            @else

                                <span class="text-muted">-</span>

                            @endif

                        </td>


                        <!-- Lens -->
                        <td>

                            @if($product->lens)

                                <span class="badge bg-light text-dark border">
                                    {{ $product->lens }}
                                </span>

                            @else

                                <span class="text-muted">-</span>

                            @endif

                        </td>


                        <!-- Gender -->
                        <td>

                            @if($product->gender)

                                {{ $product->gender }}

                            @else

                                <span class="text-muted">-</span>

                            @endif

                        </td>


                        <!-- Price -->
                        <td>

                            @if($product->on_sale && $product->sale_price)

                                <div class="fw-bold text-danger">
                                    Rs {{ number_format($product->sale_price) }}
                                </div>

                                <small class="text-muted text-decoration-line-through">
                                    Rs {{ number_format($product->price) }}
                                </small>

                            @else

                                <span class="fw-semibold">
                                    Rs {{ number_format($product->price) }}
                                </span>

                            @endif

                        </td>


                        <!-- Sale -->
                        <td>

                            @if($product->on_sale)

                                <span class="badge bg-danger">
                                    Yes
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    No
                                </span>

                            @endif

                        </td>


                        <!-- Stock -->
                        <td>

                            @if($product->stock > 10)

                                <span class="badge bg-success">
                                    {{ $product->stock }}
                                </span>

                            @elseif($product->stock > 0)

                                <span class="badge bg-warning text-dark">
                                    {{ $product->stock }}
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Out
                                </span>

                            @endif

                        </td>


                        <!-- Status -->
                        <td>

                            @if($product->status)

                                <span class="badge bg-success-subtle text-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary-subtle text-secondary">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <!-- Actions -->
                        <td>

                            <div class="d-flex gap-1">

                                <!-- View -->
                                <a
                                    href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-sm btn-outline-info"
                                    title="View Product"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <!-- Edit -->
                                <a
                                    href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-sm btn-outline-warning"
                                    title="Edit Product"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <!-- Delete -->
                                <form
                                    action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete Product"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="12" class="text-center py-5">

                            <div class="text-muted">

                                <i class="bi bi-box-seam fs-1 d-block mb-3"></i>

                                <h5>No Products Found</h5>

                                <p class="mb-3">
                                    Start by adding your first eyewear product.
                                </p>

                                <a
                                    href="{{ route('products.create') }}"
                                    class="btn btn-primary"
                                >
                                    <i class="bi bi-plus-circle me-1"></i>
                                    Add Product
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

@endsection
