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
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register9.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register11.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-------------===================== registration =============------------->