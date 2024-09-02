@php
    // $job_title= DB::table('job_title')->where('id', $usersdetails->job_title)->first();

    // $industry= DB::table('industry')->where('id', $usersdetails->industry)->first();

    $years_of_exp= DB::table('years_of_exp')->where('id', $usersdetails->wrk_exp_years)->first();

    // $experience_status= DB::table('experience_status')->where('id', $usersdetails->experience_Status)->first();

    $skills= DB::table('skills')->get();

    // $references_from= DB::table('references_from')->where('id', $usersdetails->references)->first();

    $references_data = json_decode($usersdetails->references, true);
    
    $certificate_data = json_decode($usersdetails->certificate_data, true);  
@endphp

<style>
    p {
        margin-bottom: 10px;
    }

    h3 {
        font-size: 20px;
    }
</style>

    <div class="row">
        <h3>User Register</h3>
        <div class="col-sm-3">
            <div class="d-flex form-group gap-2">
                <b>Username : </b> <p>{{ $viewuser->username }}</p>
            </div>
        </div>        
        <div class="col-sm-3">
            <div class="d-flex form-group gap-2">
                <b>Email : </b> <p>{{ $viewuser->email }}</p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="d-flex form-group gap-2">
                <b>Phone Number : </b> <p>{{ $usersdetails->phone_number }}</p>
            </div>
        </div> 
        <div class="col-sm-3">
            <div class="d-flex form-group gap-2">
                <b>Status : </b><p>{{ $viewuser->status == 1 ? 'Active' : 'Suspended' }}</p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="d-flex form-group gap-2">
                <b>Uploaded Resume CV : </b>
                @if(!is_null($usersdetails->resume_cv) && !empty($usersdetails->resume_cv))
                    @if (strpos($usersdetails->resume_cv, 'my.sharepoint.com') !== false)
                        <a target="_blank" href="{{ $usersdetails->resume_cv }}" class="btn btn-success main_button" target="_blank">View CV</a>
                    @else
                        <a target="_blank" href="{{ asset('storage/' . $usersdetails->resume_cv) }}" class="btn btn-success main_button" target="_blank">View CV</a>
                    @endif
                @endif
            </div>
        </div>
    </div>

    @if(!empty($usersdetails))

    <hr class="mb-3">

        <div class="row">
            <h3>Personal Information</h3>
 
            <div class="col-sm-5">
                <div class="d-flex form-group gap-2">
                    <b>Full name : </b> <p>{{ $usersdetails->fullname }}</p>
                </div>
            </div>   
            <div class="col-sm-2">
                <div class="d-flex form-group gap-2">
                    <b>Gender : </b> 
                    
                    <p>@if($usersdetails->gender == 1) Male  @elseif($usersdetails->gender == 2) Female @elseif($usersdetails->gender == 3) Other @endif </p>
                </div>
            </div>     
            <div class="col-sm-2">
                <div class="d-flex form-group gap-2">
                    <b>DOB : </b> <p>{{ datetimeFormatter_2($usersdetails->dob) }}</p>              
                </div>
            </div> 
            <div class="col-sm-3">
                <div class="d-flex form-group gap-2">
                    <b>Pincode : </b> <p>{{ $usersdetails->pincode }}</p>
                </div>
            </div>   
            <div class="col-sm-5">
                <div class="d-flex form-group gap-2">
                    <b>Address&nbsp;: </b> <p>{{ $usersdetails->address }}</p>                
                </div>
            </div>   
            <div class="col-sm-2">
                <div class="d-flex form-group gap-2">
                    <b>City : </b> <p>{{ $usersdetails->city }}</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex form-group gap-2">
                    <b>Country : </b> <p>{{ $usersdetails->country }}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="d-flex form-group gap-2">
                    <b>State : </b> 
                    <p>{{ $usersdetails->state }}</p>
                </div>
            </div>
              
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <b>Profile Photo : </b> <img style="width:20vw;" src="{{ asset('storage/' . $usersdetails->profile_photo) }}">
                </div>
            </div>    
   
        </div>

        <hr class="mb-3">

        <div class="row">
        <h3>Work Experience</h3>
            <div class="col-sm-4">
                <div class="d-flex form-group gap-2">
                    <b>Profesional Title : </b> <p>{{ $usersdetails->wrk_exp__title }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="d-flex form-group gap-2">
                    <b>Company Name : </b> <p>{{ $usersdetails->wrk_exp_company_name }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="d-flex form-group gap-2">
                    <b>Work Exp In Year : </b> <p>{{ $years_of_exp->year_range }}</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Industry : </b>
                    @if(!is_null($usersdetails->industry) && !empty($usersdetails->industry))
                        @php 
                            $industry =  json_decode($usersdetails->industry, true); 
                        @endphp
                        @if(count($industry) != 0)
                            @foreach ($industry as $row)

                                @php 
                                    $industry_name =  DB::table('industry')->where('id', $row)->first(['name', 'sub_parent_id', 'main_partent_id', 'main']);
                                @endphp

                                @if($industry_name->main_partent_id != 0)
                                    @php 
                                        $main_industry_name =  DB::table('industry')->where('id', $industry_name->main_partent_id)->value('name');
                                    @endphp
                                    <p class="" style="color: #024487;">{{ $main_industry_name }}</p>
                                    <p class="" style="color: #bb47a3 ;"><b>{{ $industry_name->name }}</b></p>
                                @elseif($industry_name->sub_parent_id != 0)
                                    <p>{{ $industry_name->name }}</p>
                                @endif

                            @endforeach
                        @endif
                    @endif
                </div>
            </div>  
            
                <div class="row">
                <h3>Skills and Competencies</h3>
                    <div class="col-12 mb-3">
                        <div id="list-industry" class="form-group mb-3">
                            <b>Skill : </b> <br>
                            @if(!is_null($usersdetails->skill) && !empty($usersdetails->skill))
                                @php $skills = json_decode($usersdetails->skill, true); @endphp
                                @foreach ($skills as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>    

            <div class="col-sm-4">
                <div class="d-flex form-group gap-2">
                    <b>Work Responsibility : </b> <p>{{ $usersdetails->wrk_exp_responsibilities }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="d-flex form-group gap-2">
                    <b>Currently Employed : </b> <p>{{ $usersdetails->employed }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Uploaded Experience Letter : </b> 
                    @if(!is_null($usersdetails->experience_letter) && !empty($usersdetails->experience_letter))
                        @if (strpos($usersdetails->experience_letter, 'my.sharepoint.com') !== false)
                            <a target="_blank" href="{{ $usersdetails->experience_letter }}" class="btn btn-success main_button" target="_blank">View Experience Letter</a>
                        @else
                            <a target="_blank" href="{{ asset('storage/' . $usersdetails->experience_letter) }}" class="btn btn-success main_button" target="_blank">View Experience Letter</a>
                        @endif

                    @endif
                </div>
            </div>
        </div>

        <hr class="mb-3">

        <div class="row">
        <h3>Education</h3>
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <b>School/University Name : </b> <p>{{ $usersdetails->edu_clg_name }}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <b>Education Degree : </b> <p>{{ $usersdetails->edu_degree }}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <b>Graduation Year : </b> <p>{{ $usersdetails->edu_graduation_year }}</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <b>Education Field : </b> <p>{{ $usersdetails->edu_field }}</p>
                </div>
            </div>   

            @if (!empty($certificate_data))
                <div class="row">
                    <h3>Certifications</h3>

                    @foreach($certificate_data as $index => $certificate)
                        <div class="col-sm-1">
                            <h5 class="mt5">{{ $index + 1 }}</h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <b>Certificate Name : </b> <p>{{ $certificate['certificate_name'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <b>Certificate Issuing : </b> <p>{{ $certificate['certificate_issuing'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb-3">
                                <b>Certificate Obtain Date : </b> <p>{{ $certificate['certificate_obtn_date'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <hr class="mb-3">

            <div class="row mb-3">
                <h3>Availability and Preferences</h3>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Preferred Title/Role : </b> <p>{{ $usersdetails->pref_title }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Employment Type : </b> <p>{{ $usersdetails->pref_emp_type }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Prefer Industry : </b>
                        @if(!is_null($usersdetails->pref_industry) && !empty($usersdetails->pref_industry))
                            @php $pref_industry = json_decode($usersdetails->pref_industry, true); @endphp
                            @if(count($pref_industry) != 0)
                                @foreach ($pref_industry as $row)

                                    @php 
                                        $industry_name =  DB::table('industry')->where('id', $row)->first(['name', 'sub_parent_id', 'main_partent_id', 'main']);
                                    @endphp

                                    @if($industry_name->main_partent_id != 0)
                                        @php 
                                            $main_industry_name =  DB::table('industry')->where('id', $industry_name->main_partent_id)->value('name');
                                        @endphp
                                        <p class="text-primary">{{ $main_industry_name }}</p>
                                        <p class="text-warning"><b>{{ $industry_name->name }}</b></p>
                                    @elseif($industry_name->sub_parent_id != 0)
                                        <p>{{ $industry_name->name }}</p>
                                    @endif

                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Desired Job Location : </b> <p>{{ $usersdetails->pref_location }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Expected Salary : </b> <p>{{ $usersdetails->pref_salary }}</p>
                    </div>
                </div>

            </div>

            <div class="row mb-3">
                @if (!empty($references_data))
                    <h3>Reference</h3>
                    @foreach($references_data as $index => $reference)
                        <div class="row reference-row">
                            <div class="col-sm-1">
                                <h5 class="mt5">{{ $index + 1 }}</h5>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex form-group gap-2">
                                    <b>Reference Name : </b> <p>{{ $reference['reference_name'] }}</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex form-group gap-2">
                                    <b>Reference Phone : </b> <p>{{ $reference['reference_phone'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                @endif
            </div>

            <div class="row mb-3">
                <h3>Work Authorization</h3>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Legal Authorization to work status : </b> 
                        <p>@if($usersdetails->work_authorization_status == 1) Yes  @elseif($usersdetails->work_authorization_status == 0) No @endif </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Availability : </b> 
                        <p>@if($usersdetails->availability == 1) Yes  @elseif($usersdetails->availability == 0) No @endif</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex form-group gap-2">
                        <b>Notice Period : </b>
                        <p>@if($usersdetails->notice_period == 1) Yes  @elseif($usersdetails->notice_period == 0) No @endif </p>
                    </div>
                </div>
            </div>

            <hr class="mb-3">
            
            <div class="row">
                <h3>Social Media Links</h3>            
                <div class="col-sm-3">
                    <div class="d-flex form-group gap-2">
                        <b>Linkdin : </b> <p>{{ $usersdetails->linkdin }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex form-group gap-2">
                        <b>Twitter : </b> <p>{{ $usersdetails->twitter }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex form-group gap-2">
                        <b>Instagram: </b> <p>{{ $usersdetails->instagram }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex form-group gap-2">
                        <b>Facebook : </b> <p>{{ $usersdetails->facebook }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="d-flex form-group gap-2">
                        <b>Other : </b> <p>{{ $usersdetails->other }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif