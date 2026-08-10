@extends('user.partials.layout')

@section('content')
<style>
/* 🌟 Modern Product Page Styles */
.product-page {
    margin-top: 100px;
    padding: 40px 0;
}
.gallery {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.gallery-main img {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
.gallery-thumbs {
    display: flex;
    gap: 10px;
    margin-top: 12px;
    flex-wrap: wrap;
    justify-content: center;
}
.gallery-thumbs img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s, opacity 0.3s;
}
.gallery-thumbs img:hover {
    transform: scale(1.1);
    opacity: 0.8;
}
.product-info h2 {
    font-weight: 700;
}
.price-box {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 15px 0;
}
.price-box .price {
    font-size: 1.8rem;
    color: #007bff;
    font-weight: bold;
}
.price-box .cut-price {
    text-decoration: line-through;
    color: #888;
}
.product-description {
    background: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    margin-top: 25px;
}
.product-description h4 {
    font-weight: 600;
}
.related-section h3 {
    font-weight: 700;
    margin-bottom: 30px;
}
.related-card {
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
    border-radius: 12px;
    overflow: hidden;
}
.related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}
.related-card img {
    height: 250px;
    object-fit: cover;
    width: 100%;
}
.btn-primary {
    background-color: #007bff;
    border: none;
    transition: background 0.3s;
}
.btn-primary:hover {
    background-color: #0056b3;
}
@media (max-width: 768px) {
    .product-info {
        margin-top: 20px;
        text-align: center;
    }
}
</style>

<section class="product-page">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Left: Gallery -->
            <div class="col-lg-6">
                <div class="gallery">
                    @php
                        $images = is_array(json_decode($product->image)) ? json_decode($product->image) : [$product->image];
                    @endphp
                    <div class="gallery-main">
                        <img id="mainImage" src="{{ asset('/storage/app/public/' . $images[0]) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="gallery-thumbs">
                        @foreach($images as $img)
                            <img src="{{ asset('/storage/app/public/' . $img) }}" onclick="document.getElementById('mainImage').src=this.src;">
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right: Product Info -->
            <div class="col-lg-6 product-info">
                <h2>{{ $product->title }}</h2>
                <p class="text-muted">
                    Category: <strong>{{ $categories->firstWhere('id', $product->category)->name ?? 'Uncategorized' }}</strong>
                </p>
                <div class="price-box">
                    <span class="price">Rs. {{ number_format($product->price) }}</span>
                    @if($product->cut_price > $product->price)
                        <span class="cut-price">Rs. {{ number_format($product->cut_price) }}</span>
                    @endif
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    <span class="ms-2 text-muted">(4.5/5)</span>
                </div>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="d-flex gap-3 flex-wrap">
                        <input type="number" name="quantity" value="1" min="1" max="5" class="form-control w-auto">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                            <i class="fas fa-cart-plus me-2"></i>Add to Cart
                        </button>
                        <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                            <i class="fas fa-arrow-left me-2"></i>Back
                        </a>
                    </div>
                </form>

                <div class="product-description mt-4">
                    <h4>Description</h4>
                    <p class="text-secondary">{!! $product->description !!}</p>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="related-section mt-5">
            <h3 class="text-center">You May Also Like</h3>
            <div class="row g-4 mt-4">
                @foreach($relatedProducts as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="card related-card">
                        <a href="{{ route('product.show', $item->id) }}">
                            <img src="{{ asset('/storage/app/public/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="fw-semibold mb-1">{{ $item->title }}</h6>
                            <p class="text-muted small mb-2">{{ $categories->firstWhere('id', $item->category)->name ?? 'Uncategorized' }}</p>
                            <p class="fw-bold text-primary mb-0">Rs. {{ number_format($item->price) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection





