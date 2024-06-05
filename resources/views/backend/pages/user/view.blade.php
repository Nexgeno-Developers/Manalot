
    <div class="row">
        <h2>User Form Detail</h2>
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
                <b>Status : </b><span>{{ $viewuser->status == 1 ? 'Active' : 'Inactive' }}</span>
            </div>
        </div>
    </div>

    @if(!empty($usersdetails))

    <hr class="mb-4">

        <div class="row">
            <h2>UserDetails Form Detail</h2>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>ID : </b> <span>{{ $usersdetails->id }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Username ID : </b> <span>{{ $usersdetails->user_id  }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>First name : </b> <span>{{ $usersdetails->first_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Middle name : </b> <span>{{ $usersdetails->middle_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Last name : </b> <span>{{ $usersdetails->last_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Profile Photo : </b> <img>{{ $usersdetails->profile_photo }}</img>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Gender : </b> <span>{{ $usersdetails->gender }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Phone Number : </b> <span>{{ $usersdetails->phone_number }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>DOB : </b> <span>{{ $usersdetails->dob }}</span>              
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Address : </b> <span>{{ $usersdetails->address }}</span>                
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>State : </b> <span>{{ $usersdetails->state }}</span>
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
                    <b>Country : </b> <span>{{ $usersdetails->country }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Resume Cv : </b> <span>{{ $usersdetails->resume_cv }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Job Title : </b> <span>{{ $usersdetails->resume_cv }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Industry : </b> <span>{{ $usersdetails->industry }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Experience Status : </b> <span>{{ $usersdetails->experience_Status }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp Title : </b> <span>{{ $usersdetails->wrk_exp__title }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp Company Name : </b> <span>{{ $usersdetails->wrk_exp_company_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Exp In Year : </b> <span>{{ $usersdetails->wrk_exp_years }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education Degree : </b> <span>{{ $usersdetails->edu_degree }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Education College Name : </b> <span>{{ $usersdetails->edu_clg_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Responsibility : </b> <span>{{ $usersdetails->wrk_exp_responsibilities }}</span>
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
                    <b>Education CGPA : </b> <span>{{ $usersdetails->edu_cgpa }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Skill : </b> <span>{{ $usersdetails->skill }}</span>
                </div>
            </div>
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
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Title : </b> <span>{{ $usersdetails->pref_title }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Employee Type : </b> <span>{{ $usersdetails->pref_emp_type }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Industry : </b> <span>{{ $usersdetails->pref_industry }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Location : </b> <span>{{ $usersdetails->pref_location }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Salary : </b> <span>{{ $usersdetails->pref_salary }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Prefer Salary : </b> <span>{{ $usersdetails->references }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <b>Work Authorization Status : </b> <span>{{ $usersdetails->work_authorization_status }}</span>
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
    @endif