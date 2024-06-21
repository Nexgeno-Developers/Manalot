<form id="edit_job_title_form" action="{{ route('manage.update_job_title') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $job_title->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $job_title->name  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $job_title->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $job_title->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="text-end">
    <button type="submit" class="btn btn-primary main_button1">Update</button></div>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_job_title_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_job_title_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>