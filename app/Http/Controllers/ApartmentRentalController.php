<?php

namespace App\Http\Controllers;

use App\Models\Apartment_rental;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class ApartmentRentalController extends Controller
{
    public function index()
    {
        $apartments = Apartment_rental::all();
        return view('apartment-rentals.index', compact('apartments'));
    }

    // Show the form for creating a new apartment rental
    public function create()
    {
        return view('apartment-rental');
    }

    // Store a newly created apartment rental in storage
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'rent_price' => 'required|numeric',
            'size' => 'required|string',
            'features' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('aprtment_rental', 'public');
                $imagePaths[] = $imagePath; 
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $apartment = Apartment_rental::create($validated);
        $categoryName = $apartment->category_name ?? 'apren';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $apartment->id,
            'user_id' => $userId,

        ]);

        return back()->with('msg', 'apratment  rent added successfully!');
    }

    // Display the specified apartment rental
    public function show(Apartment_rental $apartmentRental)
    {
        return view('apartment-rentals.show', compact('apartmentRental'));
    }

    // Show the form for editing the specified apartment rental
    public function edit(Apartment_rental $apartmentRental)
    {
        return view('apartment-rentals.edit', compact('apartmentRental'));
    }

    // Update the specified apartment rental in storage
    public function update(Request $request, Apartment_rental $apartmentRental)
    {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'rent_price' => 'required|numeric',
            'size' => 'required|string',
            'features' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'required|string',
            'contact_details' => 'required|string',
        ]);

        $apartmentRental->update($request->all());

        return redirect()->route('apartment-rentals.index')->with('success', 'Apartment rental updated successfully.');
    }

    // Remove the specified apartment rental from storage
    public function destroy(Apartment_rental $apartmentRental)
    {
        $apartmentRental->delete();

        return back()->with('success', 'Apartment rental deleted successfully.');
    }
}
