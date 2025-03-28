<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comment = Comment::with('user')->orderBy('id', 'desc')->paginate(8);
        return view('admin.comment.index', compact('comment'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comment.edit', compact('comment'));
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update([
            'status'=>$request->status,
        ]);
        $request->session()->flash('update');
        return redirect()->route('comment.index');
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->destroy($id);
        return redirect()->route('comment.index');
    }
}
