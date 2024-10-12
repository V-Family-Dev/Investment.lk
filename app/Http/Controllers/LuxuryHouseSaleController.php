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

    public function store(Request $request)
    {
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
        $categoryName = $luxuryHouse->category_name?? 'luxhs';;
        $userId = auth()->id() ?? 1;
        $Property_manage= Property_manage::create([
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
