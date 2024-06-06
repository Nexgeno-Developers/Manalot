
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

        <form id="user-info" action="{{ route('account.create', ['param' => 'user-info']) }}" method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="name" class="form-label">Username *</label>
                        <input type="text" class="form-control input_text" id="name" name="name"
                            placeholder="Enter Your Name" pattern="[A-Za-z]+" minlength="3"
                            maxlength="20" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control input_text" id="email" name="email"
                            placeholder="Enter Your email" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="password" class="form-label">Password</label>
                         <img src="/assets/images/email.png" alt="" class="input_icon" />
                        <input type="password" class="form-control input_text" id="password" name="password"
                            placeholder="Enter your Password" minlength="6" maxlength="16" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="text" class="form-control input_text" id="Phone" name="phone_number"
                            placeholder="Enter your Phone Number" pattern="[0-9]+" minlength="10" maxlength="10" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Employee" class="form-label">Employee Status</label>
                        <select class="form-select form-control input_select" aria-label="Default select example" name="experience_Status" id="Employee" required> 
                            <option value="">Select Employee Status</option>
                            @foreach ($experience_status as $row)
                                <option value="{{ $row->id }}">
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="formFile" class="form-label">Upload Resume</label>
                        <input class="form-control" type="file" id="formFile" name="resume_cv" accept=".pdf" required />
                        <img src="images/file.png" alt="" class="input_icon" />
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="term_check" id="flexCheckDefault" required/>
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree to the
                        <a href="#" class="inherit"> Terms </a>
                        and
                        <a href="#" class="inherit"> Privacy Policy</a>
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

        <p class="mt-5">
            Already have an account?
            <a href="login.php" class="text-decoration-none purple">Login</a>
        </p>
    </div>

@endif

<!--------------------------------------------- user info --------------------------------->

<!--------------------------------------------- personal info --------------------------------->

@if (!Session::has('step') || Session::get('step') == 2)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['phone_number', 'first_name', 'last_name', 'profile_photo', 'gender', 'dob', 'address',
            'city', 'state', 'pincode', 'country'])
            ->first();

        $user = DB::table('users')
            ->where('id', Session::get('temp_user_id'))
            ->get(['email'])
            ->first();

        $state = DB::table('states')->get();
        $country = DB::table('countries')->get();
    @endphp

    <div id="personal-details" class="register_width">
        <div class="heading mb-4">
            <h2>Personal Information</h2>
        </div>
        <form id="personal-info" action="{{ url(route('account.create', ['param' => 'personal-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
        @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="first_name" class="form-label">First Name*</label>
                        <input type="text" class="form-control input_text" name="first_name" id="first_name"
                            placeholder="Enter First Name" pattern="[A-Za-z]+" minlength="3"
                            maxlength="20" value="{{ $user_detail->first_name }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="last_name" class="form-label">Last Name*</label>
                        <input type="text" class="form-control input_text" name="last_name" id="last_name"
                            placeholder="Enter Last Name" pattern="[A-Za-z]+" minlength="3"
                            maxlength="20" value="{{ $user_detail->last_name }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="formFile" class="form-label">Profile Photo</label>
                        <input class="form-control" type="file" id="formFile" name="profile_photo" accept=".jpg,.jpeg,.png,.webp" @if(empty($user_detail->profile_photo) || $user_detail->profile_photo == null) required @endif/>
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                    </div>

                    @if(!empty($user_detail->profile_photo) && $user_detail->profile_photo != null)
                        <a target="_blank" href="{{ asset('storage/' . $user_detail->profile_photo) }}">
                            View
                        </a>
                    @endif

                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Gender" class="form-label">Gender*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="Gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="1" @if($user_detail->gender == 1) selected @endif>Male</option>
                            <option value="2" @if($user_detail->gender == 2) selected @endif>Female</option>
                            <option value="3" @if($user_detail->gender == 3) selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Date" class="form-label">Date of Birth*</label>
                        <input type="date" class="form-control input_text" id="Date" name="dob"
                            placeholder="Date" value="{{ $user_detail->dob }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="email" class="form-label">Email Address*</label>
                        <input type="email" class="form-control input_text" id="email" name="email"
                            placeholder="Enter Your Email" value="{{ $user->email }}" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Phone" class="form-label">Phone*</label>
                        <input type="number" class="form-control input_text" id="Phone" name="phone_number"
                            placeholder="Enter Your Phone No" pattern="[0-9]+" minlength="10" maxlength="10" value="{{ $user_detail->phone_number }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="address" class="form-label">Address*</label>
                        <input type="text" class="form-control input_text" id="address" pattern="[0-9A-Za-z]+" minlength="5" maxlength="250" name="address" placeholder="Enter your Address" value="{{ $user_detail->address }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="city" class="form-label">City*</label>
                        <input type="text" class="form-control input_text" id="city" name="city" pattern="[A-Za-z]+" minlength="5" maxlength="50" placeholder="Enter Your City" value="{{ $user_detail->city }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="State" class="form-label">State*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="State" name="state">
                            <option value="">Select State</option>
                            @foreach ($state as $row)
                                <option value="{{ $row->id }}" @if($user_detail->state == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="zip_code" class="form-label">Zip/Postal Code*</label>
                        <input type="text" class="form-control input_text" id="pincode" name="pincode" pattern="[0-9A-Za-z]+" minlength="3" maxlength="6" placeholder="Enter Your zipcode / Pincode" value="{{ $user_detail->pincode }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="country_name" class="form-label">Country*</label>
                        <select class="form-select input_select" aria-label="Default select example" id="country_name" name="country">
                            <option value="">Select Country</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->id }}" @if($user_detail->country == $row->id) selected @endif>{{ ucfirst($row->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <div class="purple_btn">
                    <button type="submit" class="text-decoration-none text-white">Next</button>
                </div>
            </div>
        </form>
    </div>

