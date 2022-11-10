<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;


class LoginController extends Controller{



    public function login(Request $request){
        return Inertia::render('login');
    }



    /**
     * Authenticate the login attempt
     */
    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect(to:RouteServiceProvider::HOME);

        }
        else{
            // @RTODO - GIVE PROPER ERROR MESSAGE
            return back()->withErrors(['email' => 'Login Failed']);
        }

    }



    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/');

    }



}
