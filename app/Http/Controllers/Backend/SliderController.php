<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function home()
    {
        //get posts
        $data = Home::all();

        //render view with posts
        return view('admin.content.home', compact('data'));
    }

    public function homeStore(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images/home', $image->hashName());

        //create post
        Home::create([
            'image'     => $image->hashName(),
            'name'     => $request->name
        ]);

        Session::flash('success', 'Data has been added successfully.');

        //redirect to index
        return redirect()->route('home');
    }

    public function homeUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required'
        ]);

        //get post by ID
        $data = Home::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images/home', $image->hashName());

            //delete old image
            Storage::delete('public/images/home/'.$data->image);

            //update post with new image
            $data->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
            ]);

        } else {

            //update post without image
            $data->update([
                'name'     => $request->name,
            ]);
        }
        Session::flash('info', 'Data has been update successfully.');
        //redirect to index
        return redirect()->route('home');
    }

    public function homeDelete($id)
    {
        $data = Home::findOrFail($id);

        //delete image
        Storage::delete('public/images/home/'. $data->image);

        //delete post
        $data->delete();

        Session::flash('danger', 'Data has been deleted successfully.');
        //redirect to index
        return redirect()->route('home');
    }

}
