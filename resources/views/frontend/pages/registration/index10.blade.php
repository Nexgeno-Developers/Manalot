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
                        <h2>Social Media Links</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Linkdin" class="form-label">Linkdin</label>
                                    <input type="text" class="form-control input_text" id="Linkdin"
                                        placeholder="www.linkdin.com/Johndeo" />
                                    <img src="images/linkedin.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control input_text" id="Twitter"
                                        placeholder="www.twitter.com/Johndeo" />
                                    <img src="images/x.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control input_text" id="Instagram"
                                        placeholder="www.instagram.com/Johndeo" />
                                    <img src="images/instagram.png" alt="" class="input_icon" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <label for="Facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control input_text" id="Facebook"
                                        placeholder="www.facebook.com/Johndeo" />
                                    <img src="images/facebook.png" alt="" class="input_icon" />
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
                        <div class="d-flex align-items-center gap-4">
                            <div class="blue_btn">
                                <a href="register10.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="admin.php" class="text-decoration-none text-white">Submit</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!----------====================== Registration ==============-------------->
