<?php

namespace App\Http\Controllers;

use App\Models\Equipment_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class EquipmentSaleController extends Controller
{
    // Display a listing of the equipment sales
    public function index()
    {
        $sales = Equipment_Sale::all();
        return view('equipment_sales.index', compact('sales'));
    }

    // Show the form for creating a new equipment sale
    public function create()
    {
        return view('equipment-sale');
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
    public function edit(Equipment_Sale $equipment_sale)
    {
        return view('equipment_sales.edit', compact('equipment_sale'));
    }

    // Update the specified equipment sale in storage
    public function update(Request $request, Equipment_Sale $equipment_sale)
    {
        $validated = $request->validate([
            'category_name' => 'required|string',
            'equipment_name' => 'required|string',
            'brand' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_path' => 'required|string',
            'contact_details' => 'required|string',
        ]);

        $equipment_sale->update($validated);

        return redirect()->route('equipment_sales.index')->with('success', 'Equipment Sale Updated Successfully');
    }

    // Remove the specified equipment sale from storage
    public function destroy(Equipment_Sale $equipment_sale)
    {
        $equipment_sale->delete();

        return redirect()->route('equipment_sales.index')->with('success', 'Equipment Sale Deleted Successfully');
    }
}
