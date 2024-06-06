<form id="edit_experience_form" action="{{ route('manage.update_experience_status') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $experience_status->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $experience_status->name  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $experience_status->status == 1 ? 'selected' : '' }}>Activate</option>
                <option value="0" {{ $experience_status->status == 0 ? 'selected' : '' }}>Deactivate</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_experience_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_experience_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>