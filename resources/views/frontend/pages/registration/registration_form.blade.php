<!--------------------------------------------- user info --------------------------------->

@if (!Session::has('step') || Session::get('step') == 1)
    <div id="user-add-details" class="register_width">
        <div class="heading mb-4">
            <h2>Register</h2>
        </div>

        @php
            session()->forget('step');
            Session()->put('step', 1);

            $experience_status = DB::table('experience_status')->where('status', 1)->get();
        @endphp

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
                        <label for="formFile" class="form-label">Upload Resume*</label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="formFile" name="resume_cv"
                            accept=".pdf" required />
                        <img src="images/file.png" alt="" class="input_icon" />
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Password*</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="password" name="password"
                            placeholder="Enter your Password" minlength="6" maxlength="20" required />
                        <img src="images/key.png" alt="" class="input_icon" />
                    </div>
                </div>



                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="password" class="form-label">Confirm Password*</label>
                        <img src="/assets/images/key.png" alt="" class="input_icon" />
                        <input type="password" class="form-control is-invalid input_text" id="confirm_password"
                            name="confirm_password" placeholder="Enter your Password" minlength="6" maxlength="20"
                            required />
                        <img src="images/key.png" alt="" class="input_icon" />
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-check checkbox_error">
                    <input class="form-check-input" type="checkbox" value="1" name="term_check"
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

    {{--- //------------------------------  email verify modal -----------------------// ----}}

    <div class="modal fade" id="email_otp_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verify Email</h5>
                    <button type="button" onclick="close_Emai_modal();" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="email-verify-otp" action="{{ url(route('account.create', ['param' => 'email-verify'])) }}"
                    method="post">
                    @csrf

                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Otp:</label>
                                <input type="text" class="form-control" id="recipient-name" name="otp" pattern="[0-9]+" minlength="6"
                                maxlength="6" placeholder="Please Enter OTP" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="close_Emai_modal();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--- //------------------------------  email verify modal -----------------------// ----}}

@endif

<!--------------------------------------------- user info --------------------------------->







<!--------------------------------------------- personal info --------------------------------->

@if (!Session::has('step') || Session::get('step') == 2)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get([
                'phone_number',
                'fullname',
                'profile_photo',
                'gender',
                'dob',
                'address',
                'city',
                'state',
                'pincode',
                'country',
            ])
            ->first();

        $user = DB::table('users')
            ->where('id', Session::get('temp_user_id'))
            ->get(['email'])
            ->first();

        //$state = DB::table('states')->get();
        //$country = DB::table('countries')->get();

    @endphp

    <div id="personal-details" class="register_width">
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
                            maxlength="255" value="{{ $user_detail->fullname }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Gender" class="form-label">Gender*</label>
                        <select class="select2 form-select form-control is-invalid  input_select"
                            aria-label="Default select example" id="Gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="1" @if ($user_detail->gender == 1) selected @endif>Male</option>
                            <option value="2" @if ($user_detail->gender == 2) selected @endif>Female</option>
                            <option value="3" @if ($user_detail->gender == 3) selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="formFile" class="form-label">Profile Photo</label>
                        @if (!empty($user_detail->profile_photo) && $user_detail->profile_photo != null)
                            <a class="pdf_view" target="_blank"
                                href="{{ asset('storage/' . $user_detail->profile_photo) }}">
                                View
                            </a>
                        @endif
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="formFile" name="profile_photo"
                            accept=".jpg,.jpeg,.png,.webp" {{-- @if (empty($user_detail->profile_photo) || $user_detail->profile_photo == null) @endif --}} />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Date" class="form-label">Date of Birth*</label>
                        <!-- <img src="/assets/images/calender_icon.png" alt="" class="input_icon"> -->
                        <input type="date" class="form-control is-invalid input_text" id="Date"
                            name="dob" placeholder="Date" value="{{ $user_detail->dob }}" max="2000-12-31"
                            required />
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-4">
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
                </div> -->
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="zip_code" class="form-label">Zip/Postal Code*</label>
                        <input type="text" class="form-control is-invalid input_text" id="pincode"
                            name="pincode" pattern="[0-9A-Za-z]+" minlength="1" maxlength="10"
                            placeholder="Enter Your zipcode / Pincode" value="{{ $user_detail->pincode }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="city" class="form-label">City*</label>
                        <input type="text" class="form-control is-invalid input_text" id="city"
                            name="city" pattern="[A-Za-z]+" minlength="3" maxlength="50"
                            placeholder="Enter Your City" value="{{ $user_detail->city }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="country_name" class="form-label">Country*</label>
                        <input type="text" value="{{ isset($user_detail->country) ? $user_detail->country : '' }}"
                            class="form-control is-invalid input_text" id="country_name" name="country"
                            placeholder="Enter Your country" required />
                        {{--
                        <select class="form-select form-control is-invalid  input_select" aria-label="Default select example"
                            id="country_name" name="country">
                            <option value="">Select Country</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->id }}" @if ($user_detail->country == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}</option>
                            @endforeach
                        </select>
                        --}}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="State" class="form-label">State*</label>
                        <input type="text" value="{{ isset($user_detail->state) ? $user_detail->state : '' }}"
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
                        <label for="address" class="form-label">Address*</label>
                        {{-- <input type="text" class="form-control is-invalid input_text" id="address" pattern="[0-9A-Za-z]+"
                            minlength="5" maxlength="250" name="address" placeholder="Enter your Address"
                            value="{{ $user_detail->address }}" required /> --}}

                        <textarea class="form-control is-invalid" rows="3" cols="45" name="address" pattern="[0-9A-Za-z]+"
                            placeholder="Address" required>{{ $user_detail->address }}</textarea>

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

