<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\TopHeader;
use App\Models\Header;
use App\Models\FooterContact;
use App\Models\FooterAbout;
use App\Models\FooterQuick;
use App\Models\FooterService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $topheader = TopHeader::orderBy('id', 'desc')->take(1)->first();
        $header = Header::orderBy('id','asc')->take(6)->get();
        $footerAbout = FooterAbout::orderBy('id', 'desc')->take(1)->first();
        $footerService = FooterService::orderBy('id', 'desc')->take(3)->get();
        $footerQuick = FooterQuick::orderBy('id', 'desc')->take(5)->get();
        $footerContact = FooterContact::orderBy('id', 'desc')->take(1)->first();
        return view('auth.register', compact('topheader','header','footerAbout','footerService','footerContact','footerQuick'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max: 11','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
