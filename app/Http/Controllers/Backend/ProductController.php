<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Product Data Function Group
    public function Product()
    {
        //get posts
        $data = Product::all();

        //render view with posts
        return view('admin.content.product', compact('data'));
    }

    public function productStore(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'description'   => 'required',
            'category'   => 'required',
            'price'   => 'required',
            'count'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images/product', $image->hashName());

        //create post
        Product::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'description'     => $request->description,
            'category'     => $request->category,
            'price'     => $request->price,
            'count'     => $request->count,
        ]);

        Session::flash('success', 'Data has been added successfully.');

        //redirect to index
        return redirect()->route('product');
    }

    public function productUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'description'   => 'required',
            'category'   => 'required',
            'price'   => 'required',
            'count'   => 'required'
        ]);

        //get post by ID
        $data = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images/product', $image->hashName());

            //delete old image
            Storage::delete('public/images/product/'.$data->image);

            //update post with new image
            $data->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'description'     => $request->description,
                'category'     => $request->category,
                'price'     => $request->price,
                'count'     => $request->count,
            ]);

        } else {

            //update post without image
            $data->update([
                'name'     => $request->name,
                'description'     => $request->description,
                'category'     => $request->category,
                'price'     => $request->price,
                'count'     => $request->count,
            ]);
        }
        Session::flash('info', 'Data has been update successfully.');
        //redirect to index
        return redirect()->route('product');
    }

    public function productDelete($id)
    {
        $data = Product::findOrFail($id);

        //delete image
        Storage::delete('public/images/product/'. $data->image);

        //delete post
        $data->delete();

        Session::flash('danger', 'Data has been deleted successfully.');
        //redirect to index
        return redirect()->route('product');
    }
}