@endif

<!--------------------------------------------- personal info --------------------------------->

{{-- <!----===================================== Not using code ==============================================--------->
<!--------------------------------------------- login info --------------------------------->

@if (!Session::has('step') || Session::get('step') == 0)
    @php

        $user = DB::table('users')
            ->where('id', Session::get('temp_user_id'))
            ->get(['email'])
            ->first();

    @endphp

    <div id="logininfo_one" class="register_width">
        <div class="heading mb-4">
            <h2>Login Information</h2>
        </div>
        <form id="login-info" action="{{ url(route('account.create', ['param' => 'login-info'])) }}" method="post"
            enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="position-relative form-group">
                <label for="email" class="form-label">Email*</label>
                <img src="/assets/images/email.png" alt="" class="input_icon">
                <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                    placeholder="Enter Your Email" value="{{ $user->email }}" required />
                <img src="images/email.png" alt="" class="input_icon" />
            </div>
            <div class="position-relative form-group">
                <label for="password" class="form-label">Password*</label>
                <img src="/assets/images/key.png" alt="" class="input_icon">
                <input type="password" class="form-control is-invalid input_text" id="password" name="password"
                    placeholder="Enter Your Password" value="{{ session('password', '') }}" minlength="6"
                    maxlength="16" required />
                <img src="images/key.png" alt="" class="input_icon" />
            </div>
            <div class="position-relative form-group">
                <label for="password" class="form-label">Confirm Password*</label>
                <img src="/assets/images/key.png" alt="" class="input_icon">
                <input type="password" class="form-control is-invalid input_text" id="confirm_password"
                    name="confirm_password" placeholder="Enter Your Confirm Password"
                    value="{{ session('password', '') }}" minlength="6" maxlength="16" required />
                <img src="images/key.png" alt="" class="input_icon" />
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>

        </form>
    </div>
@endif

<!--------------------------------------------- login info --------------------------------->
<!----===================================== Not using code ==============================================---------> --}}


