<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Backend\AboutController as BackendAboutController;
use App\Http\Controllers\Backend\ContaclController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Models\Home;
use App\Models\About;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController as ControllersProductController;
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

// Route::get('/', function () {
//     $home = Home::all();
//     $about = About::first();
//     $testimonial = Testimonial::all();
//     return view('client.landingPage', compact('home', 'about', 'testimonial'));
// });

Route::get('/', [HomeController::class, 'index'])->name('client.home');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Home




//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');


//  About FE
Route::get('/about', [AboutController::class, 'index'])->name('client.about');

// About BE
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/about', [BackendAboutController::class, 'about'])->name('about');
    Route::get('/about/create', [BackendAboutController::class, 'aboutCreate'])->name('about.create');
    Route::post('/about/store', [BackendAboutController::class, 'aboutStore'])->name('about.store');
    Route::get('/about/edit/{id}', [BackendAboutController::class, 'aboutEdit'])->name('about.edit');
    Route::put('/about/update/{id}', [BackendAboutController::class, 'aboutUpdate'])->name('about.update');
    Route::delete('/about/delete/{id}', [BackendAboutController::class, 'aboutDelete'])->name('about.delete');
});

// Product FE
Route::get('/product', [ControllersProductController::class, 'index'])->name('client.product');
Route::get('/product/{id}', [ControllersProductController::class, 'show'])->name('client.product_detail');


// Product BE
Route::prefix('admin')->group(function () {
    Route::get('/product', [ProductController::class, 'product'])->name('product')->middleware('auth');
    Route::get('/product/create', [ProductController::class, 'productCreate'])->name('product.create')->middleware('auth');
    Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store')->middleware('auth');
    Route::get('/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit')->middleware('auth');
    Route::put('/product/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update')->middleware('auth');
    Route::delete('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete')->middleware('auth');
});

// Testimonial BE
Route::prefix('admin')->group(function () {
    Route::get('/testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial')->middleware('auth');
    Route::get('/testimonial/create', [TestimonialController::class, 'testimonialCreate'])->name('testimonial.create')->middleware('auth');
    Route::post('/testimonial/store', [TestimonialController::class, 'testimonialStore'])->name('testimonial.store')->middleware('auth');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'testimonialEdit'])->name('testimonial.edit')->middleware('auth');
    Route::put('/testimonial/update/{id}', [TestimonialController::class, 'testimonialUpdate'])->name('testimonial.update')->middleware('auth');
    Route::delete('/testimonial/delete/{id}', [TestimonialController::class, 'testimonialDelete'])->name('testimonial.delete')->middleware('auth');
});

    // Contact BE
Route::prefix('admin')->group(function(){
    Route::get('/contact', [ContaclController::class, 'contact'])->name('contact')->middleware('auth');
    Route::get('/contact/create', [ContaclController::class, 'contactCreate'])->name('contact.create')->middleware('auth');
    Route::post('/contact/store', [ContaclController::class, 'contactStore'])->name('contact.store')->middleware('auth');
    Route::get('/contact/edit/{id}', [ContaclController::class, 'contactEdit'])->name('contact.edit')->middleware('auth');
    Route::put('/contact/update/{id}', [ContaclController::class, 'contactUpdate'])->name('contact.update')->middleware('auth');
    Route::delete('/contact/delete/{id}', [ContaclController::class, 'contactDelete'])->name('contact.delete')->middleware('auth');

});

Route::prefix('admin')->group(function(){
    Route::get('/home', [SliderController::class, 'home'])->name('home')->middleware('auth');
    Route::get('/home/create', [SliderController::class, 'homeCreate'])->name('home.create')->middleware('auth');
    Route::post('/home/store', [SliderController::class, 'homeStore'])->name('home.store')->middleware('auth');
    Route::get('/home/edit/{id}', [SliderController::class, 'homeEdit'])->name('home.edit')->middleware('auth');
    Route::put('/home/update/{id}', [SliderController::class, 'homeUpdate'])->name('home.update')->middleware('auth');
    Route::delete('/home/delete/{id}', [SliderController::class, 'homeDelete'])->name('home.delete')->middleware('auth');
});

// user dasboard
Route::get('client/dashboard', [CustomerController::class, 'dashboard'])->middleware('auth')->name('client.dashboard');
