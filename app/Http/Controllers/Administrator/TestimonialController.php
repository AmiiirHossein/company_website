<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\testimonial\CreateTestimonialRequest;
use App\Http\Requests\Administrator\testimonial\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonial = Testimonial::paginate(4);
        return view('admin.testimonial.index', compact('testimonial'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }


    public function store(CreateTestimonialRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/testimonial', $image);
        }
        Testimonial::create([
            'image'=>$image,
            'alt'=>$request->alt,
            'name'=>$request->name,
            'job'=>$request->job,
            'description'=>$request->description,
        ]);
        $request->session()->flash('create');
        return redirect()->route('testimonial.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }


    public function update(UpdateTestimonialRequest $request, $id)
    {
       $testimonial = Testimonial::findOrFail($id);
       $file = $request->file('image');
       $image = '';
       if(!empty($file)){
           if (file_exists('back/images/testimonial/'.$testimonial->image)){
               unlink('back/images/testimonial/'.$testimonial->image);
           }
           $image = time().".".$file->getClientOriginalExtension();
           $file->move('back/images/testimonial', $image);
       }else{
           $image = $testimonial->image;
       }
       $testimonial->update([
           'image'=>$image,
           'alt'=>$request->alt,
           'name'=>$request->name,
           'job'=>$request->job,
           'description'=>$request->description,
       ]);
       $request->session()->flash('update');
       return redirect()->route('testimonial.index');
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonialImage= $testimonial->image;
        if (file_exists('back/images/testimonial/'.$testimonialImage)){
            unlink('back/images/testimonial/'.$testimonialImage);
        }
        $testimonial->destroy($id);
        return redirect()->route('testimonial.index');
    }
}
