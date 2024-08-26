<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // index
    public function index(){
        $userId = Auth::user()->id;
        $user = User::find($userId) ;
        return view('profile.index', ['user' => $user]);
    }
    // show
    public function edit(){
        $userId = Auth::user()->id;
        $user = User::find($userId) ;
        return view('profile.settings', ['user' => $user]);
    }
    // update
    public function update(){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        // validate
        $validatedData = request()->validate([
            'name' => ['required','min:3','max:255'],
            'email' => ['required','email',
                Rule::unique('users')->ignore($user->id),
                ],
            'password' => ['nullable', 'min:8'],
        ]);
        if(empty(request('password'))){
            $validatedData['password'] = $user->password;
        }
        // update
        $user->update($validatedData);

        // redirect
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully');
    }
    // update picture
    public function picture()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        // validate
        $file = request()->file('picture');
        request()->validate([
            'picture' => ['required', 'mimes:jpg,jpeg,png','max:3000']
        ]);
        if($file){
            $fileName = time() . '-pp.' . $file->getClientOriginalExtension();
            request()->file('picture')->storeAs('images', $fileName, 'public');
            $user->update([
                'picture' => $fileName,
            ]);
        }
        // redirect
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile picture updated successfully');
    }
}
