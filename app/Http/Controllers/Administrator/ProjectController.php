<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\project\CreateProjectRequest;
use App\Http\Requests\Administrator\project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $project = Project::paginate(4);
        return view('admin.project.index', compact('project'));
}
    public function create()
    {
        return view('admin.project.create');
    }

    public function store(CreateProjectRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/project',$image);
        }
        Project::create([
            'image'=>$image,
            'alt'=>$request->alt,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        $request->session()->flash('create');
        return redirect()->route('project.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }


    public function update(UpdateProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            if (file_exists('back/images/project/'.$project->image)){
                unlink('back/images/project/'.$project->image);
            }
            $image = time().'.'.$file->getClientOriginalExtension();
            $file->move('back/images/project',$image);
        }else{
            $image = $project->image;
        }
        $project->update([
            'image'=>$image,
            'alt'=>$request->alt,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        $request->session()->flash('update');
        return redirect()->route('project.index');

    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $projectImage = $project->image;
        if(file_exists('back/images/project/'.$projectImage)){
            unlink('back/images/project/'.$projectImage);
        }
        $project->destroy($id);
        return redirect()->route('project.index');
    }
}
