<?php

namespace App\Http\Controllers;

use App\Models\House_rental;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class HouseRentalController extends Controller
{
    
    // Display a listing of the house rentals
    public function index()
    {
        $houseRentals = House_rental::all();
        return view('house_rentals.index', compact('houseRentals'));
    }

    // Show the form for creating a new house rental
    public function create()
    {
        return view('house-rental');
    }

    // Store a newly created house rental in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'rent_price' => 'required|numeric',
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
        return view('house_rentals.edit', compact('houseRental'));
    }

    // Update the specified house rental in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'rent_price' => 'required|numeric',
            'size' => 'required',
            'features' => 'required',
            'description' => 'required',
            'image_path' => 'image',
            'contact_details' => 'required',
        ]);

        $houseRental = House_rental::findOrFail($id);

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
        } else {
            $imagePath = $houseRental->image_path;
        }

        $houseRental->update([
            'title' => $request->title,
            'location' => $request->location,
            'rent_price' => $request->rent_price,
            'size' => $request->size,
            'features' => $request->features,
            'description' => $request->description,
            'image_path' => $imagePath,
            'contact_details' => $request->contact_details,
        ]);

        return redirect()->route('house-rentals.index')->with('success', 'House rental updated successfully.');
    }

    // Remove the specified house rental from the database
    public function destroy($id)
    {
        $houseRental = House_rental::findOrFail($id);
        $houseRental->delete();

        return redirect()->route('house-rentals.index')->with('success', 'House rental deleted successfully.');
    }
}
