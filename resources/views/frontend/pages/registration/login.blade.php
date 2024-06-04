
@extends('frontend.layouts.app')


@section('page.content')
<!----------========================== login ============----------->

<div class="login_logo">
    <a href="/"><img src="/assets/images/namalot_logo.png" /></a>
</div>

<section class="auth_form">
    <div class="fluid-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="/assets/images/login_bg.png" style="width:100%">
            </div>
            <div class="col-md-6 ps-4">
                <h1 class="main_heading mb-5">
                    <span class="purple">M</span>analot
                    <span class="orange">L</span>eadership
                    <span class="aquamarine">N</span>etwork
                </h1>

                <div class="login_width">
                    <div class="heading mb-4">
                        <h2>Login Account</h2>
                        <p>
                            To stay in touch with us, please log in to your manalot
                            account.
                        </p>
                    </div>
                    <div class="">
                        <form id="login-form" action="{{ url(route('customer.login')) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
                            @csrf
                            <div class="position-relative">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control input_text" id="email" name="email"
                                    placeholder="Enter Your Email ID" required/>
                                <img src="/assets/images/email.png" alt="" class="input_icon" />
                            </div>
                            <div class="position-relative">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control input_text" id="password" name="password"
                                    placeholder="***********" required/>
                                <img src="/assets/images/key.png" alt="" class="input_icon" />
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>

                                <p>
                                    Forgot your password?
                                    <a href="#" class="purple text-decoration-none">Reset</a>
                                </p>
                            </div>
                            <div>
                                <div class="purple_btn">
                                    <button type="submit" class="text-decoration-none text-white" >Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center my-5">
                        <p class="divider">Or</p>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <button class="google_btn">
                            Continue with
                            <img src="/assets/images/google.svg" alt="google icon" class="google_icon" />
                        </button>
                        <a href="{{ url(route('registration')) }}"><button class="google_btn">New to MLN? Join Now</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex flex-column gap-3">
                    <h3 class="font-size40 purple">
                        Experience + Unemployed
                        <span class="fs-6" style="color: black">= Unstoppable</span>
                    </h3>

                    <p class="font-size18 mb-0">
                        Are you an <strong>Unemployed</strong> professional with over
                        7 years of experience or <strong>above 45 years old</strong> ,
                        seeking your next opportunity?
                    </p>

                    <p class="font-size18">
                        Join us as we empower you to redefine your journey and unlock
                        new possibilities.
                    </p>

                    <div>
                        <p class="font-size18">Welcome to</p>
                        <p class="font-size40">
                            <span class="purple">M</span>analot
                            <span class="orange">L</span>eadership
                            <span class="aquamarine">N</span>etwork
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/assets/images/team.jpg" alt="" />
            </div>
        </div>
    </div>
</section>
<footer class="text-center pt-4 pb-4"><b>© Maple Consulting and Services</b></footer>

<!----------========================== login ============----------->
@endsection


@section('component.scripts')
<script>

/*--------------------- login form ------------------*/

initValidate('#login-form');

$('#login-form').on('submit', function(e){
    var form = $(this);
    ajax_form_submit(e, form, responseHandler);
});

var responseHandler = function (response) {
    $("input, textarea").val("");
    $("select option:first").prop("selected", !0);
    setTimeout(function () {
        location.reload();
    }, 1500);
};

/*--------------------- Login Form ------------------*/ 
</script>
@endsection