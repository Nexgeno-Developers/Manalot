<form id="edit_years_of_exp_form" action="{{ route('manage.update_years_of_exp') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $years_of_exp->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="year_range" value="{{ $years_of_exp->year_range  }}" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $years_of_exp->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $years_of_exp->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="text-end">
    <button type="submit" class="btn btn-primary main_button1">Update</button></div>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_years_of_exp_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_years_of_exp_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>