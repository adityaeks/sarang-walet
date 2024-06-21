<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ContaclController extends Controller
{
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
