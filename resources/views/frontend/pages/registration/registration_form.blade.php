<!--------------------------------------------- user info --------------------------------->

@php
// session()->forget('step');

    if(!Session::has('step')){
        Session()->put('step', 1);
    }

    $user_detail = DB::table('userdetails')
    ->where('user_id', Session::get('temp_user_id'))
    ->get()->first();

    $user = DB::table('users')
        ->where('id', Session::get('temp_user_id'))
        ->get(['email'])
        ->first();
        
    $experience_status = DB::table('experience_status')->where('status', 1)->get();

    $employ_types = DB::table('employ_types')->where('status', 1)->get();

    $notice_period_list = DB::table('notice_period')->where('status', 1)->get();

    $years_of_exp = DB::table('years_of_exp')->where('status', '1')->get();
    // $job_title = DB::table('job_title')->where('status', '1')->get();
    $industry = DB::table('industry')->where('status', '1')->get();
    $skills = DB::table('skills')->where('status', '1')->get();

    $currencies = DB::table('currencies')->get(['id','symbol','code']);

    $references_from = DB::table('references_from')->where('status', '1')->get();

    $fullname = isset($user_detail->fullname) ? $user_detail->fullname : null;
    $gender = isset($user_detail->gender) ? $user_detail->gender : null;
    $profile_photo = isset($user_detail->profile_photo) ? $user_detail->profile_photo : null;
    $dob = isset($user_detail->dob) ? $user_detail->dob : null;
    $pincode = isset($user_detail->pincode) ? $user_detail->pincode : null;
    $city = isset($user_detail->city) ? $user_detail->city : null;
    $country = isset($user_detail->country) ? $user_detail->country : null;
    $state = isset($user_detail->state) ? $user_detail->state : null;
    $address = isset($user_detail->address) ? $user_detail->address : null;

    $wrk_exp__title = isset($user_detail->wrk_exp__title) ? $user_detail->wrk_exp__title : null;
    $wrk_exp_company_name = isset($user_detail->wrk_exp_company_name) ? $user_detail->wrk_exp_company_name : null;
    $wrk_exp_years = isset($user_detail->wrk_exp_years) ? $user_detail->wrk_exp_years : null;
    $industry_check = isset($user_detail->industry) ? $user_detail->industry : '[]';
    $experience_letter = isset($user_detail->experience_letter) ? $user_detail->experience_letter : null;
    $employed = isset($user_detail->employed) ? $user_detail->employed : null;
    $skill_check = isset($user_detail->skill) ? $user_detail->skill : '[]';
    $wrk_exp_responsibilities = isset($user_detail->wrk_exp_responsibilities) ? $user_detail->wrk_exp_responsibilities : null;
    $address = isset($user_detail->address) ? $user_detail->address : null;

    $edu_clg_name = isset($user_detail->edu_clg_name) ? $user_detail->edu_clg_name : null;
    $edu_degree = isset($user_detail->edu_degree) ? $user_detail->edu_degree : null;
    $edu_graduation_year = isset($user_detail->edu_graduation_year) ? $user_detail->edu_graduation_year : null;
    $edu_field = isset($user_detail->edu_field) ? $user_detail->edu_field : null;

    $edu_data = isset($user_detail->edu_data) ? $user_detail->edu_data : '[]';
    $edu_data = json_decode($edu_data, true);

    $certificate_data = isset($user_detail->certificate_data) ? $user_detail->certificate_data : '[]';
    $certificate_data = json_decode($certificate_data, true);

    $pref_title = isset($user_detail->pref_title) ? $user_detail->pref_title : null;
    $pref_emp_type = isset($user_detail->pref_emp_type) ? $user_detail->pref_emp_type : null;
    $pref_industry_check = isset($user_detail->pref_industry) ? $user_detail->pref_industry : '[]';
    $pref_location = isset($user_detail->pref_location) ? $user_detail->pref_location : null;

    $current_salary_currency  = isset($user_detail->current_salary_currency) ? $user_detail->current_salary_currency : null;
    $pref_salary_currency  = isset($user_detail->pref_salary_currency) ? $user_detail->pref_salary_currency : null;

    $current_salary = isset($user_detail->current_salary) ? $user_detail->current_salary : null;
    $notice_period_check = isset($user_detail->notice_period_duration) ? $user_detail->notice_period_duration : null;
    $pref_salary = isset($user_detail->pref_salary) ? $user_detail->pref_salary : null;
    $work_authorization_status = isset($user_detail->work_authorization_status) ? $user_detail->work_authorization_status : null;
    $notice_period = isset($user_detail->notice_period) ? $user_detail->notice_period : null;
    $availability = isset($user_detail->availability) ? $user_detail->availability : null;

    $references_data = isset($user_detail->references) ? $user_detail->references : '[]';
    $references_data = json_decode($references_data, true);

    $linkdin = isset($user_detail->linkdin) ? $user_detail->linkdin : null;
    $twitter = isset($user_detail->twitter) ? $user_detail->twitter : null;
    $instagram = isset($user_detail->instagram) ? $user_detail->instagram : null;
    $facebook = isset($user_detail->facebook) ? $user_detail->facebook : null;
    $other = isset($user_detail->other) ? $user_detail->other : null;

