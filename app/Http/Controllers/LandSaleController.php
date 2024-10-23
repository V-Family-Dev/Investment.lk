<?php

namespace App\Http\Controllers;
use App\Models\Land_sale;
use App\Models\Property_manage;
use Illuminate\Support\Facades\Log;
use Storage;
use Illuminate\Http\Request;

class LandSaleController extends Controller
{
   // Show all land sales
   public function index()
   {
       $sales = Land_sale::all();
    //    return view('land_sales.index', compact('sales'));
    return $sales;
   }

   // Show form to create a new land sale
   public function create()
   {
       return view('adminPanel\seller\land-sale');
   }

   // Store new land sale in the database
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'title' => 'required|string',
           'land_type' => 'required|string',
           'land_size' => 'required|string',
           'location' => 'required|string',
           'price' => 'required|numeric',
           'description' => 'required|string',
           'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
           'contact_details' => 'required|string',
       ]);

       $imagePaths = [];

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            Log::info('Images array: ', ['image' => $images]);
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('land_sales', 'public');
                $imagePaths[] = $imagePath; 
            }
        }

        $imagePathsString = implode(',', $imagePaths);

        $validatedData['image_path'] = $imagePathsString;

        $land_sale = Land_sale::create($validatedData);
        $categoryName = $land_sale->category_name?? 'hots';;
        $userId = auth()->id() ?? 1;
        $Property_manage= Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $land_sale->id, 
            'user_id' => $userId, 
       
        ]);
        return $land_sale;

    //    return redirect()->route('land_sales.index');
   }

   // Show a single land sale
   public function show($id)
   {
       $sale = Land_sale::findOrFail($id);
       return view('land_sales.show', compact('sale'));
   }

   // Show form to edit an existing land sale
   public function edit($id)
   {
       $land_sale = Land_sale::findOrFail($id);
       return view('adminPanel.seller.update.update-land-sale', compact('land_sale'));
   }

   // Update an existing land sale
   public function update(Request $request, Land_sale $landSale)
{
    // Log request data and existing image paths from the database
    Log::info('Request Data:', $request->all());
    Log::info('Existing Image Paths from Database: ' . $landSale->image_path);

    // Validate the request, allowing multiple images
    $request->validate([
        'title' => 'required|string|max:255',
        'land_type' => 'required|string|max:255',
        'land_size' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'contact_details' => 'required|string|max:255',
    ]);

    // Handle image upload if new images are provided
    if ($request->hasFile('images')) {
        // Delete old images if they exist
        if ($landSale->image_path) {
            $oldImages = explode(',', $landSale->image_path);
            foreach ($oldImages as $oldImage) {
                Storage::delete('public/' . $oldImage);
            }
        }

        // Upload new images
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('land_sales', 'public'); // Store in 'factorysale' folder
            $imagePaths[] = $imagePath; // Collect the new image paths
        }

        $imagePathsString = implode(',', $imagePaths); // Convert array to string

        // Update the image paths in the database
        $landSale->update([
            'image_path' => $imagePathsString,
        ]);
    }

    // Update other land sale details
    $landSale->update([
        'title' => $request->title,
        'land_type' => $request->land_type,
        'land_size' => $request->land_size,
        'location' => $request->location,
        'price' => $request->price,
        'description' => $request->description,
        'contact_details' => $request->contact_details,
    ]);

    // Redirect with success message
    // return redirect()->route('land_sales.index')->with('success', 'Land sale updated successfully.');
    return $landSale;
}


   // Delete a land sale
   public function destroy($id)
   {
       $sale = Land_sale::findOrFail($id);
       $sale->update(['status' => 0]);


       return redirect()->route('land_sales.index');
   }
}
