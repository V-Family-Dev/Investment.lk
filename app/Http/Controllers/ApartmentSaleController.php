<?php

namespace App\Http\Controllers;

use App\Models\Property_manage;
use Storage;

use App\Models\ApartmentSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApartmentSaleController extends Controller
{
    // Display all apartment sales
    public function index()
    {
        $apartments = ApartmentSale::all();
        // return view('apartment_sales.index', compact('apartments'));
        return $apartments;
    }

    // Show the form for creating a new apartment sale
    public function create()
    {
        return view('adminPanel/seller/apartment-sale');
    }

    // Store a newly created apartment sale in the database
    public function store(Request $request)
    {
        $validated  = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|string|max:255',
            'bathrooms' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);


        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('apartment_sales', 'public');
                $imagePaths[] = $imagePath;
            }
        }


        $imagePathsString = implode(',', $imagePaths);
        $validated['image_path'] = $imagePathsString;

        $aprtment = ApartmentSale::create($validated);
        $categoryName = $aprtment->category_name ?? 'apts';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $aprtment->id,
            'user_id' => $userId,

        ]);




        return $aprtment;
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
        $apartment_sale = ApartmentSale::findOrFail($id);
        return view('adminPanel/seller/update/update-apartment-sale', compact('apartment_sale'));
    }


    public function update(Request $request, ApartmentSale $apartment_sale)
    {
        Log::info('Request Data:', $request->all());
       
        // Validate the request including optional image upload
         $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|string|max:255',
            'bathrooms' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);
        // Check for image updates
        if ($request->hasFile('images')) {
            if ($apartment_sale->image_path) {
                Log::info('image deleted');
                $oldImages = explode(',', $apartment_sale->image_path);

                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }
    
            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('apartment_sales', 'public');
                $imagePaths[] = $imagePath; // Add new image path to the array
            }
            $imagePathsString = implode(',', $imagePaths);
            // Update the image path
            $apartment_sale->update([
                'image_path' => $imagePathsString,
            ]);

        }
       
        // Update the rest of the ApartmentSale details
        $apartment_sale->update([
            'title' => $request->title,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);
      
        return $apartment_sale;
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
