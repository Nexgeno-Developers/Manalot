
@extends('frontend.layouts.app')


@section('page.content')
<!----------========================== login ============----------->

<style>
    .login-button-width
    {
        display: ruby-text;
        text-align: center;
    }
    p.divider {
    width: 360px !important;
}
</style>

<div class="login_logo">
    <a href="/"><img src="/assets/images/namalot_logo.png" /></a>
</div>

<section class="auth_form">
    <div class="fluid-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="/assets/images/login_bg.jpg" class="mobile_none" style="width:100%">
            </div>
            <div class="col-md-6 pddleft50">
                <h1 class="main_heading mt50">
                    <span class="purple font-size70">M</span>analot
                    <span class="orange font-size70">L</span>eadership
                    <span class="aquamarine font-size70">N</span>etwork
                </h1>


                <div class="heading mb-4">
                        <h2>Login Account</h2>
                        
                    </div>


                <div class="login_width">
                        <form id="login-form" action="{{ url(route('customer.login')) }}"  method="post" enctype="multipart/form-data" class="d-flex gap-4 flex-column">
                            @csrf
                            <div class="position-relative">
                                <label for="email" class="form-label">Email *</label>
                                <img src="/assets/images/email.png" alt="" class="input_icon" />
                                <input type="email" class="form-control input_text" id="email" name="email"
                                    placeholder="Enter Your Email ID" required/>
                                
                            </div>
                            <div class="position-relative">
                                <label for="password" class="form-label">Password *</label>
                                <img src="/assets/images/key.png" alt="" class="input_icon" />
                                <input type="password" class="form-control input_text" id="password" name="password"
                                    placeholder="***********" required/>
                                
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                

                                <p>
                                    Forgot your password?
                                    <a onclick="open_reset_password_form();" class="purple text-decoration-none">Reset</a>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="purple_btn">
                                    <button type="submit" class="text-decoration-none text-white width140" >Login</button>
                                </div>
                                <a href="{{ url(route('registration')) }}" class="google_btn bluegradian_bg text-light">New to MLN? <b>Join Now</b></a>
                            </div>
                        </form>

                        <div class="text-center my-4">
                            <p class="divider">Or</p>
                        </div>
                        <div class="login-button-width">
                            <a href="{{ route('auth.google') }}">
                                <button class="google_btn">
                                    Login with
                                    <img src="/assets/images/google.svg" alt="google icon" class="google_icon" />
                                </button>
                            </a>  
    
                            {{-- <button class="google_btn">
                                Login with
                                <img src="/assets/images/apple.svg" alt="google icon" class="google_icon" />
                            </button>                       --}}
                        </div>
                </div>

               

            </div>
        </div>
    </div>
</section>



<section class="md-pt-5 pt-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 width55">
                <div class="d-flex flex-column gap-3">
                    <h3 class="font-size40 purple expt_button">
                        <strong>Unemployed OR over 45?</strong> 
                    </h3>

                    <p class="font-size18 mb-0 last_chance">This could be your last chance.</p>
                    <p class="font-size18 mb-0">Are you a seasoned professional with valuable skills and more than 5 years of experience, <strong>seeking your next challenge?</strong> Perhaps you're over 45 and ready to leverage your wisdom in a new role.

</p>

<p class="font-size18 mb-0">The Manalot Leadership Network empowers experienced individuals to redefine their career journeys and unlock exciting possibilities.
</p>
<p class="font-size18 mb-0 font24">Don’t settle for the sidelines.
</p>

<p class="font-size18 mb-0 font26">The Manalot Leadership Network reboots careers.
</p>

<p class="font-size18 mb-0 font28">Get back into the game<span class="color_pink">.....</spam> <span class="cls_now"><strong>Now</strong></sapn>
</p>

                </div>
            </div>
            <div class="col-md-6 width45">
                <img src="/assets/images/team.jpg" alt="" />
            </div>
        </div>
    </div>
</section>

<!-- forgot password modal popup open-->
@include('frontend.component.forgot_password_modal_form')
<!--- forgot password Modal Popup ------->

