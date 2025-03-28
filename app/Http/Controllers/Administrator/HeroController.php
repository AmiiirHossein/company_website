<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Hero\CreateHeroRequest;
use App\Http\Requests\Administrator\Hero\UpdateHeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function index()
    {
        $hero = Hero::paginate(4);
        return view('admin.hero.index', compact('hero'));
    }


    public function create()
    {
        return view('admin.hero.create');
    }


    public function store(CreateHeroRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/hero',$image);
        }
        Hero::create([
            'image'=>$image,
            'established'=>$request->established,
            'description'=>$request->description,
            'about'=>$request->about,
            'question'=>$request->question,
        ]);

        $request->session()->flash('create');
        return redirect()->route('home.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.hero.edit' , compact('hero'));
    }

    public function update(UpdateHeroRequest $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $file = $request->file('image');
        $image ='';
        if(!empty($file)){
            if(file_exists('back/images/hero/'.$hero->image)){
                unlink('back/images/hero/'.$hero->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/hero',$image);
        }else{
            $image = $hero->image;
        }

        $hero->update([
           'image'=>$image,
           'description'=>$request->description,
           'established'=>$request->established,
            'about'=>$request->about,
            'question'=>$request->question
        ]);
        $request->session()->flash('update');
        return redirect()->route('home.index');
    }


    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        $imageHero = $hero->image;
        if(file_exists('back/images/hero/'.$imageHero)){
            unlink('back/images/hero/'.$imageHero);
        }
        $hero->destroy($id);
        return redirect()->route('home.index');
    }
}
