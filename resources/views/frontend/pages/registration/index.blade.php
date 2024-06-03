@extends('frontend.layouts.app')

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


<!----------========================== Registration ============----------->


@section('component.scripts')
    <script>

        /*------------------- form submit ajax --------------------*/

        function ajax_form_submit(event, form){

            if (form.valid()) {
                event.preventDefault();

                var button = $(form).find('button[type="submit"]').html();
                $(form).find('button[type="submit"]').html('please wait... <i class="las la-spinner la-spin"></i>');
                $(form).find('button[type="submit"]').css('pointer-events', 'none');
                
                $.ajax({
                    url: $(form).attr('action'),
                    type: "POST",
                    data: $(form).serialize(),
                    success: function (response) {
                        if(response.response_message.response == 'success') {
                            
                            toastr.success(response.response_message.message, response.response_message.response);

                            setTimeout(function() {
                                location.reload();
                            }, 1500);

                        }else{
                            $(form).find('button[type="submit"]').html(button);
                            $(form).find('button[type="submit"]').css('pointer-events', 'inherit');

                            toastr.error(response.response_message.message, response.response_message.response);


                        }
                        
                    }
                });
            } else {
                // Get all validation errors and display them in Toastr

                var errors = form.validate().errorMap;
                var errorMessage = '';
                // $.each(errors, function(key, value) {
                //     errorMessage += value + '<br>';
                // });

                toastr.error('Please fill the Mandatory fields ' + errorMessage, 'Error');
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

        }


    /*------------------- form submit ajax --------------------*/

    /*--------------------- user info ------------------*/

        initValidate('#user-info');

        $('#user-add-details form').on('submit', function(event){
            var form = $(this);
            ajax_form_submit(event, form);
        
        });

    /*--------------------- user info ------------------*/ 
    


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
    

    @if (session('toastr'))
        <script>
            $(document).ready(function() {
                var type = "{{ session('toastr.type') }}";
                var message = "{{ session('toastr.message') }}";
                var title = "{{ session('toastr.title') }}";

                toastr[type](message, title);
            });
        </script>
    @endif

@endsection
