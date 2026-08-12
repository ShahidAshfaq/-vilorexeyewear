@extends('admin.partials.layout')

@section('content')
<div class="container">

    <h2 class="fw-bold mb-4">
        Order Details
        @if($order->order_number)
            ({{ $order->order_number }})
        @endif
    </h2>

    <!-- Customer Information -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white">
            Customer Information
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>City:</strong> {{ $order->city }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>

                    <p>
                        <strong>Payment:</strong>

                        @if(($order->payment_method ?? 'cod') == 'cod')
                            <span class="badge bg-success">
                                Cash on Delivery
                            </span>
                        @else
                            <span class="badge bg-primary">
                                Online Payment
                            </span>
                        @endif
                    </p>

                </div>

            </div>

        </div>
    </div>

    <!-- Order Items -->
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-dark text-white">
            Order Items
        </div>

        <div class="card-body">

            @php
                $items = is_array($order->items)
                    ? $order->items
                    : json_decode($order->items, true);

                $subtotal = 0;
            @endphp

            <table class="table table-bordered align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Product</th>
                        <th width="120">Quantity</th>
                        <th width="150">Price</th>
                        <th width="150">Subtotal</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($items as $item)

                        @php
                            $lineTotal = $item['price'] * $item['quantity'];
                            $subtotal += $lineTotal;
                        @endphp

                        <tr>

                            <td>{{ $item['name'] }}</td>

                            <td>{{ $item['quantity'] }}</td>

                            <td>
                                Rs. {{ number_format($item['price']) }}
                            </td>

                            <td>
                                Rs. {{ number_format($lineTotal) }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="mt-4">

                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong>Rs. {{ number_format($subtotal) }}</strong>
                </div>

                @if(!empty($order->coupon_code))
                <div class="d-flex justify-content-between text-success">
                    <span>
                        Coupon ({{ $order->coupon_code }})
                    </span>

                    <strong>
                        - Rs. {{ number_format($order->discount) }}
                    </strong>
                </div>
                @endif

                <hr>
                {{-- @php
                    $grand =   $subtotal - $order->discount;
                    dd($grand);
                    
                @endphp --}}
                <div class="d-flex justify-content-between fs-5">

                    <strong>Grand Total</strong>

                    <strong>
                        Rs. {{ number_format($subtotal - $order->discount) }}
                    </strong>

                </div>

            </div>

        </div>

    </div>

    <!-- Order Status -->
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            Update Order Status
        </div>

        <div class="card-body">

            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">

                @csrf

                <div class="row align-items-center">

                    <div class="col-md-4">

                         <select name="status"
            class="form-select mb-2">

        <option value="pending"
            {{ $order->status == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="confirmed"
            {{ $order->status == 'confirmed' ? 'selected' : '' }}>
            Confirmed
        </option>

        <option value="processing"
            {{ $order->status == 'processing' ? 'selected' : '' }}>
            Processing
        </option>

        <option value="shipped"
            {{ $order->status == 'shipped' ? 'selected' : '' }}>
            Shipped
        </option>

        <option value="out_for_delivery"
            {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>
            Out for Delivery
        </option>

        <option value="delivered"
            {{ $order->status == 'delivered' ? 'selected' : '' }}>
            Delivered
        </option>

        <option value="cancelled"
            {{ $order->status == 'cancelled' ? 'selected' : '' }}>
            Cancelled
        </option>

    </select>

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-dark">
                            Update
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection