<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //get posts
        $data = Product::all();

        //render view with posts
        return view('client.product', compact('data'));
    }
}
