<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Header\CreateHeaderRequest;
use App\Http\Requests\Administrator\Header\UpdateHeaderRequest;
use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{

    public function index()
    {
        $header= Header::paginate(4);
        return view('admin.header.index', compact('header'));
    }


    public function create()
    {
        return view('admin.header.create');
    }


    public function store(CreateHeaderRequest $request)
    {
        Header::create([
            'title'=>$request->title,
            'link'=>$request->link
        ]);

        $request->session()->flash('create');
        return redirect()->route('header.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $header = Header::findOrFail($id);
        return view('admin.header.edit', compact('header'));
    }


    public function update(UpdateHeaderRequest $request, $id)
    {
        $header = Header::findOrFail($id);
        $header->update([
            'title'=>$request->title,
            'link'=>$request->link,
        ]);
        $request->session()->flash('update');
        return redirect()->route('header.index');
    }


    public function destroy($id)
    {
        $header = Header::findOrFail($id);
        $header->destroy($id);
        return redirect()->route('header.index');
    }
}
