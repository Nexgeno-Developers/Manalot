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
                Session::put('step', $user->step);

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
            'name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'email' => 'required|email',
            'password' => 'required',
            'experience_Status' => 'required',
            'phone_number' => 'required|regex:/^[\d\s-]+$/|min:10',
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

        $users_username = DB::table('users')->where('username', $request->input('name'))->where('status', 1)->get();

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

            DB::table('users')->where('id',$users_email_temp->id)->update([
                'username' => $request->input('name'),
                'email' => strtolower($request->input('email')),
                'password' => bcrypt($request->input('password')),
                'approval' => '0',
                'status' => '0',
                'completed_status' => '0',
                'role_id'  => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $resume_path = DB::table('userdetails')->where('user_id', $users_email_temp->id)->value('resume_cv');

            if ($resume_path) {
                if (Storage::disk('public')->exists($resume_path)) {
                    Storage::disk('public')->delete($resume_path);
                }
            } 

            DB::table('userdetails')->where('user_id',$users_email_temp->id)->update([
                'phone_number' => $request->input('phone_number'),
                'experience_Status' => $request->input('experience_Status'),
                'resume_cv' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::put('temp_user_id', $users_email_temp->id);

        } else {

            $userId = DB::table('users')->insertGetId([
                'username' => $request->input('name'),
                'email' => strtolower($request->input('email')),
                'password' => bcrypt($request->input('password')),
                'approval' => '0',
                'role_id'  => '2',
                'step' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('userdetails')->insert([
                'user_id' => $userId,
                'phone_number' => $request->input('phone_number'),
                'experience_Status' => $request->input('experience_Status'),
                'resume_cv' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::put('temp_user_id', $userId);
        }

        Session::put('password', $request->input('password'));
        Session::put('step', 2);


        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }



    public function create_personal_info($request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'last_name' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:2',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^[\d\s-]+$/|min:10',
            'address' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:250'],
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
            'email' => strtolower($request->input('email')),
            'step' => 2,
        ]);

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'phone_number' => $request->input('phone_number'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
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


    public function create_login_info($request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'step' =>  3,
        ]);


        Session::put('step', 4);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Login Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function creaste_personal_work_info($request){

        $validator = Validator::make($request->all(), [
            'wrk_exp_company_name' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'wrk_exp__title' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:100'],
            'industry' => 'required',
            'job_title' => 'required',
            'wrk_exp_years' => 'required',
            'wrk_exp_responsibilities' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:250'],
            'resume_cv' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        $resume_cv_path = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->value('resume_cv');

        if($request->has('resume_cv')){
            $path = $request->file('resume_cv')->store('user_data/resume_cv', 'public');

            if ($resume_cv_path) {
                if (Storage::disk('public')->exists($resume_cv_path)) {
                    Storage::disk('public')->delete($resume_cv_path);
                }
            }

        } else {
            $path = $resume_cv_path;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'wrk_exp_years' => $request->input('wrk_exp_years'),
            'job_title' => $request->input('job_title'),
            'industry' => $request->input('industry'),
            'wrk_exp__title' => $request->input('wrk_exp__title'),
            'resume_cv' => $path,
            'wrk_exp_responsibilities' => $request->input('wrk_exp_responsibilities'),
            'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  4,
        ]);

        Session::put('step', 5);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Personal and Work Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_education_info($request){

        $validator = Validator::make($request->all(), [
            'edu_degree' => 'required',
            'edu_clg_name' => 'required',
            'edu_graduation_year' => 'required',
            'edu_field' => 'required',
            'edu_cgpa' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'edu_degree' => $request->input('edu_degree'),
            'edu_clg_name' => $request->input('edu_clg_name'),
            'edu_graduation_year' => $request->input('edu_graduation_year'),
            'edu_field' => $request->input('edu_field'),
            'edu_cgpa' => $request->input('edu_cgpa'),
            'wrk_exp_company_name' => $request->input('wrk_exp_company_name'),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  5,
        ]);

        Session::put('step', 6);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Education Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_skills_info($request){

        $validator = Validator::make($request->all(), [
            'skill' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'skill' => json_encode($request->input('skill')),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  6,
        ]);

        Session::put('step', 7);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Skills Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_certifications_info($request){

        $validator = Validator::make($request->all(), [
            'certificate_name' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_issuing' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'certificate_obtn_date' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        $result = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'certificate_name' => $request->input('certificate_name'),
            'certificate_issuing' => $request->input('certificate_issuing'),
            'certificate_obtn_date' => $request->input('certificate_obtn_date'),
        ]);

        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  7,
        ]);

        Session::put('step', 8);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Skills Detail Added successfully. Please Proceed";

        return $rsp_msg;

    }

    public function create_preferences_info($request){

        $validator = Validator::make($request->all(), [
            'pref_title' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'pref_emp_type' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'pref_industry' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'pref_location' => ['required', 'string', 'regex:/^[A-Za-z\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'pref_salary' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:3', 'max:50'],
            'references' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        $result =  DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->update([
            'pref_title' => $request->input('pref_title'),
            'pref_emp_type' => $request->input('pref_emp_type'),
            'pref_industry' => $request->input('pref_industry'),
            'pref_location' => $request->input('pref_location'),
            'pref_salary' => $request->input('pref_salary'),
            'references' => json_encode($request->input('references')),
        ]);


        DB::table('users')->where('id', Session::get('temp_user_id'))->update([
            'step' =>  8,
        ]);

        Session::put('step', 9);

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Preferences Detail Added successfully. Please Proceed";


        return $rsp_msg;

    }


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

    public function create_social_media_info($request){

        $validator = Validator::make($request->all(), [
            'linkdin' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'other' => 'required',
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
            'step' =>  10,
        ]);

        Session::put('step', 11);

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