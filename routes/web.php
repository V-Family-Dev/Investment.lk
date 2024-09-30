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
