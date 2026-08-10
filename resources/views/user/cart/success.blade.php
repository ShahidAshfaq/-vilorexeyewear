@extends('user.partials.layout')

@section('content')
<div class="container text-center py-5">
    <h2 class="text-success fw-bold mb-3">🎉 Order Placed Successfully!</h2>
    <p>Thank you, {{ $order->name }}! Your order number is <strong>{{ $order->order_number }}</strong>.</p>
    <p>We’ll contact you soon to confirm your delivery.</p>
    <a href="{{ url('/') }}" class="btn btn-dark mt-3">Continue Shopping</a>
</div>
@endsection
