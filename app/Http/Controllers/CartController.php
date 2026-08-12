<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show product page
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name','asc')->get();
        $city = City::orderBy('name','asc')->get();
        $relatedProducts = Product::where('category', $product->category)
                                  ->where('id', '!=', $product->id)
                                  ->take(8)
                                  ->get();

        return view('user.cart.product-view', compact('product','categories','city','relatedProducts'));
    }

    // Add product to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->quantity ?? 1;
        $sessionId = Session::getId();

        $cartItem = Cart::where('product_id', $product->id)
                        ->where('session_id', $sessionId)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                  'name' => 'Guest',
                'phone' => '',
                'address' => '',
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
                'session_id' => $sessionId,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Show cart
    public function index()
{
    $sessionId = Session::getId();

    $cartItems = Cart::where('session_id', $sessionId)
        ->with('product')
        ->get();

    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item->product->sale_price * $item->quantity;
    }

    return view('user.cart.cart', compact('cartItems', 'total'));
}

    // Update cart quantity
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove item
    public function remove($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item removed!');
    }

    // Clear cart
    public function clear()
    {
        $sessionId = Session::getId();
        Cart::where('session_id', $sessionId)->delete();
        return redirect()->back()->with('success', 'Cart cleared!');
    }
    public function track(Request $request)
{
    $order = null;

    if ($request->filled('order_number')) {
        $order = Order::where(
            'order_number',
            $request->order_number
        )->first();
    }

    return view('user.cart.track', compact('order'));
}
}
