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
                <img class="register_image" src="/assets/images/register_image2.png">
            </div>

            <div class="col-md-8 pddleft50">

                @include('frontend.pages.registration.registration_form')

            </div>

            
        </div>
    </div>
</section>

@endsection


@section('component.scripts')
    <script>

    document.getElementById('Mobile').addEventListener('input', function (event) {
        this.value = this.value.replace(/[^0-9+ ]/g, '');
    });

    function next_page_preview(step_info){
        var step = {{ Session::has('step') ? Session::get('step') : '0' }};
        
        var elements = [
            'user-add-details',
            'personal-details',
            'work-details-div',
            'cirtificate_one',
            'availibility_one',
            'social_media_div',
            'doc_verify_div',
            'thankyou-page'
        ];

        // Update the step value if step_info is passed
        if (step_info !== undefined) {
            step = step_info;
        }

        // console.log('step');
        // console.log(step);

        // Hide all elements
        elements.forEach(function(id) {
            document.getElementById(id).classList.remove('fade-in');
            document.getElementById(id).classList.add('d-none');
            document.getElementById(id).classList.add('fade-out');
        });

        // Show elements based on step
        switch(step) {
            case 1:
                document.getElementById('user-add-details').classList.remove('d-none');
                document.getElementById('user-add-details').classList.remove('fade-out');
                document.getElementById('user-add-details').classList.add('fade-in');
                break;
            case 2:
                document.getElementById('personal-details').classList.remove('d-none');
                document.getElementById('personal-details').classList.remove('fade-out');
                document.getElementById('personal-details').classList.add('fade-in');
                break;
            case 3:
                document.getElementById('work-details-div').classList.remove('d-none');
                document.getElementById('work-details-div').classList.remove('fade-out');
                document.getElementById('work-details-div').classList.add('fade-in');
                break;
            case 4:
                document.getElementById('cirtificate_one').classList.remove('d-none');
                document.getElementById('cirtificate_one').classList.remove('fade-out');
                document.getElementById('cirtificate_one').classList.add('fade-in');
                break;
            case 5:
                document.getElementById('availibility_one').classList.remove('d-none');
                document.getElementById('availibility_one').classList.remove('fade-out');
                document.getElementById('availibility_one').classList.add('fade-in');
                break;
            case 6:
                document.getElementById('social_media_div').classList.remove('d-none');
                document.getElementById('social_media_div').classList.remove('fade-out');
                document.getElementById('social_media_div').classList.add('fade-in');
                break;
            case 7:
                document.getElementById('doc_verify_div').classList.remove('d-none');
                document.getElementById('doc_verify_div').classList.remove('fade-out');
                document.getElementById('doc_verify_div').classList.add('fade-in');
                break;
            case 8:
                document.getElementById('thankyou-page').classList.remove('d-none');
                document.getElementById('thankyou-page').classList.remove('fade-out');
                document.getElementById('thankyou-page').classList.add('fade-in');
                break;
            default:
                document.getElementById('user-add-details').classList.remove('d-none');
                document.getElementById('user-add-details').classList.remove('fade-out');
                document.getElementById('user-add-details').classList.add('fade-in');
                break;
        }

        initSelect2('.select2');
        initSelect3('#industry');
        initSelect3('#pref_industry');
    }


    // $(document).ready(function() {
    //     initSelect2('.select2');
    //     initTrumbowyg('.trumbowyg');
    // });


    $(document).ready(function() {
        initSelect2('.select2');
        initSelect3('#industry');
        initSelect3('#pref_industry');
    });

    function back_to_privious(){
        var current_step = {{ Session::has('step') ? Session::get('step') : '0' }};

        console.log('current_step');
        console.log(current_step);

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the URL to hit using the route name
        var url = '{{ route("get-previous-page") }}';

        // Send a GET request to the URL asynchronously
        xhr.open('GET', url, true);
        xhr.send();


        location.reload();
    }

    /*--------------------- user info ------------------*/

        initValidate('#user-info');

        $('#user-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_user_info);
        });

        var responseHandler_user_info = function (response) {
            /* var form = $('#user-info'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); */
            setTimeout(function () {
                // location.reload();
                $('#email_otp_model').modal('show');
            }, 100);

            // Show resend OTP button after 30 seconds
            setTimeout(function() {
                var resendButton = document.getElementById('resendOTPButton');
                resendButton.style.display = 'block';
            }, 30000); // 30 seconds

        };

    /*--------------------- user info ------------------*/ 

    /*--------------------- email verify otp ------------------*/

        initValidate('#email-verify-otp');

        $('#email-verify-otp').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_email_verify_otp);
        });

        var responseHandler_email_verify_otp = function (response) {
            var form = $('#email-verify-otp'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);
            $('#email_otp_model').modal('toggle');
            location.reload();
            // next_page_preview(2);
            
        };

        function close_Emai_modal() {
            $('#email_otp_model').modal('toggle');
        };
    /*--------------------- email verify otp ------------------*/ 

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

    /*--------------------- personal info ------------------*/

        initValidate('#personal-info');

        $('#personal-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_personal_info);
        });

        var responseHandler_personal_info = function (response) {
            var form = $('#personal-info'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(3);
        };

    /*---------------------  personal info ------------------*/ 

    /*--------------------- personal work info ------------------*/

        initValidate('#personal-work-info');

        $('#personal-work-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_personal_work_info);
        });

        var responseHandler_personal_work_info = function (response) {
            var form = $('#personal-work-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(4);
        };

    /*---------------------  personal work info ------------------*/ 

    /*--------------------- skills-info ------------------*/

        initValidate('#skills-info');

        $('#skills-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_skill_info);
        });

        var responseHandler_skill_info = function (response) {
            var form = $('#skills-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(5);
        };

    /*---------------------  skills-info ------------------*/ 

    /*--------------------- Preferences-info ------------------*/

        initValidate('#preferences-info');

        $('#preferences-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_preference_info);
        });

        var responseHandler_preference_info = function (response) {
            var form = $('#preferences-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(6);
        };

    /*---------------------  preferences-info ------------------*/ 



    /*--------------------- social-media-info ------------------*/

        initValidate('#social-media-info');

        $('#social-media-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_social_media_info);
        });

        var responseHandler_social_media_info = function (response) {
            var form = $('#social-media-info');
    
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(7);
        };

    /*---------------------  social-media-info ------------------*/ 
    
    /*--------------------- proceeding_info ------------------*/

        initValidate('#proceeding-info');

        $('#proceeding-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_proceeding_info);
        });

        var responseHandler_proceeding_info = function (response) {
            $("input, textarea").val("");
            $("select option:first").prop("selected", !0);
            // setTimeout(function () {
            //     window.location.href = "{{ url(route('index')) }}";
            // }, 100);
            next_page_preview(8);
        };

    /*---------------------  proceeding_info ------------------*/ 

    next_page_preview();

    
    /*--------------------- duplicate forms inputs ------------------*/

    $(document).ready(function () {
            // Add row functionality
            $(document).on('click', '.add-row', function () {
                var newRow = $('.certificate-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-row">Add More +</button><button type="button" class="btn btn-danger remove-row">Remove</button></div>'); // Add new add and remove buttons
                $('.certificate-row').last().after(newRow); // Append the cloned row at the end
            });

            // Remove row functionality
            $(document).on('click', '.remove-row', function () {
                if ($('.certificate-row').length > 1) {
                    $(this).closest('.certificate-row').remove(); // Remove the closest row
                } else {
                    alert('At least one row is required.'); // Alert if only one row is left
                }
            });


            // Add row for Education
            $(document).on('click', '.add-edu-row', function () {
                var newRow = $('.education-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-edu-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-edu-row">Add More +</button><button type="button" class="btn btn-danger remove-edu-row">Remove</button></div>'); // Add new add and remove buttons
                $('.education-row').last().after(newRow); // Append the cloned row at the end
            });

            // Remove row functionality
            $(document).on('click', '.remove-edu-row', function () {
                if ($('.education-row').length > 1) {
                    $(this).closest('.education-row').remove(); // Remove the closest row
                } else {
                    alert('At least one row is required.'); // Alert if only one row is left
                }
            });

            // Add row for Education

        
            var rowIndex = $('.reference-row').length; // Initialize with the number of existing rows

            // Function to update IDs and initialize intlTelInput
            function updateIDsAndInitialize() {
                $('.reference-row').each(function(index) {
                    var phoneInput = $(this).find('.reference_phone');
                    phoneInput.attr('id', 'Phone' + (index + 1));
                    phoneInput.intlTelInput({
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                    });

                    document.getElementById('Phone' + (index + 1)).addEventListener('input', function (event) {
                        this.value = this.value.replace(/[^0-9+ ]/g, '');
                    });

                });
            }

            // Add row functionality for references
            $(document).on('click', '.add-reference-row', function () {
                var newRow = $('.reference-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-reference-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-reference-row">Add More +</button><button type="button" class="btn btn-danger remove-reference-row">Remove -</button></div>'); // Add new add and remove buttons
                $('.reference-row').last().after(newRow); // Append the cloned row at the end
                rowIndex++; // Increment row index
                updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
            });

            // Remove row functionality for references
            $(document).on('click', '.remove-reference-row', function () {
                if ($('.reference-row').length > 1) {
                    $(this).closest('.reference-row').remove(); // Remove the closest row
                    rowIndex--; // Decrement row index
                    updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
                } else {
                    alert('At least one reference is required.'); // Alert if only one row is left
                }
            });

            updateIDsAndInitialize(); // Initial ID update and intlTelInput initialization
    

        });

     /*--------------------- duplicate forms inputs ------------------*/
     
     
     /*--------------------- API forms ------------------*/
     
     $(document).ready(function () {
        var typingTimer;
        var typingDelay = 1200; // 1.2 seconds delay

        $('#pincode').on('keyup', function () {
            clearTimeout(typingTimer);
            var postalCode = $(this).val();

            if (postalCode.length > 0) {
                typingTimer = setTimeout(function () {
                    $.ajax({
                        url: 'https://secure.geonames.org/postalCodeSearchJSON',
                        dataType: 'json',
                        data: {
                            postalcode: postalCode,
                            country: 'IN',
                            username: 'umair.makent'
                        },
                        success: function (data) {
                            if (data.postalCodes.length > 0) {
                                $('#country_name').val(data.postalCodes[0].countryCode).focus();
                                $('#city').val(data.postalCodes[0].adminName2).focus();
                                $('#state').val(data.postalCodes[0].adminName1).focus();
                                $('#address').focus();

                                // $('#placeName').val(data.postalCodes[0].placeName);

                                // Display response in a pretty format
                                var responseHtml = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                                $('#response').html(responseHtml);
                            } else {
                                alert('Postal code not found');
                            }
                        },
                        error: function () {
                            alert('Error fetching data');
                        }
                    });
                }, typingDelay);
            }
        });

        // Reset form on click of reset button
        // $('#resetButton').click(function () {
        //     $('#postalCodeForm')[0].reset();
        //     $('#response').empty();
        // });
    });


     /*--------------------- API forms ------------------*/



    // -----==================== Not working ======================= 


    // /*--------------------- work-authorization-info ------------------*/

    //     initValidate('#work-authorization-info');

    //     $('#work-authorization-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  work-authorization-info ------------------*/ 

    // /*--------------------- education-info ------------------*/

    // initValidate('#education-info');

    //     $('#education-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  education-info ------------------*/ 

    // /*--------------------- login info ------------------*/

    //     initValidate('#login-info');

    //     $('#login-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  Login info ------------------*/ 

     </script>
    
@endsection