@endif

<!--------------------------------------------- personal info --------------------------------->


<!--------------------------------------------- personal work info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 3)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['resume_cv', 'job_title', 'industry', 'wrk_exp__title', 'wrk_exp_company_name', 'wrk_exp_years', 'wrk_exp_responsibilities'])
            ->first();
        $years_of_exp = DB::table('years_of_exp')->where('status','1')->get();
        $job_title = DB::table('job_title')->where('status','1')->get();
        $industry = DB::table('industry')->where('status','1')->get();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Personal Information</h2>
        </div>
        <form id="personal-work-info" action="{{ url(route('account.create', ['param' => 'personal-work-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="formFile" class="form-label">Resume/CV*</label>
                        <input class="form-control" type="file" id="formFile"  name="resume_cv" accept=".pdf" @if(empty($user_detail->resume_cv) || $user_detail->resume_cv == null) required @endif/>
                        <img src="/assets/images/file.png" alt="" class="input_icon" />
                    </div>
                    @if(!empty($user_detail->resume_cv) && $user_detail->resume_cv != null)
                        <a target="_blank" href="{{ asset('storage/' . $user_detail->resume_cv) }}">
                            View
                        </a>
                    @endif
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="job" class="form-label">Job Title*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="job" name="job_title" required>
                            <option value="">Select Job Tilt</option>
                            @foreach ($job_title as $row)
                                <option value="{{ $row->id }}" @if($user_detail->job_title == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="industry" class="form-label">Industry*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="industry" name="industry" required>
                            <option value="">Select Industry</option>
                            @foreach ($industry as $row)
                                <option value="{{ $row->id }}" @if($user_detail->industry == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="heading mt-4 mb-4">
                        <h2>Work Experience</h2>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="job_title" class="form-label">Job Title*</label>
                        <input type="text" class="form-control input_text" id="job_title" name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+" minlength="3" maxlength="100" value="{{ $user_detail->wrk_exp__title }}" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="company" class="form-label">Company Name*</label>
                        <input type="text" class="form-control input_text" id="company" name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+" minlength="3" maxlength="100" value="{{ $user_detail->wrk_exp_company_name }}" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="State" class="form-label">Years of Experience</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="wrk_exp_years" name="wrk_exp_years" required>
                            <option value="">Select Experience</option>
                            @foreach ($years_of_exp as $row)
                                <option value="{{ $row->id }}" @if($user_detail->wrk_exp_years == $row->id) selected @endif>
                                    {{ ucfirst($row->year_range) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <p>Responsibilities/Achievements</p>
                    <textarea rows="4" cols="45" name="wrk_exp_responsibilities" required>{{ $user_detail->wrk_exp_responsibilities }}</textarea>
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

<!--------------------------------------------- personal work info --------------------------------->

<!--------------------------------------------- Education info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 4)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['edu_degree', 'edu_clg_name', 'edu_graduation_year', 'edu_field', 'edu_cgpa' ])
            ->first();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Education</h2>
        </div>
        <form id="education-info" action="{{ url(route('account.create', ['param' => 'education-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="degree" class="form-label">Degree*</label>
                        <input type="text" class="form-control input_text" id="degree" name="edu_degree"
                            placeholder="Enter your Degree" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->edu_degree }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="School" class="form-label">School/University Name*</label>
                        <input type="text" class="form-control input_text" id="School" name="edu_clg_name"
                            placeholder="Enter your School / College Nmae" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->edu_clg_name }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Graduation" class="form-label">Graduation Year*</label>
                        <input type="text" class="form-control input_text" id="Graduation" name="edu_graduation_year"
                            placeholder="Enter Your Graduation Year" pattern="[0-9A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->edu_graduation_year }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="major" class="form-label">Major/Field of Study*</label>
                        <input type="text" class="form-control input_text" id="major" name="edu_field"
                            placeholder="Enter your Major Field of Study" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->edu_field }}"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="gpa" class="form-label">GPA*</label>
                        <input type="text" class="form-control input_text" id="gpa" name="edu_cgpa"
                            placeholder="Enter Your GPA" pattern="[0-9A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->edu_cgpa }}"/>
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

