<form id="edit_posts_form" action="{{ route('manage.update_posts') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $posts->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $posts->name  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $posts->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $posts->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_posts_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_posts_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>