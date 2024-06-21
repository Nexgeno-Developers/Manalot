<form id="edit_posts_form" action="{{ route('post.update_post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="post_id" value="{{ $posts->id }}">
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="content" class="form-label">Content: <span class="red">*</span></label>
                <textarea id="content" class="form-control" name="content" rows="10" required>{{ $posts->content }}</textarea>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group mb-3" id="image_upload">
                <label>Upload Image: @if (!$posts->image_url) <span class="red">*</span> @endif</label>
                <input class="form-control" type="file" accept="image/*,image/webp" name="image" @if (!$posts->image_url) required @endif>
                @if ($posts->image_url)
                    <p>Current Image: <a href="{{ asset('storage/' . $posts->image_url) }}" target="_blank">View Image</a></p>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="event">Event: <span class="red">*</span></label>
                <input placeholder="Enter Text Here" class="form-control" type="text" id="event" name="event" value="{{ $posts->event }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="status" class="form-label">Status: <span class="red">*</span></label>
                <select class="form-select" id="status1" name="status" required>
                <option value="1" {{ $posts->status == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $posts->status == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        {{--
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="event">Event: <span class="red">*</span></label>
                <input placeholder="Enter Text Here" class="form-control" type="text" id="event" name="event" value="{{ $posts->event }}" required>
            </div>
            <div class="form-group mb-3" id="image_upload">
                <label>Upload Image: @if (!$posts->image_url) <span class="red">*</span> @endif</label>
                <input class="form-control" type="file" accept="image/*,image/webp" name="image" @if (!$posts->image_url) required @endif>
                @if ($posts->image_url)
                    <p>Current Image: <a href="{{ asset('storage/' . $posts->image_url) }}" target="_blank">View Image</a></p>
                @endif
            </div>
             
            <div class="form-group mb-3" id="video_upload">
                <label>Upload Video: @if (!$posts->video_url) <span class="red">*</span> @endif</label>
                <input class="form-control" type="file" accept="video/*" name="video" @if (!$posts->video_url) required @endif>
                @if ($posts->video_url)
                    <p>Current Video: <a href="{{ asset('storage/' . $posts->video_url) }}" target="_blank">View Video</a></p>
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Media Type: <span class="red">*</span></label>
                <select class="form-select" id="MediaType" name="MediaType" required>
                    <option value="image" {{ $posts->MediaType == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $posts->MediaType == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>
            --}}
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary main_button1">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_posts_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');

    // Show/hide upload fields based on media type selection
    $('#MediaType').change(function() {
        let selectedType = $(this).val();
        if (selectedType === 'image') {
            $('#image_upload').show();
            $('#video_upload').hide();
        } else if (selectedType === 'video') {
            $('#video_upload').show();
            $('#image_upload').hide();
        }
    });

    // Initially hide the upload fields based on the default media type
    let defaultMediaType = $('#MediaType').val();
    if (defaultMediaType === 'image') {
        $('#image_upload').show();
        $('#video_upload').hide();
    } else if (defaultMediaType === 'video') {
        $('#video_upload').show();
        $('#image_upload').hide();
    }
});

$("#edit_posts_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>
