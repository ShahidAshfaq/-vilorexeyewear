<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

//     public function store(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add your validation rules
//     ]);

   
//     // Create a new category
//     $category = new Category();
//     $category->name = $request->input('name');

//     // Handle the image upload
//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imagePath = $image->hashName(); // Generates a unique filename
//     $image->storeAs('categories', $imagePath, 'public'); // Stores the file in storage/app/public/categories/
//     $category->image = 'categories/' . $imagePath;

// //$imagePath = $request->file('image');
//        // $save = $imagePath->store('categories', 'public');
//        // $imagePath = $request->file('image')->store('categories', 'public');
//       // $category->image = $imagePath; // Assuming you have an 'image' field in your categories table
//     }
   
//     $category->save();

//     return redirect()->route('categories.index')->with('success', 'Category added successfully.');
// }

public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Initialize the image path variable
    $imagePath = null;

    // Handle the image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Preserve original extension
        $image->storeAs('categories', $imageName, 'public'); // Save file with original extension
        $imagePath = 'categories/' . $imageName;
    }

    // Create category using mass assignment
    Category::create([
        'name' => $validatedData['name'],
        'image' => $imagePath, // Assign image path if available
    ]);

    return redirect()->route('categories.index')->with('success', 'Category added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = Category::findOrFail($id); // Find the category by ID

    // Optionally, delete the image from storage
    if ($category->image) {
        Storage::disk('public')->delete($category->image);
    }

    $category->delete(); // Delete the category

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

}
