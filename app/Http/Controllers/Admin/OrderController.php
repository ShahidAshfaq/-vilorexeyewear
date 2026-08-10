<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function adminIndex(Request $request)
{
    $orders = Order::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $orders->where(function ($query) use ($search) {

            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('order_number', 'like', "%{$search}%");

        });
    }

    if ($request->filled('status')) {

        $orders->where('status', $request->status);

    }

    if ($request->filled('payment_method')) {

        $orders->where('payment_method', $request->payment_method);

    }

    if ($request->filled('date')) {

        $orders->whereDate('created_at', $request->date);

    }

    $orders = $orders
        ->latest()
        ->paginate(20)
        ->withQueryString();

    return view('admin.orders.index', compact('orders'));
}

    // Show single order
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Update status (optional)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated!');
    }
}
