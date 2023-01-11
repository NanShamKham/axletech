<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::where('id', $id);
        if(!$contact->first()){
            return redirect()->back()->with('error', 'not found contact');
        }
        $contact->delete();
        return redirect('/admin/contact')->with('success', 'your contact has been deleted successfully.');
    }
}
