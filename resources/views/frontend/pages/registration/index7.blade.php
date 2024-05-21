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
                                    <label for="Issuing Registration*" class="form-label">Issuing Registration*</label>
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
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register7.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register9.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--------========================== Registration ==============------------>
