<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::all();
        $about = About::first();
        $testimonial = Testimonial::all();

        return view('client.home', compact('home', 'about', 'testimonial'));
    }
}
