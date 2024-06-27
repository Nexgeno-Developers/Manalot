<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Common\AadharController;

use App\Http\Controllers\Common\EsignAadharController;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use Auth;

class AccountController extends Controller
{
    public function registration_page(){
        return view('frontend.pages.registration.index');
    }

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

        $user = DB::table('users')->where('email', $request->input('email'))->get()->first();

        if($user){

            if ($user->completed_status == '0'){

                Session::put('temp_user_id', $user->id);
                Session::put('step', $user->step + 1);

                $rsp_msg['response'] = 'error';
                $rsp_msg['status'] = 'incomplete';
                $rsp_msg['message']  = 'Please Fill ALL Forms';
    
                return response()->json(array('response_message' => $rsp_msg));
            }

            if ($user->approval != 1 && $user->status != 1){

                $rsp_msg['response'] = 'error';
                $rsp_msg['status'] = 'completed';
                $rsp_msg['message']  = 'Application Status Under Review';
    
                return response()->json(array('response_message' => $rsp_msg));
            }

            if ($user->status != 1){

                $rsp_msg['response'] = 'error';
                $rsp_msg['message']  = 'Your ID is Not Active!';
    
                return response()->json(array('response_message' => $rsp_msg));
            }

            if ($user->approval != 1){

                $rsp_msg['response'] = 'error';
                $rsp_msg['message']  = 'ID is Not Approve!';
    
                return response()->json(array('response_message' => $rsp_msg));
            }

        } else {

            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = 'User Not Exiest!, Please Register';

            return response()->json(array('response_message' => $rsp_msg));
        }



