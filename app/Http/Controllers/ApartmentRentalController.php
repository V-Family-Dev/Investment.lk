<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Apartment_rental;
use App\Models\Property_manage;
use Illuminate\Http\Request;

class ApartmentRentalController extends Controller
{
    public function index()
    {
        $apartments_rent = Apartment_rental::all();
        // return view('apartment-rentals.index', compact('apartments_rent'));
        return $apartments_rent;
    }

    // Show the form for creating a new apartment rental
    public function create()
    {
        return view('adminPanel/seller/apartment-rental');
    }

    // Store a newly created apartment rental in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'rent_price' => 'required|numeric',
            'size' => 'required|string',
            'features' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('aprtment_rental', 'public');
                $imagePaths[] = $imagePath;
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $apartment = Apartment_rental::create($validated);
        $categoryName = $apartment->category_name ?? 'apren';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $apartment->id,
            'user_id' => $userId,

        ]);

        return back()->with('msg', 'apratment  rent added successfully!');
    }

    // Display the specified apartment rental
    public function show(Apartment_rental $apartmentRental)
    {
        return view('apartment-rentals.show', compact('apartmentRental'));
    }

    // Show the form for editing the specified apartment rental
    public function edit($id)
    {
        $apartmentRental = Apartment_rental::findOrFail($id);

        return view('adminPanel/seller/update/update-apartment-rental', compact('apartmentRental'));
    }

    // Update the specified apartment rental in storage
    public function update(Request $request, Apartment_rental $apartmentRental)
    {
        // Log request data
        // Log::info('Request Data:', $request->all());
        // Log::info('Existing Image Path from Database: ' . $apartmentRental->image_path);

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rent_price' => 'required|numeric',
            'size' => 'required|string|max:255',
            'features' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Handle multiple image files
            'contact_details' => 'required|string|max:255',
        ]);

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($apartmentRental->image_path) {
                $oldImages = explode(',', $apartmentRental->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('aprtment_rental', 'public'); // Store in 'apartment_rentals' folder
                $imagePaths[] = $imagePath; // Add new image path to the array
            }

            // Convert image paths array to string for storage
            $imagePathsString = implode(',', $imagePaths);

            // Update the image_path field in the database
            $apartmentRental->update([
                'image_path' => $imagePathsString,
            ]);
        }

        // Update other fields for the apartment rental
        $apartmentRental->update([
            'title' => $request->title,
            'location' => $request->location,
            'rent_price' => $request->rent_price,
            'size' => $request->size,
            'features' => $request->features,
            'description' => $request->description,
            'contact_details' => $request->contact_details,
        ]);

        // Redirect to the apartment rentals index with success message
        return redirect()->route('apartment-rentals.index')->with('success', 'Apartment rental updated successfully!');
    }


    // Remove the specified apartment rental from storage
    public function destroy(Apartment_rental $apartmentRental)
    {
        $apartmentRental->delete();

        return back()->with('success', 'Apartment rental deleted successfully.');
    }
}
