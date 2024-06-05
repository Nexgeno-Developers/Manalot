@php
    $state= DB::table('states')->where('id', $usersdetails->state)->first();
@endphp
@php
    $country= DB::table('countries')->where('id', $usersdetails->country)->first();
@endphp
@php
    $job_title= DB::table('job_title')->where('id', $usersdetails->job_title)->first();
@endphp
@php
    $industry= DB::table('industry')->where('id', $usersdetails->industry)->first();
@endphp
@php
    $years_of_exp= DB::table('years_of_exp')->where('id', $usersdetails->years_of_exp)->first();
@endphp
    <div class="row">
        <h3>User Register Form Step 1</h3>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Username : </b> <span>{{ $viewuser->username }}</span>
            </div>
        </div>        
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Email : </b> <span>{{ $viewuser->email }}</span>
            </div>
        </div>
        <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Phone Number : </b> <span>{{ $usersdetails->phone_number }}</span>
                </div>
        </div> 
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Uploaded Resume CV : </b> 
                <a target="_blank" href="{{ asset('storage/' . $usersdetails->resume_cv) }}" class="btn btn-success">View CV</a>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Status : </b><span>{{ $viewuser->status == 1 ? 'Active' : 'Inactive' }}</span>
            </div>
        </div>
    </div>

    @if(!empty($usersdetails))

    <hr class="mb-4">

        <div class="row">
            <h3>Personal Information</h3>
           {{-- <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>ID : </b> <span>{{ $usersdetails->id }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Username ID : </b> <span>{{ $usersdetails->user_id  }}</span>
                </div>
            </div>  --}}    
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>First name : </b> <p>{{ $usersdetails->first_name }}</p>
                </div>
            </div>        
            {{-- <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Middle name : </b> <span>{{ $usersdetails->middle_name }}</span>
                </div>
            </div> --}}      
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Last name : </b> <p>{{ $usersdetails->last_name }}</p>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Profile Photo : </b> <img style="width:20vw;" src="{{ asset('storage/' . $usersdetails->profile_photo) }}">
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Gender : </b> 
                    
                    <p>@if($usersdetails->gender == 1) Male  @elseif($usersdetails->gender == 2) Female @elseif($usersdetails->gender == 3) Other @endif </p>
                </div>
            </div>   
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>DOB : </b> <p>{{ $usersdetails->dob }}</p>              
                </div>
            </div>       
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Email : </b> <p>{{ $viewuser->email }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Phone Number : </b> <p>{{ $usersdetails->phone_number }}</p>
                    </div>
            </div>       
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Address : </b> <p>{{ $usersdetails->address }}</p>                
                </div>
            </div>        

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>State : </b> 
                    <p>{{ $state->name }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>City : </b> <span>{{ $usersdetails->city }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Pincode : </b> <span>{{ $usersdetails->pincode }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Country : </b> <span>{{ $country->name }}</span>
                </div>
            </div>
        </div>

        <hr class="mb-4">

        <div class="row">
        <h3>Work Experience</h3>
        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Job Title : </b> <span>{{ $job_title->name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Industry : </b> <span>{{ $industry->name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Experience Status : </b> <p>{{ $usersdetails->experience_Status }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp Title : </b> <p>{{ $usersdetails->wrk_exp__title }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp Company Name : </b> <p>{{ $usersdetails->wrk_exp_company_name }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp In Year : </b> <p>{{ $usersdetails->wrk_exp_years }}</p>
                </div>
            </div>            
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Responsibility : </b> <span>{{ $usersdetails->wrk_exp_responsibilities }}</span>
                </div>
            </div>
        </div>

        <hr class="mb-4">

        <div class="row">
        <h3>Education</h3>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education Degree : </b> <span>{{ $usersdetails->edu_degree }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>School/University Name : </b> <span>{{ $usersdetails->edu_clg_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Graduation Year : </b> <span>{{ $usersdetails->edu_graduation_year }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education Field : </b> <span>{{ $usersdetails->edu_field }}</span>
                </div>
            </div>            
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education GPA : </b> <span>{{ $usersdetails->edu_cgpa }}</span>
                </div>
            </div>

            <hr class="mb-4">

            <div class="row">
            <h3>Skills and Competencies</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Skill : </b> <span>{{ $usersdetails->skill }}</span>
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <div class="row">
            <h3>Certifications</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Name : </b> <span>{{ $usersdetails->certificate_name }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Issuing : </b> <span>{{ $usersdetails->certificate_issuing }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Obtain Date : </b> <span>{{ $usersdetails->certificate_obtn_date }}</span>
                    </div>
                </div>
            </div>
            
            <hr class="mb-4">

            <div class="row">
                <h3>Availability and Preferences</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Preferred Title/Role : </b> <span>{{ $usersdetails->pref_title }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Employment Type : </b> <span>{{ $usersdetails->pref_emp_type }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Prefer Industry : </b> <span>{{ $usersdetails->pref_industry }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Desired Job Location : </b> <span>{{ $usersdetails->pref_location }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Expected Salary : </b> <span>{{ $usersdetails->pref_salary }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>References : </b> <span>{{ $usersdetails->references }}</span>
                    </div>
                </div>
            </div>
                
            <hr class="mb-4">

            <div class="row">
            <h3>Work Authorization</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Legal Authorization to work status : </b> <span>{{ $usersdetails->work_authorization_status }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Availability : </b> <span>{{ $usersdetails->availability }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Notice Period : </b> <span>{{ $usersdetails->notice_period }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Social Media Links</h3>            
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Linkdin : </b> <span>{{ $usersdetails->linkdin }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Twitter : </b> <span>{{ $usersdetails->twitter }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Instagram: </b> <span>{{ $usersdetails->instagram }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Facebook : </b> <span>{{ $usersdetails->facebook }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Other : </b> <span>{{ $usersdetails->other }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif