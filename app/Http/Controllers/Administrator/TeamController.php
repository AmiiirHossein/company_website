<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\team\CreateTeamRequest;
use App\Http\Requests\Administrator\team\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $team = Team::paginate(4);
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }


    public function store(CreateTeamRequest $request)
    {
       $file = $request->file('image');
       $image = '';
       if(!empty($file)){
           $image = time().".".$file->getClientOriginalExtension();
           $file->move('back/images/team',$image);
       }
       Team::create([
          'image'=>$image,
          'alt'=>$request->alt,
          'name'=>$request->name,
          'job'=>$request->job,
           'instagram'=>$request->instagram,
           'facebook'=>$request->facebook,
           'twitter'=>$request->twitter,
           'linkedin'=>$request->linkedin,
       ]);
       $request->session()->flash('create');
       return redirect()->route('team.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }


    public function update(UpdateTeamRequest $request, $id)
    {
       $team = Team::findOrFail($id);
       $file = $request->file('image');
       $image = '';
       if (!empty($file)){
           if (file_exists('back/images/team/'.$team->image)){
               unlink('back/images/team/'.$team->image);
           }
           $image = time().".".$file->getClientOriginalExtension();
           $file->move('back/images/team',$image);
       }else{
           $image = $team->image;
       }
       $team->update([
           'image'=>$image,
           'alt'=>$request->alt,
           'name'=>$request->name,
           'job'=>$request->job,
           'instagram'=>$request->instagram,
           'facebook'=>$request->facebook,
           'twitter'=>$request->twitter,
           'linkedin'=>$request->linkedin,
       ]);
       $request->session()->flash('update');
       return redirect()->route('team.index');
    }


    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $teamImage = $team->image;
        if(file_exists('back/images/team/'.$teamImage)){
            unlink('back/images/team/'.$teamImage);
        }
        $team->destroy($id);
        return redirect()->route('team.index');
    }
}
