<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userProfiles = UserProfile::all();
        
        return view('admin.profile.index', compact('userProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.create'); // Update to correct view for creating a profile
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'name' => 'required|string|max:255',

        'phone' => 'nullable|string|max:30',

        'email' => 'nullable|email|max:255',

        'address' => 'nullable|string|max:1000',

        'city' => 'nullable|string|max:100',

        'description' => 'nullable|string',

        'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:6048',

        'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:6048',

        'facebook' => 'nullable|url|max:255',

        'instagram' => 'nullable|url|max:255',

        'whatsapp' => 'nullable|string|max:30',

        'website' => 'nullable|url|max:255',
    ]);


    // Hero / Banner Image
    $imagePath = $request
        ->file('image')
        ->store('profiles', 'public');


    // Store Logo
    $logoPath = null;

    if ($request->hasFile('logo')) {

        $logoPath = $request
            ->file('logo')
            ->store('profiles', 'public');
    }


    // Create Profile
    UserProfile::create([

        'name' => $request->name,

        'phone' => $request->phone,

        'email' => $request->email,

        'address' => $request->address,

        'city' => $request->city,

        'description' => $request->description,

        // Hero image
        'image' => $imagePath,

        // Logo
        'logo' => $logoPath,

        'facebook' => $request->facebook,

        'instagram' => $request->instagram,

        'whatsapp' => $request->whatsapp,

        'website' => $request->website,
    ]);


    return redirect()
        ->route('setting.index')
        ->with('success', 'Store profile created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.profile.show', compact('userProfile')); // Show profile details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the user profile by ID
        $userProfile = UserProfile::findOrFail($id);
        return view('admin.profile.edit', compact('userProfile')); // Return edit view with the profile data
    }
    
    /**
     * Update the specified resource in storage.
     */
 
public function update(Request $request, $id)
{
    // Find the store profile
    $userProfile = UserProfile::findOrFail($id);


    // Validate form inputs
    $validated = $request->validate([

        'name'        => 'required|string|max:255',

        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048',

        'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048',

        'phone'       => 'nullable|string|max:50',

        'email'       => 'nullable|email|max:255',

        'whatsapp'    => 'nullable|string|max:50',

        'address'     => 'nullable|string',

        'description' => 'nullable|string',

        'facebook'    => 'nullable|url|max:255',

        'instagram'   => 'nullable|url|max:255',

    ]);


    /*
    |--------------------------------------------------------------------------
    | Hero / Banner Image
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('image')) {

        // Delete old image
        if ($userProfile->image) {

            Storage::disk('public')
                ->delete($userProfile->image);

        }


        // Store new image
        $imagePath = $request->file('image')
            ->store('profiles', 'public');


        $userProfile->image = $imagePath;
    }


    /*
    |--------------------------------------------------------------------------
    | Store Logo
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('logo')) {

        // Delete old logo
        if ($userProfile->logo) {

            Storage::disk('public')
                ->delete($userProfile->logo);

        }


        // Store new logo
        $logoPath = $request->file('logo')
            ->store('profiles/logos', 'public');


        $userProfile->logo = $logoPath;
    }


    /*
    |--------------------------------------------------------------------------
    | Store Information
    |--------------------------------------------------------------------------
    */

    $userProfile->name =
        $validated['name'];

    $userProfile->phone =
        $validated['phone'] ?? null;

    $userProfile->email =
        $validated['email'] ?? null;

    $userProfile->whatsapp =
        $validated['whatsapp'] ?? null;

    $userProfile->address =
        $validated['address'] ?? null;

    $userProfile->description =
        $validated['description'] ?? null;

    $userProfile->facebook =
        $validated['facebook'] ?? null;

    $userProfile->instagram =
        $validated['instagram'] ?? null;


    /*
    |--------------------------------------------------------------------------
    | Save
    |--------------------------------------------------------------------------
    */

    $userProfile->save();


    /*
    |--------------------------------------------------------------------------
    | Redirect
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route('setting.index')
        ->with(
            'success',
            'Store settings updated successfully!'
        );
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        // Delete the profile image
        if ($userProfile->image && Storage::disk('/storage/app/public/')->exists($userProfile->image)) {
            // Delete the image
            Storage::disk('public')->delete($userProfile->image);
        }

        // Delete the profile
        $userProfile->delete();

        return redirect()->route('setting.index')->with('success', 'Profile deleted successfully!');
    }
}
