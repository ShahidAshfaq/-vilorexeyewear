@extends('admin.partials.layout')


@section('content')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header">
            <h4>Edit Coupon</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Coupon Code -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Coupon Code</label>
                        <input type="text"
                               name="code"
                               class="form-control"
                               value="{{ old('code', $coupon->code) }}"
                               required>
                    </div>

                    <!-- Type -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount Type</label>
                        <select name="type" class="form-select" required>
                            <option value="percentage"
                                {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>
                                Percentage
                            </option>

                            <option value="fixed"
                                {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>
                                Fixed Amount
                            </option>
                        </select>
                    </div>

                    <!-- Value -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount Value</label>
                        <input type="number"
                               step="0.01"
                               name="value"
                               class="form-control"
                               value="{{ old('value', $coupon->value) }}"
                               required>
                    </div>

                    <!-- Minimum Order -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Minimum Order Amount</label>
                        <input type="number"
                               step="0.01"
                               name="minimum_amount"
                               class="form-control"
                               value="{{ old('minimum_amount', $coupon->minimum_amount) }}">
                    </div>

                    <!-- Maximum Discount -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Maximum Discount</label>
                        <input type="number"
                               step="0.01"
                               name="maximum_discount"
                               class="form-control"
                               value="{{ old('maximum_discount', $coupon->maximum_discount) }}">
                    </div>

                    <!-- Usage Limit -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Usage Limit</label>
                        <input type="number"
                               name="usage_limit"
                               class="form-control"
                               value="{{ old('usage_limit', $coupon->usage_limit) }}">
                    </div>

                    <!-- Expiry -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date"
                               name="expiry_date"
                               class="form-control"
                               value="{{ old('expiry_date', $coupon->expiry_date) }}"
                               required>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">

                            <option value="1"
                                {{ old('status', $coupon->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ old('status', $coupon->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Coupon
                </button>

                <a href="{{ route('coupons.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>

</div>

@endsection