<form id="add_job_title_form" action="{{ route('manage.create_job_title') }}" method="POST">
    @csrf
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>symbol <span class="red">*</span></label>
            <input type="text" class="form-control" name="symbol" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1">Activate</option>
                <option value="0">Deactivate</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3 text-end">
            <button type="submit" class="btn btn-block btn-primary main_button1">Submit</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initValidate('#add_job_title_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#add_job_title_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>