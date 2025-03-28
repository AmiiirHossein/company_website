<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contact = Contact::orderBy('id', 'desc')->paginate(4);
        return view('admin.contact.index', compact('contact'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->destroy($id);
        return redirect()->route('contact.index');
    }
}
