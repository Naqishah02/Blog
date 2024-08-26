<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    // index
    public function index(){
        return view('auth.register');
    }
    // store
    public function store(){
        // validate
        $validated = request()->validate([
           'name' => ['required', 'string', 'max:255','min:3'],
           'email' => ['required', 'email', 'unique:users,email'],
           'password' => ['required', 'min:8'],
        ]);
        $validated['name'] = ucfirst($validated['name']);
        // create a user
        $user = User::create($validated);
        // log the user in
        Auth::login($user);
        // redirect
        return redirect('/')->with('success','Successfully registered.');
    }
}
