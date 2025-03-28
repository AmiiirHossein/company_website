<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(4);
        return view('admin.users.index', compact('users'));
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
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
           'name'=>'required|string|max:255',
           'email'=> ['required','string','email','max:255', Rule::unique('users')->ignore($user->id)],
            'mobile'=>['required','string','max:255', Rule::unique('users')->ignore($user->id)],
            'role'=>'required|max:255'
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'role'=>$request->role
        ]);

        $request->session()->flash('update');
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->destroy($id);
        return redirect()->route('users.index');
//        dd('user'. $id);
    }
}