@endphp


{{-- @if (!Session::has('step') || Session::get('step') == 1) --}}

    <div id="user-add-details" class="register_width d-none">
        <div class="heading mb-4">
            <h2>Register</h2>
        </div>

        <form id="user-info" action="{{ route('account.create', ['param' => 'user-info']) }}" method="post"
            enctype="multipart/form-data" class="d-flex gap-3 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="name" class="form-label">Username *</label>
                        <input type="text" class="form-control is-invalid input_text" id="name" name="name"
                            placeholder="Enter Your Name" pattern="[A-Za-z]+" minlength="1" maxlength="20" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="email" class="form-label">Email *</label>
                        <img src="/assets/images/email.png" alt="" class="input_icon" />
                        <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                            placeholder="Enter Your email" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Phone" class="form-label">Phone*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Mobile"
                            name="phone_number" placeholder="Enter your Phone Number" pattern="[0-9]+" minlength="10"
                            maxlength="16" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="formFile" class="form-label">Upload Resume* <span class="leble_size">(doc, docx, pdf -  up to 5MB)</span></label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="formFile" name="resume_cv"
                            accept=".pdf" required />
                        {{-- <img src="images/file.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Password*</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="password" name="password"
                            placeholder="Enter your Password" minlength="6" maxlength="20" required />
                        {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>



                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Confirm Password*</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="confirm_password"
                            name="confirm_password" placeholder="Enter your Password" minlength="6" maxlength="20"
                            required />
                        {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-check checkbox_error ps-0">
                    <input class="form-check-input custom-checkbox" type="checkbox" value="1" name="term_check"
                        id="flexCheckDefault" required />
                    <label class="form-check-label terms_font " for="flexCheckDefault">
                        I agree to the
                        <a href="#" class="purple"> <b>Terms & Condition</b></a>
                    </label>
                </div>
            </div>
            <div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Register as
                        Jobseeker</button>
                </div>
            </div>
        </form>

        <p class="mt-4">
            Already have an account?
            <a href="{{ url(route('login')) }}" class="text-decoration-none purple">Login</a>
        </p>
    </div>

    {{--- //------------------------------ email verify modal -----------------------// ----}}

    <div class="modal fade" id="email_otp_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-3">
                <div class="modal-header">
                    <div class="heading">
                        <h5 class="modal-title" id="exampleModalLabel">Verify Email</h5>
                    </div>
                    <div class="purple_btn_close">
                        <button type="button" onclick="close_Emai_modal();" class="close p-1 px-3" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 24px;">&times;</span>
                        </button>
                    </div>
                </div>
                <form id="email-verify-otp" action="{{ url(route('account.create', ['param' => 'email-verify'])) }}"
                    method="post">
                    @csrf

                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label form-label">Verification Code:</label>
                                <input type="text" class="form-control" id="recipient-name" name="otp" pattern="[0-9]+" minlength="6"
                                maxlength="6" placeholder="Please Enter Code" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="blue_btn">
                            <button type="button" onclick="close_Emai_modal();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="purple_btn">
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </div>
                        <div class="resend_otp">
                            <a class="ms-4" class="btn btn-primary" id="resendOTPButton" style="display: none; cursor: pointer;">Resend OTP</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--- //------------------------------  email verify modal -----------------------// ----}}

{{-- @endif --}}

<!--------------------------------------------- user info --------------------------------->





<!--------------------------------------------- personal info --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 2) --}}

    @php
        //$state = DB::table('states')->get();
        //$country = DB::table('countries')->get();
    @endphp

    <div id="personal-details" class="register_width d-none">
        <div class="heading mb-4">
            <h2>Personal Information</h2>
        </div>
        <form id="personal-info" action="{{ url(route('account.create', ['param' => 'personal-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="first_name" class="form-label">Full Name*</label>
                        <input type="text" class="form-control is-invalid input_text" name="fullname"
                            id="fullname" placeholder="Enter First Name" pattern="[A-Za-z]+" minlength="1"
                            maxlength="255" value="{{ $fullname }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Gender" class="form-label">Gender*</label>
                        <select class="select2 form-select form-control is-invalid  input_select"
                            aria-label="Default select example" id="Gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="1" @if ($gender == 1) selected @endif>Male</option>
                            <option value="2" @if ($gender == 2) selected @endif>Female</option>
                            <option value="3" @if ($gender == 3) selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="formFile" class="form-label">Profile Photo <span class="leble_size">(png, jpg)</span></label>
                        @if (!empty($profile_photo) && $profile_photo != null)
                            <!-- {{--<a class="pdf_view" target="_blank"
                                href="{{ asset('storage/' . $profile_photo) }}">
                                View
                            </a> --}} -->
                        @endif
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="formFile" name="profile_photo"
                            accept=".jpg,.jpeg,.png,.webp" {{-- @if (empty($profile_photo) || $profile_photo == null) @endif --}} />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Date" class="form-label">Date of Birth*</label>
                        <!-- <img src="/assets/images/calender_icon.png" alt="" class="input_icon"> -->
                        <input type="date" class="form-control is-invalid input_text register_date_field" id="Date"
                            name="dob" placeholder="Date" value="{{ $dob }}"
                            required />
                    </div>
                </div>
                {{-- <!-- <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="email" class="form-label">Email Address*</label>
                        <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                            placeholder="Enter Your Email" value="{{ $user->email }}" required />
                    </div>
                </div> -->

                <!-- <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Phone" class="form-label">Phone*</label>
                        <input type="number" class="form-control is-invalid input_text" id="Phone" name="phone_number"
                            placeholder="Enter Your Phone No" pattern="[0-9]+" minlength="10" maxlength="10"
                            value="{{ $user_detail->phone_number }}" required />
                    </div>
                </div> --> --}}
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="zip_code" class="form-label">Zip/Pin Code*</label>
                        <input type="text" class="form-control is-invalid input_text" id="pincode"
                            name="pincode" pattern="[0-9A-Za-z]+" minlength="1" maxlength="10"
                            placeholder="Enter Your zipcode / Pincode" value="{{ $pincode }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="city" class="form-label">City*</label>
                        <input type="text" class="form-control is-invalid input_text" id="city"
                            name="city" pattern="[A-Za-z]+" minlength="3" maxlength="50"
                            placeholder="Enter Your City" value="{{ $city }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="country_name" class="form-label">Country*</label>
                        <input type="text" value="{{ isset($country) ? $country : '' }}"
                            class="form-control is-invalid input_text" id="country_name" name="country"
                            placeholder="Enter Your country" required />
                        {{--
                        <select class="form-select form-control is-invalid  input_select" aria-label="Default select example"
                            id="country_name" name="country">
                            <option value="">Select Country</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->id }}" @if ($country == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}</option>
                            @endforeach
                        </select>
                        --}}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label">State*</label>
                        <input type="text" value="{{ isset($state) ? $state : '' }}"
                            class="form-control is-invalid input_text" id="state" name="state"
                            placeholder="Enter Your State" required />
                        {{--
                        <select class="form-select form-control is-invalid  input_select" aria-label="Default select example" id="State"
                            name="state">
                            <option value="">Select State</option>
                            @foreach ($state as $row)
                                <option value="{{ $row->id }}" @if ($user_detail->state == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                        --}}
                    </div>
                </div>


                <div class="col-md-12 mb-12">
                    <div class="position-relative form-group">
                        <label for="address" class="form-label">Address</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="address" pattern="[0-9A-Za-z]+"
                            minlength="5" maxlength="250" name="address" placeholder="Enter your Address"
                            value="{{ $address }}" required /> --}}

                        <textarea class="form-control is-invalid" rows="3" cols="45" name="address" id="address" pattern="[0-9A-Za-z]+"
                            placeholder="Address">{{ $address }}</textarea>

                    </div>
                </div>


            </div>
            <div>
                <div class="purple_btn text-end">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>

