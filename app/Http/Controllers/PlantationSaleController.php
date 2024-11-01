<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Plantation_sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class PlantationSaleController extends Controller
{
    public function index()
    {
        $sales = Plantation_sale::all();
        return $sales;
        // return view('plantation_sales.index', compact('sales'));
    }

    // Show the form for creating a new sale
    public function create()
    {
        return view('adminPanel/seller/plantation-sale');
    }

    // Store a new sale in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'plantation_type' => 'required|string|max:255',
            'size' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:15000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required',
        ]);



        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('Plantation_sale', 'public');
                $imagePaths[] = $imagePath;
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $plant = Plantation_sale::create($validated);
        $categoryName = $fac->category_name ?? 'plas';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $plant->id,
            'user_id' => $userId,

        ]);



        if ($plant) {
            return redirect()->back()->with('msg', 'Plantation sale added successfully!');
        } else {
            return redirect()->back()->with('msg', 'Plantation sale added fail!');
        }
    }

    // Display a single sale
    public function show($id)
    {
        $plantation_sale = Plantation_sale::findOrFail($id);
        return view('plantation_sales.show', compact('plantation_sale'));
    }

    // Show the form for editing a sale
    public function edit($id)
    {
        $plantation_sale = Plantation_sale::findOrFail($id);
        return view('adminPanel/seller/update/update-plantation-sale', compact('plantation_sale'));
    }

    // Update the sale
    public function update(Request $request, Plantation_sale $plantation_sale)
    {
        // // Log request data and existing image paths from the database
        // Log::info('Request Data:', $request->all());
        // Log::info('Existing Image Paths from Database: ' . $plantation_sale->image_path);

        // Validate the request, allowing for image uploads
         $request->validate([
            'title' => 'required|string|max:255',
            'plantation_type' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow multiple images
            'contact_details' => 'required|string|max:255',
        ]);

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($plantation_sale->image_path) {
                $oldImages = explode(',', $plantation_sale->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('Plantation_sale', 'public'); // Store in 'plantation_sales' folder
                $imagePaths[] = $imagePath; // Collect the new image paths
            }

            $imagePathsString = implode(',', $imagePaths); // Convert array to string

            // Update the image paths in the database
            $plantation_sale->update([
                'image_path' => $imagePathsString,
            ]);
        }

        // Update other plantation sale details
        $plantation_sale->update([
            'title' => $request->title,
            'plantation_type' => $request->plantation_type,
            'size' => $request->size,
            'location' => $request->location,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);

        // Redirect with success message
        return redirect()->route('plantation_sales.index')->with('success', 'Plantation sale updated successfully!');
    }


    // Delete a sale
    public function destroy($id)
    {
        $sale = Plantation_sale::findOrFail($id);
        $sale->update(['status' => 0]);


        return redirect()->route('plantation_sales.index')->with('success', 'Plantation sale deleted successfully!');
    }
}