<!--------------------------------------------- personal work info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 3)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get([
                'skill',
                'industry',
                'wrk_exp__title',
                'wrk_exp_company_name',
                'wrk_exp_years',
                'wrk_exp_responsibilities',
                'employed',
                'experience_letter',
            ])
            ->first();
        $years_of_exp = DB::table('years_of_exp')->where('status', '1')->get();
        // $job_title = DB::table('job_title')->where('status', '1')->get();
        $industry = DB::table('industry')->where('status', '1')->get();
        $skills = DB::table('skills')->where('status', '1')->get();
    @endphp

    <div class="register_width">
        {{-- <div class="heading mb-4">
            <h2>Personal Information</h2>
        </div> --}}
        <form id="personal-work-info" action="{{ url(route('account.create', ['param' => 'personal-work-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">


                {{-- <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                         @if (!empty($user_detail->resume_cv) && $user_detail->resume_cv != null)
                            <a  class="pdf_view" target="_blank" href="{{ asset('storage/' . $user_detail->resume_cv) }}">
                                View
                            </a>
                        @endif
                        <label for="formFile" class="form-label">Resume/CV*</label>
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                        <input class="form-control is-invalid" type="file" id="formFile" name="resume_cv" accept=".pdf"
                            @if (empty($user_detail->resume_cv) || $user_detail->resume_cv == null) required @endif />
                        
                    </div>
                   
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="job" class="form-label">Job Title*</label>
                        <select class="form-select form-control is-invalid input_select" aria-label="Default select example" id="job"
                            name="job_title" required>
                            <option value="">Select Job Title</option>
                            @foreach ($job_title as $row)
                                <option value="{{ $row->id }}"
                                    @if ($user_detail->job_title == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="industry" class="form-label">Industry*</label>
                        <select class="form-select form-control is-invalid input_select" aria-label="Default select example" id="industry"
                            name="industry" required>
                            <option value="">Select Industry</option>
                            @foreach ($industry as $row)
                                <option value="{{ $row->id }}"
                                    @if ($user_detail->industry == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="col-md-12 mt-3">
                    <div class="heading mt-4 mb-4">
                        <h2>Work Experience</h2>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="job_title" class="form-label">Professional Title*</label>
                        <input type="text" class="form-control is-invalid input_text" id="job_title"
                            name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+"
                            minlength="1" maxlength="100" value="{{ $user_detail->wrk_exp__title }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="company" class="form-label">Company Name*</label>
                        <input type="text" class="form-control is-invalid input_text" id="company"
                            name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+"
                            minlength="1" maxlength="100" value="{{ $user_detail->wrk_exp_company_name }}"
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
                                <option value="{{ $row->id }}" @if ($user_detail->wrk_exp_years == $row->id) selected @endif>
                                    {{ ucfirst($row->year_range) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="industry" class="form-label">Industry*</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="industry" name="industry" required>
                            <option value="">Select Industry</option>
                            @foreach ($industry as $row)
                                <option value="{{ $row->id }}" @if ($user_detail->industry == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="experience_letter" class="form-label">Upload Experience Letter</label>
                        <img src="/assets/images/pdf_icon.png" alt="" class="input_icon" />
                        <input class="form-control" type="file" id="formFile" name="experience_letter"
                            accept=".pdf,.doc,.docx,application/msword,image/*,.webp" />
                        <img src="images/file.png" alt="" class="input_icon" />
                    </div>
                    @if ($user_detail->experience_letter)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . $user_detail->experience_letter) }}" class="btn btn-success add-row" target="_blank">View Experience Letter</a>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 mb-4">
                    <div class="option currently_work">
                        <input type="checkbox" id="yes" name="Employed" value="yes"
                            @if (isset($user_detail) && $user_detail->employed == 'yes') checked @endif>
                        <label for="yes" class="form-label">Currently Employed</label>
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
                                <option value="{{ $row->id }}"
                                    @if (in_array($row->id, json_decode($user_detail->skill, true))) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Responsibilities" class="form-label">Responsibilities/Achievements</label>
                        <textarea class="form-control is-invalid" rows="4" cols="45" name="wrk_exp_responsibilities"
                            placeholder="Message" required>{{ $user_detail->wrk_exp_responsibilities }}</textarea>
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
@endif

<!--------------------------------------------- personal work info --------------------------------->

{{-- <!--------------------------------------------- Education info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 0)
    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['edu_degree', 'edu_clg_name', 'edu_graduation_year', 'edu_field', 'edu_cgpa'])
            ->first();
    @endphp

    <div id="education_info_one" class="register_width">
        <div class="heading mb-4">
            <h2>Education</h2>
        </div>
        <form id="education-info" action="{{ url(route('account.create', ['param' => 'education-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="School" class="form-label">School/University Name*</label>
                        <input type="text" class="form-control is-invalid input_text" id="School"
                            name="edu_clg_name" placeholder="Enter your School / College Nmae" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->edu_clg_name }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="degree" class="form-label">Degree*</label>
                        <input type="text" class="form-control is-invalid input_text" id="degree"
                            name="edu_degree" placeholder="Enter your Degree" pattern="[A-Za-z]+" minlength="1"
                            maxlength="50" value="{{ $user_detail->edu_degree }}" required />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Graduation" class="form-label">Graduation Year*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Graduation"
                            name="edu_graduation_year" placeholder="Enter Your Graduation Year"
                            pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $user_detail->edu_graduation_year }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="edu_field" class="form-label">Major/Field of Study*</label>
                        <input type="text" class="form-control is-invalid input_text" id="major"
                            name="edu_field" placeholder="Enter your Major Field of Study" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->edu_field }}" />
                    </div>
                </div>
                {{--
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="gpa" class="form-label">GPA*</label>
                        <input type="text" class="form-control is-invalid input_text" id="gpa" name="edu_cgpa"
                            placeholder="Enter Your GPA" pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $user_detail->edu_cgpa }}" />
                    </div>
                </div>
            

            </div>
            <div class="d-flex align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