{{-- @endif --}}

<!--------------------------------------------- personal info --------------------------------->




<!--------------------------------------------- personal work info  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 3) --}}

    <div id="work-details-div" class="register_width d-none">
         <div class="heading mt-4 mb-4">
                        <h2>Work Experience</h2>
                    </div>
        <form id="personal-work-info" action="{{ url(route('account.create', ['param' => 'personal-work-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
           

                
 <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="job_title" class="form-label">Professional Title*</label>
                        <input type="text" class="form-control is-invalid input_text" id="job_title"
                            name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+"
                            minlength="2" maxlength="100" value="{{ $wrk_exp__title }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="company" class="form-label">Company Name*</label>
                        <input type="text" class="form-control is-invalid input_text" id="company"
                            name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+"
                            minlength="1" maxlength="100" value="{{ $wrk_exp_company_name }}"
                            required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label">Years of Experience*</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="wrk_exp_years" name="wrk_exp_years" required>
                            <option value="">Select Experience</option>
                            @foreach ($years_of_exp as $row)
                                <option value="{{ $row->id }}" @if ($wrk_exp_years == $row->id) selected @endif>
                                    {{ ucfirst($row->year_range) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="experience_letter" class="form-label">Upload Experience Letter <span class="leble_size">(docx, pdf -  up to 5MB)</span></label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control" type="file" id="formFile" name="experience_letter"
                            accept=".pdf,.doc,.docx,application/msword,image/*,.webp" />
                        {{-- <img src="images/file.png" alt="" class="input_icon" /> --}}
                    </div>
                    @if ($experience_letter)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . $experience_letter) }}" class="btn btn-success add-row" target="_blank">View Experience Letter</a>
                        </div>
                    @endif
                </div>  


                <div class="col-md-7 mb-4">
                    <div class="position-relative form-group">
                        <label for="industry" class="form-label">Industry*</label>
                        <select class="select2 form-select form-control is-invalid input_select" multiple="multiple"
                            aria-label="Default select example" id="industry" name="industry[]" required>
                            <option value="">Select Industry</option>
                            @foreach ($industry as $row)
                                <option value="{{ $row->name }}"
                                    @if (in_array($row->name, json_decode($industry_check, true))) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>




               

                <div class="col-md-5 mb-4 text-end">
                    <div class="option currently_work d-flex gap-3" style="float: right;">

                    
                        <div>
                        <input class="custom-radio" type="radio" id="employed" name="Employed" value="yes"
                            @if ($employed == 'yes') checked @endif>
                        <label for="employed" class="form-label">Employed </label>
                        </div>

                        <div>
                        <input class="custom-radio" type="radio" id="unemployed" name="Employed" value="no"
                            @if ($employed == 'no') checked @endif>
                        <label for="unemployed" class="form-label">Unemployed </label>
                        </div>
                    </div>
                </div> 

                <div class="col-md-12 mb-4">
                    <div class="position-relative form-group">
                        <label for="skills" class="form-label">Skills*</label>
                        <select name="skill[]" multiple="multiple"
                            class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="skills" required>
                            <option value="">select skills</option>
                            @foreach ($skills as $row)
                                <option value="{{ $row->name }}"
                                    @if (in_array($row->name, json_decode($skill_check, true))) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Responsibilities" class="form-label">Responsibilities/Achievements*</label>
                        <textarea class="form-control is-invalid" rows="4" cols="45" name="wrk_exp_responsibilities"
                            placeholder="Message" required>{{ $wrk_exp_responsibilities }}</textarea>
                    </div>
                </div>

                 <div class="col-md-12">
                   
                 <div class="writewithai">
                    <a href="https://chatgpt.com/" target="_blank" title="ChatGPT" ><img src="https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg"> <span>Write With ChatGPT!</span></a>
                 </div>

                </div>

            </div>
            <div class="d-flex justify-content-end align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
{{-- @endif --}}

