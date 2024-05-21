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
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register5.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register7.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!---------========================== Registration ===========------------->