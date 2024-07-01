<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Product::all();
        $home = Home::all();
        $about = About::first();
        $testimonial = Testimonial::all();

        return view('client.home', compact('data','home', 'about', 'testimonial'));
    }
}
