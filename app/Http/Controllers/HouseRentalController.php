<?php

namespace App\Http\Controllers;

use App\Models\House_rental;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Storage;
class HouseRentalController extends Controller
{

    // Display a listing of the house rentals
    public function index()
    {
        $houseRentals = House_rental::all();
        // return view('house_rentals.index', compact('houseRentals'));
        return $houseRentals;
    }

    // Show the form for creating a new house rental
    public function create()
    {
        return view('adminPanel/seller/house-rental');
    }

    // Store a newly created house rental in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'price' => 'required|numeric|min:0|max:9999999999',
            'size' => 'required',
            'features' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('house_rental', 'public');
                $imagePaths[] = $imagePath;
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $house = House_rental::create($validated);
        $categoryName = $house->category_name ?? 'apren';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $house->id,
            'user_id' => $userId,

        ]);

        return back()->with('msg', 'House  rent added successfully!');
    }

    // Display the specified house rental
    public function show($id)
    {
        $houseRental = House_rental::findOrFail($id);
        return view('house_rentals.show', compact('houseRental'));
    }

    // Show the form for editing the specified house rental
    public function edit($id)
    {
        $houseRental = House_rental::findOrFail($id);
        return view('adminPanel/seller/update/update-house-rental', compact('houseRental'));
    }

    // Update the specified house rental in the database
    public function update(Request $request, House_rental $houseRental)
    {


        // Validate the request, including optional image upload
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:9999999999',
            'size' => 'required|string|max:255',
            'features' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // If existing images exist, delete them
            if ($houseRental->image_path) {
                $oldImages = explode(',', $houseRental->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload the new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('house_rental', 'public');
                $imagePaths[] = $imagePath;
            }

            // Update the `image_path` field with the new image paths
            $imagePathsString = implode(',', $imagePaths);
            $houseRental->update(['image_path' => $imagePathsString]);
        }

        // Update the rest of the HouseRental details
        $houseRental->update([
            'title' => $request->title,
            'location' => $request->location,
            'price' => $request->price,
            'size' => $request->size,
            'features' => $request->features,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);

        // Redirect back with success message
        return redirect()->route('house-rentals.index')->with('success', 'House rental updated successfully.');
        // return $houseRental;
    }


    // Remove the specified house rental from the database
    public function destroy($id)
    {
        $houseRental = House_rental::findOrFail($id);
        $houseRental->update(['status' => 0]);


        return redirect()->route('house-rentals.index')->with('success', 'House rental deleted successfully.');
    }
}
