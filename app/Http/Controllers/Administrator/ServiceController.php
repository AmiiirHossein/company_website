<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\service\CreateServiceRequest;
use App\Http\Requests\Administrator\service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $service = Service::paginate(4);
        return view('admin.service.index', compact('service'));
    }


    public function create()
    {
        return view('admin.service.create');
    }


    public function store(CreateServiceRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/service',$image);
        }
        Service::create([
            'image'=>$image,
            'alt'=>$request->alt,
            'service_title_one'=>$request->service_title_one,
            'service_desc_one'=>$request->service_desc_one,
            'link_one'=>$request->link_one,
            'service_title_two'=>$request->service_title_two,
            'service_desc_two'=>$request->service_desc_two,
            'link_two'=>$request->link_two,
            'service_title_three'=>$request->service_title_three,
            'service_desc_three'=>$request->service_desc_three,
            'link_three'=>$request->link_three,
        ]);
        $request->session()->flash('create');
        return redirect()->route('service.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }


    public function update(UpdateServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            if(file_exists('back/images/service/'.$service->image)){
                unlink('back/images/service/'.$service->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/service',$image);
        }else{
            $image = $service->image;
        }
        $service->update([
            'image'=>$image,
            'alt'=>$request->alt,
            'service_title_one'=>$request->service_title_one,
            'service_desc_one'=>$request->service_desc_one,
            'link_one'=>$request->link_one,
            'service_title_two'=>$request->service_title_two,
            'service_desc_two'=>$request->service_desc_two,
            'link_two'=>$request->link_two,
            'service_title_three'=>$request->service_title_three,
            'service_desc_three'=>$request->service_desc_three,
            'link_three'=>$request->link_three,
        ]);
        $request->session()->flash('update');
        return redirect()->route('service.index');


    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $serviceImage = $service->image;
        if(file_exists('back/images/service/'.$serviceImage)){
            unlink('back/images/service/'.$serviceImage);
        }
        $service->destroy($id);
        return redirect()->route('service.index');
    }
}
