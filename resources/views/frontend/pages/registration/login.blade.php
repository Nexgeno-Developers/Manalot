
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
                        <p class="fs-16">
                            To stay in touch with us, please log in to your manalot
                            account.
                        </p>
                    </div>
                    <div class="">
                        <form id="login-form" action="{{ url(route('customer.login')) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
                            @csrf
                            <div class="position-relative">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control input_text email_icon" id="email" name="email"
                                    placeholder="Enter Your Email ID" required/>
                                
                            </div>
                            <div class="position-relative">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control input_text password_icon" id="password" name="password"
                                    placeholder="***********" required/>
                                
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
                        <a href="{{ url(route('registration')) }}"><button class="google_btn bluegradian_bg">New to MLN? <b>Join Now</b></button></a>
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

function ajax_form_submit_login(e, form, callBackFunction) {
    if (form.valid()) {
        e.preventDefault();
        var btn = $(form).find('button[type="submit"]');
        var btn_text = $(btn).html();
        $(btn).html('please wait... <i class="las la-spinner la-spin"></i>');
        $(btn).css("opacity", "0.7");
        $(btn).css("pointer-events", "none");
        var action = form.attr("action");
        var data = new FormData(form[0]); // Corrected to form[0] to get the raw DOM element
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: "json",
            data: data,
            success: function (response) {
                resetButton(btn, btn_text);
                if (response.response_message.response === "success") {
                    Command: toastr.success(response.response_message.message, "Success");
                    callBackFunction(response);
                } else {
                    if (Array.isArray(response.response_message.message)) {
                        var errors = "";
                        $.each(response.response_message.message, function (key, msg) {
                            errors += "<div>" + (key + 1) + ". " + msg + "</div>";
                        });
                        Command: toastr.error(errors, "Alert");
                    } else {
                        Command: toastr.error(response.response_message.message, "Alert");

                        if(response.response_message.status === "incomplete"){

                            setTimeout(function () {
                                window.location.href = "{{ url(route('registration')) }}";
                            }, 1000);

                        } else {

                            setTimeout(function () {
                                location.reload();
                            }, 1000);

                        }

                    }
                }
            },
            error: function (xhr, status, error) {
                resetButton(btn, btn_text);
                Command: toastr.error("An error occurred: " + error, "Error");
            }
        });
    } else {
        toastr.error("Please make sure to fill all the necessary fields");
        resetButton($(form).find('button[type="submit"]'), btn_text);
    }
}



initValidate('#login-form');

$('#login-form').on('submit', function(e){
    var form = $(this);
    ajax_form_submit_login(e, form, responseHandler);
});

var responseHandler = function (response) {
    $("input, textarea").val("");
    $("select option:first").prop("selected", !0);

    if (response.response_message.response === "success") {

        setTimeout(function () {
            window.location.href = "{{ url(route('index')) }}";
        }, 1000);

    } else {

            setTimeout(function () {
                location.reload();
            }, 1000);
    }

};

/*--------------------- Login Form ------------------*/ 
</script>
@endsection