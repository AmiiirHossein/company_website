<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\footerAbout\CreateFooterAboutRequest;
use App\Http\Requests\Administrator\footerAbout\UpdateFooterAboutRequest;
use App\Models\FooterAbout;
use Illuminate\Http\Request;

class FooterAboutController extends Controller
{

    public function index()
    {
        $footerAbout = FooterAbout::paginate(4);
        return view('admin.footer.footerAbout.index', compact('footerAbout'));
    }


    public function create()
    {
        return view('admin.footer.footerAbout.create');
    }


    public function store(CreateFooterAboutRequest $request)
    {
        FooterAbout::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'instagram'=>$request->instagram,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter
        ]);
        $request->session()->flash('create');
        return redirect()->route('footerAbout.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $footerAbout = FooterAbout::findOrFail($id);
        return view('admin.footer.footerAbout.edit', compact('footerAbout'));
    }


    public function update(UpdateFooterAboutRequest $request, $id)
    {
        $footerAbout = FooterAbout::findOrFail($id);
        $footerAbout->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'instagram'=>$request->instagram,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter
        ]);
        $request->session()->flash('update');
        return redirect()->route('footerAbout.index');
    }


    public function destroy($id)
    {
        $footerAbout = FooterAbout::findOrFail($id);
        $footerAbout->destroy($id);
        return redirect()->route('footerAbout.index');
    }
}