<!--------------------------------------------- personal work info --------------------------------->

<!--------------------------------------------- certifications-info  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 4) --}}

    <div id="cirtificate_one" class="register_width d-none">
        {{-- <div class="heading mb-4">
            <h2>Certifications</h2>
        </div> --}}
        <div class="heading mb-4">
            <h2>Education</h2>
        </div>
        <form id="skills-info" action="{{ url(route('account.create', ['param' => 'certifications-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            {{-- <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="School" class="form-label">School/University Name*</label>
                        <input type="text" class="form-control is-invalid input_text" id="School"
                            name="edu_clg_name" placeholder="Enter your School / College Nmae" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $edu_clg_name }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="degree" class="form-label">Degree*</label>
                        <input type="text" class="form-control is-invalid input_text" id="degree"
                            name="edu_degree" placeholder="Enter your Degree" pattern="[A-Za-z]+" minlength="1"
                            maxlength="50" value="{{ $edu_degree }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Graduation" class="form-label">Graduation Year*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Graduation"
                            name="edu_graduation_year" placeholder="Enter Your Graduation Year"
                            pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $edu_graduation_year }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="major" class="form-label">Major/Field of Study*</label>
                        <input type="text" class="form-control is-invalid input_text" id="major"
                            name="edu_field" placeholder="Enter your Major Field of Study" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $edu_field }}" required />
                    </div>
                </div>
            </div> --}}

            @if (!empty($edu_data))
                @foreach ($edu_data as $index => $education)
                        <div class="row education-row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="School" class="form-label">School/University Name*</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_clg_name'] }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Degree" class="form-label">Degree*</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_degree[]" placeholder="Enter your Degree"
                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_degree'] }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Certificate" class="form-label">Graduation Year*</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_graduation_year'] }}" />
                                </div>
                            </div>


                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Certificate" class="form-label">Major/Field of Study*</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_field[]" placeholder="Enter your Major Field of Study"
                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_field'] }}" />
                                </div>
                            </div>

                            @if ($index === 0)
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success add-edu-row">Add More +</button>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger remove-edu-row">Remove -</button>
                                </div>
                            @endif
                        </div>
                @endforeach
            @else
                    <div class="row education-row">
                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="School" class="form-label">School/University Name*</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                    pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Degree" class="form-label">Degree*</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_degree[]" placeholder="Enter your Degree"
                                    pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Graduation Year*</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                />
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Major/Field of Study*</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_field[]" placeholder="Enter your Major Field of Study"
                                    pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="button" class="btn btn-success add-edu-row">Add More +</button>
                        </div>
                    </div>
            @endif



            <div class="heading mt-4">
                <h2>Certifications</h2>
            </div>
            @if (!empty($certificate_data))
                @foreach ($certificate_data as $index => $certificate)
                    <div class="row certificate-row cirtificate_pdd">
                        <div class="col-md-12 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Certificate Name</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                    value="{{ $certificate['certificate_name'] }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Date Obtained*" class="form-label">Date Obtained</label>

                                <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field"
                                    name="certificate_obtn_date[]" placeholder="Date"
                                    value="{{ $certificate['certificate_obtn_date'] }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Issuing Registration*" class="form-label">Registration Number, If Applicable</label>
                                <input type="text" class="form-control is-invalid input_text certificate_issuing"
                                    name="certificate_issuing[]" placeholder="Enter your Issuing Registration"
                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                                    value="{{ $certificate['certificate_issuing'] }}" />
                            </div>
                        </div>

                        @if ($index === 0)
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success add-row">Add More +</button>
                            </div>
                        @else
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger remove-row">Remove -</button>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="row certificate-row cirtificate_pdd">
                    <div class="col-md-12 mb-4">
                        <div class="position-relative form-group">
                            <label for="Certificate" class="form-label">Certificate Name</label>
                            <input type="text" class="form-control is-invalid input_text certificate_name"
                                name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="position-relative form-group">
                            <label for="Date Obtained*" class="form-label">Date Obtained</label>
                            <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field"
                                name="certificate_obtn_date[]" placeholder="Date" />
                        </div>
                    </div> 

                    <div class="col-md-6 mb-4">
                        <div class="position-relative form-group">
                            <label for="Issuing Registration*" class="form-label">Registration Number, If Applicable</label>
                            <input type="text" class="form-control is-invalid input_text certificate_issuing"
                                name="certificate_issuing[]" placeholder="Enter your Issuing Registration"
                                pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-success add-row">Add More +</button>
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-end align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>

{{-- @endif --}}

<!--------------------------------------------- certifications-info --------------------------------->

<!--------------------------------------------- preferences-info  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 5) --}}


    <div id="availibility_one" class="register_width d-none">
        <div class="heading mt-4 mb-4">
            <h2>Availability</h2>
        </div>
        <form id="preferences-info" action="{{ url(route('account.create', ['param' => 'preferences-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Preferred Title/Role*" class="form-label">Preferred Title/Role*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Preferred Title/Role*"
                            name="pref_title" placeholder="Enter Your Preferred Title" pattern="[0-9A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_title }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Employment Type*" class="form-label">Employment Type*</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="Employment Type*"
                            name="pref_emp_type" placeholder="Enter your Employment Type" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_emp_type }}" required /> --}}

                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="pref_emp_type" name="pref_emp_type" required>
                            <option value="">Select Employment Type</option>
                            @foreach ($employ_types as $row)
                                <option value="{{ $row->id }}" @if ($pref_emp_type == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Desired Job Location*" class="form-label">Desired Job Location*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Desired Job Location*"
                            name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $pref_location }}" placeholder="Enter your Desired Job Location"
                            required />
                    </div>
                </div>

                  <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Employment Type*" class="form-label">Notice Period*</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="notice_period_duration" name="notice_period_duration" required>
                            <option value="">Select Notice Period</option>
                            @foreach ($notice_period_list as $row)
                                <option value="{{ $row->id }}" @if ($notice_period_check == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

               

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group sallery_width">
                        <label for="Current Salary*" class="form-label d-block">Current Salary</label>
                        <div class="sallery_width1">
                        
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="current_salary_currency" name="current_salary_currency" required>
                            <option value="">Currency</option>
                            @foreach ($currencies as $row)
                                <option value="{{ $row->id }}" @if ($current_salary_currency == $row->id) selected @endif>
                                    {{ strtoupper($row->code) }} - ({{ $row->symbol }})
                                </option>
                            @endforeach
                        </select>
                        </div>
                         <div class="sallery_width2">
                        <input type="text" class="form-control is-invalid input_text" id="Expected Salary*"
                            name="current_salary" placeholder="Enter Your Current Salary" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $current_salary }}" />
                        </div>
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label d-block">Expected Salary*</label>
<div class="sallery_width1">
                         
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="pref_salary_currency" name="pref_salary_currency" required>
                            <option value="">Currency</option>
                            @foreach ($currencies as $row)
                                <option value="{{ $row->id }}" @if ($pref_salary_currency == $row->id) selected @endif>
                                    {{ strtoupper($row->code) }} - ({{ $row->symbol }})
                                </option>
                            @endforeach
                        </select>
                        </div> 
