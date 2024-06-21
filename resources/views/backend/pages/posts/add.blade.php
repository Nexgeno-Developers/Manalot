<form id="add_posts_form" action="{{ route('post.create_post') }}" method="POST">
    @csrf
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="content" class="form-label">Content: <span class="red">*</span></label>
                <textarea id="content" class="form-control" name="content" rows="10" required></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div id="image" class="form-group mb-3">
                <label for="image" class="form-label">Upload Image: <span class="red">*</span></label>
                <input class="form-control" type="file" accept="image/*,image/webp" name="image" required>
            </div>

            <div class="form-group mb-3">
                <label for="event" class="form-label">Event: <span class="red">*</span></label>
                <input placeholder="Enter Text Here" class="form-control" type="text" id="event" name="event" required >
            </div>       

            <div class="form-group mb-3">
                <label for="status" class="form-label">Status: <span class="red">*</span></label>
                <select class="form-select" id="status1" name="status" required>
                    <option selected value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>            
        </div>
        {{--
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="event">Event: <span class="red">*</span></label>
                <input placeholder="Enter Text Here" class="form-control" type="text" id="event" name="event" required >
            </div>
            <div id="image" class="form-group mb-3">
                <label>Upload Image: <span class="red">*</span></label>
                <input class="form-control" type="file" accept="image/*,image/webp" name="image" required>
            </div>
            
            <div id="video" class="form-group mb-3">
                <label>Upload Video: <span class="red">*</span></label>
                <input class="form-control" type="file" accept="video/*" name="video" required>
            </div>
            <div class="form-group mb-3">
                <label>Media Type: <span class="red">*</span></label>
                <select class="form-select"  id="MediaType" name="MediaType" required>
                    <option value="">Please Select Media Type</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
        </div>
        --}}

        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary main_button1">Create</button>
            </div>
        </div>
    </div>

</form>
<script>
$(document).ready(function() {
    initValidate('#add_posts_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');

    // Handle media type change
   /* $('#MediaType').change(function() {
        let selectedType = $(this).val();
        if (selectedType === 'image') {
            $('#image').show();
            $('#video').hide();
        } else if (selectedType === 'video') {
            $('#video').show();
            $('#image').hide();
        }
        else{
            $('#image').hide();
            $('#video').hide();
        }
    });
    // Hide media inputs initially
    $('#image').hide();
    $('#video').hide();
    */
});

$("#add_posts_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>