@extends('admin.partials.layout')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Coupons</h3>

        <a href="{{ route('coupons.create') }}" class="btn btn-primary">
            + Add Coupon
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Type</th>
            <th>Value</th>
            <th>Min Order</th>
            <th>Max Discount</th>
            <th>Usage</th>
            <th>Expiry</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>

        </thead>

        <tbody>

        @forelse($coupons as $coupon)

            <tr>

                <td>{{ $coupon->id }}</td>

                <td>
                    <strong>{{ $coupon->code }}</strong>
                </td>

                <td>{{ ucfirst($coupon->type) }}</td>

                <td>
                    @if($coupon->type=="percentage")
                        {{ $coupon->value }}%
                    @else
                        Rs {{ number_format($coupon->value) }}
                    @endif
                </td>

                <td>Rs {{ number_format($coupon->minimum_amount) }}</td>

                <td>
                    {{ $coupon->maximum_discount ?? '-' }}
                </td>

                <td>

                    @if($coupon->usage_limit)

                        {{ $coupon->used }}/{{ $coupon->usage_limit }}

                    @else

                        Unlimited

                    @endif

                </td>

                <td>{{ $coupon->expiry_date }}</td>

                <td>

                    @if($coupon->status)

                        <span class="badge bg-success">
                            Active
                        </span>

                    @else

                        <span class="badge bg-danger">
                            Inactive
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('coupons.edit',$coupon->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('coupons.destroy',$coupon->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete Coupon?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="10" class="text-center">
                    No Coupons Found
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection