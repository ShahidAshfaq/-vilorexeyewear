@extends('admin.partials.layout')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Dashboard
            </li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="row">

        {{-- Today's Orders --}}
        <div class="col-xxl-3 col-md-6">

            <div class="card info-card sales-card">

                <div class="card-body">

                    <h5 class="card-title">
                        Orders <span>| Today</span>
                    </h5>

                    <div class="d-flex align-items-center">

                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>

                        <div class="ps-3">

                            <h6>{{ $todayOrders }}</h6>

                            <span class="text-success small pt-1 fw-bold">
                                Orders
                            </span>

                            <span class="text-muted small pt-2 ps-1">
                                today
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Today's Revenue --}}
        <div class="col-xxl-3 col-md-6">

            <div class="card info-card revenue-card">

                <div class="card-body">

                    <h5 class="card-title">
                        Revenue <span>| Today</span>
                    </h5>

                    <div class="d-flex align-items-center">

                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-exchange"></i>
                        </div>

                        <div class="ps-3">

                            <h6>
                                Rs. {{ number_format($todayRevenue) }}
                            </h6>

                            <span class="text-success small pt-1 fw-bold">
                                PKR
                            </span>

                            <span class="text-muted small pt-2 ps-1">
                                today
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Customers --}}
        <div class="col-xxl-3 col-md-6">

            <div class="card info-card customers-card">

                <div class="card-body">

                    <h5 class="card-title">
                        Customers <span>| Total</span>
                    </h5>

                    <div class="d-flex align-items-center">

                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>

                        <div class="ps-3">

                            <h6>{{ $customers }}</h6>

                            <span class="text-primary small pt-1 fw-bold">
                                Customers
                            </span>

                            <span class="text-muted small pt-2 ps-1">
                                registered
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Products --}}
        <div class="col-xxl-3 col-md-6">

            <div class="card info-card">

                <div class="card-body">

                    <h5 class="card-title">
                        Products <span>| Store</span>
                    </h5>

                    <div class="d-flex align-items-center">

                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-eyeglasses"></i>
                        </div>

                        <div class="ps-3">

                            <h6>{{ $products }}</h6>

                            <span class="text-info small pt-1 fw-bold">
                                Products
                            </span>

                            <span class="text-muted small pt-2 ps-1">
                                available
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Monthly Revenue --}}
        <div class="col-lg-8">

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title">
                        Revenue <span>| This Month</span>
                    </h5>

                    <div class="d-flex align-items-center mb-3">

                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-graph-up"></i>
                        </div>

                        <div class="ps-3">

                            <h6>
                                Rs. {{ number_format($monthlyRevenue) }}
                            </h6>

                            <span class="text-success small fw-bold">
                                {{ $monthlyOrders }} Orders
                            </span>

                        </div>

                    </div>

                    <canvas id="revenueChart" height="120"></canvas>

                </div>

            </div>

        </div>


        {{-- Order Status --}}
        <div class="col-lg-4">

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title">
                        Order Status
                    </h5>

                    <div class="row text-center">

                        <div class="col-6 mb-4">

                            <div class="border rounded p-3">

                                <i class="bi bi-hourglass-split fs-3 text-warning"></i>

                                <h4 class="mt-2">
                                    {{ $pendingOrders }}
                                </h4>

                                <span class="text-muted">
                                    Pending
                                </span>

                            </div>

                        </div>

                        <div class="col-6 mb-4">

                            <div class="border rounded p-3">

                                <i class="bi bi-check-circle fs-3 text-success"></i>

                                <h4 class="mt-2">
                                    {{ $completedOrders }}
                                </h4>

                                <span class="text-muted">
                                    Completed
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Recent Orders --}}
        <div class="col-12">

            <div class="card recent-sales overflow-auto">

                <div class="card-body">

                    <h5 class="card-title">
                        Recent Orders
                    </h5>

                    <table class="table table-borderless">

                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentOrders as $order)

                                <tr>

                                    <td>
                                        #{{ $order->id }}
                                    </td>

                                    <td>
                                        {{ $order->customer_name ?? $order->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $order->phone ?? $order->mobile ?? 'N/A' }}
                                    </td>

                                    <td>
                                        <strong>
                                            Rs. {{ number_format($order->total) }}
                                        </strong>
                                    </td>

                                    <td>

                                        @if($order->status == 'pending')

                                            <span class="badge bg-warning">
                                                Pending
                                            </span>

                                        @elseif($order->status == 'completed')

                                            <span class="badge bg-success">
                                                Completed
                                            </span>

                                        @elseif($order->status == 'cancelled')

                                            <span class="badge bg-danger">
                                                Cancelled
                                            </span>

                                        @elseif($order->status == 'processing')

                                            <span class="badge bg-info">
                                                Processing
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                {{ ucfirst($order->status) }}
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-4">

                                        <i class="bi bi-cart-x fs-2"></i>

                                        <p class="mb-0 mt-2">
                                            No orders found.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('revenueChart');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: @json($months),

            datasets: [{

                label: 'Revenue (PKR)',

                data: @json($revenues),

                borderWidth: 2,

                tension: 0.4,

                fill: true

            }]

        },

        options: {

            responsive: true,

            plugins: {

                legend: {
                    display: false
                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        callback: function(value) {

                            return 'Rs. ' + value;

                        }

                    }

                }

            }

        }

    });

});

</script>

@endsection