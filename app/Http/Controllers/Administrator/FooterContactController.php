<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\footerContact\CreateFooterContactRequest;
use App\Http\Requests\Administrator\footerContact\UpdateFooterContactRequest;
use App\Models\FooterContact;
use Illuminate\Http\Request;

class FooterContactController extends Controller
{

    public function index()
    {
        $footerContact = FooterContact::paginate(4);
        return view('admin.footer.footerContact.index', compact('footerContact'));
    }


    public function create()
    {
        return view('admin.footer.footerContact.create');
    }


    public function store(CreateFooterContactRequest $request)
    {
        FooterContact::create([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email
        ]);
        $request->session()->flash('create');
        return redirect()->route('footerContact.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $footerContact = FooterContact::findOrFail($id);
        return view('admin.footer.footerContact.edit', compact('footerContact'));
    }


    public function update(UpdateFooterContactRequest $request, $id)
    {
        $footerContact = FooterContact::findOrFail($id);
        $footerContact->update([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);
        $request->session()->flash('update');
        return redirect()->route('footerContact.index');
    }


    public function destroy($id)
    {
        $footerContact = FooterContact::findOrFail($id);
        $footerContact->destroy($id);
        return redirect()->route('footerContact.index');
    }
}
