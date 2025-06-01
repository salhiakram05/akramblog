<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function showVerificationNotice(){
        return view('auth.verify-email');
    }
    public function verify(EmailVerificationRequest $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return to_route('index'); 
        }
        $request->fulfill();
        return to_route('index');
    }

    public function resend(Request $request){
        dd($request->url());
        if($request->user()->hasVerifiedEmail()){
            return to_route('index');
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'we resent a confirmation link to your email');
    }
}
