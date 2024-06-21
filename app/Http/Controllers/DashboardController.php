<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Home;
use App\Models\About;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.content.dashboard');
    }
}
