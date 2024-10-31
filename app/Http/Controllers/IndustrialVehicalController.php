<?php

namespace App\Http\Controllers;

use App\Models\industrial_vehical;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Storage;
class IndustrialVehicalController extends Controller
{
    public function index()
    {
        $vehicles = industrial_vehical::all();
        // return view('adminPanel/seller/', compact('vehicles'));
        return $vehicles;
    }

    /**
     * Show the form for creating a new vehicle.
     */
    public function create()
    {
        return view('adminPanel/seller/industrial-vehicle-sale');
    }

    /**
     * Store a newly created vehicle in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehical_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'condtion' => 'required|string|max:255',
            'price' => 'required|string|min:0|max:9999999999',
            'description' => 'required|string|max:1000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'model' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'fual_type' => 'required|string|max:255',
            'mileage' => 'required|string|min:0|max:1000000',
            'color' => 'required|string|max:50',
            'engine_capacity' => 'required|string|min:0|max:10000',
            'bodytype' => 'required|string|max:255',
            'edition' => 'required|string|max:255',
            'transmisson' => 'required|string|max:255',
            'contact_details' => 'required|string|max:255',

        ]);

        $imagePaths = [];
        // Handle image uploads
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                // Store the image and get the path
                $imagePath = $image->store('vehical sale', 'public');
                $imagePaths[] = $imagePath; // Add the image path to the array
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $vehical = industrial_vehical::create($validated);
        $categoryName = $fac->category_name ?? 'vehs';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $vehical->id,
            'user_id' => $userId,

        ]);
        return $vehical;

        // return redirect()->route('industrial_vehicles.index')
        //                  ->with('success', 'Vehicle added successfully.');
    }


    public function show(industrial_vehical $industrial_vehicle)
    {
        return view('industrial_vehicles.show', compact('industrial_vehicle'));
    }

    /**
     * Show the form for editing the specified vehicle.
     */
    public function edit($id)
    {
        $vehical_sale = industrial_vehical::findOrFail($id);

        return view('adminPanel/seller/update/update-industrial-vehicle-sale', compact('vehical_sale'));
    }

    /**
     * Update the specified vehicle in the database.
     */
    public function update(Request $request, industrial_vehical $industrial_vehicle)
    {
        // Log request data and existing image paths from the database
        // Log::info('Request Data:', $request->all());
        // Log::info('Existing Image Paths from Database: ' . $industrial_vehicle->image_path);

        // Validate the request, allowing for image uploads
        $request->validate([
            'vehical_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'condtion' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow multiple images
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'fual_type' => 'required|string|max:255',
            'mileage' => 'required|numeric',
            'color' => 'required|string|max:255',
            'engine_capacity' => 'required|string|max:255',
            'bodytype' => 'required|string|max:255',
            'edition' => 'required|string|max:255',
            'transmisson' => 'required|string|max:255',
            'contact_details' => 'required|string|max:255',

        ]);

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($industrial_vehicle->image_path) {
                $oldImages = explode(',', $industrial_vehicle->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('vehical sale', 'public'); // Store in 'industrial_vehicles' folder
                $imagePaths[] = $imagePath; // Collect the new image paths
            }

            $imagePathsString = implode(',', $imagePaths); // Convert array to string

            // Update the image paths in the database
            $industrial_vehicle->update([
                'image_path' => $imagePathsString,
            ]);
        }

        // Update other industrial vehicle details
        $industrial_vehicle->update([
            'vehical_name' => $request->vehical_name,
            'brand' => $request->brand,
            'location' => $request->location,
            'condtion' => $request->condtion,
            'price' => $request->price,
            'description' => $request->description,
            'model' => $request->model,
            'year' => $request->year,
            'fual_type' => $request->fual_type,
            'mileage' => $request->mileage,
            'color' => $request->color,
            'engine_capacity' => $request->engine_capacity,
            'bodytype' => $request->bodytype,
            'edition' => $request->edition,
            'transmisson' => $request->transmisson,
            'contact_details' => $request->contact_details,

        ]);

        // Redirect with success message
        // return redirect()->route('industrial_vehicles.index')->with('success', 'Vehicle updated successfully.');
        return $industrial_vehicle;
    }


    /**
     * Remove the specified vehicle from the database.
     */
    public function destroy(industrial_vehical $industrial_vehicle)
    {
        $industrial_vehicle->update(['status' => 0]);

        return redirect()->route('industrial_vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
