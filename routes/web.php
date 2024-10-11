<?php

use App\Http\Controllers\ApartmentSaleController;
use App\Http\Controllers\LuxuryHouseSaleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactorySaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/brz', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';




Route::get('/', function () {
    return view('login');
});

Route::get('/Home2', function () {
    return view('home2');
});
Route::get('/Home3', function () {
    return view('home3');
});
Route::get('/Home4', function () {
    return view('home4');
});
Route::get('/AboutUs', function () {
    return view('about_us');
});
Route::get('/ContactUs', function () {
    return view('contact_us');
});
Route::get('/FAQ', function () {
    return view('faq');
});






//meka mokekwath allana epooooooooo
Route::get('/gallery', function () {
    return view('gallery');
});


Route::get('/propertyDetail', function () {
    return view('propertyDetail');
});

Route::get('/propertyList', function () {
    return view('propertyList');
});
Route::get('/news&blog', function () {
    return view('news&blog');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/newsBlog-Detail', function () {
    return view('newsBlog-Detail');
});


Route::get('/signin', function () {
    return view('signin');
});


Route::get('/otp', function () {
    return view('otp');
});


Route::get('/documents', function () {
    return view('documents');
});

Route::get('/addressverificationBill', function () {
    return view('addressverificationBill');
});

Route::get('/categories', function () {
    return view('categories');
});


Route::get('/forms', function () {
    return view('forms');
});


Route::get('/luxury-house-sale', function () {
    return view('luxury-house-sale');
});


Route::get('/apartment-sale', function () {
    return view('apartment-sale');
});

Route::get('/room-rental', function () {
    return view('room-rental');
});

Route::get('/apartment-rental', function () {
    return view('apartment-rental');
});


Route::get('/house-rental', function () {
    return view('house-rental');
});


Route::get('/equipment-sale', function () {
    return view('equipment-sale');
});

Route::get('/plantation-sale', function () {
    return view('plantation-sale');
});

Route::get('/industrial-vehicle-sale', function () {
    return view('industrial-vehicle-sale');
});

Route::get('/land-sale', function () {
    return view('land-sale');
});

Route::get('/hotel-sale', function () {
    return view('hotel-sale');
});

Route::get('/bungalow-sale', function () {
    return view('bungalow-sale');
});

// admin panel routes
Route::get('/admin/dashboard', function () {
    return view('adminPanel.admin.dashboard');
});
// admin panel routes







// Routes for factory sales
Route::get('/factory-sale', [FactorySaleController::class, 'index'])->name('factory-sales.index');
Route::get('/factory-sales/create', [FactorySaleController::class, 'create'])->name('factory-sales.create');
Route::post('/factorysale', [FactorySaleController::class, 'store'])->name('factory.store');
Route::get('/factory-sales/{id}', [FactorySaleController::class, 'show'])->name('factory-sales.show');
Route::get('/factory-sales/{id}/edit', [FactorySaleController::class, 'edit'])->name('factory-sales.edit');
Route::put('/factory-sales/{factorySale}', [FactorySaleController::class, 'update'])->name('factory-sales.update');
Route::delete('/factory-sales/{id}', [FactorySaleController::class, 'destroy'])->name('factory-sales.destroy');


// Routes for apartment sales 
Route::get('/apartment', [ApartmentSaleController::class, 'index'])->name('apartment-sales.index');
Route::get('/apartment-sales/create', [ApartmentSaleController::class, 'create'])->name('apartment-sales.create');
Route::post('/apartment-sales', [ApartmentSaleController::class, 'store'])->name('apartment-sales.store');
Route::get('/apartment-sales/{id}', [ApartmentSaleController::class, 'show'])->name('apartment-sales.show');
Route::get('/apartment-sales/{id}/edit', [ApartmentSaleController::class, 'edit'])->name('apartment-sales.edit');
Route::put('/apartment-sales/{id}', [ApartmentSaleController::class, 'update'])->name('apartment-sales.update');
Route::delete('/apartment-sales/{id}', [ApartmentSaleController::class, 'destroy'])->name('apartment-sales.destroy');

//Routes for luxury_houses sales 
Route::get('/luxury-house', [LuxuryHouseSaleController::class, 'index']); // Read: List all houses
Route::get('/luxury-houses/create', [LuxuryHouseSaleController::class, 'create']); // Create: Show form
Route::post('/luxury-houses', [LuxuryHouseSaleController::class, 'store'])->name('luxury-houses.store'); // Create: Store new house
Route::get('/luxury-houses/{id}/edit', [LuxuryHouseSaleController::class, 'edit']); // Update: Show edit form
Route::post('/luxury-houses/{id}/update', [LuxuryHouseSaleController::class, 'update']); // Update: Save changes
Route::post('/luxury-houses/{id}/delete', [LuxuryHouseSaleController::class, 'destroy']); // Delete: Remove a house
Route::get('/luxury-houses/{id}', [LuxuryHouseSaleController::class, 'show']); // Read: Show single house