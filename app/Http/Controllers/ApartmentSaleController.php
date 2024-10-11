<?php

namespace App\Http\Controllers;

use Storage;

use App\Models\ApartmentSale;
use Illuminate\Http\Request;

class ApartmentSaleController extends Controller
{
    // Display all apartment sales
    public function index()
    {
        $apartments = ApartmentSale::all();
        return view('apartment_sales.index', compact('apartments'));
    }

    // Show the form for creating a new apartment sale
    public function create()
    {
        return view('apartment_sales.create');
    }

    // Store a newly created apartment sale in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|string|max:255',
            'bathrooms' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('apartment_sales', 'public'); // Store in 'public/apartment_sales'
        }

        // Create a new apartment sale
        $ap = ApartmentSale::create([
            'title' => $request->title,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath,
            'contact_details' => $request->contact_details,
        ]);
return $ap;
        // return redirect()->route('apartment-sales.index')->with('success', 'Apartment sale created successfully.');
    }

    // Show a specific apartment sale
    public function show($id)
    {
        $apartment = ApartmentSale::findOrFail($id);
        return view('apartment_sales.show', compact('apartment'));
    }

    // Show the form for editing an existing apartment sale
    public function edit($id)
    {
        $apartment = ApartmentSale::findOrFail($id);
        return view('apartment_sales.edit', compact('apartment'));
    }

    // Update the specified apartment sale in the database
    public function update(Request $request, $id)
    {
        $apartment = ApartmentSale::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|string|max:255',
            'bathrooms' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

        $imagePath = $apartment->image_path;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imagePath) {
                Storage::delete('public/' . $imagePath);
            }

            // Store new image
            $image = $request->file('image');
            $imagePath = $image->store('apartment_sales', 'public');
        }

       $ap = $apartment->update([
            'title' => $request->title,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath,
            'contact_details' => $request->contact_details,
        ]);
return  $ap;
        // return redirect()->route('apartment-sales.index')->with('success', 'Apartment sale updated successfully.');
    }

    // Delete the specified apartment sale
    public function destroy($id)
    {
        $apartment = ApartmentSale::findOrFail($id);

        // Delete the image file if exists
        if ($apartment->image_path) {
            Storage::delete('public/' . $apartment->image_path);
        }

        $apartment->delete();

        return redirect()->route('apartment-sales.index')->with('success', 'Apartment sale deleted successfully.');
    }
}
