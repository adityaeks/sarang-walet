<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        //get posts
        $data = About::all();

        //render view with posts
        return view('client.about', compact('data'));
    }

}
