<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Seo\CreateSeoRequest;
use App\Http\Requests\Administrator\Seo\UpdateSeoRequest;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function index()
    {
        $seos = Seo::all();
        return view('admin.seo.index', compact('seos'));
    }


    public function create()
    {
        return view('admin.seo.create');
    }


    public function store(CreateSeoRequest $request)
    {
        Seo::create([
            'title'=>$request->title,
            'keywords'=>$request->keywords,
            'description'=>$request->description,
            'site_name'=>$request->site_name,
            'site_url'=>$request->site_url,
            'twitter_name'=>$request->twitter_name,
            'twitter_description'=>$request->twitter_description
        ]);

        $request->session()->flash('create');
        return redirect()->route('seo.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $seos = Seo::findOrFail($id);
        return view('admin.seo.edit', compact('seos'));
    }


    public function update(UpdateSeoRequest $request, $id)
    {

      Seo::findOrFail($id)->update([
          'title'=>$request->title,
          'keywords'=>$request->keywords,
          'description'=>$request->description,
          'site_name'=>$request->site_name,
          'site_url'=>$request->site_url,
          'twitter_name'=>$request->twitter_name,
          'twitter_description'=>$request->twitter_description,
      ]);

      $request->session()->flash('update');
      return redirect()->route('seo.index');

    }


    public function destroy($id)
    {
        $seo = Seo::findOrFail($id);
        $seo->destroy($id);
        return redirect()->route('seo.index');
    }
}
