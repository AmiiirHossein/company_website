<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\faq\CreateFaqRequest;
use App\Http\Requests\Administrator\faq\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $faq = Faq::paginate(4);
        return view('admin.faq.index', compact('faq'));
    }


    public function create()
    {
        return view('admin.faq.create');
    }


    public function store(CreateFaqRequest $request)
    {
        Faq::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'faq_one'=>$request->faq_one,
            'faq_desc_one'=>$request->faq_desc_one,
            'faq_two'=>$request->faq_two,
            'faq_desc_two'=>$request->faq_desc_two,
            'faq_three'=>$request->faq_three,
            'faq_desc_three'=>$request->faq_desc_three,
        ]);

        $request->session()->flash('create');
        return redirect()->route('faq.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit' , compact('faq'));
    }


    public function update(UpdateFaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'faq_one'=>$request->faq_one,
            'faq_desc_one'=>$request->faq_desc_one,
            'faq_two'=>$request->faq_two,
            'faq_desc_two'=>$request->faq_desc_two,
            'faq_three'=>$request->faq_three,
            'faq_desc_three'=>$request->faq_desc_three,
        ]);

        $request->session()->flash('update');
        return redirect()->route('faq.index');
    }


    public function destroy($id)
    {
        $faq= Faq::findOrFail($id);
        $faq->destroy($id);
        return redirect()->route('faq.index');
    }
}