<!--------------------------------------------- Education info --------------------------------->

<!--------------------------------------------- skills info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 5)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['skill'])
            ->first();
        
            $skills = DB::table('skills')->where('status','1')->get();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Skills and Competencies</h2>
        </div>
        <form id="skills-info" action="{{ url(route('account.create', ['param' => 'skills-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="col-md-6 mb-4">
                <div class="position-relative">
                    <label for="skills" class="form-label">Skills*</label>
                    <select class="form-select input_select" aria-label="Default select example"
                        id="skills" name="skill" required>
                        <option value="">select skills</option>
                        @foreach ($skills as $row)
                            <option value="{{ $row->id }}" @if($user_detail->skill == $row->id) selected @endif>
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

<!--------------------------------------------- skill info --------------------------------->

<!--------------------------------------------- certifications-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 6)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['certificate_name','certificate_issuing','certificate_obtn_date'])
            ->first();
    
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Certifications</h2>
        </div>
        <form id="skills-info" action="{{ url(route('account.create', ['param' => 'certifications-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Certificate" class="form-label">Certificate Name*</label>
                        <input type="text" class="form-control input_text" id="Certificate" name="certificate_name"
                            placeholder="Enter Your Certificatie Name" pattern="[0-9A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->certificate_name }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Issuing Registration*" class="form-label">Issuing Registration*</label>
                        <input type="text" class="form-control input_text" id="Issuing Registration*" name="certificate_issuing"
                            placeholder="Enter your Issuing Registration" pattern="[0-9A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->certificate_issuing }}" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Date Obtained*" class="form-label">Date Obtained*</label>
                        <input type="date" class="form-control input_text" id="Date Obtained*" name="certificate_obtn_date"
                            placeholder="Date" value="{{ $user_detail->certificate_obtn_date }}" required/>
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

<!--------------------------------------------- certifications-info --------------------------------->

<!--------------------------------------------- preferences-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 7)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['pref_title','pref_emp_type','pref_industry','pref_location','pref_salary','references'])
            ->first();

        $references_from = DB::table('references_from')->where('status','1')->get();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Availability and Preferences</h2>
        </div>
        <form id="preferences-info" action="{{ url(route('account.create', ['param' => 'preferences-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Preferred Title/Role*" class="form-label">Preferred Title/Role*</label>
                        <input type="text" class="form-control input_text" id="Preferred Title/Role*" name="pref_title"
                            placeholder="Enter Your Preferred Title" pattern="[0-9A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->pref_title }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Employment Type*" class="form-label">Employment Type*</label>
                        <input type="text" class="form-control input_text" id="Employment Type*" name="pref_emp_type"
                            placeholder="Enter your Employment Type" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->pref_emp_type }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Preferred Industry*" class="form-label">Preferred Industry*</label>
                        <input type="text" class="form-control input_text" id="Preferred Industry*" name="pref_industry"
                            placeholder="Enter Your Preferred Industry" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->pref_industry }}" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Desired Job Location*" class="form-label">Desired Job Location*</label>
                        <input type="text" class="form-control input_text" id="Desired Job Location*" name="pref_location" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->pref_location }}" placeholder="Enter your Desired Job Location" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Expected Salary*" class="form-label">Expected Salary*</label>
                        <input type="text" class="form-control input_text" id="Expected Salary*" name="pref_salary"
                            placeholder="Enter Your Expected Salary" pattern="[A-Za-z]+" minlength="3" maxlength="50" value="{{ $user_detail->pref_salary }}" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="References*" class="form-label">References*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="References*" name="references" required>
                            <option value="">Select References</option>
                            @foreach ($references_from as $row)
                                <option value="{{ $row->id }}" @if($user_detail->references == $row->id) selected @endif>
                                    {{ ucfirst($row->name) }}
                                </option>
                            @endforeach
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

