<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\TopHeader\CreateTopHeaderRequest;
use App\Http\Requests\Administrator\TopHeader\UpdateTopHeaderRequest;
use App\Models\TopHeader;
use Illuminate\Http\Request;

class TopHeaderController extends Controller
{

    public function index()
    {
        $topHeader = TopHeader::paginate(4);
        return view('admin.topheader.index', compact('topHeader'));
    }


    public function create()
    {
        return view('admin.topheader.create');
    }


    public function store(CreateTopHeaderRequest $request)
    {
        TopHeader::create([
            'email'=> $request->email,
            'phone' => $request->phone,
            'instagram' =>$request->instagram,
            'facebook' =>$request->facebook,
            'twitter'=>$request->twitter
        ]);
        $request->session()->flash('create');
        return redirect()->route('topHeader.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $topHeader = TopHeader::findOrFail($id);
        return view('admin.topheader.edit', compact('topHeader'));
    }


    public function update(UpdateTopHeaderRequest $request, $id)
    {
        $topHeader = TopHeader::findOrFail($id);
        $topHeader->update([
            'email' => $request->email,
            'phone' =>$request->phone,
            'instagram' =>$request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter
        ]);

        $request->session()->flash('update');
        return redirect()->route('topHeader.index');
    }

    public function destroy($id)
    {
        $topHeader = TopHeader::findOrFail($id);
        $topHeader->destroy($id);
        return redirect()->route('topHeader.index');
    }
}
