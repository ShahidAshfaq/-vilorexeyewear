
@extends('admin.partials.layout')

@section('content')

<style>

    /* ================================
       ORDER FILTER CARD
    ================================= */

    .order-filter-card {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #eee;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    }

    .order-filter-title {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 18px;
        color: #333;
    }

    .order-filter-title i {
        color: var(--gold-dark);
        margin-right: 7px;
    }


    /* ================================
       ORDER TABLE
    ================================= */

    .order-table-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #eee;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    }

    .order-table {
        margin-bottom: 0;
    }

    .order-table thead th {
        background: #212529;
        color: #fff;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 15px 12px;
        white-space: nowrap;
    }

    .order-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 13px;
    }

    .order-table tbody tr {
        transition: .2s ease;
    }

    .order-table tbody tr:hover {
        background: #fffdf8;
    }


    /* ================================
       ORDER NUMBER
    ================================= */

    .order-number {
        font-weight: 700;
        color: var(--gold-dark);
    }


    /* ================================
       CUSTOMER
    ================================= */

    .customer-name {
        font-weight: 600;
        color: #333;
    }

    .customer-email {
        color: #999;
        font-size: 11px;
    }


    /* ================================
       TOTAL
    ================================= */

    .order-total {
        font-weight: 700;
        color: #333;
        white-space: nowrap;
    }


    /* ================================
       STATUS
    ================================= */

    .order-status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-processing {
        background: #cfe2ff;
        color: #084298;
    }

    .status-shipped {
        background: #cff4fc;
        color: #055160;
    }

    .status-delivered,
    .status-completed {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-cancelled {
        background: #f8d7da;
        color: #842029;
    }

    .status-default {
        background: #e9ecef;
        color: #495057;
    }


    /* ================================
       PAYMENT
    ================================= */

    .payment-badge {
        display: inline-block;
        padding: 6px 9px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .payment-cod {
        background: #d1e7dd;
        color: #0f5132;
    }

    .payment-online {
        background: #cfe2ff;
        color: #084298;
    }


    /* ================================
       ACTION BUTTONS
    ================================= */

    .order-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .order-action-btn {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        border: 0;

        text-decoration: none;

        transition: .2s ease;
    }

    .order-action-btn:hover {
        transform: translateY(-2px);
    }

    .view-order-btn {
        background: #212529;
        color: #fff;
    }

    .view-order-btn:hover {
        background: #000;
        color: #fff;
    }

    .whatsapp-order-btn {
        background: #25d366;
        color: #fff;
    }

    .whatsapp-order-btn:hover {
        background: #1ebe5d;
        color: #fff;
    }


    /* ================================
       EMPTY STATE
    ================================= */

    .empty-orders {
        padding: 50px 20px !important;
        text-align: center;
        color: #999;
    }

    .empty-orders i {
        font-size: 35px;
        margin-bottom: 10px;
        color: #ccc;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {

        .order-filter-card {
            padding: 15px;
        }

        .order-table thead th,
        .order-table tbody td {
            padding: 11px 9px;
        }

    }

</style>


{{-- =========================================================
     FILTER SECTION
========================================================= --}}

<div class="order-filter-card">

    <div class="order-filter-title">
        <i class="fas fa-filter"></i>
        Filter Orders
    </div>


    <form
        method="GET"
        action="{{ route('admin.orders.index') }}"
    >

        <div class="row g-3">


            {{-- Search --}}

            <div class="col-lg-4 col-md-6">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Order No, Name, Email, Phone..."
                    value="{{ request('search') }}"
                >

            </div>


            {{-- Status --}}

            <div class="col-lg-2 col-md-6">

                <select
                    name="status"
                    class="form-select"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="Pending"
                        {{ request('status') == 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Processing"
                        {{ request('status') == 'Processing' ? 'selected' : '' }}
                    >
                        Processing
                    </option>

                    <option
                        value="Shipped"
                        {{ request('status') == 'Shipped' ? 'selected' : '' }}
                    >
                        Shipped
                    </option>

                    <option
                        value="Delivered"
                        {{ request('status') == 'Delivered' ? 'selected' : '' }}
                    >
                        Delivered
                    </option>

                    <option
                        value="Cancelled"
                        {{ request('status') == 'Cancelled' ? 'selected' : '' }}
                    >
                        Cancelled
                    </option>

                </select>

            </div>


            {{-- Payment --}}

            <div class="col-lg-2 col-md-6">

                <select
                    name="payment_method"
                    class="form-select"
                >

                    <option value="">
                        All Payments
                    </option>

                    <option
                        value="cod"
                        {{ request('payment_method') == 'cod' ? 'selected' : '' }}
                    >
                        Cash on Delivery
                    </option>

                    <option
                        value="online"
                        {{ request('payment_method') == 'online' ? 'selected' : '' }}
                    >
                        Online
                    </option>

                </select>

            </div>


            {{-- Date --}}

            <div class="col-lg-2 col-md-6">

                <input
                    type="date"
                    name="date"
                    class="form-control"
                    value="{{ request('date') }}"
                >

            </div>


            {{-- Filter Button --}}

            <div class="col-lg-2 col-md-6 d-grid">

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="fas fa-filter me-1"></i>

                    Filter

                </button>

            </div>

        </div>


        {{-- Reset --}}

        <div class="mt-3">

            <a
                href="{{ route('admin.orders.index') }}"
                class="btn btn-outline-secondary btn-sm"
            >

                <i class="fas fa-sync-alt me-1"></i>

                Reset Filters

            </a>

        </div>

    </form>

</div>



{{-- =========================================================
     ORDERS TABLE
========================================================= --}}

<div class="order-table-card">

    <div class="table-responsive">

        <table class="table order-table table-hover align-middle">

            <thead class="text-center">

                <tr>

                    <th>#</th>

                    <th>Order No</th>

                    <th>Customer</th>

                    <th>Phone</th>

                    <th>Payment</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Date</th>

                    <th width="100">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody>


                @forelse($orders as $order)

                    <tr>


                        {{-- ID --}}

                        <td class="text-center">

                            {{ $order->id }}

                        </td>


                        {{-- Order Number --}}

                        <td>

                            <span class="order-number">

                                {{ $order->order_number ?? '-' }}

                            </span>

                        </td>


                        {{-- Customer --}}

                        <td>

                            <div class="customer-name">

                                {{ $order->name }}

                            </div>

                            <div class="customer-email">

                                {{ $order->email ?? 'No email' }}

                            </div>

                        </td>


                        {{-- Phone --}}

                        <td>

                            {{ $order->phone ?? '-' }}

                        </td>


                        {{-- Payment --}}

                        <td class="text-center">

                            @if(($order->payment_method ?? '') == 'cod')

                                <span class="payment-badge payment-cod">

                                    <i class="fas fa-money-bill-wave me-1"></i>

                                    COD

                                </span>

                            @else

                                <span class="payment-badge payment-online">

                                    <i class="fas fa-credit-card me-1"></i>

                                    Online

                                </span>

                            @endif

                        </td>


                        {{-- Total --}}

                        <td>

                            <span class="order-total">

                                Rs. {{ number_format($order->total ?? 0) }}

                            </span>

                        </td>


                        {{-- Status --}}

                        <td class="text-center">

                            @if($order->status == 'Pending')

                                <span class="order-status status-pending">
                                    Pending
                                </span>

                            @elseif($order->status == 'Processing')

                                <span class="order-status status-processing">
                                    Processing
                                </span>

                            @elseif($order->status == 'Shipped')

                                <span class="order-status status-shipped">
                                    Shipped
                                </span>

                            @elseif($order->status == 'Delivered')

                                <span class="order-status status-delivered">
                                    Delivered
                                </span>

                            @elseif($order->status == 'Completed')

                                <span class="order-status status-completed">
                                    Completed
                                </span>

                            @elseif($order->status == 'Cancelled')

                                <span class="order-status status-cancelled">
                                    Cancelled
                                </span>

                            @else

                                <span class="order-status status-default">

                                    {{ $order->status ?? 'Unknown' }}

                                </span>

                            @endif

                        </td>


                        {{-- Date --}}

                        <td class="text-nowrap">

                            {{ $order->created_at->format('d M Y') }}

                            <br>

                            <small class="text-muted">

                                {{ $order->created_at->format('h:i A') }}

                            </small>

                        </td>


                        {{-- =================================
                             ACTIONS
                        ================================== --}}

                        <td>

                            <div class="order-actions">


                                {{-- View --}}

                                <a
                                    href="{{ route('admin.orders.show', $order->id) }}"
                                    class="order-action-btn view-order-btn"
                                    title="View Order"
                                >

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- WhatsApp --}}

                                @if($order->phone)

                                    @php

                                        /*
                                        |--------------------------------------------------------------------------
                                        | Clean Pakistani WhatsApp Number
                                        |--------------------------------------------------------------------------
                                        */

                                        $whatsappNumber = preg_replace(
                                            '/[^0-9]/',
                                            '',
                                            $order->phone
                                        );

                                        if (
                                            str_starts_with(
                                                $whatsappNumber,
                                                '0'
                                            )
                                        ) {

                                            $whatsappNumber =
                                                '92' .
                                                substr(
                                                    $whatsappNumber,
                                                    1
                                                );

                                        }


                                        /*
                                        |--------------------------------------------------------------------------
                                        | WhatsApp Message
                                        |--------------------------------------------------------------------------
                                        */

                                        $whatsappMessage =

                                            "Hello {$order->name},\n\n" .

                                            "Thank you for your order!\n\n" .

                                            "📦 *Order Details*\n" .

                                            "Order No: " .
                                            ($order->order_number ?? '-') .
                                            "\n" .

                                            "Customer: " .
                                            $order->name .
                                            "\n" .

                                            "Phone: " .
                                            $order->phone .
                                            "\n" .

                                            "Payment: " .
                                            (
                                                ($order->payment_method ?? '') == 'cod'
                                                ? 'Cash on Delivery'
                                                : 'Online'
                                            ) .
                                            "\n" .

                                            "Status: " .
                                            ($order->status ?? '-') .
                                            "\n" .

                                            "Total: Rs. " .
                                            number_format(
                                                $order->total ?? 0
                                            ) .
                                            "\n\n" .

                                            "We will keep you updated " .
                                            "about your order.\n\n" .

                                            "Thank you for shopping with us!";

                                    @endphp


                                    <a
                                        href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($whatsappMessage) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="order-action-btn whatsapp-order-btn"
                                        title="WhatsApp Customer"
                                    >

                                        <i class="fab fa-whatsapp"></i>

                                    </a>

                                @endif

                            </div>

                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="9"
                            class="empty-orders"
                        >

                            <i class="fas fa-shopping-bag d-block"></i>

                            <strong>
                                No Orders Found
                            </strong>

                            <div>
                                Try changing your filters or search.
                            </div>

                        </td>

                    </tr>


                @endforelse


            </tbody>

        </table>

    </div>


    {{-- =====================================================
         PAGINATION
    ====================================================== --}}

    @if($orders->hasPages())

        <div class="d-flex justify-content-center py-3">

            {{ $orders->withQueryString()->links() }}

        </div>

    @endif

</div>

@endsection
