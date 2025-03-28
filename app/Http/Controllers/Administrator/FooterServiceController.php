<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\footerService\CreateFooterServiceRequest;
use App\Http\Requests\Administrator\footerService\UpdateFooterServiceRequest;
use App\Models\FooterService;
use Illuminate\Http\Request;

class FooterServiceController extends Controller
{

    public function index()
    {
        $footerService = FooterService::paginate(4);
        return view('admin.footer.footerService.index', compact('footerService'));
    }


    public function create()
    {
        return view('admin.footer.footerService.create');
    }


    public function store(CreateFooterServiceRequest $request)
    {
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/footer',$image);
        }
        FooterService::create([
            'image'=>$image,
            'alt'=>$request->alt,
            'title'=>$request->title,
            'link'=>$request->link,
            'author'=>$request->author
        ]);
        $request->session()->flash('create');
        return redirect()->route('footerService.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $footerService = FooterService::findOrFail($id);
        return view('admin.footer.footerService.edit', compact('footerService'));
    }


    public function update(UpdateFooterServiceRequest $request, $id)
    {
       $footerService = FooterService::findOrFail($id);
       $file = $request->file('image');
       $image = '';
       if(!empty($file)){
           if ( file_exists('back/images/footer/'.$footerService->image)) {
               unlink('back/images/footer/'.$footerService->image);
           }
           $image = time().".".$file->getClientOriginalExtension();
           $file->move('back/images/footer', $image);
       }else{
           $image = $footerService->image;
       }
       $footerService->update([
           'image'=>$image,
           'alt'=>$request->alt,
           'title'=>$request->title,
           'link'=>$request->link,
           'author'=>$request->author
       ]);

       $request->session()->flash('update');
       return redirect()->route('footerService.index');
    }


    public function destroy($id)
    {
        $footerService = FooterService::findOrFail($id);
        $footerServiceImage = $footerService->image;
        if(file_exists('back/images/footer/'.$footerServiceImage)){
            unlink('back/images/footer/'.$footerServiceImage);
        }
        $footerService->destroy($id);
        return redirect()->route('footerService.index');
    }
}
