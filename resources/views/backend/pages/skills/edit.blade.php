<form id="edit_skills_form" action="{{ route('manage.update_skills') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $skills->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $skills->name  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $skills->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $skills->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="text-end">
    <button type="submit" class="btn btn-primary main_button1">Update</button></div>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_skills_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_skills_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>