<tr>
    <td>
        <div class="comment" style="margin-left: {{ $level * 20 }}px;">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <strong>{{ $comment->username }}</strong>
                </div>
                <div>
                    <small>{{ \Carbon\Carbon::parse($comment->created_at)->format('d M, Y h:iA') }}</small>
                </div>
            </div>
            <p>{{ $comment->content }}</p>
        </div>
    </td>
</tr>

@if ($comment->replies)
    @foreach ($comment->replies as $reply)
        @include('backend.pages.posts.partials.comment', ['comment' => $reply, 'level' => $level + 1])
    @endforeach
@endif