@endif

<!--------------------------------------------- Education info ---------------------------------> --}}

{{-- <!--------------------------------------------- skills info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 0)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['skill'])
            ->first();

        $skills = DB::table('skills')->where('status', '1')->get();
    @endphp

    <div id="skill_info_one" class="register_width">
        <div class="heading mb-4">
            <h2>Skills and Competencies</h2>
        </div>
        <form id="skills-info" class="skills-info-first"
            action="{{ url(route('account.create', ['param' => 'skills-info'])) }}" method="post"
            enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="col-md-12 mb-4">
                <div class="position-relative form-group">
                    <label for="skills" class="form-label">Skills*</label>
                    <select class="select2 form-select form-control is-invalid input_select"
                        aria-label="Default select example" id="skills" name="skill[]" multiple required>
                        <option value="">select skills</option>
                        @foreach ($skills as $row)
                            <option value="{{ $row->id }}" @if (in_array($row->id, json_decode($user_detail->skill, true))) selected @endif>
                                {{ ucfirst($row->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
@endif

<!--------------------------------------------- skill info ---------------------------------> --}}

<!--------------------------------------------- certifications-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 4)
    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get([
                'certificate_name',
                'certificate_data',
                'certificate_issuing',
                'certificate_obtn_date',
                'edu_degree',
                'edu_clg_name',
                'edu_graduation_year',
                'edu_field',
            ])
            ->first();

        $certificate_data = json_decode($user_detail->certificate_data, true);
    @endphp

    <div id="cirtificate_one" class="register_width">
        {{-- <div class="heading mb-4">
            <h2>Certifications</h2>
        </div> --}}
        <div class="heading mb-4">
            <h2>Education</h2>
        </div>
        <form id="skills-info" action="{{ url(route('account.create', ['param' => 'certifications-info'])) }}"
            method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="School" class="form-label">School/University Name*</label>
                        <input type="text" class="form-control is-invalid input_text" id="School"
                            name="edu_clg_name" placeholder="Enter your School / College Nmae" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->edu_clg_name }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="degree" class="form-label">Degree*</label>
                        <input type="text" class="form-control is-invalid input_text" id="degree"
                            name="edu_degree" placeholder="Enter your Degree" pattern="[A-Za-z]+" minlength="1"
                            maxlength="50" value="{{ $user_detail->edu_degree }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Graduation" class="form-label">Graduation Year*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Graduation"
                            name="edu_graduation_year" placeholder="Enter Your Graduation Year"
                            pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $user_detail->edu_graduation_year }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="major" class="form-label">Major/Field of Study*</label>
                        <input type="text" class="form-control is-invalid input_text" id="major"
                            name="edu_field" placeholder="Enter your Major Field of Study" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->edu_field }}" required />
                    </div>
                </div>
            </div>
            <div class="heading">
                <h2>Certifications</h2>
            </div>
            @if (!empty($certificate_data))
                @foreach ($certificate_data as $index => $certificate)
                    <div class="row certificate-row">
                        <div class="col-md-12 mb-4">
                            <div class="position-relative form-group">
                                <label for="Certificate" class="form-label">Certificate Name*</label>
                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                    name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                    value="{{ $certificate['certificate_name'] }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Date Obtained*" class="form-label">Date Obtained*</label>

                                <input type="date" class="form-control is-invalid input_text certificate_obtn_date"
                                    name="certificate_obtn_date[]" placeholder="Date"
                                    value="{{ $certificate['certificate_obtn_date'] }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="position-relative form-group">
                                <label for="Issuing Registration*" class="form-label">Issuing Registration*</label>
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
                <div class="row certificate-row">
                    <div class="col-md-12 mb-4">
                        <div class="position-relative form-group">
                            <label for="Certificate" class="form-label">Certificate Name*</label>
                            <input type="text" class="form-control is-invalid input_text certificate_name"
                                name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="position-relative form-group">
                            <label for="Date Obtained*" class="form-label">Date Obtained*</label>
                            <input type="date" class="form-control is-invalid input_text certificate_obtn_date"
                                name="certificate_obtn_date[]" placeholder="Date" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="position-relative form-group">
                            <label for="Issuing Registration*" class="form-label">Issuing Registration*</label>
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

