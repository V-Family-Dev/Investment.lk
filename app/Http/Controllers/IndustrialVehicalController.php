<?php

namespace App\Http\Controllers;

use App\Models\industrial_vehical;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class IndustrialVehicalController extends Controller
{
    public function index()
    {
        $vehicles = industrial_vehical::all();
        return view('industrial_vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     */
    public function create()
    {
        return view('industrial_vehicles.create');
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
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
            'model' => 'required|string|max:255',
            'year' => 'required',
            'fual_type' => 'required|string|max:255',
            'mileage' => 'required',
            'color' => 'required|string|max:255',
            'engine_capacity' => 'required',
            'bodytype' => 'required|string|max:255',
            'edition' => 'required',
            'transmisson' => 'required',
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
    public function edit(industrial_vehical $industrial_vehicle)
    {
        return view('industrial_vehicles.edit', compact('industrial_vehicle'));
    }

    /**
     * Update the specified vehicle in the database.
     */
    public function update(Request $request, industrial_vehical $industrial_vehicle)
    {
        $request->validate([
            'vehical_name' => 'required',
            'brand' => 'required',
            'location' => 'required',
            'condtion' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image_path' => 'required',
            'model' => 'required',
            'year' => 'required',
            'fual_type' => 'required',
            'mileage' => 'required',
            'color' => 'required',
            'engine_capacity' => 'required',
            'bodytype' => 'required',
            'edition' => 'required',
            'transmisson' => 'required',
        ]);

        $industrial_vehicle->update($request->all());

        return redirect()->route('industrial_vehicles.index')
                         ->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified vehicle from the database.
     */
    public function destroy(industrial_vehical $industrial_vehicle)
    {
        $industrial_vehicle->delete();

        return redirect()->route('industrial_vehicles.index')
                         ->with('success', 'Vehicle deleted successfully.');
    }
}
