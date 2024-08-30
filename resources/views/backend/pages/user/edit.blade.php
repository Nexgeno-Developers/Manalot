<form id="resetpassword" method="POST" action="{{url(route('password.update'))}}">
    @csrf
    <input type="hidden" name="id" value="{{ $author->id }}">
    <h3 class="mt-0 mb-3">Rest Password</h3>
    <div class="row">
        <div class="row mb-2 col-md-5 pe-md-0">
            <label for="password" class="col-md-4 col-form-label text-md-start">New Password <span class="red">*</span></label>

            <div class="col-md-8 ps-md-0">
                <input id="password" type="text" class="form-control py-1 px-2" name="password" minlength="6" required autocomplete="new-password">
            </div>
        </div>

        <div class="row row mb-2 col-md-5 justify-content-end ps-md-1">
            <label for="password-confirm" class="col-md-4 ps-md-0 col-form-label text-md-start">Confirm Password <span class="red">*</span></label>

            <div class="col-md-6">
                <input id="confirm_password" type="text" class="form-control py-1 px-2" name="password_confirmation" required autocomplete="new-password">
                <span id='message'></span>
            </div>
        </div>
        <div class="col-md-2 offset-md-0 text-md-end">
            <button type="submit" class="btn btn-primary main_button">
                Reset Password
            </button>
        </div>
    </div>    
</form>

<hr class="mb-3">

<form id="edit_author_form" action="{{url(route('user.update'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="mt-0 mb-3">User Details</h3>
    <div class="row col-12">
        <div class="d-flex col-md-5 col-12">
        <input type="hidden" name="id" value="{{ $author->id }}">
            <label class="col-md-4 float-end">Username <span class="red">*</span></label>
            <div class="col-md-8 form-group mb-2">
                <input type="text" class="form-control" name="username" value="{{ $author->username  }}" required>
            </div>
        </div>        
        <div class="row col-md-5 col-12">
            <label class="col-md-4 text-md-center ps-md-3">Email <span class="red">*</span></label>
            <div class="col-md-8 form-group mb-2">                
                <input type="email" class="form-control col-md-6" name="email" value="{{ $author->email }}" required>
            </div>
        </div>
        {{-- <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>User Status <span class="red">*</span></label>
                <select name="status" class="form-control">
                    <option value="1" {{ $author->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $author->status == 0 ? 'selected' : '' }}>Suspend</option>
                </select>
            </div>
        </div> --}}
 
        <div class="form-group mb-2 text-center col-md-2">
            <button type="submit" class="btn btn-block btn-primary main_button1">Update</button>
        </div>
    </div>
</form>

<script>
    // $(document).ready(function() {
    //     $('#password, #confirm_password').on('keyup', function () {
    //         if ($('#password').val().length > 0) {
    //             if ($('#password').val() == $('#confirm_password').val()) {
    //                 $('#message').html('Matching').css('color', 'green');
    //             } else {
    //                 $('#message').html('Not Matching').css('color', 'red');
    //             }
    //         } else {
    //             $('#message').html('');
    //         }
    //     });
    // });

    // $('form#resetpassword').on('submit', function(event) {
    //             event.preventDefault();
                
    //             $.ajax({
    //                 url: $(this).attr('action'),
    //                 type: $(this).attr('method'),
    //                 data: $(this).serialize(),
    //                 success: function(response) {
    //                     if (response.status) {
    //                         toastr.success(response.notification);
    //                         $('form')[0].reset();
    //                         $('#message').html('');
    //                     } else {
    //                         toastr.error(response.notification);
    //                     }
    //                 },
    //                 error: function(response) {
    //                     toastr.error('An error occurred. Please try again.');
    //                 }
    //             });
    //         });

    $(document).ready(function() {
        initValidate('#edit_author_form');
        initValidate('#resetpassword');
    });

    $("#edit_author_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    $("#resetpassword").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }
</script>