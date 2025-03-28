<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public  function first(){
        $users = User::orderBy('id', 'desc')->paginate(4);
        return view('admin.old', compact('users'));
    }
}
