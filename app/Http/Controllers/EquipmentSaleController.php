<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Equipment_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class EquipmentSaleController extends Controller
{
    // Display a listing of the equipment sales
    public function index()
    {
        $sales = Equipment_Sale::all();
        // return view('equipment_sales.index', compact('sales'));
        return $sales;
    }

    // Show the form for creating a new equipment sale
    public function create()
    {
        return view('adminPanel/seller/equipment-sale');
    }

    // Store a newly created equipment sale in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string',
            'brand' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string',
        ]);


        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('Equipment_Sale', 'public');
                $imagePaths[] = $imagePath; 
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $equipment = Equipment_Sale::create($validated);
        $categoryName = $equipment->category_name ?? 'eqts';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $equipment->id,
            'user_id' => $userId,

        ]);

        return back()->with('msg', 'Equipment sale added successfully!');

        // if($equipment){
        //     return redirect()->back()->with('msg','Plantation sale added successfully!');
        // }else{
        //     return redirect()->back()->with('msg','Plantation sale added fail!');
        // }

    }

    // Display the specified equipment sale
    public function show(Equipment_Sale $equipment_sale)
    {
        return view('equipment_sales.show', compact('equipment_sale'));
    }

    // Show the form for editing the specified equipment sale
    public function edit($id)
    {
        $equipment_sale = Equipment_Sale::findOrFail($id);

        return view('adminPanel/seller/update/update-equipment-sale', compact('equipment_sale'));
    }

    // Update the specified equipment sale in storage
    public function update(Request $request, Equipment_Sale $equipment_sale)
{
    // Log the request data
    // Log::info('Request Data:', $request->all());
    // Log::info('Existing Image Paths from Database: ' . $equipment_sale->image_path);

    // Validate the incoming request
    $validated = $request->validate([
        'equipment_name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Multiple image handling
        'contact_details' => 'required|string|max:255',
    ]);

    // Handle image upload if new images are provided
    if ($request->hasFile('images')) {
        // Delete old images if they exist
        if ($equipment_sale->image_path) {
            $oldImages = explode(',', $equipment_sale->image_path);
            foreach ($oldImages as $oldImage) {
                Storage::delete('public/' . $oldImage);
            }
        }

        // Upload new images
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('Equipment_Sale', 'public'); // Store in 'equipment_sales' folder
            $imagePaths[] = $imagePath; // Collect the new image paths
        }

        $imagePathsString = implode(',', $imagePaths); // Convert array to string

        // Update the image paths in the database
        $equipment_sale->update([
            'image_path' => $imagePathsString,
        ]);
    }

    // Update other equipment sale details
    $equipment_sale->update([
        'equipment_name' => $request->equipment_name,
        'brand' => $request->brand,
        'location' => $request->location,
        'price' => $request->price,
        'description' => $request->description,
        'contact_details' => $request->contact_details,
    ]);

    // Redirect to the equipment sales index with success message
    return redirect()->route('equipment_sales.index')->with('success', 'Equipment sale updated successfully!');
}

    // Remove the specified equipment sale from storage
    public function destroy(Equipment_Sale $equipment_sale)
    {
        $equipment_sale->delete();

        return redirect()->route('equipment_sales.index')->with('success', 'Equipment Sale Deleted Successfully');
    }
}
