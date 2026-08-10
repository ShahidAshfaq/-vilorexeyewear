@extends('user.partials.layout')

@section('content')

<style>
    /* =========================================
       ORDER TRACKING - LUXURY THEME
    ========================================= */

  
   
    /* =========================================
       PAGE HEADER
    ========================================= */

</style>


<section class="tracking-page">

    <div class="container">

        <!-- =========================
             PAGE HEADING
        ========================== -->

        <div class="tracking-heading">

            <span class="subtitle">
                Order Tracking
            </span>

            <h1>
                Track Your Order
            </h1>

            <p>
                Enter your order number to see the latest status of your order.
            </p>

        </div>


        <!-- =========================
             SEARCH
        ========================== -->

        <div class="tracking-search">

            <form action="{{ route('order.track') }}" method="GET">

                <div class="input-wrapper">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        name="order_number"
                        placeholder="Enter your order number"
                        value="{{ request('order_number') }}"
                        required
                    >

                </div>

                <button type="submit">

                    <i class="fas fa-location-arrow me-2"></i>

                    Track Order

                </button>

            </form>

        </div>


        <!-- =========================
             ORDER NOT FOUND
        ========================== -->

        @if(request('order_number') && !$order)

            <div class="tracking-error">

                <i class="fas fa-exclamation-circle me-2"></i>

                We couldn't find an order with this order number.
                Please check the number and try again.

            </div>

        @endif


        <!-- =========================
             ORDER FOUND
        ========================== -->

        @if($order)

            @php

                $statuses = [

                    'pending' => 'Order Placed',

                    'confirmed' => 'Order Confirmed',

                    'processing' => 'Processing',

                    'shipped' => 'Shipped',

                    'out_for_delivery' => 'Out for Delivery',

                    'delivered' => 'Delivered',

                ];

                $statusKeys = array_keys($statuses);

                $currentIndex = array_search(
                    $order->status,
                    $statusKeys
                );

                // Prevent errors if an unexpected status exists
                if ($currentIndex === false) {
                    $currentIndex = 0;
                }

            @endphp


            <div class="order-card">

                <!-- ORDER HEADER -->

                <div class="order-header">

                    <div>

                        <div class="order-label">
                            Order Number
                        </div>

                        <div class="order-number">
                            #{{ $order->order_number }}
                        </div>

                        <p class="order-date">

                            <i class="far fa-calendar-alt me-1"></i>

                            {{ $order->created_at->format('d M Y, h:i A') }}

                        </p>

                    </div>


                    <span class="current-status">

                        {{ ucwords(str_replace('_', ' ', $order->status)) }}

                    </span>

                </div>


                <!-- TIMELINE -->

                <div class="tracking-body">

                    <div class="timeline">

                        @foreach($statuses as $key => $label)

                            @php

                                $index = array_search(
                                    $key,
                                    $statusKeys
                                );

                                $completed = $index <= $currentIndex;

                            @endphp


                            <div class="timeline-item
                                {{ $completed ? 'completed' : '' }}">

                                <!-- ICON -->

                                <div class="timeline-icon">

                                    @if($completed)

                                        <i class="fas fa-check"></i>

                                    @else

                                        {{ $index + 1 }}

                                    @endif

                                </div>


                                <!-- CONTENT -->

                                <div class="timeline-content">

                                    <h5>
                                        {{ $label }}
                                    </h5>

                                    @if($completed)

                                        <small class="completed-text">

                                            <i class="fas fa-check-circle me-1"></i>

                                            Completed

                                        </small>

                                    @else

                                        <small class="pending-text">

                                            <i class="far fa-clock me-1"></i>

                                            Pending

                                        </small>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>


                    <!-- TRACKING NUMBER -->

                    @if($order->tracking_number)

                        <div class="tracking-number">

                            <div class="d-flex align-items-center gap-3">

                                <div class="tracking-icon">

                                    <i class="fas fa-truck"></i>

                                </div>

                                <div>

                                    <div class="label">
                                        Tracking Number
                                    </div>

                                    <strong>
                                        {{ $order->tracking_number }}
                                    </strong>

                                </div>

                            </div>

                            <button
                                type="button"
                                class="btn btn-sm"
                                onclick="copyTrackingNumber()">

                                <i class="far fa-copy me-1"></i>

                                Copy

                            </button>

                        </div>

                    @endif

                </div>

            </div>

        @endif

    </div>

</section>


@if($order && $order->tracking_number)

<script>

function copyTrackingNumber() {

    const trackingNumber =
        @json($order->tracking_number);

    navigator.clipboard.writeText(trackingNumber)
        .then(function () {

            alert('Tracking number copied!');

        });

}

</script>

@endif

@endsection