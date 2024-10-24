<?php

namespace App\Http\Controllers;

use App\Models\Luxury_House_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Storage;

class LuxuryHouseSaleController extends Controller
{
    // Display a listing of all houses
    public function index()
    {
        $houses = Luxury_House_Sale::all();
        // return view('luxury_houses.index', compact('houses'));
        return $houses;
    }

    // Show the form for creating a new house
    public function create()
    {
        return view('adminPanel.seller.luxury-house-sale');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string',
            'house_size' => 'required|string',
            'land_size' => 'required|string',
            'price' => 'required|numeric|min:0|max:9999999999',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate multiple images
            'contact_details' => 'nullable|string',
            'category_name' => 'string',
        ]);

        $imagePaths = [];

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('luxury__house__sales', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $luxuryHouse = Luxury_House_Sale::create($validated);
        $categoryName = $luxuryHouse->category_name ?? 'luxhs';
        
        $userId = auth()->id() ?? 1;
        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $luxuryHouse->id,
            'user_id' => $userId,

        ]);



        // return redirect('/luxury-houses')->with('success', 'House added successfully with images!');
        return $luxuryHouse;
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
        $luxury_house = Luxury_House_Sale::findOrFail($id);
        return view('adminPanel/seller/update/update-luxury-house-sale', compact('luxury_house'));
    }

    

    public function update(Request $request, Luxury_House_Sale $luxury_house)
    {
        // Log the incoming request data for debugging
        Log::info('Request Data:', $request->all());
    
        // Validate the request, including optional image upload
        $vali = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'house_size' => 'required|integer',
            'land_size' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Handling multiple images
            'contact_details' => 'nullable|string|max:255',
        ]);
    if($vali){
        Log::info('Request Data valid');

    }
        // Check if new images are uploaded
        if ($request->hasFile('image')) {
            // Delete the old images if they exist
            if ($luxury_house->image_path) {
                $oldImages = explode(',', $luxury_house->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }
    
            // Upload new images
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('luxury__house__sales', 'public');
                $imagePaths[] = $imagePath; // Add new image path to the array
            }
    
            // Convert the array of image paths to a string and update the record
            $imagePathsString = implode(',', $imagePaths);
            $luxury_house->update([
                'image_path' => $imagePathsString,
            ]);
        }
    
        // Update the rest of the Luxury_House_Sale details
        $lux = $luxury_house->update([
            'title' => $request->title,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'house_size' => $request->house_size,
            'land_size' => $request->land_size,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);
    
        return $lux;
        // Redirect back with a success message
        // return redirect()->route('luxury-houses.index')->with('success', 'Luxury house updated successfully.');
    }
    


    // Remove the specified house from the database
    public function destroy($id)
    {
        $house = Luxury_House_Sale::findOrFail($id);
        $house->update(['status' => 0]);


        return redirect('/luxury-houses')->with('success', 'House deleted successfully!');
    }
}
