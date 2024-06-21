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

    // Home Data Function Group
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

    // About Data Function Group
    public function About()
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
        Session::flash('info', 'Data has been update successfully.');
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

    // Contact Data Function Group
    public function Contact()
    {
        //get posts
        $data = Contact::all();

        //render view with posts
        return view('admin.content.contact', compact('data'));
    }

    public function contactStore(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'phone'   => 'required',
            'email'     => 'required',
            'message'   => 'required',
        ]);

        //create post
        Contact::create([
            'name'     => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'message'     => $request->message,
        ]);

        Session::flash('success', 'Data has been added successfully.');

        //redirect to index
        return redirect()->route('contact');
    }

    public function contactUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'name'     => 'required',
            'phone'    => 'required',
            'email'    => 'required|email',
            'message'  => 'required',
        ]);

        $data = Contact::findOrFail($id);

        // Update the contact record with the validated data
        $data->update([
            'name'  => $request->name,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'message'  => $request->message,
        ]);

        // Flash a success message
        Session::flash('info', 'Data has been updated successfully.');

        // Redirect back to the contact index page
        return redirect()->route('contact');
    }


    public function contactDelete($id)
    {
        $data = Contact::findOrFail($id);
        //delete post
        $data->delete();

        Session::flash('danger', 'Data has been deleted successfully.');
        //redirect to index
        return redirect()->route('contact');
    }
}
