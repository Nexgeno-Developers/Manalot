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
                        <h2>Availability and Preferences</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Preferred Title/Role*" class="form-label">Preferred Title/Role*</label>
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
                                    <label for="Desired Job Location*" class="form-label">Desired Job Location*</label>
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
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register8.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register10.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--------=========================== Registration ===========------------>
