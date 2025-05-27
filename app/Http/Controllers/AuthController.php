<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        
        $request->validate([
            'email' => ['required', 'string','email'] ,
            'password' => ['required','min:3'] 
        ]);
        $email = $request->email;
        $password = $request->password;
        $login_check = Auth::attempt(['email' => $email , 'password' => $password]) ;
        if ($login_check) {
            return to_route('index');
        }
        else{
            return back()->withErrors('check your email or password');
        }

    }

    public function showRegisterForm(){
        return view('auth.signup');
    }
    public function register(Request $request){
        $request-> validate([
            'name' => ['required' , 'string','max:255'],
            'email' => ['required' , 'string','email','max:255','unique:users'],
            'password' => ['required','string', 'confirmed','min:3' ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);
        $user->sendEmailVerificationNotification();
        Auth::login($user);
        return to_route('verification.notice');

        
    }

    public function logout(Request $request){
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return to_route('index');

    }
}
