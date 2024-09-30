<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
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
