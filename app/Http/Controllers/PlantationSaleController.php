<?php

namespace App\Http\Controllers;

use App\Models\Plantation_sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class PlantationSaleController extends Controller
{
    public function index()
    {
        $sales = Plantation_sale::all();
        return view('plantation_sales.index', compact('sales'));
    }

    // Show the form for creating a new sale
    public function create()
    {
        return view('plantation_sales.create');
    }

    // Store a new sale in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'plantation_type' => 'required|string|max:255',
            'size' => 'required',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
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

    

        if($plant){
            return redirect()->back()->with('msg','Plantation sale added successfully!');
        }else{
            return redirect()->back()->with('msg','Plantation sale added fail!');
        }
    }

    // Display a single sale
    public function show($id)
    {
        $sale = Plantation_sale::findOrFail($id);
        return view('plantation_sales.show', compact('sale'));
    }

    // Show the form for editing a sale
    public function edit($id)
    {
        $sale = Plantation_sale::findOrFail($id);
        return view('plantation_sales.edit', compact('sale'));
    }

    // Update the sale
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'plantation_type' => 'required',
            'size' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image_path' => 'image',
            'contact_details' => 'required',
        ]);

        $sale = Plantation_sale::findOrFail($id);

        // Handle image update
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('plantation_sales', 'public');
            $sale->image_path = $imagePath;
        }

        // Update the sale record
        $sale->update([
            'title' => $request->title,
            'plantation_type' => $request->plantation_type,
            'size' => $request->size,
            'location' => $request->location,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);

        return redirect()->route('plantation_sales.index')->with('success', 'Plantation sale updated successfully!');
    }

    // Delete a sale
    public function destroy($id)
    {
        $sale = Plantation_sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('plantation_sales.index')->with('success', 'Plantation sale deleted successfully!');
    }
}
