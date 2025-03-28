<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Intro\CreateIntroRequest;
use App\Http\Requests\Administrator\Intro\UpdateIntroRequest;
use App\Models\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function index()
    {
        $intro = Intro::paginate(4);
        return view('admin.intro.index', compact('intro'));
    }

    public function create()
    {
        return view('admin.intro.create');
    }


    public function store(CreateIntroRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/intro',$image);
        }
        Intro::create([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
        ]);
        $request->session()->flash('create');
        return redirect()->route('intro.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $intro = Intro::findOrFail($id);
        return view('admin.intro.edit', compact('intro'));
    }


    public function update(UpdateIntroRequest $request, $id)
    {
        $intro = Intro::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if (!empty($file)){
            if(file_exists('back/images/intro/'.$intro->image)){
                unlink('back/images/intro/'.$intro->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/intro',$image);
        }else{
            $image = $intro->image;
        }

        $intro->update([
           'image'=>$image,
            'title'=>$request->title,
            'description' =>$request->description,
            'link'=>$request->link,
        ]);
        $request->session()->flash('update');
        return redirect()->route('intro.index');
    }


    public function destroy($id)
    {
        $intro = Intro::findOrFail($id);
        $introImage = $intro->image;
        if (file_exists('back/images/intro/'.$introImage)){
            unlink('back/images/intro/'.$introImage);
        }
        $intro->destroy($id);
        return redirect()->route('intro.index');
    }
}
