<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(){
        $user = auth()->user();
        return view('profile.show', ['user' => $user]);
    }

    public function update(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user->update($request->only('name'));

        return back()->with('success', 'profile name is updated');
    }

    public function updatePassword(Request $request)
{
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'password is wrong']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'password is updated successfully');
    }

}