        $authenticated = Auth::guard('web')->attempt($request->only(['email', 'password']));
        if($authenticated)
        {

            Session()->flush();

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

    public function create_account($param, Request $request){

        if($param == "user-info"){

            $rsp_msg = $this->create_user_detail($request);

        }elseif($param == "email-verify"){

            $rsp_msg = $this->email_verification($request);

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

    public function create_user_detail($request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:50'],
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            //'experience_Status' => 'required',
            'phone_number' => 'required|regex:/^[\d\s\-\+]+$/|min:10',
            'resume_cv' => 'required|mimes:pdf|max:5120',
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
            $path = $request->file('resume_cv')->store('user_data/resume_cv', 'public');
        } else {
            $path = null;
        }




        if($users_email_temp){

            // DB::table('users')->where('id',$users_email_temp->id)->update([
            //     'username' => $request->input('name'),
            //     'email' => strtolower($request->input('email')),
            //     'password' => bcrypt($request->input('password')),
            //     'approval' => '0',
            //     'status' => '0',
            //     'completed_status' => '0',
            //     'step' => 1,
            //     'role_id'  => '2',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            $resume_path = DB::table('userdetails')->where('user_id', $users_email_temp->id)->value('resume_cv');

            if ($resume_path) {
                if (Storage::disk('public')->exists($resume_path)) {
                    Storage::disk('public')->delete($resume_path);
                }
            } 

            // DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
            //     'phone_number' => $request->input('phone_number'),
            //     //'experience_Status' => $request->input('experience_Status'),
            //     'resume_cv' => $path,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // Session::put('temp_user_id', $users_email_temp->id);

        } else {

            // $userId = DB::table('users')->insertGetId([
            //     'username' => $request->input('name'),
            //     'email' => strtolower($request->input('email')),
            //     'password' => bcrypt($request->input('password')),
            //     'approval' => '0',
            //     'role_id'  => '2',
            //     'completed_status' => '0',
            //     'status' => '0',
            //     'step' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // DB::table('userdetails')->insert([
            //     'user_id' => $userId,
            //     'phone_number' => $request->input('phone_number'),
            //     //'experience_Status' => $request->input('experience_Status'),
            //     'skill' => '[]',
            //     'references' => '[]',
            //     'resume_cv' => $path,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // Session::put('temp_user_id', $userId);
        }

        // Session::put('password', $request->input('password'));


        // Session::put('step', 2);


        $user_info = [
            'username' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'resume_cv' => $path,
        ];


        $otp = mt_rand(100000, 999999);
        $timestamp = Carbon::now();
        Session::put('otp', $otp);
        Session::put('otp_timestamp', $timestamp);

        $to = $user_info['email'];
        $subject = "Email Verification for Manalot Application";
        $body = "Your OTP code to verify your Email ID for the Manalot application is '.$otp.'.This OTP is valid for only 2 minutes.";

        sendEmail($to, $subject, $body);

        Session::put('user_info', $user_info);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Detail Added successfully. Please verify Your Email ID";

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
    
                DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
                    'phone_number' => $user_info['phone_number'],
                    'resume_cv' => $user_info['resume_cv'],
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
    
                DB::table('userdetails')->insert([
                    'user_id' => $userId,
                    'phone_number' => $user_info['phone_number'],
                    'skill' => '[]',
                    'references' => '[]',
                    'resume_cv' => $user_info['resume_cv'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                Session::put('temp_user_id', $userId);
            }

            Session::put('step', 2);

            session()->forget('user_info');

            $rsp_msg['response'] = 'success';
            $rsp_msg['message']  = "Email ID has been Verified";

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = "Invalid OTP";
        }
        

        return $rsp_msg;
    }


    public function create_personal_info($request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'gender' => 'required',
            'dob' => 'required',
            //'email' => 'required|email',
            //'phone_number' => 'required|regex:/^[\d\s-]+$/|min:10',
            'address' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&-]+$/i', 'min:3', 'max:250'],
            // 'address' => ['required','min:1', 'max:250'],
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
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

    //=============== not working code =====================
    // public function create_login_info($request){

    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'confirm_password' => 'required|same:password',
    //     ]);

    //     if ($validator->fails()) {
    //         $rsp_msg['response'] = 'error';
    //         $rsp_msg['message']  = $validator->errors()->all();

    //         return $rsp_msg;
    //     }

    //     DB::table('users')->where('id', Session::get('temp_user_id'))->update([
    //         'email' => strtolower($request->input('email')),
    //         'password' => bcrypt($request->input('password')),
    //         'step' =>  3,
    //     ]);


    //     Session::put('step', 4);

    //     $rsp_msg['response'] = 'success';
    //     $rsp_msg['message']  = "User Login Detail Added successfully. Please Proceed";

    //     return $rsp_msg;

    // }
    //=============== not working code =====================

    public function creaste_personal_work_info($request){

        $validator = Validator::make($request->all(), [
            'wrk_exp_company_name' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'wrk_exp__title' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:100'],
            // 'wrk_exp__title' => ['required', 'min:1', 'max:100'],
            'industry' => 'required',
            // 'job_title' => 'required',
            'wrk_exp_years' => 'required',
            'wrk_exp_responsibilities' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&\-\(\)\[\]]+$/i', 'min:3'],
            // 'resume_cv' => 'nullable|mimes:pdf|max:5120',
            'skill' => 'required',
            'employed' => 'nullable|string', // Assuming 'Employed' is nullable string
            'experience_letter' => 'nullable|file|mimes:pdf,doc,docx,application/msword,image/webp|max:2048', // adjust max file size as needed
        ], [
            'wrk_exp_company_name.required' => 'The Company Name is required.',
            'wrk_exp_company_name.regex' => 'The Company Name format is invalid.',
            'wrk_exp_company_name.min' => 'The Company Name must be at least 3 characters.',
            
            'wrk_exp__title.required' => 'The Professional Title is required.',
            'wrk_exp__title.min' => 'The Professional Title must be at least 1 character.',
            'wrk_exp__title.max' => 'The Professional Title may not be greater than 100 characters.',
            
            'industry.required' => 'The Industry field is required.',
            
            'wrk_exp_years.required' => 'The Years of Experience field is required.',
            
            'wrk_exp_responsibilities.required' => 'The Responsibilities field is required.',
            'wrk_exp_responsibilities.string' => 'The Responsibilities must be a string.',
            'wrk_exp_responsibilities.regex' => 'The Responsibilities format is invalid.',
            'wrk_exp_responsibilities.min' => 'The Responsibilities must be at least 3 characters.',
            
            'skill.required' => 'The Skill field is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        // $resume_cv_path = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->value('resume_cv');

        // if($request->has('resume_cv')){
        //     $path = $request->file('resume_cv')->store('user_data/resume_cv', 'public');

        //     if ($resume_cv_path) {
        //         if (Storage::disk('public')->exists($resume_cv_path)) {
        //             Storage::disk('public')->delete($resume_cv_path);
        //         }
        //     }

        // } else {
        //     $path = $resume_cv_path;
        // }


    // Validate and store the uploaded file
    // if ($request->hasFile('experience_letter') && $request->file('experience_letter')->isValid()) {
    //     $path = $request->file('experience_letter')->store('user_data/experience_letters', 'public');
    // } 
    // else {
    //     $path = null;
    // }
        // Retrieve user details from database
        $userDetail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->first();

        // Handle file upload for experience letter
        if ($request->hasFile('experience_letter') && $request->file('experience_letter')->isValid()) {
            $path = $request->file('experience_letter')->store('user_data/experience_letters', 'public');
        } else {
            // Check if existing path should be retained or set to null
            $path = $userDetail ? $userDetail->experience_letter : null;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
            'wrk_exp_years' => $request->input('wrk_exp_years'),
            // 'job_title' => $request->input('job_title'),
            'industry' => $request->input('industry'),
            'wrk_exp__title' => $request->input('wrk_exp__title'),
            // 'resume_cv' => $path,
            'skill' => json_encode($request->input('skill')),
            'wrk_exp_responsibilities' => $request->input('wrk_exp_responsibilities'),
            
            'employed' => $request->has('Employed') ? 'yes' : 'no',
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


    // =================== Not working code ====================

    // public function create_education_info($request){

    //     $validator = Validator::make($request->all(), [
    //         'edu_degree' => 'required',
    //         'edu_clg_name' => 'required',
    //         'edu_graduation_year' => 'required',
    //         'edu_field' => 'required',
    //         'edu_cgpa' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         $rsp_msg['response'] = 'error';
    //         $rsp_msg['message']  = $validator->errors()->all();

    //         return $rsp_msg;
    //     }

    //     DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
    //         'edu_degree' => $request->input('edu_degree'),
    //         'edu_clg_name' => $request->input('edu_clg_name'),
    //         'edu_graduation_year' => $request->input('edu_graduation_year'),
    //         'edu_field' => $request->input('edu_field'),
    //         'edu_cgpa' => $request->input('edu_cgpa'),
    //         'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
    //     ]);

    //     DB::table('users')->where('id', Session::get('temp_user_id'))->update([
    //         'step' =>  5,
    //     ]);

    //     Session::put('step', 6);

    //     $rsp_msg['response'] = 'success';
    //     $rsp_msg['message']  = "User Education Detail Added successfully. Please Proceed";

    //     return $rsp_msg;

    // }

    // public function create_skills_info($request){

    //     $validator = Validator::make($request->all(), [
    //         'skill' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         $rsp_msg['response'] = 'error';
    //         $rsp_msg['message']  = $validator->errors()->all();

    //         return $rsp_msg;
    //     }

    //     DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
    //         'skill' => json_encode($request->input('skill')),
    //     ]);

    //     DB::table('users')->where('id', Session::get('temp_user_id'))->update([
    //         'step' =>  6,
    //     ]);

    //     Session::put('step', 7);

    //     $rsp_msg['response'] = 'success';
    //     $rsp_msg['message']  = "User Skills Detail Added successfully. Please Proceed";

    //     return $rsp_msg;

    // }

    // =================== Not working code ====================

    public function create_certifications_info($request){

        $validator = Validator::make($request->all(), [
            // 'certificate_name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_name' => ['required', 'min:1', 'max:100'],
            // 'certificate_issuing' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_issuing' => ['required', 'min:1', 'max:50'],
            'certificate_obtn_date' => 'required',

            'edu_degree' => 'required',
            'edu_clg_name' => 'required',
            'edu_graduation_year' => 'required',
            'edu_field' => 'required',
            //'edu_cgpa' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

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
            // 'certificate_name' => $request->input('certificate_name'),
            // 'certificate_issuing' => $request->input('certificate_issuing'),
            // 'certificate_obtn_date' => $request->input('certificate_obtn_date'),
            
            'certificate_data' => json_encode($certificate_data),
            'edu_degree' => $request->input('edu_degree'),
            'edu_clg_name' => $request->input('edu_clg_name'),
            'edu_graduation_year' => $request->input('edu_graduation_year'),
            'edu_field' => $request->input('edu_field'),
            // 'edu_cgpa' => $request->input('edu_cgpa'),
            // 'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
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
            'pref_industry' => ['required', 'min:1', 'max:50'],
            'pref_location' => ['required', 'min:1', 'max:50'],
            'pref_salary' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:100'],
            'reference_name' => 'required',
            'reference_phone' => 'required',

            'work_authorization_status' => 'required',
            'availability' => 'required',
            'notice_period' => 'required',
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



        $result =  DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'pref_title' => $request->input('pref_title'),
            'pref_emp_type' => $request->input('pref_emp_type'),
            'pref_industry' => $request->input('pref_industry'),
            'pref_location' => $request->input('pref_location'),
            'pref_salary' => $request->input('pref_salary'),
            'references' => json_encode($references_data),

            'work_authorization_status' => $request->input('work_authorization_status'),
            'availability' => $request->input('availability'),
            'notice_period' => $request->input('notice_period'),
        ]);


        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  5,
        ]);

        Session::put('step', 6);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Preferences Detail Added successfully. Please Proceed";


        return $rsp_msg;

    }

    // =================== Not working code ====================
    public function create_work_authorization_info($request){

        $validator = Validator::make($request->all(), [
            'work_authorization_status' => 'required',
            'availability' => 'required',
            'notice_period' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'work_authorization_status' => $request->input('work_authorization_status'),
            'availability' => $request->input('availability'),
            'notice_period' => $request->input('notice_period'),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  9,
        ]);

        Session::put('step', 10);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Work Authorization Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }
    // =================== Not working code ====================

    public function create_social_media_info($request){

        $validator = Validator::make($request->all(), [
            // 'linkdin' => 'required',
            // 'twitter' => 'required',
            // 'instagram' => 'required',
            // 'facebook' => 'required',
            // 'other' => 'required',
            'linkdin' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'other' => 'nullable',
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

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "Your Application is Now Under Review. Please wait";

        return $rsp_msg;

    }




}