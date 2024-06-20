<?php

use App\Models\Home;
use App\Models\About;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Models\Testimonial;

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

Route::get('/', function () {
    $home = Home::all();
    $about = About::first();
    $testimonial = Testimonial::all();
    return view('client.landingPage', compact('home', 'about', 'testimonial'));
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Home
Route::get('/home', [DashboardController::class, 'home'])->name('home')->middleware('auth');
Route::get('/home/create', [DashboardController::class, 'homeCreate'])->name('home.create')->middleware('auth');
Route::post('/home/store', [DashboardController::class, 'homeStore'])->name('home.store')->middleware('auth');
Route::get('/home/edit/{id}', [DashboardController::class, 'homeEdit'])->name('home.edit')->middleware('auth');
Route::put('/home/update/{id}', [DashboardController::class, 'homeUpdate'])->name('home.update')->middleware('auth');
Route::delete('/home/delete/{id}', [DashboardController::class, 'homeDelete'])->name('home.delete')->middleware('auth');
// About
Route::get('/about', [DashboardController::class, 'about'])->name('about')->middleware('auth');
Route::get('/about/create', [DashboardController::class, 'aboutCreate'])->name('about.create')->middleware('auth');
Route::post('/about/store', [DashboardController::class, 'aboutStore'])->name('about.store')->middleware('auth');
Route::get('/about/edit/{id}', [DashboardController::class, 'aboutEdit'])->name('about.edit')->middleware('auth');
Route::put('/about/update/{id}', [DashboardController::class, 'aboutUpdate'])->name('about.update')->middleware('auth');
Route::delete('/about/delete/{id}', [DashboardController::class, 'aboutDelete'])->name('about.delete')->middleware('auth');
// Product
Route::get('/product', [DashboardController::class, 'product'])->name('product')->middleware('auth');
Route::get('/product/create', [DashboardController::class, 'productCreate'])->name('product.create')->middleware('auth');
Route::post('/product/store', [DashboardController::class, 'productStore'])->name('product.store')->middleware('auth');
Route::get('/product/edit/{id}', [DashboardController::class, 'productEdit'])->name('product.edit')->middleware('auth');
Route::put('/product/update/{id}', [DashboardController::class, 'productUpdate'])->name('product.update')->middleware('auth');
Route::delete('/product/delete/{id}', [DashboardController::class, 'productDelete'])->name('product.delete')->middleware('auth');
// Testimonial
Route::get('/testimonial', [DashboardController::class, 'testimonial'])->name('testimonial')->middleware('auth');
Route::get('/testimonial/create', [DashboardController::class, 'testimonialCreate'])->name('testimonial.create')->middleware('auth');
Route::post('/testimonial/store', [DashboardController::class, 'testimonialStore'])->name('testimonial.store')->middleware('auth');
Route::get('/testimonial/edit/{id}', [DashboardController::class, 'testimonialEdit'])->name('testimonial.edit')->middleware('auth');
Route::put('/testimonial/update/{id}', [DashboardController::class, 'testimonialUpdate'])->name('testimonial.update')->middleware('auth');
Route::delete('/testimonial/delete/{id}', [DashboardController::class, 'testimonialDelete'])->name('testimonial.delete')->middleware('auth');
// Contact
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact')->middleware('auth');
Route::get('/contact/create', [DashboardController::class, 'contactCreate'])->name('contact.create')->middleware('auth');
Route::post('/contact/store', [DashboardController::class, 'contactStore'])->name('contact.store')->middleware('auth');
Route::get('/contact/edit/{id}', [DashboardController::class, 'contactEdit'])->name('contact.edit')->middleware('auth');
Route::put('/contact/update/{id}', [DashboardController::class, 'contactUpdate'])->name('contact.update')->middleware('auth');
Route::delete('/contact/delete/{id}', [DashboardController::class, 'contactDelete'])->name('contact.delete')->middleware('auth');


//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