<div class="sallery_width2">
                        <input type="text" class="form-control is-invalid input_text" id="Expected Salary*"
                            name="pref_salary" placeholder="Enter Your Expected Salary" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_salary }}" required />
                           </div> 
                    </div>
                </div>
              

                <div class="col-md-12 mb-4">
                    <div class="position-relative form-group">
                        <label for="Preferred Industry*" class="form-label">Preferred Industry*</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="Preferred Industry*"
                            name="pref_industry" placeholder="Enter Your Preferred Industry" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_industry }}" required /> --}}
                        
                        <select class="select2 form-select form-control is-invalid input_select" multiple="multiple"
                            aria-label="Default select example" id="pref_industry" name="pref_industry[]" required>
                            <option value="">Select Preferred Industry</option>
                            @foreach ($industry as $row)
                                <option value="{{ $row->name }}"
                                    @if (in_array($row->name, json_decode($pref_industry_check, true))) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>


                <div class="heading mt-4">
                    <h2>Reference</h2>
                </div>
                @if (!empty($references_data))
                    @foreach ($references_data as $index => $reference)
                        <div class="row reference-row mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="position-relative form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control is-invalid input_text reference_name"
                                        name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                        minlength="1" maxlength="20" value="{{ $reference['reference_name'] }}"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="position-relative form-group">
                                    <label for="Phone{{ $index + 1 }}" class="form-label">Phone</label>
                                    <input type="text" class="form-control is-invalid input_text reference_phone"
                                        name="reference_phone[]" id="Phone{{ $index + 1 }}"
                                        placeholder="Enter your Phone Number" pattern="[0-9]+" minlength="10"
                                        maxlength="16" value="{{ $reference['reference_phone'] }}" required />
                                </div>
                            </div>

                            @if ($index === 0)
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success add-reference-row">Add More
                                        +</button>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger remove-reference-row">Remove
                                        -</button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="row reference-row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control is-invalid input_text" id="name"
                                    name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                    minlength="1" maxlength="20" required />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="Phone1" class="form-label">Phone</label>
                                <input type="text" class="form-control is-invalid input_text reference_phone"
                                    id="Phone1" name="reference_phone[]" placeholder="Enter your Phone Number"
                                    pattern="[0-9]+" minlength="10" maxlength="16" required />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="button" class="btn btn-success add-reference-row">Add More +</button>
                        </div>
                    </div>
                @endif

                {{--
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="References*" class="form-label">References*</label>
                        <select class="select2 form-select input_select" aria-label="Default select example" id="References*"
                        name="references[]" multiple required>
                        <option value="">Select References</option>
                        @foreach ($references_from as $row)
                            <option value="{{ $row->id }}"
                            @if (in_array($row->id, json_decode($user_detail->references, true))) selected @endif>
                            {{ ucfirst($row->name) }}
                        </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                --}}

            </div>
            <div class="heading mt-4">
                <h2>Work Authorization</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative form-group mb-md-0 mb-4">
                        <label for="Legal Authorization to work status" class="form-label">Legal
                            Authorization to work status</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Legal Authorization to work status*"
                            name="work_authorization_status" required>
                            <option value="">Select work status</option>
                            <option value="1" @if ($work_authorization_status == 1) selected @endif>Yes</option>
                            <option value="0" @if ($work_authorization_status == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group mb-md-0 mb-4">
                        <label for="Availability" class="form-label">Availability
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="1" @if ($availability == 1) selected @endif>Yes</option>
                            <option value="0" @if ($availability == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="d-flex align-items-center gap-4 text-end justify-content-end">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
{{-- @endif --}}

<!--------------------------------------------- preferences-info --------------------------------->

<!--------------------------------------------- social-media-info  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 6) --}}

    <div id="social_media_div" class="register_width d-none">
        <div class="heading mb-4">
            <h2>Social Media Links</h2>
        </div>
        <form id="social-media-info" action="{{ url(route('account.create', ['param' => 'social-media-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Linkdin" class="form-label">Linkdin</label>
                        <img src="/assets/images/linkedin_icon.svg" alt="" class="input_icon linkedin_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Linkdin"
                            name="linkdin" placeholder="Enter Your Linkdn URL" value="{{ $linkdin }}"
                            name="linkdin" />
                        <!-- {{-- <img src="images/linkedin.png" alt="" class="input_icon" /> --}} -->
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Twitter" class="form-label">X</label>
                        <img src="/assets/images/twitter_icon.svg" alt="" class="input_icon twitter_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Twitter"
                            name="twitter" placeholder="Enter Your Twitter URL" value="{{ $twitter }}"
                            name="twitter" />
                        <!-- {{-- <img src="images/x.png" alt="" class="input_icon" /> --}} -->
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Instagram" class="form-label">Instagram</label>
                        <img src="/assets/images/instagram_icon.svg" alt="" class="input_icon insta_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Instagram"
                            placeholder="Enter Your Instagram URL" value="{{ $instagram }}"
                            name="instagram">
                        {{-- <img src="images/instagram.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Facebook" class="form-label">Facebook</label>
                        <img src="/assets/images/facebook_icon.svg" alt="" class="input_icon facebook_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Facebook"
                            placeholder="Enter Your Facebook URL" value="{{ $facebook }}"
                            name="facebook" />
                        {{-- <img src="images/facebook.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="others" class="form-label">Others</label>
                        <input type="url" class="form-control is-invalid input_text" id="others"
                            placeholder="Enter Your Others URL" value="{{ $other }}"
                            name="other" />
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4 justify-content-end">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
{{-- @endif --}}

<!--------------------------------------------- social-media-info --------------------------------->

<!--------------------------------------------- Proceeding  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 7) --}}
    <div id="doc_verify_div" class="register_width d-none">
        <div class="heading mb-4">
            <h2>Proceeding</h2>
        </div>
        <form id="proceeding-info" action="{{ url(route('account.create', ['param' => 'proceeding-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <img class="prroceed_icons" src="/assets/images/procced_image.png" alt="file check" />
            <p>
                Manalot will validate/ review the documents and <br />
                grant permisssion to proceed through Admin
            </p>
            <div>
                <div class="purple_btn text-start">
                    <button type="submit" class="text-decoration-none text-white">Proceed to Submit </button>
                </div>
            </div>
        </form>
    </div>
{{-- @endif --}}


<!--------------------------------------------- thank you  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 8) --}}
    <div id="thankyou-page" class="register_width d-none">
       
        <img class="prroceed_icons" src="/assets/images/thankyou_icon.svg" alt="file check" />
         <div class="heading mb-2 mt-5">
            <h2 class="fonts36"><b>Thank You</b></h2>
        </div>

        <p>You have successfully registered! We will provide an update within 48 hours.</p>
      

                 <div class="mt-5 d-flex align-items-center gap-3 justify-content-start">
                <div class="blue_btn">
                    <a href="/login" class="text-decoration-none text-white">Continue to Login</a>
                </div>
                <div class="purple_btn">
                    <a target="_blank" href="/sample-profile" class="text-decoration-none text-white">View Sample Profile</button>
                </div>
            </div>



    </div>
{{-- @endif --}}

<!--------------------------------------------- social-media-info --------------------------------->


