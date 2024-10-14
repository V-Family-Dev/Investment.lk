<?php

namespace App\Http\Controllers;

use App\Models\Property_manage;
use App\Models\Room_rental;
use Illuminate\Http\Request;

class RoomRentalController extends Controller
{
    // Create a new room rental
    public function create()
    {
        return view('room-rental'); // Return a view for creating room rentals
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

    // Retrieve all room rentals
    public function index()
    {
        $roomRentals = Room_rental::all();
        return view('room_rentals.index', compact('roomRentals'));
    }

    // Edit a room rental
    public function edit($id)
    {
        $roomRental = Room_rental::findOrFail($id);
        return view('room_rentals.edit', compact('roomRental'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rent_price' => 'required|numeric',
            'size' => 'required|string|max:255',
            'features' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|string|max:255',
            'contact_details' => 'required|string|max:255',
        ]);

        $roomRental = Room_rental::findOrFail($id);
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