<!--------------------------------------------- preferences-info --------------------------------->

<!--------------------------------------------- work-authorization-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 8)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['work_authorization_status','availability','notice_period'])
            ->first();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Work Authorization</h2>
        </div>
        <form id="work-authorization-info" action="{{ url(route('account.create', ['param' => 'work-authorization-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Legal Authorization to work status*" class="form-label">Legal
                            Authorization to work status*</label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="Legal Authorization to work status*" name="work_authorization_status" required>
                            <option value="">Select work status</option>
                            <option value="1" @if($user_detail->work_authorization_status == 1) selected @endif>Yes</option>
                            <option value="0" @if($user_detail->work_authorization_status == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Availability" class="form-label">Availability
                        </label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="Availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="1" @if($user_detail->availability == 1) selected @endif>Yes</option>
                            <option value="0" @if($user_detail->availability == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Notice Period" class="form-label">Notice Period
                        </label>
                        <select class="form-select input_select" aria-label="Default select example"
                            id="Notice Period" name="notice_period" required>
                            <option value="">Select Notice Period</option>
                            <option value="1" @if($user_detail->notice_period == 1) selected @endif>Yes</option>
                            <option value="1" @if($user_detail->notice_period == 0) selected @endif>No</option>
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

<!--------------------------------------------- work-authorization-info --------------------------------->

<!--------------------------------------------- social-media-info  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 9)

    @php
        $user_detail = DB::table('userdetails')
            ->where('user_id', Session::get('temp_user_id'))
            ->get(['linkdin','twitter','instagram','facebook','other'])
            ->first();
    @endphp

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Social Media Links</h2>
        </div>
        <form id="social-media-info" action="{{ url(route('account.create', ['param' => 'social-media-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Linkdin" class="form-label">Linkdin</label>
                        <input type="url" class="form-control input_text" id="Linkdin" name="linkdin"
                            placeholder="Enter Your Linkdn URL" value="{{ $user_detail->linkdin }}" name="linkdin" required/>
                        <img src="images/linkedin.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Twitter" class="form-label">Twitter</label>
                        <input type="url" class="form-control input_text" id="Twitter" name="twitter"
                            placeholder="Enter Your Twitter URL" value="{{ $user_detail->twitter }}" name="twitter" required/>
                        <img src="images/x.png" alt="" class="input_icon"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Instagram" class="form-label">Instagram</label>
                        <input type="url" class="form-control input_text" id="Instagram"
                        placeholder="Enter Your Instagram URL" value="{{ $user_detail->instagram }}" name="instagram" required>
                        <img src="images/instagram.png" alt="" class="input_icon"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Facebook" class="form-label">Facebook</label>
                        <input type="url" class="form-control input_text" id="Facebook"
                            placeholder="Enter Your Facebook URL" value="{{ $user_detail->facebook }}" name="facebook" required/>
                        <img src="images/facebook.png" alt="" class="input_icon"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="others" class="form-label">others</label>
                        <input type="url" class="form-control input_text" id="others"
                        placeholder="Enter Your Others URL" value="{{ $user_detail->other }}" name="other" required/>
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

<!--------------------------------------------- social-media-info --------------------------------->

<!--------------------------------------------- Proceeding  --------------------------------->

@if (!Session::has('step') || Session::get('step') == 10)

    <div class="register_width">
        <div class="heading mb-4">
            <h2>Proceeding</h2>
        </div>
        <form id="proceeding-info" action="{{ url(route('account.create', ['param' => 'proceeding-info'])) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
        @csrf
            <img class="prroceed_icons" src="/assets/images/file-check.png" alt="file check" />
            <p>
                Manalot will validate/ review the documents and <br />
                grant permisssion to proceed through Admin
            </p>
            <div>
                <div class="purple_btn text-start">
                    <button type="submit" class="text-decoration-none text-white">Proceed To Review</button>
                </div>
            </div>
        </form>
    </div>
@endif

<!--------------------------------------------- social-media-info --------------------------------->