<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){
        //dd(Auth::user());
        return view('auth.login');
    }
    public function login(Request $request){
        
        $request->validate([
            'username' => ['required', 'string','min:4'] ,
            'password' => ['required','min:6'] 
        ]);
        $username = $request->username;
        $password = $request->password;
        $login_check = Auth::attempt(['username' => $username , 'password' => $password]) ;
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
            'username' => ['required' , 'string' , 'min:4' ] ,
            'password' => ['required','string', 'confirmed','min:6' ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
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
