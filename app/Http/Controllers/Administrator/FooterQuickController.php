<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\footerQuick\CreateFooterQuickRequest;
use App\Http\Requests\Administrator\footerQuick\UpdateFooterQuickRequest;
use App\Models\FooterQuick;
use Illuminate\Http\Request;

class FooterQuickController extends Controller
{

    public function index()
    {
        $footerQuick = FooterQuick::paginate(4);
        return view('admin.footer.footerQuick.index', compact('footerQuick'));
    }


    public function create()
    {
        return view('admin.footer.footerQuick.create');
    }


    public function store(CreateFooterQuickRequest $request)
    {
       FooterQuick::create([
           'title'=>$request->title,
           'link'=>$request->link,
       ]);
       $request->session()->flash('create');
       return redirect()->route('footerQuick.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $footerQuick = FooterQuick::findOrFail($id);
        return view('admin.footer.footerQuick.edit', compact('footerQuick'));
    }


    public function update(UpdateFooterQuickRequest $request, $id)
    {
        $footerQuick = FooterQuick::findOrFail($id);
        $footerQuick->update([
            'title'=>$request->title,
            'link'=>$request->link,
        ]);
        $request->session()->flash('update');
        return redirect()->route('footerQuick.index');
    }


    public function destroy($id)
    {
        $footerQuick = FooterQuick::findOrFail($id);
        $footerQuick->destroy($id);
        return redirect()->route('footerQuick.index');
    }
}
