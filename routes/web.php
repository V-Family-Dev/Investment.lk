<?php

use App\Http\Controllers\ApartmentRentalController;
use App\Http\Controllers\ApartmentSaleController;
use App\Http\Controllers\ColoniaStyleBungalowSaleController;
use App\Http\Controllers\EquipmentSaleController;
use App\Http\Controllers\HotelSaleController;
use App\Http\Controllers\HouseRentalController;
use App\Http\Controllers\IndustrialVehicalController;
use App\Http\Controllers\LandSaleController;
use App\Http\Controllers\LuxuryHouseSaleController;
use App\Http\Controllers\PlantationSaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomRentalController;
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

Route::get('/dashboard', function () {
    return view('/adminPanel/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




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

Route::get('/admin/user-list', function () {
    return view('adminPanel.admin.userList');
});

Route::get('/admin/profile', function () {
    return view('adminPanel.profile');
});



// Routes for factory sales
Route::get('/factory-sale', [FactorySaleController::class, 'index'])->name('factory-sales.index');
Route::get('/factory-sales/create', [FactorySaleController::class, 'create'])->name('factory-sales.create');
Route::post('/factorysale', [FactorySaleController::class, 'store'])->name('factory.store');
Route::get('/factory-sales/{id}', [FactorySaleController::class, 'show'])->name('factory-sales.show');
Route::get('/factory-sales/{id}/edit', [FactorySaleController::class, 'edit'])->name('factory-sales.edit');
Route::put('/factory-sales/{factorySale}', [FactorySaleController::class, 'update'])->name('factory-sales.update');
Route::delete('/factory-sales-delete/{id}', [FactorySaleController::class, 'destroy'])->name('factory-sales.destroy');

// Routes for apartment sales 
Route::get('/apartment', [ApartmentSaleController::class, 'index'])->name('apartment-sales.index');
Route::get('/apartment-sales/create', [ApartmentSaleController::class, 'create'])->name('apartment-sales.create');
Route::post('/apartment-sales', [ApartmentSaleController::class, 'store'])->name('apartment-sales.store');
Route::get('/apartment-sales/{id}', [ApartmentSaleController::class, 'show'])->name('apartment-sales.show');
Route::get('/apartment-sales/{id}/edit', [ApartmentSaleController::class, 'edit'])->name('apartment-sales.edit');
Route::put('/apartment-sales/{apartment_sale}', [ApartmentSaleController::class, 'update'])->name('apartment-sales.update');
Route::delete('/apartment-sales/{id}', [ApartmentSaleController::class, 'destroy'])->name('apartment-sales.destroy');

//Routes for luxury_houses sales 
Route::get('/luxury-house', [LuxuryHouseSaleController::class, 'index'])->name('luxury-houses.index'); 
Route::get('/luxury-houses/create', [LuxuryHouseSaleController::class, 'create'])->name('luxury-houses.create'); // Create: Show form
Route::post('/luxury-houses', [LuxuryHouseSaleController::class, 'store'])->name('luxury-houses.store'); // Create: Store new house
Route::get('/luxury-houses/{id}/edit', [LuxuryHouseSaleController::class, 'edit'])->name('luxury-houses.edit'); // Update: Show edit form
Route::put('/luxury-houses/{luxury_house}', [LuxuryHouseSaleController::class, 'update'])->name('luxury-houses.update'); // Update: Save changes
Route::post('/luxury-houses/{id}/delete', [LuxuryHouseSaleController::class, 'destroy'])->name('luxury-houses.destroy'); // Delete: Remove a house
Route::get('/luxury-houses/{id}', [LuxuryHouseSaleController::class, 'show'])->name('luxury-houses.show'); // Read: Show single house


Route::get('colonia-style-bungalow-sales', [ColoniaStyleBungalowSaleController::class, 'index'])->name('colonia_sales.index');
Route::get('bungalow-sales/create', [ColoniaStyleBungalowSaleController::class, 'create'])->name('colonia_sales.create');
Route::post('bungalow-sales', [ColoniaStyleBungalowSaleController::class, 'store'])->name('colonia_sales.store');
Route::get('colonia-style-bungalow-sales/{id}', [ColoniaStyleBungalowSaleController::class, 'show'])->name('colonia_sales.show');
Route::get('colonia-style-bungalow-sales/{id}/edit', [ColoniaStyleBungalowSaleController::class, 'edit'])->name('colonia_sales.edit');
Route::put('colonia-style-bungalow-sales/{Colonia_Style_Bungalow_Sale}', [ColoniaStyleBungalowSaleController::class, 'update'])->name('colonia_sales.update');
Route::delete('colonia-style-bungalow-sales/{id}', [ColoniaStyleBungalowSaleController::class, 'destroy'])->name('colonia_sales.destroy');

Route::get('hotel', [HotelSaleController::class, 'index'])->name('hotel_sales.index'); // View all hotel sales
Route::get('hotel-sales/create', [HotelSaleController::class, 'create'])->name('hotel_sales.create'); // Show create form
Route::post('hotel-sales', [HotelSaleController::class, 'store'])->name('hotel_sales.store'); // Store new sale
Route::get('hotel-sales/{id}', [HotelSaleController::class, 'show'])->name('hotel_sales.show'); // Show single sale
Route::get('hotel-sales/{id}/edit', [HotelSaleController::class, 'edit'])->name('hotel_sales.edit'); // Show edit form
Route::put('hotel-sales/{hotel_sale}', [HotelSaleController::class, 'update'])->name('hotel_sales.update'); // Update sale
Route::delete('hotel-sales/{id}', [HotelSaleController::class, 'destroy'])->name('hotel_sales.destroy'); // Delete sale

Route::get('land', [LandSaleController::class, 'index'])->name('land_sales.index'); // View all land sales
Route::get('land-sales/create', [LandSaleController::class, 'create'])->name('land_sales.create'); // Show create form
Route::post('landsales', [LandSaleController::class, 'store'])->name('land_sales_tore'); // Store new sale
Route::get('land-sales/{id}', [LandSaleController::class, 'show'])->name('land_sales.show'); // Show single sale
Route::get('land-sales/{id}/edit', [LandSaleController::class, 'edit'])->name('land_sales.edit'); // Show edit form
Route::put('land-sales/{land_sale}', [LandSaleController::class, 'update'])->name('land_sales.update'); // Update sale
Route::delete('land-sales/{id}', [LandSaleController::class, 'destroy'])->name('land_sales.destroy'); // Delete sale

Route::get('industrial_vehicles', [IndustrialVehicalController::class, 'index'])->name('vehical.index'); 
Route::get('industrial_vehicles/create', [IndustrialVehicalController::class, 'create'])->name('vehical.create'); 
Route::post('industrial_vehicles/store', [IndustrialVehicalController::class, 'store'])->name('vehical.store'); 
Route::get('industrial_vehicles/{id}', [IndustrialVehicalController::class, 'show'])->name('vehical.show'); 
Route::get('industrial_vehicles/{id}/edit', [IndustrialVehicalController::class, 'edit'])->name('vehical.edit'); 
Route::put('industrial_vehicles/{industrial_vehicle}', [IndustrialVehicalController::class, 'update'])->name('vehical.update'); 
Route::delete('industrial_vehicles/{id}', [IndustrialVehicalController::class, 'destroy'])->name('vehical.destroy'); 


Route::get('/plantation_sales', [PlantationSaleController::class, 'index'])->name('plantation_sales.index'); // Read all
Route::get('/plantation_sales/create', [PlantationSaleController::class, 'create'])->name('plantation_sales.create'); // Form for create
Route::post('/plantation_sales', [PlantationSaleController::class, 'store'])->name('plantation_sales.store'); // Save new
Route::get('/plantation_sales/{id}', [PlantationSaleController::class, 'show'])->name('plantation_sales.show'); // View single record
Route::get('/plantation_sales/{id}/edit', [PlantationSaleController::class, 'edit'])->name('plantation_sales.edit'); // Form for edit
Route::put('/plantation_sales/{plantation_sale}', [PlantationSaleController::class, 'update'])->name('plantation_sales.update'); // Update
Route::delete('/plantation_sales/{id}', [PlantationSaleController::class, 'destroy'])->name('plantation_sales.destroy'); // Delete

// Display a listing of the equipment sales (Read All)
Route::get('/equipment_sales', [EquipmentSaleController::class, 'index'])->name('equipment_sales.index');
Route::get('/equipment_sales/create', [EquipmentSaleController::class, 'create'])->name('equipment_sales.create');
Route::post('/equipment_sales_store', [EquipmentSaleController::class, 'store'])->name('equipment_sales.store');
Route::get('/equipment_sales/{equipment_sale}', [EquipmentSaleController::class, 'show'])->name('equipment_sales.show');
Route::get('/equipment_sales/{equipment_sale}/edit', [EquipmentSaleController::class, 'edit'])->name('equipment_sales.edit');
Route::put('/equipment_sales/{equipment_sale}', [EquipmentSaleController::class, 'update'])->name('equipment_sales.update');
Route::delete('/equipment_sales/{equipment_sale}', [EquipmentSaleController::class, 'destroy'])->name('equipment_sales.destroy');

Route::get('apartment-rental_show', [ApartmentRentalController::class, 'index'])->name('apartment-rentals.index');
Route::get('apartment_rentals_create', [ApartmentRentalController::class, 'create'])->name('apartment-rentals.create');
Route::post('apartment_rentals_store', [ApartmentRentalController::class, 'store'])->name('apartment-rentals.store');
Route::get('apartment-rentals/{apartmentRental}', [ApartmentRentalController::class, 'show'])->name('apartment-rentals.show');
Route::get('apartment-rentals/{apartmentRental}/edit', [ApartmentRentalController::class, 'edit'])->name('apartment-rentals.edit');
Route::put('apartment-rentals/{apartmentRental}', [ApartmentRentalController::class, 'update'])->name('apartment-rentals.update');
Route::delete('apartment/{apartmentRental}', [ApartmentRentalController::class, 'destroy'])->name('apartment-rentals.destroy'); 

Route::get('house_rentals', [HouseRentalController::class, 'index'])->name('house-rentals.index');
Route::get('house_rentals_create', [HouseRentalController::class, 'create'])->name('house-rentals.create');
Route::post('house_rentals', [HouseRentalController::class, 'store'])->name('house-rentals.store');
Route::get('house-rentals/{id}', [HouseRentalController::class, 'show'])->name('house-rentals.show');
Route::get('house-rentals/{id}/edit', [HouseRentalController::class, 'edit'])->name('house-rentals.edit');
Route::put('house-rentals/{house_rental}', [HouseRentalController::class, 'update'])->name('house-rentals.update');
Route::delete('house-rentals/{id}', [HouseRentalController::class, 'destroy'])->name('house-rentals.destroy');

Route::get('room_rentals', [RoomRentalController::class, 'index'])->name('room_rentals.index');
Route::get('room_rentals_create', [RoomRentalController::class, 'create'])->name('room_rentals.create');
Route::post('room_rentals_store', [RoomRentalController::class, 'store'])->name('room_rentals.store');
Route::get('room_rentals/{id}', [RoomRentalController::class, 'show'])->name('room_rentals.show');
Route::get('room_rentals/{id}/edit', [RoomRentalController::class, 'edit'])->name('room_rentals.edit');
Route::put('room_rentals/{roomRental}', [RoomRentalController::class, 'update'])->name('room_rentals.update');
Route::delete('room_rentals/{id}', [RoomRentalController::class, 'destroy'])->name('room_rentals.destroy');
