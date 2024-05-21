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
                        <h2>Register</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control input_text" id="name"
                                        placeholder="jhone deo" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control input_text" id="email"
                                        placeholder="johndeo@gmail.com" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control input_text" id="password"
                                        placeholder="***********" />
                                    <img src="images/key.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control input_text" id="Phone"
                                        placeholder="9876543210" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Employee" class="form-label">Employee Status</label>
                                    <select class="form-select input_select" aria-label="Default select example"
                                        id="Employee">
                                        <option selected>Self-Employed</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="formFile" class="form-label">Upload Resume</label>
                                    <input class="form-control" type="file" id="formFile" />
                                    <img src="images/file.png" alt="" class="input_icon" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree to the
                                    <a href="#" class="inherit"> Terms </a>
                                    and
                                    <a href="#" class="inherit"> Privacy Policy</a>.
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="purple_btn">
                                <a href="register2.php" class="text-decoration-none text-white">Register as
                                    Jobseeker</a>
                            </div>
                        </div>
                    </form>

                    <p class="mt-5">
                        Already have an account?
                        <a href="login.php" class="text-decoration-none purple">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!----------========================== Registration ============----------->