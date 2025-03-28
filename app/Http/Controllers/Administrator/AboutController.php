<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\about\CreateAboutRequest;
use App\Http\Requests\Administrator\about\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::paginate(4);
        return view('admin.about.index', compact('about'));
    }


    public function create()
    {
        return view('admin.about.create');
    }


    public function store(CreateAboutRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if (!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/about', $image);
        }
        About::create([
           'image'=>$image,
           'alt'=>$request->alt,
           'experience_title'=>$request->experience_title,
           'experience_desc'=>$request->experience_desc,
           'title'=>$request->title,
            'subtitle'=>$request->subtitle,
           'description'=>$request->description,
            'helper' =>$request->helper,
            'service_title_one'=>$request->service_title_one,
            'service_desc_one'=>$request->service_desc_one,
            'service_title_two'=>$request->service_title_two,
            'service_desc_two'=>$request->service_desc_two,
            'service_title_three'=>$request->service_title_three,
            'service_desc_three'=>$request->service_desc_three,
            'service_title_four'=>$request->service_title_four,
            'service_desc_four'=>$request->service_desc_four,
        ]);

        $request->session()->flash('create');
        return redirect()->route('about.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }


    public function update(UpdateAboutRequest $request, $id)
    {
        $about = About::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            if(file_exists('back/images/about/'.$about->image)){
                unlink('back/images/about/'.$about->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/about', $image);
        }else{
            $image = $about->image;
        }

        $about->update([
            'image'=>$image,
            'alt'=>$request->alt,
            'experience_title'=>$request->experience_title,
            'experience_desc'=>$request->experience_desc,
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'description'=>$request->description,
            'helper' =>$request->helper,
            'service_title_one'=>$request->service_title_one,
            'service_desc_one'=>$request->service_desc_one,
            'service_title_two'=>$request->service_title_two,
            'service_desc_two'=>$request->service_desc_two,
            'service_title_three'=>$request->service_title_three,
            'service_desc_three'=>$request->service_desc_three,
            'service_title_four'=>$request->service_title_four,
            'service_desc_four'=>$request->service_desc_four,
        ]);

        $request->session()->flash('update');
        return redirect()->route('about.index');



    }


    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $aboutImage = $about->image;
        if(file_exists('back/images/about/'.$aboutImage)){
            unlink('back/images/about/'.$aboutImage);
        }
        $about->destroy($id);
        return redirect()->route('about.index');

    }
}
