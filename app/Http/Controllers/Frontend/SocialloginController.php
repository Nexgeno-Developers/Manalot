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
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();
    
            if ($user) {
                if ($user->completed_status == '0') {
                    Session::flush();
    
                    Session::put('temp_user_id', $user->id);
                    Session::put('step', $user->step + 1);

                    // Session::put('test', 1);
    
                    // Session::flash('error', 'Please Fill ALL Forms');

                    Session::put('toastr', [
                        'type' => 'error',
                        'message' => 'Please Fill ALL Forms',
                        'title' => 'Incomplete Registration'
                    ]);
    
                    return redirect()->intended('registration')->with('toastr', session()->pull('toastr'));
                }
    
                if ($user->approval != 1 && $user->status != 1) {
                    Session::flush();

                    // Session::put('test', 2);
    
                    // Session::flash('error', 'Application Status Under Review');

                    Session::put('toastr', [
                        'type' => 'error',
                        'message' => 'Application Status Under Review',
                        'title' => 'Review Status'
                    ]);
    
                    return redirect()->intended('login')->with('toastr', session()->pull('toastr'));
                }
    
                if ($user->status != 1) {
                    Session::flush();

                    // Session::put('test', 3);
    
                    // Session::flash('error', 'Your ID is Not Active!');

                    Session::put('toastr', [
                        'type' => 'error',
                        'message' => 'Your ID is Not Active!',
                        'title' => 'Account Inactive'
                    ]);
    
                    return redirect()->intended('login')->with('toastr', session()->pull('toastr'));
                }
    
                if ($user->approval != 1) {
                    Session::flush();

                    // Session::put('test', 4);
    
                    // Session::flash('error', 'ID is Not Approved!');

                    Session::put('toastr', [
                        'type' => 'error',
                        'message' => 'ID is Not Approved!',
                        'title' => 'Approval Needed'
                    ]);
    
                    return redirect()->intended('login')->with('toastr', session()->pull('toastr'));
                }

                Auth::login($user);
                // Session::flash('success', 'Login successful!');

                Session::put('toastr', [
                    'type' => 'success',
                    'message' => ' ',
                    'title' => 'Login successful'
                ]);
    
                return redirect()->intended('/')->with('toastr', session()->pull('toastr'));
            } else {
                Session::flush();
    
                Session::put('google_login', 1);
                Session::put('step', 1);
                Session::put('google_email', $googleUser->email);
                Session::put('google_name', $googleUser->name);
    
                // Session::flash('info', 'Please complete your registration.');

                Session::put('toastr', [
                    'type' => 'success',
                    'message' => 'Please complete your registration.',
                    'title' => 'Registration Incomplete'
                ]);
    
                return redirect()->route('registration')->with('toastr', session()->pull('toastr'));
            }
        } catch (\Exception $e) {
            // Session::flash('error', 'Something went wrong. Please try again.');

            Session::put('toastr', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
                'title' => 'Error'
            ]);

            return redirect()->route('login')->with('toastr', session()->pull('toastr'));
        }
    }

}