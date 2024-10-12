<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\hotel_sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class HotelSaleController extends Controller
{
    // Show all hotel sales
    public function index()
    {
        $sales = hotel_sale::all();
        return view('hotel_sales.index', compact('sales'));
    }

    // Show form to create a new hotel sale
    public function create()
    {
        return view('hotel-sale');
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
        $sale = hotel_sale::findOrFail($id);
        return view('hotel_sales.edit', compact('sale'));
    }

    // Update an existing hotel sale
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'property_type' => 'required|string',
            'size' => 'required|string',
            'location' => 'required|string',
            'property_features' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'contact_details' => 'required|string',
        ]);

        $sale = hotel_sale::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $fileName = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
            $filePath = $request->file('image_path')->storeAs('uploads', $fileName, 'public');
            $validatedData['image_path'] = '/storage/' . $filePath;
        }

        $sale->update($validatedData);

        return redirect()->route('hotel_sales.index');
    }

    // Delete a hotel sale
    public function destroy($id)
    {
        $sale = hotel_sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('hotel_sales.index');
    }
}
