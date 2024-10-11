<?php

namespace App\Http\Controllers;

use App\Models\Luxury_House_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LuxuryHouseSaleController extends Controller
{
    // Display a listing of all houses
    public function index()
    {
        $houses = Luxury_House_Sale::all();
        return view('luxury_houses.index', compact('houses'));
    }

    // Show the form for creating a new house
    public function create()
    {
        return view('luxury_houses.create');
    }

    // Store a newly created house in the database
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'title' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string',
            'house_size' => 'required|integer',
            'land_size' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate multiple images
            'contact_details' => 'nullable|string',
            'category_name' => 'string',
        ]);

        // Initialize an empty array to store the image paths
        $imagePaths = [];

        // Handle image uploads
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                // Store the image and get the path
                $imagePath = $image->store('luxury__house__sales', 'public');
                $imagePaths[] = $imagePath; // Add the image path to the array
            }
        }

        // Convert the array of image paths into a comma-separated string
        $imagePathsString = implode(',', $imagePaths);

        // Add image_path to the validated data
        $validated['image_path'] = $imagePathsString;

        // Save the house details along with the image paths
        $luxuryHouse = Luxury_House_Sale::create($validated);
        $categoryName = $luxuryHouse->category_name?? 'luxhs';;
        $userId = auth()->id() ?? 1;
        // Save the data in the property_manages table
        $Property_manage= Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $luxuryHouse->id, // Use the ID of the newly created house
            'user_id' => $userId, // Assuming you're using authentication to get the current user
        //     // 'status' => 'pending', // Set initial status for the property management
        //     // 'ads_payment_id' => null, // You can fill this later
        //     // 'ads_payment_status' => 'pending', // Example default value
        //     // 'active_or_not' => 1, // Assuming 1 is active and 0 is inactive
        ]);



        // return redirect('/luxury-houses')->with('success', 'House added successfully with images!');
        return $Property_manage;
    }


    // Display a single house
    public function show($id)
    {
        $house = Luxury_House_Sale::findOrFail($id);
        return view('luxury_houses.show', compact('house'));
    }

    // Show the form for editing a house
    public function edit($id)
    {
        $house = Luxury_House_Sale::findOrFail($id);
        return view('luxury_houses.edit', compact('house'));
    }

    // Update the specified house in the database
    public function update(Request $request, $id)
    {
        $house = Luxury_House_Sale::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string',
            'house_size' => 'required|integer',
            'land_size' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
            'contact_details' => 'nullable|string',
        ]);

        $house->update($validated);

        return redirect('/luxury-houses')->with('success', 'House updated successfully!');
    }

    // Remove the specified house from the database
    public function destroy($id)
    {
        $house = Luxury_House_Sale::findOrFail($id);
        $house->delete();

        return redirect('/luxury-houses')->with('success', 'House deleted successfully!');
    }
}
