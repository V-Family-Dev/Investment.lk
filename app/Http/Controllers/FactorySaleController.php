<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\FactorySale;
use Illuminate\Http\Request;
use Storage;

class FactorySaleController extends Controller
{
    public function index()
    {
        $sales = FactorySale::all();
        return view('factory_sales.index', compact('sales'));
    }

    public function create()
    {
        return view('forms');
    }

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

        

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagePath = $image->store('property/factorysale', 'public'); // Store in 'public/property/factorysale'
        }

        // Save the factory sale details along with the image path
        $fac = FactorySale::create([
            'title' => $request->title,
            'property_type' => $request->property_type,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath ?? null, // Save the image path
            'contact_details' => $request->contact_details,
        ]);
        return $fac;
        // return redirect()->route('factory-sales.index')->with('success', 'Factory sale created successfully.');
    }


    // Display the specified resource (Read)
    public function show($id)
    {
        $factorySale = FactorySale::findOrFail($id);
        return view('factory_sales.show', compact('factorySale'));
    }

    // Show the form for editing the specified resource (Update)
    public function edit($id)
    {
        $factorySale = FactorySale::findOrFail($id);
        return view('factory_sales.edit', compact('factorySale'));
    }

    public function update(Request $request, FactorySale $factorySale)
    {
        // Validate the request including optional image upload
        $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation (optional)
            'contact_details' => 'required|string|max:255',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Save the image in the 'property/factorysale' directory
            $imagePath = $image->store('property/factorysale', 'public'); // Store in 'public/property/factorysale'

            // Optionally, delete the old image
            if ($factorySale->image_path) {
                Storage::delete('public/' . $factorySale->image_path);
            }

            // Update the FactorySale with the new image path
            $factorySale->update([
                'image_path' => $imagePath,
            ]);
        }

        // Update the rest of the FactorySale details
        $factorySale->update([
            'title' => $request->title,
            'property_type' => $request->property_type,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);

        return redirect()->route('factory-sales.index')->with('success', 'Factory sale updated successfully.');
    }


    // Remove the specified resource from storage (Delete)
    public function destroy($id)
    {
        $factorySale = FactorySale::findOrFail($id);
        $factorySale->delete();

        return redirect()->route('factory-sales.index')->with('success', 'Factory sale deleted successfully.');
    }
}
