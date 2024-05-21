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
                        <h2>Login Information</h2>
                    </div>
                    <form action="" class="d-flex gap-4 flex-column">
                        <div class="position-relative">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control input_text" id="email"
                                placeholder="jhonedeo@gmail.com" />
                            <img src="/assets/images/email.png" alt="" class="input_icon" />
                        </div>
                        <div class="position-relative">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" class="form-control input_text" id="password"
                                placeholder="***********" />
                            <img src="/assets/images/key.png" alt="" class="input_icon" />
                        </div>
                        <div class="position-relative">
                            <label for="password" class="form-label">Confirm Password*</label>
                            <input type="password" class="form-control input_text" id="password"
                                placeholder="***********" />
                            <img src="/assets/images/key.png" alt="" class="input_icon" />
                        </div>

                        <div class="d-flex align-items-center gap-4 mt-5">
                            <div class="blue_btn">
                                <a href="register3.php" class="text-decoration-none text-white">Back</a>
                            </div>
                            <div class="purple_btn">
                                <a href="register5.php" class="text-decoration-none text-white">Next</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!----------========================== Registration ============----------->
