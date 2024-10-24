<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validate the request
    $request->validate([
        'firstname' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'usertype' => ['nullable', 'string', 'max:255'],
        'idnumber' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'phonenumber' => ['required', 'string', 'max:15'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'front_fide_if_card' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        'back_fide_if_card' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // Handle image uploads
    $frontCardPath = null;
    $backCardPath = null;

    if ($request->hasFile('front_fide_if_card')) {
        $frontCardPath = $request->file('front_fide_if_card')->store('cards/front', 'public');
    }

    if ($request->hasFile('back_fide_if_card')) {
        $backCardPath = $request->file('back_fide_if_card')->store('cards/back', 'public');
    }

    // Create the user
    $user = User::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'usertype' => $request->usertype ?? 'seller',
        'idnumber' => $request->idnumber,
        'address' => $request->address,
        'phonenumber' => $request->phonenumber,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'front_fide_if_card' => $frontCardPath,
        'back_fide_if_card' => $backCardPath,
    ]);

    // Fire registered event and log in user
    event(new Registered($user));
    Auth::login($user);

    // Redirect to the dashboard
    return redirect(route('dashboard', absolute: false));

    // Optionally: For API responses
    // return response()->json([
    //     'success' => true,
    //     'message' => 'User registered successfully!',
    //     'user' => $user
    // ], 201);
}

}
