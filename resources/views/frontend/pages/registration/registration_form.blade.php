
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
        
    // $experience_status = DB::table('experience_status')->where('status', 1)->get();

    $employ_types = DB::table('employ_types')->where('status', 1)->get();

    $notice_period_list = DB::table('notice_period')->where('status', 1)->get();

    $years_of_exp = DB::table('years_of_exp')->where('status', '1')->get();
    // $job_title = DB::table('job_title')->where('status', '1')->get();
    
    $industry = DB::table('industry')->where('status', '1')->get();
    // $groupedIndustries = $industry->groupBy('parent_id');
    $groupedIndustries = $industry->where('main', 1);

    $skills = DB::table('skills')->where('status', '1')->get();

    $currencies = DB::table('currencies')->get(['id','symbol']);

    // $references_from = DB::table('references_from')->where('status', '1')->get();

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
                        <input type="text" class="form-control is-invalid input_text" id="username" name="name"
                            placeholder="Enter Your Name" pattern="[A-Za-z]+" minlength="1" maxlength="20" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="email" class="form-label">Email *</label>
                        <img src="/assets/images/email.png" alt="" class="input_icon" />
                        <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                            placeholder="Enter Your email" required @if (Session::has('google_email') && Session::get('google_login') == 1) 
                            value="{{ Session::get('google_email') }}" readonly @endif />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Phone" class="form-label">Phone *</label>
                        <input type="text" class="form-control is-invalid input_text" id="Mobile"
                            name="phone_number" placeholder="Enter your Phone Number" title="This Field is required" pattern="[0-9]+" minlength="5"
                            maxlength="16" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="formFile" class="form-label mb-2">Upload Resume * <span class="leble_size">(doc, docx, pdf -  up to 5MB)</span></label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="resume_cv" name="resume_cv"
                            accept=".pdf" required />
                        {{-- <img src="images/file.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Password *</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="password" name="password"
                            placeholder="Enter your Password" minlength="6" maxlength="20" required />
                        {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>



                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Confirm Password *</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="confirm_password"
                            name="confirm_password" placeholder="Enter your Password" minlength="6" maxlength="20"
                            required />
                        {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>

                <div class="col-md-6 mb-md-3 mb-1">
                <div class="form-check checkbox_error ps-0 terms_cdn">
                    <input class="form-check-input custom-checkbox" type="checkbox" value="1" name="term_check"
                        id="flexCheckDefault" required />
                    <label class="form-check-label terms_font " for="flexCheckDefault">
                        I agree to the
                        <a href="#" class="purple"> <b>Terms & Condition</b></a>
                    </label>
                </div>
                <div class="purple_btn mt-4">
                    <button type="submit" class="text-decoration-none text-white">Register as
                        Jobseeker</button>
                        
                </div>
                <p class="mt-4">
            Already have an account?
            <a href="{{ url(route('login')) }}" class="text-decoration-none purple">Login</a>
        </p>
                
            </div>


             <div class="col-md-6 mb-3">
                 <div class="document_required">
                    <p>Documents required: <span class="span_start">*</span></p>
                    <ul>
                        <li>Current Resume</li>
                        <li>Last Experience | Relieving letter</li>
                        <li>Recent Photo</li>
                    </ul>
                 </div>
             </div>
            </div>

            
            <div>
                
            </div>
        </form>

        
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
                        <label for="first_name" class="form-label">Full Name *</label>
                        <input type="text" class="form-control is-invalid input_text" name="fullname"
                            id="fullname" placeholder="Enter First Name" pattern="[A-Za-z]+" minlength="1"
                            maxlength="255" value="{{ isset($fullname) ? $fullname : (Session::has('google_name') ? Session::get('google_name') : '') }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Gender" class="form-label">Gender *</label>
                        <select class="select2 form-select form-control is-invalid  input_select old-select2"
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
                        <label for="formFile" class="form-label mb-2" id="profile_photo">Recent Photo <span class="leble_size">(png, jpg)</span></label>
                        @if (!empty($profile_photo) && $profile_photo != null)
                            <!-- {{--<a class="pdf_view" target="_blank"
                                href="{{ asset('storage/' . $profile_photo) }}">
                                View
                            </a> --}} -->
                        @endif
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="profile_photo" name="profile_photo"
                            accept=".jpg,.jpeg,.png,.webp" {{-- @if (empty($profile_photo) || $profile_photo == null) @endif --}} />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Date" class="form-label">Date of Birth (dd/mm/yyyy) *</label>
                        <!-- <img src="/assets/images/calender_icon.png" alt="" class="input_icon"> -->
                        <input type="date" class="form-control is-invalid input_text register_date_field" id="Date"
                            name="dob" placeholder="Date" value="{{ $dob }}" max="{{ date('Y-m-d') }}"
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
                        <label for="zip_code" class="form-label">Zip/Pin Code *</label>
                        <input type="text" class="form-control is-invalid input_text" id="pincode"
                            name="pincode" pattern="[0-9A-Za-z]+" minlength="1" maxlength="10"
                            placeholder="Enter Your zipcode / Pincode" value="{{ $pincode }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="city" class="form-label">City *</label>
                        <input type="text" class="form-control is-invalid input_text" id="city"
                            name="city" pattern="[A-Za-z]+" minlength="3" maxlength="50"
                            placeholder="Enter Your City" value="{{ $city }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="country_name" class="form-label">Country *</label>
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
                        <label for="State" class="form-label">State *</label>
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

                        <textarea class="form-control is-invalid" rows="3" cols="45" name="address" id="address" pattern="[0-9A-Za-z]+" placeholder="Address">{{ $address }}</textarea>

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
                        <label for="job_title" class="form-label">Current Designation / Title *</label>
                        <input type="text" class="form-control is-invalid input_text" id="job_title"
                            name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+"
                            minlength="2" maxlength="100" value="{{ $wrk_exp__title }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="company" class="form-label">Company Name *</label>
                        <input type="text" class="form-control is-invalid input_text" id="company"
                            name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+"
                            minlength="1" maxlength="100" value="{{ $wrk_exp_company_name }}"
                            required>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label">Total Years of Experience *</label>
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
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
                        <label for="experience_letter" class="form-label">Upload Last Experience | Relieving letter <span class="leble_size">(docx, pdf -  up to 5MB)</span></label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control" type="file" id="formFile" name="experience_letter"
                            accept=".pdf,.doc,.docx,application/msword,image/*,.webp" />
                        {{-- <img src="images/file.png" alt="" class="input_icon" /> --}}
                    </div>
                    {{--
                        @if ($experience_letter)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . $experience_letter) }}" class="btn btn-success add-row" target="_blank">View Last Experience | Relieving letter</a>
                        </div>
                    @endif
                    --}}
                </div>  


                <div class="col-md-8 mb-4">
                    {{-- <label for="industry" class="form-label">Industries Served *</label>
                    <div id="list-industry" class="d-none">

                    </div>

                    <div class="dropdown select_industries">
                        <select class="dropdown-select" name="industry[]" onclick="toggleDropdown()">
                            <option selected >Select Industry</option>
                        </select>
                        <div class="dropdown-content">

                            @foreach ($groupedIndustries[null] as $mainIndustry)
                                <section>
                                    <label style="background: #d5d5d563; padding: 10px; font-weight: 600">{{ $mainIndustry->name }}</label>

                                    @if (isset($groupedIndustries[$mainIndustry->id]))
                                        <label class="select-all">
                                            <input type="checkbox" id="select-all-{{ $mainIndustry->name }}" onclick="toggleSelectAll(this, '{{ $mainIndustry->name }}')" />
                                            {{ $mainIndustry->name }}
                                        </label>

                                        <ul class="languages industry-check-box">
                                            @foreach ($groupedIndustries[$mainIndustry->id] as $subIndustry)
                                                <li>
                                                    <input type="checkbox" class="language-option {{ $mainIndustry->name }}" value="{{ $subIndustry->name }}"
                                                    dataId="{{ $subIndustry->id }}" dataparent="{{ $mainIndustry->name }}" onchange="updateLabel('{{ $mainIndustry->name }}')"  @if (in_array($subIndustry->id, json_decode($industry_check, true))) checked @endif />
                                                    {{ $subIndustry->name }}
                                                </li>
                                            @endforeach
                                        </ul>

                                    @endif

                                </section>
                            @endforeach

                        </div>
                    </div> --}}
                    {{-- 
                    <div class="position-relative form-group">
                        <label for="industry" class="form-label">Industries Served *</label>
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
                    --}}


                    <label for="industry" class="form-label">Industries Served *</label>
                    <div id="list-industry" class="d-none">
    
                    </div>
                    
                    <div id="dropdown-container">
                        {{-- <div id="selected-values">Selected values will be shown here.</div> --}}
                        <input type="hidden" id="selected-values-ids" name="industry[]" value="">


                        <div class="dropdown industry_option_dropdown">
                            <a class="dropdown-toggle industry_option">Select Industries Served </a>
                            <div class="dropdown-menu industry-check-box industry_option_dropdown_box">
                                @foreach ($groupedIndustries as $mainIndustry)
                                    <div class="title" style="background: #d5d5d563; padding: 10px; font-weight: 600">
                                        {{ $mainIndustry->name }}
                                    </div>

                                    @php
                                        $sub_Catg = $industry->where('main_partent_id', $mainIndustry->id);
                                    @endphp

                                    @if (count($sub_Catg) != 0)
                                        @foreach ($sub_Catg as $subIndustry)
                                            <div class="option custom-languages pt-1">

                                                <input type="checkbox" id="{{ $subIndustry->id }}" 
                                                data-id="{{ $subIndustry->id }}" @if (in_array($subIndustry->id, json_decode($industry_check, true))) checked @endif>
                                                <label for="{{ $subIndustry->id }}">{{ $subIndustry->name }}</label>

                                                @php
                                                    $child_Catg = $industry->where('sub_parent_id', $subIndustry->id);
                                                @endphp

                                                @if (count($child_Catg) != 0)
                                                    <div class="child-options">
                                                        @foreach ($child_Catg as $childIndustry)
                                                        <div class="field_option pt-1">
                                                            <input type="checkbox" id="{{ $childIndustry->id }}" data-id="{{ $childIndustry->id }}" @if (in_array($childIndustry->id, json_decode($industry_check, true))) checked @endif>
                                                            <label for="{{ $childIndustry->id }}">{{ $childIndustry->name }}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>


                <div class="col-md-4 mb-4 text-end">
                    <div class="option currently_work d-flex flex-lg-row flex-md-column gap-3" style="float: right;">
                        <div>
                        <input class="custom-radio" type="radio" id="employed1" name="Employed" value="yes"
                            @if ($employed == 'yes') checked @endif required>
                        <label for="employed1" class="form-label">Employed </label>
                        </div>
                        <div>
                        <input class="custom-radio" type="radio" id="unemployed1" name="Employed" value="no"
                            @if ($employed == 'no') checked @endif>
                        <label for="unemployed1" class="form-label">Unemployed </label>
                        </div>
                    </div>
                </div> 

                <div class="col-md-12 mb-2">
                    <div class="position-relative form-group">
                        <label for="skills" class="form-label">Key Relevant Skills *</label>
                        <select name="skill[]" multiple="multiple"
                            class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="skills-data" required>
                            <option value="">Select Key Relevant Skills</option>
                            @foreach ($skills as $row)
                                <option value="{{ $row->name }}"
                                    @if (in_array($row->name, json_decode($skill_check, true))) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-none" id="option-skills"></div>

                <div class="col-md-12 pt-4">
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
                    <a class="text-decoration-none text-white" onclick="back_to_privious(this);">Back</a>
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
                        <label for="School" class="form-label">School/University Name *</label>
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
                        <label for="Graduation" class="form-label">Graduation Year *</label>
                        <input type="text" class="form-control is-invalid input_text" id="Graduation"
                            name="edu_graduation_year" placeholder="Enter Your Graduation Year"
                            pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $edu_graduation_year }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="major" class="form-label">Major/Field of Study *</label>
                        <input type="text" class="form-control is-invalid input_text" id="major"
                            name="edu_field" placeholder="Enter your Major Field of Study" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $edu_field }}" required />
                    </div>
                </div>
            </div> --}}

            @if (!empty($edu_data))
                @foreach ($edu_data as $index => $education)
                        <div class="row education-row cirtificate_pdd">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="School" class="form-label">School/University Name *</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_clg_name'] }}" required/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Degree" class="form-label">Degree *</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_degree[]" placeholder="Enter your Degree"
                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_degree'] }}" required/>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Certificate" class="form-label">Graduation Year *</label>
                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                        name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                        value="{{ $education['edu_graduation_year'] }}" required/>
                                </div>
                            </div>


                            <div class="col-md-6 mb-4">
                                <div class="position-relative form-group">
                                    <label for="Certificate" class="form-label">Major/Field of Study</label>
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
                    <div class="row education-row cirtificate_pdd">
                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="School" class="form-label">School/University Name *</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                    pattern="[A-Za-z]+" minlength="1" maxlength="100" required
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Degree" class="form-label">Degree *</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_degree[]" placeholder="Enter your Degree"
                                    pattern="[A-Za-z]+" minlength="1" maxlength="100" required
                                />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Graduation Year *</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="100" required
                                />
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Major/Field of Study</label>
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



            <div class="heading">
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
                                <label for="Date Obtained*" class="form-label">Date Obtained (dd/mm/yyyy)</label>

                                <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field" max="{{ date('Y-m-d') }}"
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
                            <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field" max="{{ date('Y-m-d') }}"
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
                    <a class="text-decoration-none text-white" onclick="back_to_privious(this);">Back</a>
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
                        <label for="Preferred Title/Role*" class="form-label">Preferred Designation / Title / Role *</label>
                        <input type="text" class="form-control is-invalid input_text" id="Preferred Designation / Title / Role*"
                            name="pref_title" placeholder="Enter Your Preferred Des / Title / Role" pattern="[0-9A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_title }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Employment Type*" class="form-label">Employment Type *</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="Employment Type*"
                            name="pref_emp_type" placeholder="Enter your Employment Type" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_emp_type }}" required /> --}}

                        <select class="select2 form-select form-control is-invalid input_select old-select2"
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
                        <label for="Desired Job Location*" class="form-label">Desired Job Location *</label>
                        <input type="text" class="form-control is-invalid input_text" id="Desired Job Location*"
                            name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $pref_location }}" placeholder="Enter your Desired Job Location"
                            required />
                    </div>
                </div>

                  <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Employment Type*" class="form-label">Notice Period *</label>
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
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
                        <label for="Current Salary*" class="form-label d-block">Current Salary (Per Annum)</label>
                        <div class="sallery_width1">
                        
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
                            aria-label="Default select example" id="current_salary_currency" name="current_salary_currency" required>
                           
                            @foreach ($currencies as $row)
                                <option value="{{ $row->id }}" @if ($current_salary_currency == $row->id || ($row->id == '28' && $current_salary_currency == null)) selected @endif>
                                    <b>{{ $row->symbol }}</b>
                                </option>
                            @endforeach
                        </select>
                        </div>
                         <div class="sallery_width2">
                        <input type="text" class="form-control is-invalid input_text" id="Current-Salary"
                            name="current_salary" placeholder="Enter Your Current Salary" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $current_salary }}" />
                        </div>
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label d-block">Expected Salary (Per Annum) *</label>
<div class="sallery_width1">
                         
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
                            aria-label="Default select example" id="pref_salary_currency" name="pref_salary_currency" required>
                            
                            @foreach ($currencies as $row)
                                <option value="{{ $row->id }}" @if ($pref_salary_currency == $row->id || ($row->id == '28' && $pref_salary_currency == null)) selected @endif>
                                    <b>{{ $row->symbol }}</b>
                                </option>
                            @endforeach
                        </select>
                        </div> 