<footer class="ms-footer">
	<div class="ms-footer-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-3">
					 <div class="ms-footer-col-1">
						<div class="ms-footer-address">
							<div class="ms-footer-heading">
								<h2>CONTACT INFO</h2>
							</div>
							<div class="ms-address-row">
								<span class="ms-address-ui">
									<i class="fa-solid fa-regular fa-location-dot" aria-hidden="true"></i>
								</span>
								<address class="ms-address-content">
									<span class="ms-ad-heading">Address:</span>Malhotra Chambers, 401, 4th Floor, Off. Govandi Station Road, Behind USV Ltd., Deonar, Chembur, Mumbai - 400 088
								</address>
							</div>
							<div class="ms-address-row">
								<span class="ms-address-ui">
									<i class="fa-regular fa-envelope" aria-hidden="true"></i>
								</span>
								<div class="ms-footer-email">
								<span class="ms-ad-heading">Email:</span>
								<a class="ms-address-content" href="mailto:communications@manalot.com">communications@manalot.com</a>
								</div>
							</div>
						</div>
					</div>				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="ms-footer-heading">
						<h2>SERVICES</h2>
					</div>
					<ul class="ms-footer-services">
						<li><a href="https://manalot.com/talent-selection" class="ms-footer-services-link">Talent Selection</a></li>
						<li><a href="https://manalot.com/manalot" class="ms-footer-services-link">Manalot – AI Powered Executive Search</a></li>
						<li><a href="https://manalot.com/talent-strategy-organizational-alignment" class="ms-footer-services-link">Talent Strategy &amp; Organizational Alignment</a></li>
						<li><a href="https://manalot.com/hr-advanced-analytics" class="ms-footer-services-link">HR Advanced Analytics</a></li>
						<li><a href="https://manalot.com/aspirational-modelling" class="ms-footer-services-link">Aspirational Modelling</a></li>
						<li><a href="https://manalot.com/family-business-advisory" class="ms-footer-services-link">Family Business Advisory</a></li>
						<li><a href="https://manalot.com/professional-mentoring-career-consulting" class="ms-footer-services-link">Professional Mentoring &amp; Career Consulting</a></li>
					</ul>				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="ms-footer-heading">
						<h2>USEFUL LINKS</h2>
					</div>
					<ul class="ms-footer-services">
						<li><a href="https://manalot.com/" class="ms-footer-services-link">Home</a></li>
						<li><a href="https://manalot.com/leadership-team" class="ms-footer-services-link">Who We Are</a></li>
                        <li><a href="https://manalot.com/careers" class="ms-footer-services-link">Careers</a></li>
						<li><a href="https://manalot.com/contact-us" class="ms-footer-services-link">Contact Us</a></li>
                        <li><a href="https://manalot.com/privacy-policy" class="ms-footer-services-link">Privacy Policy</a></li>
					</ul>				
                </div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="ms-footer-heading">
						<h2>FOLLOW US</h2>
					</div>
					<div class="ms-footer-social">
						<a href="https://www.linkedin.com/company/manalot/" target="_blank" class="ms-social-link linkdin" aria-label="Linkdin"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
					</div>	
                    <div class="col-md-12 p-2 ps-md-3 ms-md-0 mt-md-5 row footer_app">
                        <b class="text-light px-0">Apply on the go</b>
                        <p class="text-light px-0">Get real-time job updates on our App</p>
                        <div class="android_app col-md-6 ps-0">
                            <a href="" rel="noreferrer" class="download" target="_blank">
                                <img loading="lazy" alt="manalot app download" src="/assets/images/google_play_white_bg_2.png" >
                            </a>
                        </div>
                        <div class="ios_app col-md-6 px-0">
                            <a href="" rel="noreferrer" class="download" target="_blank">
                                <img loading="lazy" alt="manlot app download" src="/assets/images/app_store_white_bg.png" >
                            </a>
                        </div>
                    </div>			
                </div>
			</div>
		</div>
	</div>
	<div class="ms-footer-copyright"><p>© Copyright - Maple Consulting & Services</p></div>
</footer>

<!----------========================== login ============----------->
@endsection


@section('component.scripts')
<script>

function open_reset_password_form(){

    $('#forgot_password').modal('show');

}

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
                        Command: toastr.error(errors, "Alert",
                        {
                            "closeButton": true,
                            "progressBar": true,
                            "tapToDismiss": false,
                        });
                    } else {
                        Command: toastr.error(response.response_message.message, "Alert",                        
                        {
                            "closeButton": true,
                            "progressBar": true,
                            "tapToDismiss": false,
                        });

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
                Command: toastr.error("An error occurred: " + error, "Error",
                {
                    "closeButton": true,
                    "progressBar": true,
                    "tapToDismiss": false,
                });
            }
        });
    } else {
        toastr.error("Please make sure to fill all the necessary fields", "Error",
        {
            "closeButton": true,
            "progressBar": true,
            "tapToDismiss": false,
        });
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