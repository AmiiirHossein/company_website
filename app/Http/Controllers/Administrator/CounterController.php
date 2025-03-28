<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\counter\CreateCounterRequest;
use App\Http\Requests\Administrator\counter\UpdateCounterRequest;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function index()
    {
        $counter = Counter::paginate(4);
        return view('admin.counter.index',compact('counter'));
    }


    public function create()
    {
        return view('admin.counter.create');
    }

    public function store(CreateCounterRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/counter',$image);
        }
        Counter::create([
           'image'=>$image,
           'title'=>$request->title,
           'description'=>$request->description,
        ]);
        $request->session()->flash('create');
        return redirect()->route('counter.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $counter = Counter::findOrFail($id);
        return view('admin.counter.edit', compact('counter'));
    }


    public function update(UpdateCounterRequest $request, $id)
    {
        $counter = Counter::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            if(file_exists('back/images/counter/'.$counter->image)){
                unlink('back/images/counter/'.$counter->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/counter',$image);
        }else{
            $image = $counter->image;
        }
        $counter->update([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        $request->session()->flash('update');
        return redirect()->route('counter.index');
    }


    public function destroy($id)
    {
        $counter = Counter::findOrFail($id);
        $counterImage= $counter->image;
        if(file_exists('back/images/counter/'.$counterImage)){
            unlink('back/images/counter/'.$counterImage);
        }
        $counter->destroy($id);
        return redirect()->route('counter.index');
    }
}
