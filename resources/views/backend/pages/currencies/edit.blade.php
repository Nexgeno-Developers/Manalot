<form id="edit_job_title_form" action="{{ route('manage.update_job_title') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $currencies->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Symbol <span class="red">*</span></label>
            <input type="text" class="form-control" name="symbol" value="{{ $currencies->symbol  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $currencies->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $currencies->status == 0 ? 'selected' : '' }}>Inactive</option>
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