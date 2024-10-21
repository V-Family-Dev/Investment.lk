<?php

namespace App\Http\Controllers;

use App\Models\Property_manage;
use App\Models\Room_rental;
use Illuminate\Http\Request;
use Storage;
class RoomRentalController extends Controller
{

    // Retrieve all room rentals
    public function index()
    {
        $roomRentals = Room_rental::all();
        // return view('room_rentals.index', compact('roomRentals'));
        return $roomRentals;
    }
    // Create a new room rental
    public function create()
    {
        return view('adminPanel/seller/room-rental'); // Return a view for creating room rentals
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rent_price' => 'required|numeric',
            'size' => 'required|string|max:255',
            'features' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_details' => 'required|string|max:255',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('Room_rental', 'public');
                $imagePaths[] = $imagePath;
            }
        }


        $imagePathsString = implode(',', $imagePaths);

        $validated['image_path'] = $imagePathsString;

        $room = Room_rental::create($validated);
        $categoryName = $house->category_name ?? 'roomr';
        $userId = auth()->id() ?? 1;

        $Property_manage = Property_manage::create([
            'category_name' => $categoryName,
            'property_id' => $room->id,
            'user_id' => $userId,

        ]);

        return back()->with('msg', 'House  rent added successfully!');
    }



    // Edit a room rental
    public function edit($id)
    {
        $roomRental = Room_rental::findOrFail($id);
        return view('adminPanel/seller/update/update-room-rental', compact('roomRental'));
    }

    public function update(Request $request, Room_rental $roomRental)
    {
        // Validate the request including optional image upload
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rent_price' => 'required|numeric|min:0|max:9999999999', // Added range validation for rent_price
            'size' => 'required|string|max:255',
            'features' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation rule
            'contact_details' => 'required|string|max:255',
        ]);

        // Check if new images are uploaded
        if ($request->hasFile('images')) {
            // Delete the old images if they exist
            if ($roomRental->image_path) {
                $oldImages = explode(',', $roomRental->image_path);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            // Upload the new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('Room_rental', 'public');
                $imagePaths[] = $imagePath;
            }

            // Update the `image_path` field with the new image paths
            $validated['image_path'] = implode(',', $imagePaths);
        }

        // Update the Room_rental details
        $roomRental->update($validated);

        return redirect()->route('room_rentals.index')->with('success', 'Room rental updated successfully.');
    }

    // Delete a room rental
    public function destroy($id)
    {
        $roomRental = Room_rental::findOrFail($id);
        $roomRental->delete();

        return redirect()->route('room_rentals.index')->with('success', 'Room rental deleted successfully.');
    }

    // Show a single room rental
    public function show($id)
    {
        $roomRental = Room_rental::findOrFail($id);
        return view('room_rentals.show', compact('roomRental'));
    }
}
