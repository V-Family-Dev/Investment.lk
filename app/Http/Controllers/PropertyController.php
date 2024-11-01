<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Item;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Display a listing of the properties
    public function index()
    {
        $properties = Property::all();
        return response()->json($properties);
    }

    // Show the form for creating a new property
    public function create()
    {
        return view('properties.create');
    }

    // Store a newly created property in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'property_type' => 'required|string',
            'location' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photos' => 'required|array',
            'land_size' => 'nullable|string',
            'land_type' => 'nullable|string',
            'house_size' => 'nullable|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'condition' => 'nullable|string',
            'vehicle_name' => 'nullable|string',
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'year_of_manufacture' => 'nullable|integer',
            'fuel_type' => 'nullable|string',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'engine_capacity' => 'nullable|integer',
            'body_type' => 'nullable|string',
            'edition' => 'nullable|string',
            'transmission' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $images = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $image) {
                $images[] = $image->store('property_images', 'public');  
            }
        }

       $Property = Property::create([
            
            'title' => $request->title,
            'property_type' => $request->property_type,
            'location' =>  $request->location,
            'size' =>  $request->size,
            'price' =>  $request->price,
            'description' =>  $request->description,
            'photos' =>  $request->$images,
            'land_size' => $request->land_size,
            'land_type' =>  $request->land_type,
            'house_size' =>  $request->house_size,
            'bedrooms' =>  $request->bedrooms,
            'bathrooms' =>  $request->bathrooms,
            'condition' =>  $request->condition,
            'vehicle_name' =>  $request->vehicle_name,
            'brand' =>  $request->brand,
            'model' =>  $request->model,
            'year_of_manufacture' =>  $request->year_of_manufacture,
            'fuel_type' =>  $request->fuel_type,
            'mileage' =>  $request->mileage,
            'color' =>  $request->color,
            'engine_capacity' =>  $request->engine_capacity,
            'body_type' =>  $request->body_type,
            'edition' =>  $request->edition,
            'transmission' =>  $request->transmission,

        ]);
        if ($Property) {
            return redirect()->route('items.index')->with('success', 'Item created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create item.');
        }
    }

    // Display the specified property
    public function show($id)
    {
        $property = Property::find($id);
        return response()->json($property);
    }

    // Show the form for editing the specified property
    public function edit($id)
    {
        $property = Property::find($id);
        return view('properties.edit', compact('property'));
    }

    // Update the specified property in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'property_type' => 'required|string',
            'location' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photos' => 'required|array',
            'land_size' => 'nullable|string',
            'land_type' => 'nullable|string',
            'house_size' => 'nullable|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'condition' => 'nullable|string',
            'vehicle_name' => 'nullable|string',
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'year_of_manufacture' => 'nullable|integer',
            'fuel_type' => 'nullable|string',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'engine_capacity' => 'nullable|integer',
            'body_type' => 'nullable|string',
            'edition' => 'nullable|string',
            'transmission' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $property = Property::find($id);

        $images = $property->property_images;
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $images[] = $image->store('property_images', 'public');
            }
        }

        $property->update([
            'title' => $request->title,
            'property_type' => $request->property_type,
            'location' => $request->location,
            'price' => $request->price,
            'description' => $request->description,
            'property_images' => $images,
            'video_tour_link' => $request->video_tour_link,
        ]);

        return redirect()->route('properties.index');
    }

    // Remove the specified property from storage
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();

        return redirect()->route('properties.index');
    }
}

