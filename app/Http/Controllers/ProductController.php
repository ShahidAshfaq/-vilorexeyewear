<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $categories = Category::all();

    $search = $request->input('search');

    $products = Product::query()
        ->when($search, function ($query, $search) {

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('sku', 'like', '%' . $search . '%');

            });

        })
        ->latest()
        ->paginate(20)
        ->withQueryString();

    return view('admin.menu.allmenue', compact(
        'products',
        'categories',
        'search'
    ));
}

  public function home(Request $request)
{
    // Get latest store profile
    $userProfile = UserProfile::latest()->first();

    // All categories
    // $categories = Category::all();

    // Latest 9 categories
    $cat = Category::orderBy('created_at', 'desc')
        ->take(4)
        ->get();

    $categories = Category::take(4)
        ->get();

    // Latest 4 active products
    $products = Product::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
  $featuredProducts = Product::where('status', 1)
    ->where('featured', 1)
    ->orderBy('created_at', 'desc')
    ->take(3)
    ->get();

    $onSaleProducts = Product::where('status', 1)
    ->where('on_sale', 1)
    ->orderBy('created_at', 'desc')
    ->take(3)
    ->get();

    $trendingProducts = Product::where('status', 1)
    ->where('trending', 1)
    ->orderBy('created_at', 'desc')
    ->take(3)
    ->get();
    return view('user.index', compact(
        'products',
        'categories',
        'userProfile',
        'cat',
        'onSaleProducts',
        'trendingProducts',
        'featuredProducts'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
       
        return view('admin.menu.addManu', compact('categories'));
    }



public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
        'sku' => 'required|string|max:100|unique:products,sku',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|boolean',

        // Eyewear fields
        'frame' => 'nullable|string|max:100',
        'lens' => 'nullable|string|max:100',
        'gender' => 'nullable|string|max:50',
        'on_sale' => 'nullable|boolean',

        // Multiple images
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:51200',
    ]);

    $imagePaths = [];

    // Handle multiple image uploads
    if ($request->hasFile('image')) {

        foreach ($request->file('image') as $image) {

            if ($image->isValid()) {

                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

                $image->storeAs(
                    'product',
                    $imageName,
                    'public'
                );

                $imagePaths[] = 'product/' . $imageName;
            }
        }
    }

    Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'sale_price' => $request->sale_price,
        'sku' => $request->sku,
        'stock' => $request->stock,
        'category_id' => $request->category_id,
        'status' => $request->status,
        'featured' => $request->featured,
        'trending' => $request->trending,

        // Eyewear fields
        'frame' => $request->frame,
        'lens' => $request->lens,
        'gender' => $request->gender,
        'on_sale' => $request->boolean('on_sale'),

        // Images
        'image' => json_encode($imagePaths),
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully.');
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.menu.show', compact('product',
        'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // If needed for edit form
        return view('admin.menu.edit', compact('product', 'categories'));
    }

   
public function update(Request $request, Product $product)
{
    // Validate the request
   $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'price' => 'required|numeric|min:0',
    'sale_price' => 'nullable|numeric|min:0',
    'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
    'stock' => 'required|integer|min:0',
    'category_id' => 'required|exists:categories,id',
    'status' => 'required|boolean',
    'image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:51200',
    'frame' => 'nullable|string|max:100',
    'lens' => 'nullable|string|max:100',
    'gender' => 'nullable|string|max:50',
    'on_sale' => 'nullable|boolean',
]);
    // Get existing images
    $imagePaths = json_decode($product->image) ?? []; // Existing images

    // Check if new images are uploaded
    if ($request->hasFile('image')) {
        // Delete old images if needed
        foreach ($imagePaths as $oldImage) {
            if (Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $imagePaths = []; // Reset the image paths for the new uploads

        // Store the new uploaded images
        foreach ($request->file('image') as $image) {
            if ($image->isValid()) {
                $imagePaths[] = $image->store('product', 'public'); // Store new images
            }
        }
    }

    // Update the product with new data
    $product->update([
    'title' => $request->title,
    'description' => $request->description,
    'price' => $request->price,
    'sale_price' => $request->sale_price,
    'sku' => $request->sku,
    'stock' => $request->stock,
    'category_id' => $request->category_id,
    'status' => $request->status,
    'featured' => $request->featured,
    'trending' => $request->trending,
    'image' => json_encode($imagePaths),
    'frame' => $request->frame,
    'lens' => $request->lens,
    'gender' => $request->gender,
    'on_sale' => $request->boolean('on_sale'),
]);

    // Redirect with success message
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Fetch the specific product by ID
    $product = Product::findOrFail($id);

    // Check if the product has an image and delete it from storage
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete the product from the database
    $product->delete();

    // Redirect to the products index with a success message
    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

    
}