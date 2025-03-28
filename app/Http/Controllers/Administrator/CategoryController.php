<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\category\CreateCategoryRequest;
use App\Http\Requests\Administrator\category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();

        return view("admin.category.index", compact('category'));
    }


    public function create()
    {
        return view("admin.category.create");
    }


    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name'=> $request->name
        ]);
        $request->session()->flash('create');
        return redirect()->route("category.index");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);
        $request->session()->flash('update');
        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->destroy($id);
        return redirect()->route('category.index');
    }
}
