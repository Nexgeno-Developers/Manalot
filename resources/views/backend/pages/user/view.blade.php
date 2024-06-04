
    <div class="row">
        <h2>User Form Detail</h2>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <h3>Username : </h3> <span>{{ $viewuser->username }}</span>
            </div>
        </div>        
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <h3>Email : </h3> <span>{{ $viewuser->email }}</span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <h3>Status : </h3><span>{{ $viewuser->status == 1 ? 'Active' : 'Inactive' }}</span>
            </div>
        </div>
    </div>

    @if(!empty($usersdetails))

    <hr class="mb-4">

        <div class="row">
            <h2>UserDetails Form Detail</h2>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>ID : </h3> <span>{{ $usersdetails->id }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Username ID : </h3> <span>{{ $usersdetails->user_id  }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>First name : </h3> <span>{{ $usersdetails->first_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Middle name : </h3> <span>{{ $usersdetails->middle_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Last name : </h3> <span>{{ $usersdetails->last_name }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Profile Photo : </h3> <img>{{ $usersdetails->profile_photo }}</img>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Gender : </h3> <span>{{ $usersdetails->gender }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Phone Number : </h3> <span>{{ $usersdetails->phone_number }}</span>
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>DOB : </h3> <span>{{ $usersdetails->dob }}</span>              
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Address : </h3> <span>{{ $usersdetails->address }}</span>                
                </div>
            </div>        
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>State : </h3> <span>{{ $usersdetails->state }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>City : </h3> <span>{{ $usersdetails->city }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Pincode : </h3> <span>{{ $usersdetails->pincode }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Country : </h3> <span>{{ $usersdetails->country }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Resume Cv : </h3> <span>{{ $usersdetails->resume_cv }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Job Title : </h3> <span>{{ $usersdetails->resume_cv }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Industry : </h3> <span>{{ $usersdetails->industry }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Experience Status : </h3> <span>{{ $usersdetails->experience_Status }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Work Exp Title : </h3> <span>{{ $usersdetails->wrk_exp__title }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Work Exp Company Name : </h3> <span>{{ $usersdetails->wrk_exp_company_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Work Exp In Year : </h3> <span>{{ $usersdetails->wrk_exp_years }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Education Degree : </h3> <span>{{ $usersdetails->edu_degree }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Education College Name : </h3> <span>{{ $usersdetails->edu_clg_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Work Responsibility : </h3> <span>{{ $usersdetails->wrk_exp_responsibilities }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Graduation Year : </h3> <span>{{ $usersdetails->edu_graduation_year }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Education Field : </h3> <span>{{ $usersdetails->edu_field }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Education CGPA : </h3> <span>{{ $usersdetails->edu_cgpa }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Skill : </h3> <span>{{ $usersdetails->skill }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Certificate Name : </h3> <span>{{ $usersdetails->certificate_name }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Certificate Issuing : </h3> <span>{{ $usersdetails->certificate_issuing }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Certificate Obtain Date : </h3> <span>{{ $usersdetails->certificate_obtn_date }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Title : </h3> <span>{{ $usersdetails->pref_title }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Employee Type : </h3> <span>{{ $usersdetails->pref_emp_type }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Industry : </h3> <span>{{ $usersdetails->pref_industry }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Location : </h3> <span>{{ $usersdetails->pref_location }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Salary : </h3> <span>{{ $usersdetails->pref_salary }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Prefer Salary : </h3> <span>{{ $usersdetails->references }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Work Authorization Status : </h3> <span>{{ $usersdetails->work_authorization_status }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Availability : </h3> <span>{{ $usersdetails->availability }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Notice Period : </h3> <span>{{ $usersdetails->notice_period }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Linkdin : </h3> <span>{{ $usersdetails->linkdin }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Twitter : </h3> <span>{{ $usersdetails->twitter }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Instagram: </h3> <span>{{ $usersdetails->instagram }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Facebook : </h3> <span>{{ $usersdetails->facebook }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <h3>Other : </h3> <span>{{ $usersdetails->other }}</span>
                </div>
            </div>
        </div>
    @endif