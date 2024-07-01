<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function about()
    {
        //get posts
        $data = About::all();

        //render view with posts
        return view('admin.content.about', compact('data'));
    }

    public function aboutStore(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images/about', $image->hashName());

        //create post
        About::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'     => $request->content
        ]);

        Session::flash('success', 'Data has been added successfully.');

        //redirect to index
        return redirect()->route('about');
    }

    public function aboutUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required',
            'content'     => 'required'
        ]);

        //get post by ID
        $data = About::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images/about', $image->hashName());

            //delete old image
            Storage::delete('public/images/about/'.$data->image);

            //update post with new image
            $data->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'     => $request->content,
            ]);

        } else {

            //update post without image
            $data->update([
                'title'     => $request->title,
                'content'     => $request->content,
            ]);
        }
        Session::flash('info', 'Data has been updated successfully.');
        //redirect to index
        return redirect()->route('about');
    }

    public function aboutDelete($id)
    {
        $data = About::findOrFail($id);

        //delete image
        Storage::delete('public/images/about/'. $data->image);

        //delete post
        $data->delete();

        Session::flash('danger', 'Data has been deleted successfully.');
        //redirect to index
        return redirect()->route('about');
    }
}