<div class="sallery_width2">
                        <input type="text" class="form-control is-invalid input_text" id="Expected-Salary"
                            name="pref_salary" placeholder="Enter Your Expected Salary" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_salary }}" required />
                           </div> 
                    </div>
                </div>
              

                {{-- <div class="col-md-12 mb-4">
                    <div class="position-relative form-group">
                        <label for="Preferred Industry*" class="form-label">Preferred Industries Served *</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="Preferred Industry*"
                            name="pref_industry" placeholder="Enter Your Preferred Industry" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $pref_industry }}" required /> --}}
                        {{--
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
                </div> --}}


                {{-------------------------- Preferred Industry -------------}}


                {{-- <label for="Preferred Industry*" class="form-label">Preferred Industries Served *</label>

                <div id="list-Preferred-industry" class="industry_cls d-none">

                </div>
                <div class="custom-dropdown select_industries">
                    
                <select class="custom-dropdown-select" name="pref_industry[]" onclick="toggleCustomDropdown()">
                        <option selected>Select Preferred Industry</option>
                    </select>
                    <div class="custom-dropdown-content">
                
                        @foreach ($groupedIndustries[null] as $mainIndustry)
                            <section>
                                <label style="background: #d5d5d5; padding: 10px; font-weight: 600">{{ $mainIndustry->name }}</label>
                
                                @if (isset($groupedIndustries[$mainIndustry->id]))
                                    <label class="custom-select-all">
                                        <input type="checkbox" id="custom-select-all-{{ $mainIndustry->name }}" onclick="toggleCustomSelectAll(this, '{{ $mainIndustry->name }}')" />
                                        {{ $mainIndustry->name }}
                                    </label>
                
                                    <ul class="custom-languages">
                                        @foreach ($groupedIndustries[$mainIndustry->id] as $subIndustry)
                                            <li>
                                                <input type="checkbox" class="custom-language-option {{ $mainIndustry->name }}" value="{{ $subIndustry->name }}"
                                                data-id="{{ $subIndustry->id }}" data-parent="{{ $mainIndustry->name }}" onchange="updateCustomLabel('{{ $mainIndustry->name }}')"  @if (in_array($subIndustry->id, json_decode($pref_industry_check, true))) checked @endif />
                                                {{ $subIndustry->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                
                                @endif
                
                            </section>
                        @endforeach
                
                    </div>
                </div> --}}


                <label for="preferred-industry" class="form-label-new form-label">Preferred Industries Served *</label>
                <div id="list-preferred-industry" class=" industry_cls d-none-new">
                </div>
                
                <div id="dropdown-container-new">
                    <input type="hidden" id="selected-values-ids-new" name="pref_industry[]" value="">
                
                    <div class="dropdown-new industry_option_dropdown">
                        <a class="dropdown-toggle-new dropdown-toggle industry_option">Select Preferred Industries Served</a>
                        <div class="dropdown-menu-new industry-check-box industry_option_dropdown_box">
                            @foreach ($groupedIndustries as $mainIndustry)
                                <div class="title-new" style="background: #d5d5d563; padding: 10px; font-weight: 600">
                                    {{ $mainIndustry->name }}
                                </div>
                
                                @php
                                    $sub_Catg = $industry->where('main_partent_id', $mainIndustry->id);
                                @endphp
                
                                @if (count($sub_Catg) != 0)
                                    @foreach ($sub_Catg as $subIndustry)
                                        <div class="option-new custom-languages pt-1">
                                            <input type="checkbox" id="sub-industry-{{ $subIndustry->id }}" 
                                            data-id="{{ $subIndustry->id }}" @if (in_array($subIndustry->id, json_decode($pref_industry_check, true))) checked @endif>
                                            <label for="sub-industry-{{ $subIndustry->id }}">{{ $subIndustry->name }}</label>
                
                                            @php
                                                $child_Catg = $industry->where('sub_parent_id', $subIndustry->id);
                                            @endphp
                
                                            @if (count($child_Catg) != 0)
                                                <div class="child-options-new">
                                                    @foreach ($child_Catg as $childIndustry)
                                                    <div class="field_option pt-1">
                                                        <input type="checkbox" id="child-industry-{{ $childIndustry->id }}" data-id="{{ $childIndustry->id }}" @if (in_array($childIndustry->id, json_decode($pref_industry_check, true))) checked @endif>
                                                        <label for="child-industry-{{ $childIndustry->id }}">{{ $childIndustry->name }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
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
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" class="form-control is-invalid input_text reference_name"
                                        name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                        minlength="1" maxlength="20" value="{{ $reference['reference_name'] }}"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="position-relative form-group">
                                    <label for="Phone{{ $index + 1 }}" class="form-label">Phone *</label>
                                    <input type="text" class="form-control is-invalid input_text reference_phone"
                                        name="reference_phone[]" id="Phone{{ $index + 1 }}"
                                        placeholder="Enter your Phone Number" title="This Field is required" pattern="[0-9]+" minlength="5"
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
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control is-invalid input_text" id="name"
                                    name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                    minlength="1" maxlength="20" required />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="Phone1" class="form-label">Phone *</label>
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
                        <label for="References*" class="form-label">References *</label>
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
                <h2>Work Authorization <span class="span_start">*</span></h2>
            </div>
            <div class="row work_authorization">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="Legal Authorization to work status" class="form-label">Legal
                            Authorization to work status</label>
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
                            aria-label="Default select example" id="Legal Authorization to work status*"
                            name="work_authorization_status" required>
                            <option value="">Select work status</option>
                            <option value="1" @if ($work_authorization_status == 1) selected @endif>Yes</option>
                            <option value="0" @if ($work_authorization_status == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="Availability" class="form-label">Availability
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select old-select2"
                            aria-label="Default select example" id="Availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="1" @if ($availability == 1) selected @endif>Yes</option>
                            <option value="0" @if ($availability == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                {{--
                <!-- <div class="col-md-3">
                    <div class="position-relative form-group">
                        <label for="Notice Period" class="form-label">Notice Period
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="notice_period" name="notice_period" required>
                            <option value="">Select Notice Period</option>
                            @foreach ($notice_period_list as $row)
                                <option value="{{ $row->id }}" @if ($notice_period == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div> -->
                --}}
            </div>
            <div class="d-flex align-items-center gap-4 text-end justify-content-end mt-3">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious(this);">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>

            <div class="">
                <p>Authorized for international employment <span class="span_start">*</span></p>
            </div>
        </form>
    </div>
{{-- @endif --}}

<!--------------------------------------------- preferences-info --------------------------------->

<!--------------------------------------------- social-media-info  --------------------------------->

{{-- @if (!Session::has('step') || Session::get('step') == 6) --}}

    <div id="social_media_div" class="register_width d-none">
        <div class="heading mb-4 col-12">
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
                        <input type="text" class="form-control is-invalid input_text" id="Linkdin"
                            name="linkdin" placeholder="Enter Your Linkedin URL" value="{{ $linkdin }}"
                            name="linkdin" pattern="https://www.linkedin.com/[a-zA-Z0-9_.]+"/>
                        <!-- {{-- <img src="images/linkedin.png" alt="" class="input_icon" /> --}} -->
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Twitter" class="form-label">X (Twitter)</label>
                        <img src="/assets/images/twitter_icon.svg" alt="" class="input_icon twitter_icon">
                        <input type="text" class="form-control is-invalid input_text" id="Twitter"
                            name="twitter" placeholder="Enter Your X URL" value="{{ $twitter }}"
                            name="twitter" pattern="https://twitter.com/[a-zA-Z0-9_]+"/>
                        <!-- {{-- <img src="images/x.png" alt="" class="input_icon" /> --}} -->
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Instagram" class="form-label">Instagram</label>
                        <img src="/assets/images/instagram_icon.svg" alt="" class="input_icon insta_icon">
                        <input type="text" class="form-control is-invalid input_text" id="Instagram"
                            placeholder="Enter Your Instagram URL" value="{{ $instagram }}"
                            name="instagram" pattern="https://www.instagram.com/[a-zA-Z0-9_.]+">
                        {{-- <img src="images/instagram.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Facebook" class="form-label">Facebook</label>
                        <img src="/assets/images/facebook_icon.svg" alt="" class="input_icon facebook_icon">
                        <input type="text" class="form-control is-invalid input_text" id="Facebook"
                            placeholder="Enter Your Facebook URL" value="{{ $facebook }}"
                            name="facebook" pattern="https://www.facebook.com/[a-zA-Z0-9.]+"/>
                        {{-- <img src="images/facebook.png" alt="" class="input_icon" /> --}}
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="position-relative form-group">
                        <label for="others" class="form-label">Others</label>
                        <input type="text" class="form-control is-invalid input_text" id="others"
                            placeholder="Enter Your Other URL" value="{{ $other }}"
                            name="other" />
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4 justify-content-lg-end justify-content-center">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious(this);">Back</a>
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
         <div class="heading mb-2 lg-mt-5 mt-3">
            <h2 class="fonts36"><b>Thank You</b></h2>
        </div>

        <p>You have successfully registered! We will provide an update within 48 hours. <span class="preview_name" style=""><span class="display_blck1">Preview how professional stories appear on </span>
	<span class="purple preview-content padd15">M</span><b class="preview-sub-text">analot </b>
	<span class="orange preview-content">L</span><b class="preview-sub-text">eadership </b>
	<span class="aquamarine preview-content">N</span><b class="preview-sub-text">etwork</b>
</span></p>
      

                 <div class="d-flex align-items-center gap-5 justify-content-end mgright20 mt70">
                <div class="blue_btn">
                    <a href="/login" class="text-decoration-none text-white padd22">Continue to Login</a>
                </div>
                <div class="purple_btn">
                    <a target="_blank" href="/sample-profile" class="text-decoration-none text-white padd22">View Sample Profile</button>
                </div>
            </div>



    </div>
{{-- @endif --}}

<!--------------------------------------------- social-media-info --------------------------------->


