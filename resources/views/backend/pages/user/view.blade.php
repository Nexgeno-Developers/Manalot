@php
    $state= DB::table('states')->where('id', $usersdetails->state)->first();

    $country= DB::table('countries')->where('id', $usersdetails->country)->first();

    $job_title= DB::table('job_title')->where('id', $usersdetails->job_title)->first();

    $industry= DB::table('industry')->where('id', $usersdetails->industry)->first();

    $years_of_exp= DB::table('years_of_exp')->where('id', $usersdetails->wrk_exp_years)->first();

    $experience_status= DB::table('experience_status')->where('id', $usersdetails->experience_Status)->first();

    $skills= DB::table('skills')->where('id', $usersdetails->skill)->first();

    $references_from= DB::table('references_from')->where('id', $usersdetails->references)->first();

    $references_data = json_decode($usersdetails->references, true);

    $certificate_data = json_decode($usersdetails->certificate_data, true);  
@endphp

    <div class="row">
        <h3>User Register Form Step 1</h3>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Username : </b> <p>{{ $viewuser->username }}</p>
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
                <b>Uploaded Resume CV : </b> 
                <a target="_blank" href="{{ asset('storage/' . $usersdetails->resume_cv) }}" class="btn btn-success main_button">View CV</a>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <b>Status : </b><p>{{ $viewuser->status == 1 ? 'Active' : 'Suspended' }}</p>
            </div>
        </div>
    </div>

    @if(!empty($usersdetails))

    <hr class="mb-4">

        <div class="row">
            <h3>Personal Information</h3>
           {{-- <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>ID : </b> <p>{{ $usersdetails->id }}</p>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Username ID : </b> <p>{{ $usersdetails->user_id  }}</p>
                </div>
            </div>  --}}    
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Full name : </b> <p>{{ $usersdetails->fullname }}</p>
                </div>
            </div>  
            {{--<div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>First name : </b> <p>{{ $usersdetails->first_name }}</p>
                </div>
            </div>        
             <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Middle name : </b> <p>{{ $usersdetails->middle_name }}</p>
                </div>
            </div>      
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Last name : </b> <p>{{ $usersdetails->last_name }}</p>
                </div>
            </div>     --}}    
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Gender : </b> 
                    
                    <p>@if($usersdetails->gender == 1) Male  @elseif($usersdetails->gender == 2) Female @elseif($usersdetails->gender == 3) Other @endif </p>
                </div>
            </div>   
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Profile Photo : </b> <img style="width:20vw;" src="{{ asset('storage/' . $usersdetails->profile_photo) }}">
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>DOB : </b> <p>{{ $usersdetails->dob }}</p>              
                </div>
            </div>       
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Pincode : </b> <p>{{ $usersdetails->pincode }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>City : </b> <p>{{ $usersdetails->city }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Country : </b> <p>{{ $country->name }}</p>
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
                    <b>Address : </b> <p>{{ $usersdetails->address }}</p>                
                </div>
            </div>
            {{--
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
            --}}
   

            
        </div>

        <hr class="mb-4">

        <div class="row">
        <h3>Work Experience</h3>
        {{--
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Job Title : </b> <p>{{ $job_title->name }}</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Experience Status : </b> <p>{{ $experience_status->name }}</p>
                </div>
            </div>
            --}}
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Profesional Title : </b> <p>{{ $usersdetails->wrk_exp__title }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Company Name : </b> <p>{{ $usersdetails->wrk_exp_company_name }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp In Year : </b> <p>{{ $years_of_exp->year_range }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Industry : </b> <p>{{ $industry->name }}</p>
                </div>
            </div>  
            
            @isset($skills->name)
                <div class="row">
                <h3>Skills and Competencies</h3>
                    <div class="col-sm-4">
                        <div class="form-group mb-3">
                            <b>Skill : </b> <p>{{ $skills->name }}</p>
                        </div>
                    </div>
                </div>
            @endisset    

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Responsibility : </b> <p>{{ $usersdetails->wrk_exp_responsibilities }}</p>
                </div>
            </div>
        </div>

        <hr class="mb-4">

        <div class="row">
        <h3>Education</h3>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>School/University Name : </b> <p>{{ $usersdetails->edu_clg_name }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education Degree : </b> <p>{{ $usersdetails->edu_degree }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Graduation Year : </b> <p>{{ $usersdetails->edu_graduation_year }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education Field : </b> <p>{{ $usersdetails->edu_field }}</p>
                </div>
            </div>   
            {{--       
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education GPA : </b> <p>{{ $usersdetails->edu_cgpa }}</p>
                </div>
            </div>
            --}}    

      
{{--
            <div class="row">
            <h3>Certifications</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Name : </b> <p>{{ $usersdetails->certificate_name }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Obtain Date : </b> <p>{{ $usersdetails->certificate_obtn_date }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Certificate Issuing : </b> <p>{{ $usersdetails->certificate_issuing }}</p>
                    </div>
                </div>
            </div>
            --}}
            @if (!empty($certificate_data))
                <div class="row">
                <h3>Certifications</h3>
                    @foreach($certificate_data as $index => $certificate)
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <b>Certificate Name : </b> <p>{{ $certificate['certificate_name'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <b>Certificate Obtain Date : </b> <p>{{ $certificate['certificate_obtn_date'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <b>Certificate Issuing : </b> <p>{{ $certificate['certificate_issuing'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <hr class="mb-4">

            <div class="row">
                <h3>Availability and Preferences</h3>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Preferred Title/Role : </b> <p>{{ $usersdetails->pref_title }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Employment Type : </b> <p>{{ $usersdetails->pref_emp_type }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Prefer Industry : </b> <p>{{ $usersdetails->pref_industry }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Desired Job Location : </b> <p>{{ $usersdetails->pref_location }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Expected Salary : </b> <p>{{ $usersdetails->pref_salary }}</p>
                    </div>
                </div>

                @if (!empty($references_data))
                    @foreach($references_data as $index => $reference)
                        <div class="row reference-row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <b>Reference Name : </b> <p>{{ $reference['reference_name'] }}</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <b>Reference Phone : </b> <p>{{ $reference['reference_phone'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{--
                @isset($references)
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>References :</b>
                        <div class="d-flex">
                            @foreach($references as $key => $value)
                            <div class="mx-3">
                                <b>{{ ucfirst($key) }}: </b> <p>{{ $value }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endisset
                --}}

                {{--
                @isset($references_from->name)
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>References : </b> <p>{{ $references_from->name }}</p>
                    </div>
                </div>
                @endisset
                --}}
            </div>

            <div class="row">
            <h3>Work Authorization</h3>
            
           
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Legal Authorization to work status : </b> 
                        <p>@if($usersdetails->work_authorization_status == 1) Yes  @elseif($usersdetails->work_authorization_status == 0) No @endif </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Availability : </b> 
                        <p>@if($usersdetails->availability == 1) Yes  @elseif($usersdetails->availability == 0) No @endif</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Notice Period : </b>
                        <p>@if($usersdetails->notice_period == 1) Yes  @elseif($usersdetails->notice_period == 0) No @endif </p>
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            
            <div class="row">
                <h3>Social Media Links</h3>            
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Linkdin : </b> <p>{{ $usersdetails->linkdin }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Twitter : </b> <p>{{ $usersdetails->twitter }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Instagram: </b> <p>{{ $usersdetails->instagram }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Facebook : </b> <p>{{ $usersdetails->facebook }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3">
                        <b>Other : </b> <p>{{ $usersdetails->other }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif