<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use Auth;

class AccountController extends Controller
{
    public function registration_page(){
        return view('frontend.pages.registration.index');
    }


    //---------- login and loag out---------------------

    public function login(){
        return view('frontend.pages.registration.login');
    }

    public function customer_login(Request $request){

        // Validating the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Checking if validation fails
        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return response()->json(array('response_message' => $rsp_msg));
        }

        Session()->flush();

        $authenticated = Auth::guard('web')->attempt($request->only(['email', 'password']));
        if($authenticated)
        {

            $user = DB::table('users')->where('email', $request->input('email'))->get()->first();

            if($user){
    
                if ($user->completed_status == '0'){

                    Session()->flush();
    
                    Session::put('temp_user_id', $user->id);
                    Session::put('step', $user->step + 1);
    
                    $rsp_msg['response'] = 'error';
                    $rsp_msg['status'] = 'incomplete';
                    $rsp_msg['message']  = 'Please Fill ALL Forms';
        
                    return response()->json(array('response_message' => $rsp_msg));
                }
    
                if ($user->approval != 1 && $user->status != 1){

                    Session()->flush();
    
                    $rsp_msg['response'] = 'error';
                    $rsp_msg['status'] = 'completed';
                    $rsp_msg['message']  = 'Application Status Under Review';
        
                    return response()->json(array('response_message' => $rsp_msg));
                }
    
                if ($user->status != 1){

                    Session()->flush();
    
                    $rsp_msg['response'] = 'error';
                    $rsp_msg['message']  = 'Your ID is Not Active!';
        
                    return response()->json(array('response_message' => $rsp_msg));
                }
    
                if ($user->approval != 1){

                    Session()->flush();
    
                    $rsp_msg['response'] = 'error';
                    $rsp_msg['message']  = 'ID is Not Approve!';
        
                    return response()->json(array('response_message' => $rsp_msg));
                }


    
            } else {

                Session()->flush();
    
                $rsp_msg['response'] = 'error';
                $rsp_msg['message']  = 'User Not Exiest!, Please Register';
    
                return response()->json(array('response_message' => $rsp_msg));
            }

            Session::put('user_id', auth()->user()->id);

            $rsp_msg['response'] = 'success';
            $rsp_msg['message']  = "Successfully logged in";

        }
        else
        {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "invalid credentials!, Please Try Again";
        }

        return response()->json(array('response_message' => $rsp_msg));
    }

    public function customer_logout(){
        Auth::guard('web')->logout();
        Session()->flush();
        return redirect()->route('login');
    }

    //------------------------ login and log out-----------------------------------------

    /*------------------------------ Forgot password Function --------------------------------------------*/

    public function forgot_password($param, Request $request){


        if($param == "verify-number-send-otp"){

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
        
                return response()->json([
                    'status' => 'error',
                    'message' => $errors
                ], 200);
            } 
    
            $user = DB::table('users')->where('email', $request->email)->where('step', '!=', '1')->first(['id']);
    
            if($user){

                Session()->flush();

                $otp = mt_rand(100000, 999999);
                $timestamp = Carbon::now();
                Session::put('otp', $otp);
                Session::put('otp_timestamp', $timestamp);
                Session::put('user_forget_id', $user->id);

                $email = $request->email;
                
                $to = $email;
                $subject = "$otp is your Manalot Leadership Network Forgot Password Verification Code.";
                $body = "Hello, <br> 
        For security purposes, please enter the code below to verify your account.<br> 
        Forgot Password Verification Code: <b>$otp</b> <br>
        The code is valid for 2 minutes.  <br>
        Having problems with the code? <br>
        The code will not work if timed out. <br>
        Please request for a new code.";


                sendEmail($to, $subject, $body);

                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP has been Share on this Email Id : '.$email.''
                ], 200);

            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => 'User Not exist Please Provide Valid Email Id',
                ], 200);

            }
    

        }elseif($param == "verify-forgot-otp"){

            $validator = Validator::make($request->all(), [
                'otp' => 'required|digits:6',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
        
                return response()->json([
                    'status' => 'error',
                    'message' => $errors
                ], 200);
            } 
    
            $otp = Session::get('otp');
            $timestamp = Session::get('otp_timestamp');
    
            // Check if OTP expired (2 minutes)
            if (Carbon::parse($timestamp)->diffInMinutes(Carbon::now()) > 2) {

                return response()->json([
                    'status' => 'error',
                    'message' => 'OTP has expired. Please request a new one',
                ], 200);

            }
    
            if ($request->otp == $otp) {

                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP has been Verify successfully'
                ], 200);

            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid OTP',
                ], 200);


            }
    
        
        }elseif($param == "reset-password"){


            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6|same:password_conform',
                'password_conform' => 'required|min:6',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
        
                return response()->json([
                    'status' => 'error',
                    'message' => $errors
                ], 200);
            }
    
            $user = DB::table('users')->where('id', Session::get('user_forget_id'))->get(['id'])->first();

            if($user){
                DB::table('users')->where('id', Session::get('user_forget_id'))->update([
                    'password' => bcrypt($request->input('password')),
                ]);
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'New Password Update Successfully',
                ], 200);

            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Something Went Wrong'
                ], 200);

            }



        } else {

            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong or Invalid parameter: '.$param.''
            ], 200);

        }

    }


    /*------------------------------ Forgot password Function -------------------------------------------*/


    public function create_account($param, Request $request){

        if($param == "user-info"){

            $rsp_msg = $this->create_user_detail($request);

        }elseif($param == "email-verify"){

            $rsp_msg = $this->email_verification($request);
        
        }elseif($param == "resend-otp"){

            $rsp_msg = $this->resendOtp($request);

        }elseif($param == "phone-verify"){

            $rsp_msg = $this->phone_verification($request);
        
        }elseif($param == "resend-otp-phone"){

            $rsp_msg = $this->resendOtp_phone($request);

        }elseif($param == "personal-info"){

            $rsp_msg = $this->create_personal_info($request);

        }elseif($param == "login-info"){

            $rsp_msg = $this->create_login_info($request);
        
        }elseif($param == "personal-work-info"){

            $rsp_msg = $this->creaste_personal_work_info($request);

        }elseif($param == "education-info"){

            $rsp_msg = $this->create_education_info($request);

        }elseif($param == "skills-info"){

            $rsp_msg = $this->create_skills_info($request);

        }elseif($param == "certifications-info"){

            $rsp_msg = $this->create_certifications_info($request);

        }elseif($param == "preferences-info"){

            $rsp_msg = $this->create_preferences_info($request);

        }elseif($param == "work-authorization-info"){

            $rsp_msg = $this->create_work_authorization_info($request);

        }elseif($param == "social-media-info"){

            $rsp_msg = $this->create_social_media_info($request);

        }elseif($param == "proceeding-info"){

            $rsp_msg = $this->create_proceeding_info($request);

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message'] = "Invalid parameter: $param";
        }
        

        return response()->json(array('response_message' => $rsp_msg));
    }

    public function getSkills(Request $request)
    {
        $search = $request->input('q');
        $searchTerms = explode(' ', $search);
        
        $skills = DB::table('skills')
            ->where(function($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->orWhere('name', 'LIKE', "$term%");
                }
            })
            ->groupBy('name')
            ->get(['name']);
        
        return response()->json($skills);
    }

    public function getRelatedSkills(Request $request)
    {
        $skill = $request->input('skill');
        $searchTerms = explode(' ', $skill);
        
        $relatedSkills = DB::table('skills')
            ->where(function($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->orWhere('name', 'LIKE', "$term%");
                }
            })
            ->wherenot('name',$skill)
            ->limit('10')
            ->get();
        
        return response()->json($relatedSkills);
    }

    public function create_user_detail($request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[A-Za-z0-9_.]+$/', 'min:1', 'max:50'],
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            //'experience_Status' => 'required',
            'phone_number' => 'required|regex:/^[\d\s\-\+]+$/|min:5',
            'resume_cv' => 'required|mimes:pdf,doc,docx|max:5120',
        ], [
            'name.required' => 'The Username field is required.',
            'name.string' => 'The Username must be a string.',
            'name.regex' => 'The Username format is invalid. Only letters, numbers, dots, underscores are allowed, and spacing is not allowed.',
            'name.min' => 'The Username must be at least 1 character.',
            'name.max' => 'The Username may not be greater than 50 characters.',
            
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email must be a valid email address.',
            
            'password.required' => 'The Password field is required.',
            
            'confirm_password.required' => 'The Confirm Password field is required.',
            'confirm_password.same' => 'The Confirm Password must match the Password.',
        
            'phone_number.required' => 'The Phone Number field is required.',
            'phone_number.regex' => 'The Phone Number format is invalid.',
            'phone_number.min' => 'The Phone Number must be at least 5 characters.',
            
            'resume_cv.required' => 'The Resume file is required.',
            'resume_cv.mimes' => 'The Resume must be a PDF, DOC, or DOCX file.',
            'resume_cv.max' => 'The Resume may not be larger than 5MB.',
        ]);
        

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }


        $users_email = DB::table('users')->where('email', $request->input('email'))->where('status', 1)->get();

        if(count($users_email) != 0){
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = 'Email Already Exists';

            return $rsp_msg;
        }

        $users_username = DB::table('users')->where('username', $request->input('name'))->get();

        if(count($users_username) != 0){
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = 'Username Already Exists';

            return $rsp_msg;
        }

        $users_email_temp = DB::table('users')->where('email', $request->input('email'))->get()->first();

        if($request->has('resume_cv')){
               
            $users_email_temp_email = str_replace(['@', '.'], '_', $request->input('email'));
            $newFileName = 'resume_' . $users_email_temp_email . '_' . now()->format('YmdHis') . '.' . $request->file('resume_cv')->getClientOriginalExtension();
            $path = $request->file('resume_cv')->storeAs('user_data/resume_cv', $newFileName, 'public');
            
            // $result = file_upload_od($newFileName, $path);
            // if($result != 'error'){
            //     $path = $result;
            // }

            // $path = $request->file('resume_cv')->store('user_data/resume_cv', 'public');

        } else {
            $path = null;
        }



        if($users_email_temp){

            $resume_path = DB::table('userdetails')->where('user_id', $users_email_temp->id)->value('resume_cv');

            if ($resume_path) {
                if (Storage::disk('public')->exists($resume_path)) {
                    Storage::disk('public')->delete($resume_path);
                }
            } 


            if(Session::has('google_email') && Session::get('google_login') == 1){

                DB::table('users')->where('id',$users_email_temp->id)->update([
                    'username' => $request->input('name'),
                    'email' => strtolower($request->input('email')),
                    'password' => bcrypt($request->input('password')),
                    'approval' => '0',
                    'status' => '0',
                    'completed_status' => '0',
                    'step' => 1,
                    'role_id'  => '2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $result = file_upload_od($newFileName, $path);
                if($result != 'error on uploding'){
                    if (Storage::disk('public')->exists($path)) {
                        // Storage::disk('public')->delete($path);
                    }
                    $path = $result;
                }

                DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
                    'phone_number' => $request->input('phone_number'),
                    'resume_cv' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Session::put('temp_user_id', $users_email_temp->id);

                Session::put('step', 2);

                
                $rsp_msg['response'] = 'success';
                $rsp_msg['message'] = "User Detail Added successfully. Please Proceed";

                // session()->flash('success', 'User Detail Added successfully. Please Proceed');

                return $rsp_msg;

            }


        } else {

            if(Session::has('google_email') && Session::get('google_login') == 1){

                $userId = DB::table('users')->insertGetId([
                    'username' => $request->input('name'),
                    'email' => strtolower($request->input('email')),
                    'password' => bcrypt($request->input('password')),
                    'approval' => '0',
                    'role_id'  => '2',
                    'completed_status' => '0',
                    'status' => '0',
                    'step' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $result = file_upload_od($newFileName, $path);
                if($result != 'error on uploding'){
                    if (Storage::disk('public')->exists($path)) {
                        // Storage::disk('public')->delete($path);
                    }
                    $path = $result;
                }

                DB::table('userdetails')->insert([
                    'user_id' => $userId,
                    'phone_number' => $request->input('phone_number'),
                    //'experience_Status' => $request->input('experience_Status'),
                    'skill' => '[]',
                    'references' => '[]',
                    'resume_cv' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Session::put('temp_user_id', $userId);

                Session::put('step', 2);

                $rsp_msg['response'] = 'success';
                $rsp_msg['message'] = "User Detail Added successfully. Please Proceed";

                // session()->flash('success', 'User Detail Added successfully. Please Proceed');

                return $rsp_msg;

            }
        }

        // Session::put('password', $request->input('password'));
        // Session::put('step', 2);


        $user_info = [
            'username' => strtolower($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'resume_cv' => $path,
            'newFileName' => $newFileName,
        ];


        $otp = mt_rand(100000, 999999);
        $timestamp = Carbon::now();
        Session::put('otp', $otp);
        Session::put('otp_timestamp', $timestamp);

        $to = $user_info['email'];
        $subject = "$otp is your Manalot Leadership Network Verification Code.";
        $body = "Hello, <br> 
        For security purposes, please enter the code below to verify your account.<br> 
        Account Verification Code: <b>$otp</b> <br>
        The code is valid for 2 minutes.  <br>
        Having problems with the code? <br>
        The code will not work if timed out. <br>
        Please request for a new code.";

        sendEmail($to, $subject, $body);

        Session::put('user_info', $user_info);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message'] = "Please Enter your Verification Code Sent To " . $user_info['email'];

        // session()->flash('success', 'User Detail Added successfully. Please Proceed');

        return $rsp_msg;

    }

    public function email_verification($request){
        
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg; 
        } 

        $otp = Session::get('otp');
        $timestamp = Session::get('otp_timestamp');

        // Check if OTP expired (2 minutes)
        if (Carbon::parse($timestamp)->diffInMinutes(Carbon::now()) > 2) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "OTP has expired. Please request a new one";

            return $rsp_msg;
        }

        if ($request->otp == $otp) {

            $user_info = Session::get('user_info');

            // $users_email_temp = DB::table('users')->where('email', $user_info['email'])->get()->first();

            // if($users_email_temp){

            //     DB::table('users')->where('id',$users_email_temp->id)->update([
            //         'username' => $user_info['username'],
            //         'email' => $user_info['email'],
            //         'password' => $user_info['password'],
            //         'approval' => '0',
            //         'status' => '0',
            //         'completed_status' => '0',
            //         'step' => 1,
            //         'role_id'  => '2',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);

            //     $result = file_upload_od($user_info['newFileName'], $user_info['resume_cv']);
            //     if($result != 'error on uploding'){
            //         if (Storage::disk('public')->exists($user_info['resume_cv'])) {
            //             // Storage::disk('public')->delete($user_info['resume_cv']);
            //         }
            //         $path = $result;
            //     } else{
            //         $path = $user_info['resume_cv'];
            //     }
    
            //     DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
            //         'phone_number' => $user_info['phone_number'],
            //         'resume_cv' => $path,
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
    
            //     Session::put('temp_user_id', $users_email_temp->id);
    
            // } else {
    
            //     $userId = DB::table('users')->insertGetId([
            //         'username' => $user_info['username'],
            //         'email' => $user_info['email'],
            //         'password' => $user_info['password'],
            //         'approval' => '0',
            //         'role_id'  => '2',
            //         'completed_status' => '0',
            //         'status' => '0',
            //         'step' => 1,
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);

            //     $result = file_upload_od($user_info['newFileName'], $user_info['resume_cv']);
            //     if($result != 'error on uploding'){
            //         if (Storage::disk('public')->exists($user_info['resume_cv'])) {
            //             // Storage::disk('public')->delete($user_info['resume_cv']);
            //         }
            //         $path = $result;
            //     } else{
            //         $path = $user_info['resume_cv'];
            //     }
    
            //     DB::table('userdetails')->insert([
            //         'user_id' => $userId,
            //         'phone_number' => $user_info['phone_number'],
            //         'skill' => '[]',
            //         'edu_data' => '[]',
            //         'references' => '[]',
            //         'resume_cv' => $path,
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
    
            //     Session::put('temp_user_id', $userId);
            // }

            // Session::put('step', 2);
            // session()->forget('user_info');

            $otp = mt_rand(100000, 999999);
            $timestamp = Carbon::now();
            Session::put('otp', $otp);
            Session::put('otp_timestamp', $timestamp);

            $student_name = 'Admin';

            $data['student_name'] = rawurlencode($student_name);
            $data['template']    = 'LMS%20access%20OTP%2031st%20march';
            $data['use']          = 'otp_sms';
            $data['phone']        = str_replace(['+', ' '], '', $user_info['phone_number']);
            $data['otp']          = $otp;

            send_sms_through_2factor($data);

            $rsp_msg['response'] = 'success';
            $rsp_msg['message']  = "Email Verified Successfully";

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "Invalid OTP";
        }
        

        return $rsp_msg;
    }



    public function resendOtp($request)
    {
        $otp = mt_rand(100000, 999999);
        Session::put('otp', $otp);

        $timestamp = Carbon::now();
        Session::put('otp_timestamp', $timestamp);
        
        $user_info = Session::get('user_info');

        $to = $user_info['email'];
        $subject = "$otp is your Manalot Leadership Network Reset Verification Code.";
        $body = "Hello, <br> 
        For security purposes, please enter the code below to verify your account.<br> 
        Resend Verification Code: <b>$otp</b> <br>
        The code is valid for 2 minutes.  <br>
        Having problems with the code? <br>
        The code will not work if timed out. <br>
        Please request for a new code.";


        sendEmail($to, $subject, $body);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "OTP has been Resend no this Email : " . $user_info['email'];

        return $rsp_msg;
    }


    //---------------------- Phone verification ----------------------------------------//

    public function phone_verification($request){
        
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg; 
        } 

        $otp = Session::get('otp');
        $timestamp = Session::get('otp_timestamp');

        // Check if OTP expired (2 minutes)
        if (Carbon::parse($timestamp)->diffInMinutes(Carbon::now()) > 2) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "OTP has expired. Please request a new one";

            return $rsp_msg;
        }

        if ($request->otp == $otp) {

            $user_info = Session::get('user_info');

            $users_email_temp = DB::table('users')->where('email', $user_info['email'])->get()->first();

            if($users_email_temp){

                DB::table('users')->where('id',$users_email_temp->id)->update([
                    'username' => $user_info['username'],
                    'email' => $user_info['email'],
                    'password' => $user_info['password'],
                    'approval' => '0',
                    'status' => '0',
                    'completed_status' => '0',
                    'step' => 1,
                    'role_id'  => '2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $result = file_upload_od($user_info['newFileName'], $user_info['resume_cv']);
                if($result != 'error on uploding'){
                    if (Storage::disk('public')->exists($user_info['resume_cv'])) {
                        // Storage::disk('public')->delete($user_info['resume_cv']);
                    }
                    $path = $result;
                } else{
                    $path = $user_info['resume_cv'];
                }
    
                DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
                    'phone_number' => $user_info['phone_number'],
                    'resume_cv' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                Session::put('temp_user_id', $users_email_temp->id);
    
            } else {
    
                $userId = DB::table('users')->insertGetId([
                    'username' => $user_info['username'],
                    'email' => $user_info['email'],
                    'password' => $user_info['password'],
                    'approval' => '0',
                    'role_id'  => '2',
                    'completed_status' => '0',
                    'status' => '0',
                    'step' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $result = file_upload_od($user_info['newFileName'], $user_info['resume_cv']);
                if($result != 'error on uploding'){
                    if (Storage::disk('public')->exists($user_info['resume_cv'])) {
                        // Storage::disk('public')->delete($user_info['resume_cv']);
                    }
                    $path = $result;
                } else{
                    $path = $user_info['resume_cv'];
                }
    
                DB::table('userdetails')->insert([
                    'user_id' => $userId,
                    'phone_number' => $user_info['phone_number'],
                    'skill' => '[]',
                    'edu_data' => '[]',
                    'references' => '[]',
                    'resume_cv' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                Session::put('temp_user_id', $userId);
            }

            Session::put('step', 2);
            session()->forget('user_info');

            $rsp_msg['response'] = 'success';
            $rsp_msg['message']  = "Phone Number Verified Successfully";

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "Invalid OTP";
        }
        

        return $rsp_msg;
    }



    public function resendOtp_phone($request)
    {
        $otp = mt_rand(100000, 999999);
        Session::put('otp', $otp);

        $timestamp = Carbon::now();
        Session::put('otp_timestamp', $timestamp);
        
        $user_info = Session::get('user_info');

        $student_name = 'Admin';

        $data['student_name'] = rawurlencode($student_name);
        $data['template']    = 'LMS%20access%20OTP%2031st%20march';
        $data['use']          = 'otp_sms';
        $data['phone']        = str_replace(['+', ' '], '', $user_info['phone_number']);
        $data['otp']          = $otp;

        send_sms_through_2factor($data);

        // $to = $user_info['email'];
        // $subject = "$otp is your Manalot Leadership Network Reset Verification Code.";
        // $body = "Hello, <br> 
        // For security purposes, please enter the code below to verify your account.<br> 
        // Resend Verification Code: <b>$otp</b> <br>
        // The code is valid for 2 minutes.  <br>
        // Having problems with the code? <br>
        // The code will not work if timed out. <br>
        // Please request for a new code.";


        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "OTP has been Resend no this Number : " . $user_info['phone_number'];

        return $rsp_msg;
    }

    //----------------------- phone verification ---------------------------------------//



    public function create_personal_info($request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'gender' => 'required',
            'dob' => 'required',
            //'email' => 'required|email',
            //'phone_number' => 'required|regex:/^[\d\s-]+$/|min:10',
            //'address' => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&-]+$/i', 'min:3', 'max:250'],
            // 'address' => ['required','min:1', 'max:250'],
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        $profile_img_path = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->value('profile_photo');

        if($request->has('profile_photo')){
            $path = $request->file('profile_photo')->store('user_data/profile_img', 'public');

            if ($profile_img_path) {
                if (Storage::disk('public')->exists($profile_img_path)) {
                    Storage::disk('public')->delete($profile_img_path);
                }
            }

        } else {
            $path = $profile_img_path;
        }

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            //'email' => strtolower($request->input('email')),
            'step' => 2,
        ]);

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            //'phone_number' => $request->input('phone_number'),
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'profile_photo' => $path,
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'pincode' => $request->input('pincode'),
            'country' => $request->input('country'),
        ]);

        Session::put('step', 3);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Personal Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }



    public function creaste_personal_work_info($request){

        $validator = Validator::make($request->all(), [
            'wrk_exp_company_name' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            // 'wrk_exp__title' => ['required', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:2', 'max:100'],
            'wrk_exp__title' => 'required|regex:/^[A-Za-z0-9\s,.\/\'&]+$/i|min:2|max:100',
            // 'wrk_exp__title' => ['required', 'min:1', 'max:100'],
            'industry.*' => 'required',
            // 'job_title' => 'required',
            'wrk_exp_years' => 'required',
            // 'wrk_exp_responsibilities' => ['required', 'string','regex:/^[A-Za-z0-9\s,.\/\'&\-\(\)\[\]_?+]+$/i', 'min:2'],
            'wrk_exp_responsibilities' => ['required', 'min:2'],
            // 'resume_cv' => 'nullable|mimes:pdf|max:5120',
            'skill' => 'required',
            'Employed' => 'required', // Assuming 'Employed' is nullable string
            'experience_letter' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ], [
            'wrk_exp_company_name.required' => 'The Company Name is required.',
            'wrk_exp_company_name.regex' => 'The Company Name format is invalid.',
            'wrk_exp_company_name.min' => 'The Company Name must be at least 2 characters.',
            
            'wrk_exp__title.required' => 'The Professional Title is required.',
            // 'wrk_exp__title.string' => 'The Professional Title must be a string.',
            'wrk_exp__title.regex' => 'The Professional Title format is invalid.',
            'wrk_exp__title.min' => 'The Professional Title must be at least 1 character.',
            'wrk_exp__title.max' => 'The Professional Title may not be greater than 100 characters.',
            
            'industry.*.required' => 'The Industry field is required.',
            'Employed.required' => 'The Employed Status is required.',
            
            'wrk_exp_years.required' => 'The Years of Experience field is required.',
            
            'wrk_exp_responsibilities.required' => 'The Responsibilities field is required.',
            // 'wrk_exp_responsibilities.string' => 'The Responsibilities must be a string.',
            // 'wrk_exp_responsibilities.regex' => 'The Responsibilities format is invalid.',
            'wrk_exp_responsibilities.min' => 'The Responsibilities must be at least 2 characters.',
            
            'skill.required' => 'The Skill field is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }


        $skill = $request->input('skill');

        // foreach($skill as $row){
        //     $skill_data = DB::table('skills')->where('name', $row)->get()->first();

        //     if(!$skill_data){
        //          DB::table('skills')->insert([
        //             'name' => $row,
        //             'status' => 1,
        //         ]);
        //     } 
        // }

        $industry = $request->input('industry');

        $industry_elements = explode(',', $industry[0]);

        // Trim spaces from each element
        $industry_elements = array_map('trim', $industry_elements);




        // foreach($industry as $row){
        //     $industry_data = DB::table('industry')->where('name', $row)->get()->first();

        //     if(!$industry_data){
        //          DB::table('industry')->insert([
        //             'name' => $row,
        //             'status' => 1,
        //         ]);
        //     } 
        // }


        $userDetail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->first();

        // Handle file upload for experience letter
        if ($request->hasFile('experience_letter') && $request->file('experience_letter')->isValid()) {

            $users_email_temp = DB::table('users')->where('id', Session::get('temp_user_id'))->value('email');

            $users_email_temp = str_replace(['@', '.'], '_', $users_email_temp);

            $newFileName = 'experience_letter_' . $users_email_temp . '_' . now()->format('YmdHis') . '.' . $request->file('experience_letter')->getClientOriginalExtension();
            $path = $request->file('experience_letter')->storeAs('user_data/experience_letters', $newFileName, 'public');

            

            // $path = $request->file('experience_letter')->store('user_data/experience_letters', 'public');

            $result = file_upload_od($newFileName, $path);
            if($result != 'error on uploding'){
                if (Storage::disk('public')->exists($path)) {
                    // Storage::disk('public')->delete($path);
                }
                $path = $result;
            }

        } else {
            // Check if existing path should be retained or set to null
            $path = $userDetail ? $userDetail->experience_letter : null;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
            'wrk_exp_years' => $request->input('wrk_exp_years'),
            'industry' => json_encode($industry_elements),
            'wrk_exp__title' => $request->input('wrk_exp__title'),
            'skill' => json_encode($skill),
            'wrk_exp_responsibilities' => $request->input('wrk_exp_responsibilities'),
            
            'employed' => $request->input('Employed'),
            'experience_letter' => $path,

        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  3,
        ]);

        Session::put('step', 4);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Personal and Work Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }




    public function create_certifications_info($request){

        $validator = Validator::make($request->all(), [
            // 'certificate_name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_name' => 'required',
            // 'certificate_issuing' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_issuing' => ['required', 'min:1', 'max:50'],
            'certificate_obtn_date' => 'required',

            'edu_degree.*' => 'required',
            'edu_clg_name.*' => 'required',
            'edu_graduation_year.*' => 'required',

        ], [
            'certificate_name.required' => 'The Certificate Name is required.',
            'certificate_name.min' => 'The Certificate Name must be at least 1 character.',
            'certificate_name.max' => 'The Certificate Name may not be greater than 100 characters.',
            
            'certificate_issuing.required' => 'The Certificate Issuing field is required.',
            'certificate_issuing.min' => 'The Certificate Issuing must be at least 1 character.',
            'certificate_issuing.max' => 'The Certificate Issuing may not be greater than 50 characters.',
            
            'certificate_obtn_date.required' => 'The Certificate Obtain Date is required.',
        
            'edu_degree.*.required' => 'The Degree field is required.',
            'edu_clg_name.*.required' => 'The School/University Name field is required.',
            'edu_graduation_year.*.required' => 'The Graduation Year field is required.',
            'edu_field.*.required' => 'The Major/Field of Study field is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        //---- education -------
        $edu_data = [];
        $edu_clg_name = $request->input('edu_clg_name');
        $edu_degree = $request->input('edu_degree');
        $edu_graduation_year = $request->input('edu_graduation_year');
        $edu_field = $request->input('edu_field');

        for ($i = 0; $i < count($edu_clg_name); $i++) {
            $edu_data[] = [
                'edu_clg_name' => $edu_clg_name[$i],
                'edu_degree' => $edu_degree[$i],
                'edu_graduation_year' => $edu_graduation_year[$i],
                'edu_field' => $edu_field[$i],
            ];
        }

        //------ education -----------

        // Combine the form data into an array
        $certificate_data = [];
        $certificate_names = $request->input('certificate_name');
        $certificate_dates = $request->input('certificate_obtn_date');
        $certificate_issuings = $request->input('certificate_issuing');

        for ($i = 0; $i < count($certificate_names); $i++) {
            $certificate_data[] = [
                'certificate_name' => $certificate_names[$i],
                'certificate_obtn_date' => $certificate_dates[$i],
                'certificate_issuing' => $certificate_issuings[$i],
            ];
        }



        $result = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([

            'certificate_data' => json_encode($certificate_data),
            // 'edu_degree' => $request->input('edu_degree'),
            // 'edu_clg_name' => $request->input('edu_clg_name'),
            // 'edu_graduation_year' => $request->input('edu_graduation_year'),
            // 'edu_field' => $request->input('edu_field'),
            'edu_data' => json_encode($edu_data),

        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  4,
        ]);

        Session::put('step', 5);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Skills Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_preferences_info($request){

        $validator = Validator::make($request->all(), [
            // 'pref_title' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            // 'pref_emp_type' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            // 'pref_industry' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            // 'pref_location' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            // 'pref_salary' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            'pref_title' => ['required', 'min:1', 'max:50'],
            'pref_emp_type' => ['required', 'min:1', 'max:50'],
            'pref_industry.*' => 'required',
            'pref_location' => ['required', 'min:1', 'max:50'],
            'pref_salary' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:100'],
            'current_salary' => ['nullable', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:100'],
            'notice_period_duration' => 'required',
            'reference_name' => [
                'required',
                function ($attribute, $value, $fail) {
                    foreach ($value as $name) {
                        // Allow numbers and the plus sign (+)
                        if (!preg_match('/^[A-Za-z+\s]+$/', $name)) {
                            $fail("The Reference Name are Rquired and must contain only Alphabetical values only.");
                        }
                    }
                }
            ],
            'reference_phone' => [
                'required',
                function ($attribute, $value, $fail) {
                    foreach ($value as $phone) {
                        // Allow numbers, plus sign (+), and spaces
                        if (!preg_match('/^[0-9+\s]+$/', $phone)) {
                            $fail("The Reference Phone are Rquired must contain only numeric values, spaces, and the plus sign (+).");
                        }

                        $digitCount = preg_match_all('/\d/', $phone);
                        if ($digitCount < 5) {
                            $fail("The Reference Phone are Rquired.");
                        }

                    }
                }
            ],
            'work_authorization_status' => 'required',
            'availability' => 'required',
            // 'notice_period' => 'required',
            'pref_salary_currency' => 'required',
            'current_salary_currency' => 'required',
        ], [
            'pref_title.required' => 'The Preferred Title is required.',
            'pref_title.min' => 'The Preferred Title must be at least 1 character.',
            'pref_title.max' => 'The Preferred Title may not be greater than 50 characters.',
        
            'pref_emp_type.required' => 'The Preferred Employment Type is required.',
            'pref_emp_type.min' => 'The Preferred Employment Type must be at least 1 character.',
            'pref_emp_type.max' => 'The Preferred Employment Type may not be greater than 50 characters.',

            'notice_period_duration.required' => 'The Notice Period Duration is required.',
        
            'pref_industry.*.required' => 'The Preferred Industry field is required.',
        
            'pref_location.required' => 'The Preferred Location is required.',
            'pref_location.min' => 'The Preferred Location must be at least 1 character.',
            'pref_location.max' => 'The Preferred Location may not be greater than 50 characters.',
        
            'current_salary.min' => 'The Current Salary must be at least 1 character.',
            'current_salary.max' => 'The Current Salary may not be greater than 100 characters.',
            'current_salary.regex' => 'The Current Salary format is invalid.',

            'pref_salary.required' => 'The Preferred Salary is required.',
            'pref_salary.min' => 'The Preferred Salary must be at least 1 character.',
            'pref_salary.max' => 'The Preferred Salary may not be greater than 100 characters.',
            'pref_salary.regex' => 'The Preferred Salary format is invalid.',
        
            'reference_name.required' => 'The Reference Name is required.',
        
            'reference_phone.required' => 'The Reference Phone Number is required.',
            'reference_phone.numeric' => 'The Reference Phone Number must contain only numeric values.',
        
            'work_authorization_status.required' => 'The Work Authorization Status is required.',
            
            'availability.required' => 'The Availability field is required.',
        
            // 'notice_period.required' => 'The Notice Period is required.',

            'current_salary_currency.required' => 'The Currency is required.',
            'pref_salary_currency.required' => 'The Currency is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        // Combine the form data into an array
        $references_data = [];
        $reference_name = $request->input('reference_name');
        $reference_phone = $request->input('reference_phone');

        for ($i = 0; $i < count($reference_name); $i++) {
            $references_data[] = [
                'reference_name' => $reference_name[$i],
                'reference_phone' => $reference_phone[$i],
            ];
        }

        $pref_industry = $request->input('pref_industry');

        $pref_industry_elements = explode(',', $pref_industry[0]);

        // Trim spaces from each element
        $pref_industry_elements = array_map('trim', $pref_industry_elements);



        $result =  DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'pref_title' => $request->input('pref_title'),
            'pref_emp_type' => $request->input('pref_emp_type'),
            'pref_industry' => json_encode($pref_industry_elements),
            'pref_location' => $request->input('pref_location'),
            'current_salary' => $request->input('current_salary'),
            'pref_salary' => $request->input('pref_salary'),
            'current_salary_currency' => $request->input('current_salary_currency'),
            'pref_salary_currency' => $request->input('pref_salary_currency'),
            'references' => json_encode($references_data),

            'work_authorization_status' => $request->input('work_authorization_status'),
            'availability' => $request->input('availability'),
            // 'notice_period' => $request->input('notice_period'),
            'notice_period_duration' => $request->input('notice_period_duration'),
        ]);


        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  5,
        ]);

        Session::put('step', 6);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Preferences Detail Added successfully. Please Proceed";


        return $rsp_msg;

    }



    public function create_social_media_info($request){

        $validator = Validator::make($request->all(), [
            // 'linkdin' => 'required',
            // 'twitter' => 'required',
            // 'instagram' => 'required',
            // 'facebook' => 'required',
            // 'other' => 'required',
            'linkdin' => ['nullable', 'regex:/^https?:\/\/(www\.)?linkedin\.com\/.*$/i'],
            'twitter' => ['nullable', 'regex:/^https?:\/\/(www\.)?(x|twitter)\.com\/.*$/i'],
            'instagram' => ['nullable', 'regex:/^https?:\/\/(www\.)?instagram\.com\/.*$/i'],
            'facebook' => ['nullable', 'regex:/^https?:\/\/(www\.)?facebook\.com\/.*$/i'],
            'other' => 'nullable|url',
        ], [
            'linkdin.regex' => 'The LinkedIn URL must be a valid LinkedIn profile link. Use URL this format https://www.linkedin.com/',
            'twitter.regex' => 'The Twitter URL must be a valid X profile link. Use URL this format https://x.com/',
            'instagram.regex' => 'The Instagram URL must be a valid Instagram profile link. Use URL this format https://www.instagram.com/',
            'facebook.regex' => 'The Facebook URL must be a valid Facebook profile link. Use URL this format https://www.facebook.com/',
            'other.url' => 'The Other URL must be a valid URL. Use URL this format https://www.com/',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'linkdin' => $request->input('linkdin'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'other' => $request->input('other'),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  6,
        ]);

        Session::put('step', 7);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Social Media Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_proceeding_info($request){

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'completed_status' => 1,
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  7,
        ]);

        Session::put('step', 8);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "Your Application is Now Under Review. Please wait";

        return $rsp_msg;

    }




}