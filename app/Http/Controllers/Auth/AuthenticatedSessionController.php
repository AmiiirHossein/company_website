<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\FooterContact;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TopHeader;
use App\Models\FooterAbout;
use App\Models\FooterService;
use App\Models\FooterQuick;
use App\Models\Header;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
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
        return view('auth.login', compact('topheader','header', 'footerAbout', 'footerService', 'footerQuick','footerContact'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
