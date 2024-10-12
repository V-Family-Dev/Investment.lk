<?php

namespace App\Http\Controllers;
use App\Models\Land_sale;
use App\Models\Property_manage;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class LandSaleController extends Controller
{
   // Show all land sales
   public function index()
   {
       $sales = Land_sale::all();
       return view('land_sales.index', compact('sales'));
   }

   // Show form to create a new land sale
   public function create()
   {
       return view('land-sale');
   }

   // Store new land sale in the database
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'title' => 'required|string',
           'land_type' => 'required|string',
           'land_size' => 'required|string',
           'location' => 'required|string',
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
                $imagePath = $image->store('land_sales', 'public');
                $imagePaths[] = $imagePath; 
            }
        }

        $imagePathsString = implode(',', $imagePaths);

        $validatedData['image_path'] = $imagePathsString;

        $land_sale = Land_sale::create($validatedData);
        $categoryName = $land_sale->category_name?? 'hots';;
        $userId = auth()->id() ?? 1;
        $Property_manage= Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $land_sale->id, 
            'user_id' => $userId, 
       
        ]);
        return $land_sale;

    //    return redirect()->route('land_sales.index');
   }

   // Show a single land sale
   public function show($id)
   {
       $sale = Land_sale::findOrFail($id);
       return view('land_sales.show', compact('sale'));
   }

   // Show form to edit an existing land sale
   public function edit($id)
   {
       $sale = Land_sale::findOrFail($id);
       return view('land_sales.edit', compact('sale'));
   }

   // Update an existing land sale
   public function update(Request $request, $id)
   {
       $validatedData = $request->validate([
           'title' => 'required|string',
           'land_type' => 'required|string',
           'land_size' => 'required|string',
           'location' => 'required|string',
           'price' => 'required|numeric',
           'description' => 'required|string',
           'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
           'contact_details' => 'required|string',
       ]);

       $sale = Land_sale::findOrFail($id);

       if ($request->hasFile('image_path')) {
           $fileName = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
           $filePath = $request->file('image_path')->storeAs('uploads', $fileName, 'public');
           $validatedData['image_path'] = '/storage/' . $filePath;
       }

       $sale->update($validatedData);

       return redirect()->route('land_sales.index');
   }

   // Delete a land sale
   public function destroy($id)
   {
       $sale = Land_sale::findOrFail($id);
       $sale->delete();

       return redirect()->route('land_sales.index');
   }
}
