<form id="add_skills_import_form" action="{{ route('skills.import') }}" method="POST">
    @csrf
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Skills Import <span class="red">*</span></label>
            <input type="file" name="file" accept=".xlsx,.csv" required>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3 text-end">
            <button type="submit" class="btn btn-block btn-primary main_button1">Submit</button>
        </div>
    </div>
</form>

<div class="row">
    <label class="col-12">Sample File: <a class="col-6" href="/assets/backend/excel/dummy.csv" download>Download CSV</a></label>
    <p><strong>Note:</strong> Upload only up to 3000 rows. The file must be in Excel or CSV format.</p>
</div>



<script>
$(document).ready(function() {
    initValidate('#add_skills_import_form');
});

$("#add_skills_import_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>