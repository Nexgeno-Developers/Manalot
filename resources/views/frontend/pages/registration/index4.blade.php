@extends('frontend.layouts.app')

<!----------========================== Registration ============----------->


<section class="auth_form">
    <div class="fluid-container">
        <div class="row align-items-center">

            <div class="col-md-4">
                <img class="register_image" src="/assets/images/register_image1.png" style="width:100%">
            </div>

            <div class="col-md-8 ps-4">
                <div class="register_width">
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

                            <div class="col-md-12 mt-3">
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
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register4.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register6.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!---------========================== Registration =============------------------->