@endif

<!--------------------------------------------- certifications-info --------------------------------->

<!--------------------------------------------- preferences-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 5)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get([
                'pref_title',
                'pref_emp_type',
                'pref_industry',
                'pref_location',
                'pref_salary',
                'references',
                'work_authorization_status',
                'availability',
                'notice_period',
            ])
            ->first();

        $references_from = DB::table('references_from')->where('status', '1')->get();

        $references_data = json_decode($user_detail->references, true);
    @endphp
    <div id="availibility_one" class="register_width">
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
                            minlength="1" maxlength="50" value="{{ $user_detail->pref_title }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Employment Type*" class="form-label">Employment Type*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Employment Type*"
                            name="pref_emp_type" placeholder="Enter your Employment Type" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->pref_emp_type }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Preferred Industry*" class="form-label">Preferred Industry*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Preferred Industry*"
                            name="pref_industry" placeholder="Enter Your Preferred Industry" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->pref_industry }}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Desired Job Location*" class="form-label">Desired Job Location*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Desired Job Location*"
                            name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                            value="{{ $user_detail->pref_location }}" placeholder="Enter your Desired Job Location"
                            required />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Expected Salary*" class="form-label">Expected Salary*</label>
                        <input type="text" class="form-control is-invalid input_text" id="Expected Salary*"
                            name="pref_salary" placeholder="Enter Your Expected Salary" pattern="[A-Za-z]+"
                            minlength="1" maxlength="50" value="{{ $user_detail->pref_salary }}" required />
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
                <div class="col-md-5">
                    <div class="position-relative form-group">
                        <label for="Legal Authorization to work status" class="form-label">Legal
                            Authorization to work status</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Legal Authorization to work status*"
                            name="work_authorization_status" required>
                            <option value="">Select work status</option>
                            <option value="1" @if ($user_detail->work_authorization_status == 1) selected @endif>Yes</option>
                            <option value="0" @if ($user_detail->work_authorization_status == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="Availability" class="form-label">Availability
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="1" @if ($user_detail->availability == 1) selected @endif>Yes</option>
                            <option value="0" @if ($user_detail->availability == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group">
                        <label for="Notice Period" class="form-label">Notice Period
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Notice Period" name="notice_period" required>
                            <option value="">Select Notice Period</option>
                            <option value="1" @if ($user_detail->notice_period == 1) selected @endif>Yes</option>
                            <option value="1" @if ($user_detail->notice_period == 0) selected @endif>No</option>
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
@endif

<!--------------------------------------------- preferences-info --------------------------------->

{{-- <!--------------------------------------------- work-authorization-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 0)
    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['work_authorization_status', 'availability', 'notice_period'])
            ->first();
    @endphp

    <div id="work_autho" class="register_width">
        <div class="heading mb-4">
            <h2>Work Authorization</h2>
        </div>
        <form id="work-authorization-info"
            action="{{ url(route('account.create', ['param' => 'work-authorization-info'])) }}" method="post"
            enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Legal Authorization to work status*" class="form-label">Legal
                            Authorization to work status</label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Legal Authorization to work status*"
                            name="work_authorization_status" required>
                            <option value="">Select work status</option>
                            <option value="1" @if ($user_detail->work_authorization_status == 1) selected @endif>Yes</option>
                            <option value="0" @if ($user_detail->work_authorization_status == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Availability" class="form-label">Availability
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="1" @if ($user_detail->availability == 1) selected @endif>Yes</option>
                            <option value="0" @if ($user_detail->availability == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Notice Period" class="form-label">Notice Period
                        </label>
                        <select class="select2 form-select form-control is-invalid input_select"
                            aria-label="Default select example" id="Notice Period" name="notice_period" required>
                            <option value="">Select Notice Period</option>
                            <option value="1" @if ($user_detail->notice_period == 1) selected @endif>Yes</option>
                            <option value="1" @if ($user_detail->notice_period == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4">
                <div class="blue_btn">
                    <a class="text-decoration-none text-white" onclick="back_to_privious();">Back</a>
                </div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>
@endif

<!--------------------------------------------- work-authorization-info ---------------------------------> --}}

<!--------------------------------------------- social-media-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 6)
    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['linkdin', 'twitter', 'instagram', 'facebook', 'other'])
            ->first();
    @endphp

    <div id="work_autho" class="register_width">
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
                        <img src="/assets/images/linkedin-in1.png" alt="" class="input_icon linkedin_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Linkdin"
                            name="linkdin" placeholder="Enter Your Linkdn URL" value="{{ $user_detail->linkdin }}"
                            name="linkdin" />
                        <img src="images/linkedin.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Twitter" class="form-label">Twitter</label>
                        <img src="/assets/images/x-twitter1.png" alt="" class="input_icon twitter_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Twitter"
                            name="twitter" placeholder="Enter Your Twitter URL" value="{{ $user_detail->twitter }}"
                            name="twitter" />
                        <img src="images/x.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Instagram" class="form-label">Instagram</label>
                        <img src="/assets/images/instagram1.png" alt="" class="input_icon insta_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Instagram"
                            placeholder="Enter Your Instagram URL" value="{{ $user_detail->instagram }}"
                            name="instagram">
                        <img src="images/instagram.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative form-group">
                        <label for="Facebook" class="form-label">Facebook</label>
                        <img src="/assets/images/facebook-f1.png" alt="" class="input_icon facebook_icon">
                        <input type="url" class="form-control is-invalid input_text" id="Facebook"
                            placeholder="Enter Your Facebook URL" value="{{ $user_detail->facebook }}"
                            name="facebook" />
                        <img src="images/facebook.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="others" class="form-label">Others</label>
                        <input type="url" class="form-control is-invalid input_text" id="others"
                            placeholder="Enter Your Others URL" value="{{ $user_detail->other }}"
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
@endif

<!--------------------------------------------- social-media-info --------------------------------->

<!--------------------------------------------- Proceeding  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 7)
    <div id="work_autho" class="register_width">
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
                    <button type="submit" class="text-decoration-none text-white">Continue to Home</button>
                </div>
            </div>
        </form>
    </div>
@endif

<!--------------------------------------------- social-media-info --------------------------------->
