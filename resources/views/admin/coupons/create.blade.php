@extends('admin.partials.layout')


@section('content')

<div class="container mt-4">

    <div class="card">

        <div class="card-header">

            <h4>Create Coupon</h4>

        </div>

        <div class="card-body">

            <form action="{{ route('coupons.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Coupon Code</label>

                        <input type="text"
                               name="code"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Type</label>

                        <select name="type"
                                class="form-select"
                                required>

                            <option value="">Select</option>

                            <option value="percentage">
                                Percentage
                            </option>

                            <option value="fixed">
                                Fixed
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Discount Value</label>

                        <input type="number"
                               name="value"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Minimum Order</label>

                        <input type="number"
                               name="minimum_amount"
                               class="form-control"
                               value="0">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Maximum Discount</label>

                        <input type="number"
                               name="maximum_discount"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Usage Limit</label>

                        <input type="number"
                               name="usage_limit"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Expiry Date</label>

                        <input type="date"
                               name="expiry_date"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select name="status"
                                class="form-select">

                            <option value="1">
                                Active
                            </option>

                            <option value="0">
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <button class="btn btn-success">
                    Save Coupon
                </button>

                <a href="{{ route('coupons.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

@endsection