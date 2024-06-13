<style>
    #commentsTable_filter{
        margin-left:-10%;
        margin-bottom: 10%;
    }
</style>
<div class="table-responsive">
    <table id="commentsTable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th class="h4">Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                @include('backend.pages.posts.partials.comment', ['comment' => $comment, 'level' => 0])
            @endforeach
        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('#commentsTable').DataTable({
        responsive: true,
        searching: true,
        paging: false,
        lengthChange: false,
        info: false,
        ordering: false
    });
});
</script>