@extends('frontend.layouts.app')

<!----------========================== edit profile ============----------->

<section class="pb-5 mt80">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 pe-5">
                <aside class="left_sidebar">
                    <ul class="profile_tabs list-unstyled d-flex flex-column">
                        <li>
                            <a href="#personal-information" class="text-decoration-none inherit active">
                                Personal Information
                            </a>
                        </li>
                        <li>
                            <a href="#change-password" class="text-decoration-none inherit">
                                Change Password
                            </a>
                        </li>
                        <li>
                            <a href="#work-experience" class="text-decoration-none inherit">
                                Work Experience
                            </a>
                        </li>
                        <li>
                            <a href="#education" class="text-decoration-none inherit">
                                Education
                            </a>
                        </li>
                        <li>
                            <a href="#skills-competencies" class="text-decoration-none inherit">
                                Skills & Competencies
                            </a>
                        </li>
                        <li>
                            <a href="#certificate" class="text-decoration-none inherit">
                                Certifications
                            </a>
                        </li>
                        <li>
                            <a href="#availability-preferences" class="text-decoration-none inherit">
                                Availability & Preferences
                            </a>
                        </li>
                        <li>
                            <a href="#work-authorization" class="text-decoration-none inherit">
                                Work Authorization
                            </a>
                        </li>
                        <li>
                            <a href="#social-media" class="text-decoration-none inherit">
                                Social Media
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <!-- Profile Information -->
                <div class="" id="personal-information">
                    <div class="heading mb-4">
                        <h2>Personal Information</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="first_name" class="form-label">First Name*</label>
                                    <input type="text" class="form-control input_text" id="first_name"
                                        placeholder="jhone" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="last_name" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control input_text" id="last_name"
                                        placeholder="deo" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="formFile" class="form-label">Profile Photo</label>
                                    <input class="form-control" type="file" id="formFile" />
                                    <img src="/assets/images/file.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Gender" class="form-label">Gender*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Gender">
                                        <option selected>Male</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Date" class="form-label">Date of Birth*</label>
                                    <input type="date" class="form-control input_text" id="Date"
                                        placeholder="Date" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="email" class="form-label">Email Address*</label>
                                    <input type="email" class="form-control input_text" id="email"
                                        placeholder="johndeo@gmail.com" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Phone" class="form-label">Phone*</label>
                                    <input type="number" class="form-control input_text" id="Phone"
                                        placeholder="9876543210" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="address" class="form-label">Address*</label>
                                    <input type="text" class="form-control input_text" id="address"
                                        placeholder="407, Avighna Park, Malad" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="city" class="form-label">City*</label>
                                    <input type="text" class="form-control input_text" id="city"
                                        placeholder="Mumbai" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="State" class="form-label">State*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="State">
                                        <option selected>Maharashtra</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="zip_code" class="form-label">Zip/Postal Code*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="zip_code">
                                        <option selected>400070</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Employee" class="form-label">Country*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Employee">
                                        <option selected>India</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Change Password -->
                <div class="mt-5" id="change-password">
                    <div class="heading mb-4">
                        <h2>Change Password</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="password" class="form-label">Password*</label>
                                    <input type="password" class="form-control input_text" id="password"
                                        placeholder="**********" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Confirm Password" class="form-label">Confirm Password*</label>
                                    <input type="password" class="form-control input_text" id="Confirm Password"
                                        placeholder="*********" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Work Experience -->
                <div class="mt-5" id="work-experience">
                    <div class="heading mb-4">
                        <h2>Personal Information</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="formFile" class="form-label">Resume/CV*</label>
                                    <input class="form-control" type="file" id="formFile" />
                                    <img src="/assets/images/file.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="job" class="form-label">Job Title*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="job">
                                        <option selected>UI/UX Designer</option>
                                        <option value="1">Designer</option>
                                        <option value="2">Designer</option>
                                        <option value="3">Designer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="industry" class="form-label">Industry*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="industry">
                                        <option selected>Web Design</option>
                                        <option value="1">Web</option>
                                        <option value="2">Web</option>
                                        <option value="3">Web</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <div class="heading mt-4 mb-4">
                                    <h2>Work Experience</h2>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="job_title" class="form-label">Job Title*</label>
                                    <input type="text" class="form-control input_text" id="job_title"
                                        placeholder="UI/UX Designer" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="company" class="form-label">Company Name*</label>
                                    <input type="text" class="form-control input_text" id="company"
                                        placeholder="Nexgeno Technology Pvt Ltd" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="State" class="form-label">Years of Experience</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="State">
                                        <option selected>5-7 Yrs</option>
                                        <option value="1">5-7 Yrs</option>
                                        <option value="2">5-7 Yrs</option>
                                        <option value="3">5-7 Yrs</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p>Responsibilities/Achievements</p>
                                <p class="mb-5">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit
                                    esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                    sint occaecat cupidatat
                                </p>
                            </div>
                            <hr />
                        </div>
                    </form>
                </div>
                <!-- Education -->
                <div class="mt-5" id="education">
                    <div class="heading mb-4">
                        <h2>Education</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="degree" class="form-label">Degree*</label>
                                    <input type="text" class="form-control input_text" id="degree"
                                        placeholder="BSc in Design" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="School" class="form-label">School/University Name*</label>
                                    <input type="text" class="form-control input_text" id="School"
                                        placeholder="Don Bosco" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Graduation" class="form-label">Graduation Year*</label>
                                    <input type="text" class="form-control input_text" id="Graduation"
                                        placeholder="2016" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="major" class="form-label">Major/Field of Study*</label>
                                    <input type="text" class="form-control input_text" id="major"
                                        placeholder="Arts" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="gpa" class="form-label">GPA*</label>
                                    <input type="text" class="form-control input_text" id="gpa"
                                        placeholder="8.8" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Skills & Competencies -->
                <div class="mt-5" id="skills-competencies">
                    <div class="heading mb-4">
                        <h2>Skills and Competencies</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="col-md-6 mb-4">
                            <div class="position-relative">
                                <label for="skills" class="form-label">Skills*</label>
                                <select class="form-select input_select" aria-label="Default select example"
                                    id="skills">
                                    <option selected>Adobe xd</option>
                                    <option value="1">Adobe xd</option>
                                    <option value="2">Designer</option>
                                    <option value="3">Adobe xd</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Certificate -->
                <div class="mt-5" id="certificate">
                    <div class="heading mb-4">
                        <h2>Certifications</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Certificate" class="form-label">Certificate Name*</label>
                                    <input type="text" class="form-control input_text" id="Certificate"
                                        placeholder="Completion of Figma Mega Course " />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Issuing Registration*" class="form-label">Issuing
                                        Registration*</label>
                                    <input type="text" class="form-control input_text" id="Issuing Registration*"
                                        placeholder="Lorem Ipsum" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Date Obtained*" class="form-label">Date Obtained*</label>
                                    <input type="date" class="form-control input_text" id="Date Obtained*"
                                        placeholder="Date" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Availability & Preferences -->
                <div class="mt-5" id="availability-preferences">
                    <div class="heading mb-4">
                        <h2>Availability and Preferences</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Preferred Title/Role*" class="form-label">Preferred
                                        Title/Role*</label>
                                    <input type="text" class="form-control input_text" id="Preferred Title/Role*"
                                        placeholder="UI/UX Designer" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Employment Type*" class="form-label">Employment Type*</label>
                                    <input type="text" class="form-control input_text" id="Employment Type*"
                                        placeholder="Full Time" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Preferred Industry*" class="form-label">Preferred Industry*</label>
                                    <input type="text" class="form-control input_text" id="Preferred Industry*"
                                        placeholder="IT" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Desired Job Location*" class="form-label">Desired Job
                                        Location*</label>
                                    <input type="text" class="form-control input_text" id="Desired Job Location*"
                                        placeholder="Mumbai" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Expected Salary*" class="form-label">Expected Salary*</label>
                                    <input type="text" class="form-control input_text" id="Expected Salary*"
                                        placeholder="5LPA" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="References*" class="form-label">References*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="References*">
                                        <option selected>Lorem Ipsum</option>
                                        <option value="1">Lorem Ipsum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Work Authorization -->
                <div class="mt-5" id="work-authorization">
                    <div class="heading mb-4">
                        <h2>Work Authorization</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Legal Authorization to work status*" class="form-label">Legal
                                        Authorization to work status*</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Legal Authorization to work status*">
                                        <option selected>Yes</option>
                                        <option value="1">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Availability" class="form-label">Availability
                                    </label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Availability">
                                        <option selected>Yes</option>
                                        <option value="1">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Notice Period" class="form-label">Notice Period
                                    </label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Notice Period">
                                        <option selected>Yes</option>
                                        <option value="1">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Social Media -->
                <div class="mt-5" id="social-media">
                    <div class="heading mb-4">
                        <h2>Social Media Links</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Linkdin" class="form-label">Linkdin</label>
                                    <input type="text" class="form-control input_text" id="Linkdin"
                                        placeholder="www.linkdin.com/Johndeo" />
                                    <img src="/assets/images/linkedin.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control input_text" id="Twitter"
                                        placeholder="www.twitter.com/Johndeo" />
                                    <img src="/assets/images/x.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control input_text" id="Instagram"
                                        placeholder="www.instagram.com/Johndeo" />
                                    <img src="/assets/images/instagram.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control input_text" id="Facebook"
                                        placeholder="www.facebook.com/Johndeo" />
                                    <img src="/assets/images/facebook.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="others" class="form-label">others</label>
                                    <input type="text" class="form-control input_text" id="others"
                                        placeholder="www.telegram/Johndeo" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!----------========================== edit profile ============----------->