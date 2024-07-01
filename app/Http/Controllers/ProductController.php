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
    public function show($id)
    {
        // Mengambil detail produk berdasarkan id
        $product = Product::findOrFail($id);


        // Mengirim data produk ke view
        return view('client.product_detail', compact('product'));
    }
}
