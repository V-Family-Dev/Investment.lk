<?php

namespace App\Http\Controllers;

use App\Models\Colonia_Style_Bungalow_Sale;
use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ColoniaStyleBungalowSaleController extends Controller
{
    public function index()
    {
        $sales = Colonia_Style_Bungalow_Sale::all();
        return view('colonia_sales.index', compact('sales'));
    }

    // Show form to create a new sale
    public function create()
    {
        return view('bungalow-sale');
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
        return $Property_manage;
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
        $sale = Colonia_Style_Bungalow_Sale::findOrFail($id);
        return view('colonia_sales.edit', compact('sale'));
    }

    // Update a sale
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'bedrooms' => 'required|string',
            'bathrooms' => 'required|string',
            'location' => 'required|string',
            'house_size' => 'required|string',
            'land_size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'contact_details' => 'required|string',
        ]);

        $sale = Colonia_Style_Bungalow_Sale::findOrFail($id);

        // Handle file upload if new image is uploaded
        if ($request->hasFile('image_path')) {
            $fileName = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
            $filePath = $request->file('image_path')->storeAs('uploads', $fileName, 'public');
            $validatedData['image_path'] = '/storage/' . $filePath;
        }

        $sale->update($validatedData);

        return redirect()->route('colonia_sales.index');
    }

    // Delete a sale
    public function destroy($id)
    {
        $sale = Colonia_Style_Bungalow_Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('colonia_sales.index');
    }
}
