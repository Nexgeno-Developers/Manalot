<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Auth;

class SocialloginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->email)->first();
    
            if ($user) {
                if ($user->completed_status == '0') {
                    Session::flush();
    
                    Session::put('temp_user_id', $user->id);
                    Session::put('step', $user->step + 1);
    
                    Session::flash('error', 'Please Fill ALL Forms');
    
                    return redirect()->route('registration');
                }
    
                if ($user->approval != 1 && $user->status != 1) {
                    Session::flush();
    
                    Session::flash('error', 'Application Status Under Review');
    
                    return redirect()->route('registration');
                }
    
                if ($user->status != 1) {
                    Session::flush();
    
                    Session::flash('error', 'Your ID is Not Active!');
    
                    return redirect()->route('registration');
                }
    
                if ($user->approval != 1) {
                    Session::flush();
    
                    Session::flash('error', 'ID is Not Approved!');
    
                    return redirect()->route('login');
                }
    
                Auth::login($user);
                Session::flash('success', 'Login successful!');
    
                return redirect()->intended('index');
            } else {
                Session::flush();
    
                Session::put('google_login', 1);
                Session::put('step', 1);
                Session::put('google_email', $googleUser->email);
                Session::put('google_name', $googleUser->name);
    
                Session::flash('info', 'Please complete your registration.');
    
                return redirect()->route('registration');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong. Please try again.');
            return redirect()->route('login');
        }
    }

}