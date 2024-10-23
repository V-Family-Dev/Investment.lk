<?php

namespace App\Http\Controllers;

use App\Models\Colonia_Style_Bungalow_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Storage;
class ColoniaStyleBungalowSaleController extends Controller
{
    public function index()
    {
        $sales = Colonia_Style_Bungalow_Sale::all();
        return $sales;
        // return view('colonia_sales.index', compact('sales'));
    }

    // Show form to create a new sale
    public function create()
    {
        return view('adminPanel.seller.bungalow-sale');
    }

    // Store a new sale in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'bedrooms' => 'required|string',
            'bathrooms' => 'required|string',
            'location' => 'required|string',
            'house_size' => 'required|string',
            'land_size' => 'required|string',
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
                $imagePath = $image->store('bungalowsales', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;
        $bungalow = Colonia_Style_Bungalow_Sale::create($validated);
        $categoryName = $bungalow->category_name ?? 'csbuns';
        
        $userId = auth()->id() ?? 1;
        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $bungalow->id,
            'user_id' => $userId,

        ]);
        return $bungalow;
        // return redirect()->route('colonia_sales.index');
    }

    // Show a single sale
    public function show($id)
    {
        $sale = Colonia_Style_Bungalow_Sale::findOrFail($id);
        return view('colonia_sales.show', compact('sale'));
    }

    // Show form to edit a sale
    public function edit($id)
    {
        $bungalow_sale = Colonia_Style_Bungalow_Sale::findOrFail($id);
        return view('adminPanel/seller/update/update-bungalow-sale', compact('bungalow_sale'));
    }

    // Update a sale
    public function update(Request $request, Colonia_Style_Bungalow_Sale $Colonia_Style_Bungalow_Sale)
    {
        Log::info('Request Data:', $request->all());
    
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'house_size' => 'required|integer',
            'land_size' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'nullable|string|max:255',
        ]);
    
        if($validatedData){
            Log::info('Request Data valid');
        }
    
        if ($request->hasFile('image')) {
            if ($Colonia_Style_Bungalow_Sale->image_path) {
                $oldImages = explode(',', $Colonia_Style_Bungalow_Sale->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }
    
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('bungalowsales', 'public');
                $imagePaths[] = $imagePath; 
            }
    
            $imagePathsString = implode(',', $imagePaths);
            $Colonia_Style_Bungalow_Sale->update([
                'image_path' => $imagePathsString,
            ]);
        }
    
        $Colonia_Style_Bungalow_Sale->update([
            'title' => $request->title,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'house_size' => $request->house_size,
            'land_size' => $request->land_size,
            'price' => $request->price,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);
        // return $Colonia_Style_Bungalow_Sale;
    
        return redirect()->route('colonia_sales.index')->with('success', 'Colonia Style Bungalow Sale updated successfully.');
    }
    



    // Delete a sale
    public function destroy($id)
    {
        $sale = Colonia_Style_Bungalow_Sale::findOrFail($id);
        $sale->update(['status' => 0]);

        return redirect()->route('colonia_sales.index');
    }
}
