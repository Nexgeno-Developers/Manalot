
<!--------------------------------------------- user info --------------------------------->

@if (!Session::has('step') || Session::get('step') == 1)

    <div id="user-add-details" class="register_width">
        <div class="heading mb-4">
            <h2>Register</h2>
        </div>

        @php
            session()->forget('step');
            Session()->put('step', 1);
        @endphp

        <form id="user-info" action="{{ url(route('account.create', ['param' => 'user-info'])) }}" class="d-flex gap-4 flex-column">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control input_text" id="name" name="name"
                            placeholder="Enter Your Name" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input_text" id="email" name="email"
                            placeholder="Enter Your email" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control input_text" id="password" name="password"
                            placeholder="Enter your Password" required/>
                        <img src="images/key.png" alt="" class="input_icon" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="number" class="form-control input_text" id="Phone" name="phone"
                            placeholder="Enter your Phone Number" required/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="Employee" class="form-label">Employee Status</label>
                        <select class="form-select input_select" aria-label="Default select example" name="employee" id="Employee" required> 
                            <option value="">Select Employee Status</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative">
                        <label for="formFile" class="form-label">Upload Resume</label>
                        <input class="form-control" type="file" id="formFile" name="resume" required/>
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