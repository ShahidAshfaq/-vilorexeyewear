@extends('user.partials.layout')
@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Checkout</h2>

        <div class="row g-4">
            <!-- Left Side: Billing Form -->
            <div class="col-lg-7">
                <div class="shadow-sm bg-white rounded-4 border p-4">
                    <h4 class="mb-3 fw-bold">Billing Information</h4>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', Auth::user()->name ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', Auth::user()->email ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Payment Method</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" value="cod" checked>

                                <label class="form-check-label">
                                    Cash on Delivery
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold shadow-sm rounded-pill">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>

        

           <div class="col-lg-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <h4 class="fw-bold mb-4">Order Summary</h4>

            @if(isset($cartItems) && $cartItems->count())

                <ul class="list-group list-group-flush mb-4">

                   @foreach($cartItems as $item)

    @php
        $product = $item->product;

        $name = $product->title ?? 'Product';
        $price = $product->price ?? 0;
        $quantity = $item->quantity;

        // Decode JSON images
        $images = json_decode($product->image ?? '[]', true);

        // Get first image
        $image = $images[0] ?? null;
    @endphp

    <li class="list-group-item px-0">

        <div class="d-flex align-items-center">

            @if($image)
                <img src="{{ asset('/storage/app/public/' . $image) }}"
                     alt="{{ $name }}"
                     class="rounded me-3"
                     width="30"
                     height="60"
                     style="object-fit: cover;">
            @else
                <img src="{{ asset('user/assets/img/default.png') }}"
                     alt="Default"
                     class="rounded me-3"
                     width="60"
                     height="60"
                     style="object-fit: cover;">
            @endif

            <div class="flex-grow-1">

                <h6 class="mb-1">
                    {{ $name }}
                </h6>

                <small class="text-muted">
                    {{ $quantity }} × Rs. {{ number_format($price) }}
                </small>

            </div>

            <strong>
                Rs. {{ number_format($price * $quantity) }}
            </strong>

        </div>

    </li>

@endforeach

                </ul>

                @php
                    $discount = session('coupon.discount',0);
                    $couponCode = session('coupon.code');
                    $grandTotal = $total - $discount;
                @endphp

                <div class="border-top pt-3">

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <strong>Rs. {{ number_format($total) }}</strong>
                    </div>

                    @if($couponCode)

                        <div class="d-flex justify-content-between mb-2 text-success">
                            <span>
                                Coupon ({{ $couponCode }})
                            </span>

                            <strong>
                                - Rs. {{ number_format($discount) }}
                            </strong>
                        </div>

                    @endif

                    <hr>

                    <div class="d-flex justify-content-between fs-5 fw-bold">
                        <span>Grand Total</span>

                        <span class="text-dark">
                            Rs. {{ number_format($grandTotal) }}
                        </span>
                    </div>

                    <div class="mt-3">
                        <span class="badge bg-success">
                            Payment Method:
                            Cash on Delivery
                        </span>
                    </div>

                </div>

            @else

                <div class="alert alert-warning mb-0">
                    Your cart is empty.
                </div>

            @endif

        </div>
    </div>
</div>

        </div>
    </div>
@endsection
