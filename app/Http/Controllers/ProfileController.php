<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{

    public function show(User $user){
    $posts = $user->posts()->latest()->paginate(6); 
    return view('profile.show', ['user' => $user, 'posts' => $posts] );
    }

    public function edit(){
        $user = auth()->user();
        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required','string','max:255' , Rule::unique('users')->ignore($user->id) ],
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username
        ]);

        return back()->with('success', 'profile updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        auth()->logoutOtherDevices($request->current_password);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'password is updated successfully');
    }

}
