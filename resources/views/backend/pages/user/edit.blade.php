<form id="resetpassword" method="POST" action="{{url(route('password.update'))}}">
    @csrf
    <input type="hidden" name="id" value="{{ $author->id }}">
    <h3>Rest Password</h3>
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">New Password <span class="red">*</span></label>

        <div class="col-md-6">
            <input id="password" type="text" class="form-control" name="password" minlength="6" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password <span class="red">*</span></label>

        <div class="col-md-6">
            <input id="confirm_password" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <span id='message'></span>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </div>
</form>

<hr class="mb-4">

<form id="edit_author_form" action="{{url(route('user.update'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-sm-12">
        <input type="hidden" name="id" value="{{ $author->id }}">
            <div class="form-group mb-3">
                <label>Username <span class="red">*</span></label>
                <input type="text" class="form-control" name="username" value="{{ $author->username  }}" required>
            </div>
        </div>        
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Email <span class="red">*</span></label>
                <input type="email" class="form-control" name="email" value="{{ $author->email }}" required>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>User Status <span class="red">*</span></label>
                <select name="status" class="form-control">
                    <option value="1" {{ $author->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $author->status == 0 ? 'selected' : '' }}>Suspend</option>
                </select>
            </div>
        </div>
 
        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val().length > 0) {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else {
                    $('#message').html('Not Matching').css('color', 'red');
                }
            } else {
                $('#message').html('');
            }
        });
    });
    $('form#resetpassword').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.notification);
                            $('form')[0].reset();
                            $('#message').html('');
                        } else {
                            toastr.error(response.notification);
                        }
                    },
                    error: function(response) {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

    $(document).ready(function() {
        initValidate('#edit_author_form');
    });

    $("#edit_author_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }
</script>