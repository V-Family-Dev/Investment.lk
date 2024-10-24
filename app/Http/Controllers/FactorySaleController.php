<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Property_manage;

use App\Models\FactorySale;
use Illuminate\Http\Request;
use Storage;

class FactorySaleController extends Controller
{
    public function index()
    {
        $sales = FactorySale::all();
        // return view('factory_sales.index', compact('sales'));
        return $sales;
    }

    public function create()
    {
        return view('adminPanel/seller/forms');
    }

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);
        $imagePaths = [];
        // Handle image uploads
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                // Store the image and get the path
                $imagePath = $image->store('factorysale', 'public');
                $imagePaths[] = $imagePath; // Add the image path to the array
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $fac = FactorySale::create($validated);
        $categoryName = $fac->category_name ?? 'fcs';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $fac->id,
            'user_id' => $userId,

        ]);




        return $fac;
        // return redirect()->route('factory-sales.index')->with('success', 'Factory sale created successfully.');
    }


    // Display the specified resource (Read)
    public function show($id)
    {
        $factorySale = FactorySale::findOrFail($id);
        // return view('factory_sales.show', compact('factorySale'));
        return $factorySale;
    }

    // Show the form for editing the specified resource (Update)
    public function edit($id)
    {
        $factorySale = FactorySale::findOrFail($id);
        return view('adminPanel/seller/update/update-factory', compact('factorySale'));

    }

    public function update(Request $request, FactorySale $factorySale)
    {
        Log::info('Request Data:', $request->all());
        Log::info('Request Data form database:'. $factorySale->imagePaths);

        // Validate the request including optional image upload
        $request->validate([
            'title' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

       
        if ($request->hasFile('image')) {
            // Delete the old images if they exist
            if ($factorySale->image_path) {
                $oldImages = explode(',', $factorySale->image_path); 
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload new images
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('factorysale', 'public');
                $imagePaths[] = $imagePath; // Add the new image path to the array
            }

            $imagePathsString = implode(',', $imagePaths);

            $factorySale->update([
                'image_path' => $imagePathsString,
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
        $factorySale->update(['status' => 0]);


        // return redirect()->route('factory-sales.index')->with('success', 'Factory sale deleted successfully.');
        return $factorySale;
    }
}
