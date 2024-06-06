@extends('frontend.layouts.app')


@section('page.content')

<div class="login_logo">
    <a href="/"><img src="/assets/images/namalot_logo.png" /></a>
</div>
<!----------========================== Registration ============----------->

<section class="auth_form">
    <div class="fluid-container">
        <div class="row align-items-center">

            <div class="col-md-4">
                <img class="register_image" src="/assets/images/register_image1.png" style="width:100%">
            </div>

            <div class="col-md-8 ps-4">

                @include('frontend.pages.registration.registration_form')

            </div>

            
        </div>
    </div>
</section>

@endsection

<!----------========================== Registration ============----------->


@section('component.scripts')
    <script>

    // $(document).ready(function() {
    //     initSelect2('.select2');
    //     initTrumbowyg('.trumbowyg');
    // });

    function back_to_privious(){
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the URL to hit using the route name
        var url = '{{ route("get-privious-page") }}';

        // Send a GET request to the URL asynchronously
        xhr.open('GET', url, true);
        xhr.send();

        setTimeout(function () {
            location.reload();
        }, 1000);

    }

    /*--------------------- user info ------------------*/

        initValidate('#user-info');

        $('#user-info').on('submit', function(e){
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

    /*--------------------- user info ------------------*/ 

    /*--------------------- personal info ------------------*/

        initValidate('#personal-info');

        $('#personal-info').on('submit', function(e){
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

    /*---------------------  personal info ------------------*/ 

    /*--------------------- login info ------------------*/

        initValidate('#login-info');

        $('#login-info').on('submit', function(e){
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

    /*---------------------  Login info ------------------*/ 

    /*--------------------- personal work info ------------------*/

        initValidate('#personal-work-info');

        $('#personal-work-info').on('submit', function(e){
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

    /*---------------------  personal work info ------------------*/ 

    /*--------------------- education-info ------------------*/

        initValidate('#education-info');

        $('#education-info').on('submit', function(e){
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

    /*---------------------  education-info ------------------*/ 

    /*--------------------- skills-info ------------------*/

        initValidate('#skills-info');

        $('#skills-info').on('submit', function(e){
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

    /*---------------------  skills-info ------------------*/ 

    /*--------------------- certifications-info ------------------*/

        initValidate('#certifications-info');

        $('#certifications-info').on('submit', function(e){
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

    /*---------------------  certifications-info ------------------*/ 

    /*--------------------- Preferences-info ------------------*/

        initValidate('#preferences-info');

        $('#preferences-info').on('submit', function(e){
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

    /*---------------------  preferences-info ------------------*/ 

    /*--------------------- work-authorization-info ------------------*/

        initValidate('#work-authorization-info');

        $('#work-authorization-info').on('submit', function(e){
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

    /*---------------------  work-authorization-info ------------------*/ 

    /*--------------------- social-media-info ------------------*/

        initValidate('#social-media-info');

        $('#social-media-info').on('submit', function(e){
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

    /*---------------------  social-media-info ------------------*/ 
    
    /*--------------------- proceeding_info ------------------*/

        initValidate('#proceeding-info');

        $('#proceeding-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler1);
        });

        var responseHandler1 = function (response) {
            $("input, textarea").val("");
            $("select option:first").prop("selected", !0);
            setTimeout(function () {
                window.location.href = "{{ url(route('index')) }}";
            }, 1500);
        };

    /*---------------------  proceeding_info ------------------*/ 

    /*--------------------- Resend-otp------------------*/    

        $(document).ready(function(){
            $('#resendOTPButton').click(function(e){
                e.preventDefault();

                var csrfToken = '{{ csrf_token() }}';

                $.ajax({
                    url: "{{ route('account.create', ['param' =>'resend-otp']) }}",
                    type: "Post",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        toastr.success(response.response_message.message, response.response_message.response);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(response.response_message.message, response.response_message.response);
                    }
                });
            });
        });

    /*--------------------- Resend-otp------------------*/  
    
    

    </script>
    
@endsection
