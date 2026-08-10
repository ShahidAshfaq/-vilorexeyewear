<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Today's date
        $today = Carbon::today();

        // This month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Today's orders
        $todayOrders = Order::whereDate('created_at', $today)->count();

        // Today's revenue
        $todayRevenue = Order::whereDate('created_at', $today)
            ->where('status', '!=', 'cancelled')
            ->sum('total');

        // This month's orders
        $monthlyOrders = Order::whereBetween('created_at', [
            $startOfMonth,
            $endOfMonth
        ])->count();

        // This month's revenue
        $monthlyRevenue = Order::whereBetween('created_at', [
            $startOfMonth,
            $endOfMonth
        ])
        ->where('status', '!=', 'cancelled')
        ->sum('total');

        // Total customers
        $customers = User::count();

        // Total products
        $products = Product::count();

        // Pending orders
        $pendingOrders = Order::where('status', 'pending')->count();

        // Completed orders
        $completedOrders = Order::where('status', 'completed')->count();

        // Recent orders
        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        // Monthly revenue chart
        $monthlySales = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as total')
            )
            ->whereYear('created_at', Carbon::now()->year)
            ->where('status', '!=', 'cancelled')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];

        foreach ($monthlySales as $sale) {
            $months[] = Carbon::create()
                ->month($sale->month)
                ->format('M');

            $revenues[] = $sale->total;
        }

        return view('admin.index', compact(
            'todayOrders',
            'todayRevenue',
            'monthlyOrders',
            'monthlyRevenue',
            'customers',
            'products',
            'pendingOrders',
            'completedOrders',
            'recentOrders',
            'months',
            'revenues'
        ));
    }
}