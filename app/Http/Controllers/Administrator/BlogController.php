<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\blog\CreateBlogRequest;
use App\Http\Requests\Administrator\blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index()
    {
        $blog = Blog::with('user','category')->paginate(4);
        return view('admin.blog.index', compact('blog'));
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create', compact('category'));
    }


    public function store(CreateBlogRequest $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/blog',$image);
        }
        Blog::create([
            'image'=>$image,
            'alt'=>$request->alt,
            'subject'=>$request->subject,
            'body'=>$request->body,
            'title'=>$request->title,
            'description'=>$request->description,
            'keywords'=>$request->keywords,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
        ]);
        $request->session()->flash('create');
        return redirect()->route('blog.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }


    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            if (file_exists('back/images/blog/'.$blog->image)){
                unlink('back/images/blog/'.$blog->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/blog',$image);
        }else{
            $image = $blog->image;
        }

        $blog->update([
            'image'=>$image,
            'alt'=>$request->alt,
            'subject'=>$request->subject,
            'body'=>$request->body,
            'title'=>$request->title,
            'description'=>$request->description,
            'keywords'=>$request->keywords,
        ]);

        $request->session()->flash('update');
        return redirect()->route('blog.index');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blogImage = $blog->image;
        if (file_exists('back/images/blog/'.$blogImage)){
            unlink('back/images/blog/'.$blogImage);
        }
        $blog->destroy($id);
        return redirect()->route('blog.index');
    }
}
