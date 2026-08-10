@extends('user.partials.layout')
@section('content')


<div style="padding-top: 60px" class="container mt-5 ">
    <div  class="card shadow-sm">
        @if ($product->image)
            <img src="{{ asset('/public/storage/' . $product->image) }}" class="card-img-top" alt="Product Image" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h2 class="card-title">{{ $product->title }}</h2>
            <p class="card-text">{{ $product->description }}</p>
            <h4 class="text-success">Price: €{{ $product->price }}</h4>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('menu.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('menu.create') }}" method="get">
                    {{-- @csrf --}}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
