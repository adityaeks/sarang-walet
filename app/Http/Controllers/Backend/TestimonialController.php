<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    // Testimonial Data Function Group
    public function Testimonial()
    {
        //get posts
        $data = Testimonial::all();

        //render view with posts
        return view('admin.content.testimonial', compact('data'));
    }

    public function testimonialStore(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'coment'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images/testimonial', $image->hashName());

        //create post
        Testimonial::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'coment'     => $request->coment
        ]);

        Session::flash('success', 'Data has been added successfully.');

        //redirect to index
        return redirect()->route('testimonial');
    }

    public function testimonialUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'coment'   => 'required',
        ]);

        //get post by ID
        $data = Testimonial::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images/testimonial', $image->hashName());

            //delete old image
            Storage::delete('public/images/testimonial/'.$data->image);

            //update post with new image
            $data->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'coment'     => $request->coment,
            ]);

        } else {

            //update post without image
            $data->update([
                'name'     => $request->name,
                'coment'     => $request->coment,
            ]);
        }
        Session::flash('info', 'Data has been update successfully.');
        //redirect to index
        return redirect()->route('testimonial');
    }

    public function testimonialDelete($id)
    {
        $data = Testimonial::findOrFail($id);

        //delete image
        Storage::delete('public/images/testimonial/'. $data->image);

        //delete post
        $data->delete();

        Session::flash('danger', 'Data has been deleted successfully.');
        //redirect to index
        return redirect()->route('testimonial');
    }
}
