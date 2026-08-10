<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupons.index',compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'code'=>'required|unique:coupons',

            'type'=>'required',

            'value'=>'required|numeric',

            'minimum_amount'=>'required|numeric',

            'maximum_discount'=>'nullable|numeric',

            'usage_limit'=>'nullable|integer',

            'expiry_date'=>'required|date',
        ]);

        Coupon::create($request->all());

        return redirect()->route('coupons.index')
            ->with('success','Coupon Created');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit',compact('coupon'));
    }

    public function update(Request $request,Coupon $coupon)
    {
        $request->validate([

            'code'=>'required|unique:coupons,code,'.$coupon->id,

            'type'=>'required',

            'value'=>'required|numeric',

            'minimum_amount'=>'required|numeric',

            'maximum_discount'=>'nullable|numeric',

            'usage_limit'=>'nullable|integer',

            'expiry_date'=>'required|date',
        ]);

        $coupon->update($request->all());

        return redirect()->route('coupons.index')
            ->with('success','Coupon Updated');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return back()->with('success','Coupon Deleted');
    }
    public function apply(Request $request)
{
    $request->validate([
        'coupon_code' => 'required|string',
    ]);

    $coupon = Coupon::where('code', $request->coupon_code)
        ->where('expiry_date', '>=', now())
        ->first();

    if (!$coupon) {
        return back()->with('error', 'Invalid or expired coupon.');
    }

    // Get cart total
    $sessionId = session()->getId();

    $cartTotal = \App\Models\Cart::where('session_id', $sessionId)
        ->sum(\DB::raw('price * quantity'));

    // Check minimum order amount
    if ($cartTotal < $coupon->minimum_amount) {
        return back()->with(
            'error',
            'Minimum order amount is Rs. ' . number_format($coupon->minimum_amount)
        );
    }

    // Calculate discount
    if ($coupon->type == 'percentage') {
        $discount = ($cartTotal * $coupon->value) / 100;

        if ($coupon->maximum_discount && $discount > $coupon->maximum_discount) {
            $discount = $coupon->maximum_discount;
        }
    } else {
        $discount = $coupon->value;
    }

    session([
        'coupon' => [
            'id' => $coupon->id,
            'code' => $coupon->code,
            'discount' => $discount,
        ],
        'discount' => $discount,
    ]);

    return back()->with('success', 'Coupon applied successfully.');
}
}