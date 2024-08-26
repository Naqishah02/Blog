<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // index
    public function index(){
        return view('auth.login');
    }
    // store
    public function store(){
        // validate
        $validated = request()->validate([
           'email' => ['required','email'],
           'password' => ['required','min:8'],
        ]);
        // attempt to log in
        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        // regenerate the session token
        request()->session()->regenerate();
        // redirect
        return redirect('/')->with('success', 'You are now logged in');
    }
    // destroy
    public function destroy(){
        Auth::logout();
        request()->session()->invalidate();
        return redirect()->route('login')->with('success','Logged out Successfully');
    }
}
