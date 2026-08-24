<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Product;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        // Cities
        $cities = City::orderBy('name', 'asc')->get();

        // Categories
        $categories = Category::orderBy('name', 'asc')->get();

       $products = Product::query()

    // Search by Title or SKU
    ->when($request->filled('search'), function ($query) use ($request) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('sku', 'like', '%' . $search . '%');

        });

    })

    // Category
    ->when($request->filled('category_id'), function ($query) use ($request) {

        $query->where('category_id', $request->category_id);

    })

    // Minimum Price
    ->when($request->filled('min_price'), function ($query) use ($request) {

        $query->where('price', '>=', $request->min_price);

    })

    // Maximum Price
    ->when($request->filled('max_price'), function ($query) use ($request) {

        $query->where('price', '<=', $request->max_price);

    })

    // Frame Type
    ->when($request->filled('frame_type'), function ($query) use ($request) {

        $query->whereIn('frame', $request->frame_type);

    })

    // Lens Type
    ->when($request->filled('lens_type'), function ($query) use ($request) {

        $query->whereIn('lens', $request->lens_type);

    })

    // Gender
    ->when($request->filled('gender'), function ($query) use ($request) {

        $query->whereIn('gender', $request->gender);

    })

    // Availability
    ->when(
        $request->availability === 'in_stock',
        function ($query) {

            $query->where('stock', '>', 0);

        }
    )

    // On Sale
    ->when(
        $request->sale == '1',
        function ($query) {

            $query->where('on_sale', 1);

        }
    )

    // Only Active Products
    ->where('status', 1)

    // Latest Products First
    ->latest()

    // Pagination
    ->paginate(12)

    // Keep All Filters During Pagination
    ->withQueryString();


return view(
    'user.products.index',
    compact(
        'products',
        'categories',
        'cities'
    )
);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    
     public function create(Request $request)
{
    $city =City::orderBy('name', 'asc')->get();
    $products = Product::all();
    $carts = Cart::with('product')->get();
    // $product = Product::find($id);
  
    return view('user.cart', compact('products', 'carts', 'city'));
} 




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'qantity' => 'required|numeric|min:1',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'order_no' => 'required|string|unique:carts,order_no', // Ensure unique order number
            'product_id' => 'required|exists:products,id',
        ]);
    
        // Retrieve the product details (assuming single product order)
        $product = Product::findOrFail($request->product_id);
    
        
     $cart  = Cart::create($request->all());
    
        // Redirect to the receipt page with the created order and success message
        return redirect()->route('user.recipt', $cart->order_no)
                         ->with('success', 'Item ordered successfully.');

    }

   
    

    /**
     * Display the specified resource.
     */
 public function show($id)
{
    $product = Product::findOrFail($id);

    $categories = Category::orderBy('name', 'asc')->get();

    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('status', 1)
        ->latest()
        ->take(4)
        ->get();

    return view('user.products.show', compact(
        'product',
        'categories',
        'relatedProducts'
    ));
}


    public function showReceipt($order_no)
    {
        // Retrieve the order/cart by its order number
        $order = Cart::where('order_no', $order_no)->firstOrFail();
    
        // Retrieve the product associated with the order
        $product = Product::findOrFail($order->product_id);
    
        // Pass the order and product details to the view
        return view('user.recipt', compact('order', 'product'));
    }
    
        

      
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserCart $userCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCart $userCart)
    {
        //
    }

}
