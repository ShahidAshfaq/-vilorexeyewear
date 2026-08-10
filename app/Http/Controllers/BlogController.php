<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all blogs
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    public function Userindex()
    {
        $blogs = Blog::paginate(6);
        $category = Category::get(); 
        return view('user.blog.index', compact('blogs','category'));
    }

    public function Usershow(string $blog)
    {
        
        $blogPost = Blog::where('slug', $blog)->firstOrFail();

        // Increment the views count
        $blogPost->increment('views');

        // Fetch other necessary data
        $allblog = Blog::orderBy('created_at', 'desc')->get();
        $popularBlogs = Blog::orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        // $blogs = Blog::find($blog);
        $blogs = Blog::where('slug', $blog)->firstOrFail();
        return view('user.blog.show', compact('blogs','categories','allblog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        // Fetch all categories to display in the create form
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'title' => 'required',
    //         'slug' => 'required|unique:blogs',
    //         'content' => 'required',
    //         'image' => 'nullable|image',
    //         'category' => 'required',
    //         'author' => 'required',
    //     ]);

    //     // Get all the request data
    //     $data = $request->all();

    //     // Check if an image file is uploaded and store it
    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('images', 'public');
    //     }

    //     // Create the blog post
    //     Blog::create($data);

    //     // Redirect back to the blog list with a success message
    //     return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    // }

    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Limit file size to 5MB
        'category' => 'required|string|max:255',
        'author' => 'required|string|max:255',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Preserve original extension
        $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in 'storage/app/public/images'
        $validatedData['image'] = $imagePath; // Save image path in DB
    }

    // Create the blog post
    Blog::create($validatedData);

    return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // Fetch all categories to display in the edit form
        $categories = Category::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validate the updated data
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $blog->id,
            'content' => 'required',
            'image' => 'nullable|image',
            'category' => 'nullable',
            'author' => 'nullable',
        ]);

        // Get all the request data
        $data = $request->all();

        // Check if an image file is uploaded and store it
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update the blog post
        $blog->update($data);

        // Redirect back to the blog list with a success message
        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete the blog post
        $blog->delete();

        // Redirect back to the blog list with a success message
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }
}
