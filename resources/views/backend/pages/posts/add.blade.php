<form id="add_posts_form" action="{{ route('post.create_post') }}" method="POST">
    @csrf
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="trumbowyg"></textarea>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label for="event">Event:</label>
            <input type="text" id="event" name="event">
        </div>
    </div>
    <div class="col-sm-12">
        <label for="MediaType">Media Type:</label>
        <select id="MediaType" name="MediaType" class="select2">
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label for="media">Upload Media:</label>
        <input type="file" id="image" name="media">
    </div>
    <div class="col-sm-6">
        <label for="media">Upload Media:</label>
        <input type="file" id="video" name="media">
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3 text-end">
            <button type="submit" class="btn btn-block btn-primary">Submit</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initValidate('#add_posts_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#add_posts_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>