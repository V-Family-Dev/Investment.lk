<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function show(Request $request)
    {
        // Retrieve payment details by property_id and category_name
        $payment = Payment::where('property_id', $request->property_id)
            ->where('category_name', $request->category_name)
            ->firstOrFail();
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        return response()->json([
            'amount' => $payment->amount,
            'slip_image' => $payment->slip_image,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|integer',
            'category_name' => 'required|string',
            'amount' => 'required|numeric',
            'slip_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slipPath = $request->file('slip_image')->store('slips', 'public');
        $currentUser = auth()->user();
        Payment::create([
            'user_id' => $currentUser->id,
            'property_id' => $request->property_id,
            'category_name' => $request->category_name,
            'amount' => $request->amount,
            'slip_image' => $slipPath,
        ]);

        return back()->with('success', 'Payment submitted successfully.');
    }
}
