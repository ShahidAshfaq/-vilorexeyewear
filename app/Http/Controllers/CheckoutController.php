<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
   public function index()
    {
        // Use session_id instead of user_id
        $session_id = session()->getId();

        // Get cart items for this session
        $cartItems = Cart::where('session_id', $session_id)->with('product')->get();

        // Calculate total
            $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->sale_price * $item->quantity;
        }

        $discount = session('coupon.discount', 0);
        $grandTotal = $total - $discount;

        return view('user.cart.checkout', compact(
            'cartItems',
            'total',
            'discount',
            'grandTotal'
        ));

        // return view('user.cart.checkout', compact('cartItems', 'total'));
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required',
        'city' => 'required',
        'address' => 'required',
        'payment_method' => 'required|in:cod,online',
    ]);

    $sessionId = session()->getId();

    $cartItems = Cart::where('session_id', $sessionId)
        ->with('product')
        ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')
            ->with('error', 'Your cart is empty!');
    }

    $subtotal = $cartItems->sum(function ($item) {
        return $item->product->sale_price * $item->quantity;
    });

    $discount = session('coupon.discount', 0);

    $grandTotal = $subtotal - $discount;

    $items = $cartItems->map(function ($item) {
        return [
            'product_id' => $item->product->id,
            'name' => $item->product->title,
            'price' => $item->product->sale_price,
            'quantity' => $item->quantity,
        ];
    })->toArray();

    $order = Order::create([
        'user_id' => Auth::id(),
        'session_id' => $sessionId,
        'order_number' => strtoupper(Str::random(10)),
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'city' => $request->city,
        'address' => $request->address,
        'payment_method' => $request->payment_method,
        'coupon_code' => session('coupon.code'),
        'discount' => $discount,
        'total' => $grandTotal,
        'status' => 'Pending',
        'items' => json_encode($items),
    ]);

    Cart::where('session_id', $sessionId)->delete();

    session()->forget('coupon');

    return redirect()
        ->route('orders.success', $order->id)
        ->with('success', 'Order placed successfully!');
}

    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order-success', compact('order'));
    }


    public function adminIndex()
{
    $orders = Order::latest()->paginate(20);
    return view('admin.cart.order', compact('orders'));
}
}
