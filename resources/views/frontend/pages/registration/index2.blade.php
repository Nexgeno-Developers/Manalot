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
                        <div>
                            <div class="purple_btn">
                                <a href="register4.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!----------========================== Registration ============----------->