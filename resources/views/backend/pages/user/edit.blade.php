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
                <label>Status <span class="red">*</span></label>
                <select name="status" class="form-control">
                    <option value="1" {{ $author->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $author->status == 0 ? 'selected' : '' }}>Inactive</option>
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