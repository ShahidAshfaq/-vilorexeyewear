@extends('user.partials.layout')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="mb-3">
                <img src="{{ asset('/storage/app/public/' . $product->image) }}" 
                     class="img-fluid rounded shadow-sm" 
                     style="width:100%; height:450px; object-fit:cover;">
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <h2 class="fw-bold">{{ $product->title }}</h2>
            <p class="text-muted">Category: {{ $categories->firstWhere('id',$product->category)->name ?? 'Uncategorized' }}</p>
            <div class="mb-3">
                <span class="fs-4 fw-bold text-primary">Rs. {{ number_format($product->price) }}</span>
                @if($product->cut_price > $product->price)
                    <span class="text-muted text-decoration-line-through ms-2">Rs. {{ number_format($product->cut_price) }}</span>
                @endif
            </div>
            <div class="mb-3">
                {!! $product->description !!}
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-2 mb-3">
                @csrf
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width:80px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                </button>
            </form>

            <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Back to Shop</a>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count())
    <div class="mt-5">
        <h3 class="fw-bold mb-4">Related Products</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $item)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <a href="{{ route('product.show', $item->id) }}">
                        <img src="{{ asset('/storage/app/public/' . $item->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    </a>
                    <div class="card-body text-center">
                        <h6>{{ $item->title }}</h6>
                        <p class="text-primary fw-bold mb-0">Rs. {{ number_format($item->price) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
