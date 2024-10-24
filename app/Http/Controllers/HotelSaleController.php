<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\hotel_sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Storage;
class HotelSaleController extends Controller
{
    // Show all hotel sales
    public function index()
    {
        $sales = hotel_sale::all();
        return $sales;
        // return view('adminPanel.seller.update.hotel-sale', compact('sales'));
    }

    // Show form to create a new hotel sale
    public function create()
    {
        return view('adminPanel.seller.hotel-sale');
    }

    // Store new hotel sale in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'property_type' => 'required|string',
            'size' => 'required|string',
            'location' => 'required|string',
            'property_features' => 'required|string',
            'price' => 'required|numeric|min:0|max:9999999999',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'contact_details' => 'required|string',
        ]);

        $imagePaths = [];

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('hotel_sales', 'public');
                $imagePaths[] = $imagePath; 
            }
        }

        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $hotel_sale = hotel_sale::create($validated);
        $categoryName = $hotel_sale->category_name?? 'hots';;
        $userId = auth()->id() ?? 1;
        $Property_manage= Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $hotel_sale->id, 
            'user_id' => $userId, 
       
        ]);
        return $hotel_sale;

        // return redirect()->route('hotel_sales.index');
    }

    // Show a single hotel sale
    public function show($id)
    {
        $sale = hotel_sale::findOrFail($id);
        return view('hotel_sales.show', compact('sale'));
    }

    // Show form to edit an existing hotel sale
    public function edit($id)
    {
        $hotel_sale = hotel_sale::findOrFail($id);
        return view('adminPanel.seller.update.update-hotel-sale', compact('hotel_sale'));
    }

    // Update an existing hotel sale

    public function update(Request $request, hotel_sale $hotelSale)
    {
        // Log request data and existing image paths from the database
        Log::info('Request Data:', $request->all());
        Log::info('Existing Image Paths from Database: ' . $hotelSale->image_path);
    
        // Validate the request with optional image uploads
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
    
        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($hotelSale->image_path) {
                $oldImages = explode(',', $hotelSale->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }
    
            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('hotel_sales', 'public');  // Store in 'factorysale' folder
                $imagePaths[] = $imagePath;  // Collect the new image paths
            }
    
            $imagePathsString = implode(',', $imagePaths);  // Convert array to string
    
            // Update the image paths in the database
            $hotelSale->update([
                'image_path' => $imagePathsString,
            ]);
        }
    
        // Update other hotel sale details
        $hotelSale->update([
            'title' => $request->title,
            'property_type' => $request->property_type,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);
    
        // Redirect with success message
        // return redirect()->route('hotel_sales.index')->with('success', 'Hotel sale updated successfully.');
        return $hotelSale;
    }
    
   
    // Delete a hotel sale
    public function destroy($id)
    {
        $sale = hotel_sale::findOrFail($id);
        $sale->update(['status' => 0]);

        return redirect()->route('hotel_sales.index');
    }
}
