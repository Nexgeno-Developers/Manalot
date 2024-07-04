<div class="modal fade modal_popup_cls" id="forgot_password" aria-hidden="true" aria-labelledby="forgot_password" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title_heading black_color heading_font" id="forgot_password">Forgot Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
          <form id="ForgotForm">
            @csrf
            <div class="form-group mt-4">
              <input type="email" class="form-control" name="email" placeholder="Email ID *" required/>
            </div>
            <div class="form-group">
              <div class="buttonclass1 mt60">
                <button type="submit">Send OTP <i class="las la-arrow-right"></i>
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>




  <div class="modal fade modal_popup_cls" id="forgot_otp" aria-hidden="true" aria-labelledby="forgot_otp" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title_heading black_color heading_font" id="forgot_otp">OTP Verify</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
          <form id="Forgot_otp_form">
            @csrf
            <div class="form-group mt-4">
              <input type="text" class="form-control" name="otp" placeholder="OTP *" pattern="[0-9]+" minlength="6"
              maxlength="6" required/>
            </div>
            <div class="form-group">
              <div class="buttonclass1 mt60">
                <button type="submit">Verify <i class="las la-arrow-right"></i>
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>



<div class="modal fade modal_popup_cls" id="reset_password" aria-hidden="true" aria-labelledby="reset_password" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title_heading black_color heading_font" id="reset_password">Reset Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form id="reset_password_form">
            @csrf
                <div class="form-group mt-4">
                    <input type="text" class="form-control" name="password" placeholder="New Password *" pattern="[0-9]+" minlength="8"
                    maxlength="16" required/>
                </div>
                <div class="form-group mt-4">
                    <input type="text" class="form-control" name="password_conform" placeholder="conform Password *" pattern="[0-9]+" minlength="8"
                    maxlength="16" required/>
                </div>
                <div class="form-group">
                    <div class="buttonclass1 mt60">
                    <button type="submit">Submit <i class="las la-arrow-right"></i>
                    </button>
                    </div>
                </div>
            </form>

        </div>
        </div>
    </div>
</div>




  @section("forgot.scripts")
  <script>

    $(document).ready(function(){

    /*------------------------------ OTP send Form ---------------------*/

        initValidate('#ForgotForm');

        $('#ForgotForm').submit(function(e){
            e.preventDefault();

            var form = $(this);
            var formData = $(this).serialize();
            var csrfToken = '{{ csrf_token() }}';

            if (form.valid()) {

                $.ajax({
                    url: "{{ route('customer.forgot', ['param' =>'verify-number-send-otp']) }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message, 'Success',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                            $('#forgot_password').modal('hide'); 
                            $('#forgot_otp').modal('show');
                        } else {
                            toastr.error(response.message, 'Error',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again', 'Error',
                        {
                            "closeButton": true,
                            "progressBar": true,
                            "tapToDismiss": false,
                        });
                    }
                });

            } else {
                // Get all validation errors and display them in Toastr
                var errors = form.validate().errorMap;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });
                toastr.error('Please fill the Mandatory fields ' + errorMessage, 'Error',
                {
                    "closeButton": true,
                    "progressBar": true,
                    "tapToDismiss": false,
                });
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

          });

    /*------------------------------ OTP send Form ---------------------*/      

    /*------------------------------ OTP Verify Form ---------------------*/
    

        initValidate('#Forgot_otp_form');

        $('#Forgot_otp_form').submit(function(e){
            e.preventDefault();

            var form = $(this);
            var formData = $(this).serialize();
            var csrfToken = '{{ csrf_token() }}';

            if (form.valid()) {
                $.ajax({
                    url: "{{ route('customer.forgot', ['param' =>'verify-forgot-otp']) }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message, 'Success',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                            $('#forgot_otp').modal('hide'); 
                            $('#reset_password').modal('show');
                        } else {
                            toastr.error(response.message, 'Error',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again', 'Error',
                        {
                            "closeButton": true,
                            "progressBar": true,
                            "tapToDismiss": false,
                        });
                    }
                });

            } else {
                // Get all validation errors and display them in Toastr
                var errors = form.validate().errorMap;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });
                toastr.error('Please fill the Mandatory fields ' + errorMessage, 'Error',
                {
                    "closeButton": true,
                    "progressBar": true,
                    "tapToDismiss": false,
                });
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

        });

    /*------------------------------ OTP Verify Form ---------------------*/

    /*------------------------------ NEW Password ADD Form ---------------------*/    

        initValidate('#reset_password_form');

        $('#reset_password_form').submit(function(e){
            e.preventDefault();

            var form = $(this);
            var formData = $(this).serialize();
            var csrfToken = '{{ csrf_token() }}';

            if (form.valid()) {
                $.ajax({
                    url: "{{ route('customer.forgot', ['param' =>'reset-password']) }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message, 'Success',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                            $('#reset_password').modal('hide');
                            setTimeout(function() {
                                // window.location.href = "{{ url(route('index')) }}/#sign";
                                location.reload();
                            }, 1000);
                        } else {
                            toastr.error(response.message, 'Error',
                            {
                                "closeButton": true,
                                "progressBar": true,
                                "tapToDismiss": false,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again', 'Error',
                        {
                            "closeButton": true,
                            "progressBar": true,
                            "tapToDismiss": false,
                        });
                    }
                });

            } else {
                // Get all validation errors and display them in Toastr
                var errors = form.validate().errorMap;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });
                toastr.error('Please fill the Mandatory fields ' + errorMessage, 'Error',
                {
                    "closeButton": true,
                    "progressBar": true,
                    "tapToDismiss": false,
                });
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }
        });


    });
    
    </script>
  @endsection