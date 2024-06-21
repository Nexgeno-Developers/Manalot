@extends('backend.layouts.app')

@section('page.name', 'Manage Post')

@section('page.content')
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-5">
                <h3>List</h3>
            </div>
            <div class="col-sm-7">
                <div class="text-sm-end">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2 main_button"
                        onclick="largeModal('{{ url(route('post.add_post')) }}', 'Add Posts')"><i
                            class="mdi mdi-plus-circle"></i> Add Posts</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Image</th>
                        <th>Likes</th>
                        <th>Comments</th>
                        <th>Shares</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp  
                    @foreach ($posts as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        {{--<td>{{ $row->username }}</td>
                        <td>
                            {!! \Illuminate\Support\Str::words($row->content, $words = 1, $end = '...') !!}
                        </td>
                        <td>{{ $row->event }}</td>--}}
                        <td>
                            @if ($row->image_url)
                                <img src="{{ asset('storage/' . $row->image_url) }}" alt="Thumbnail" class="thumbnail" onclick="viewMedia('{{ asset('storage/' . $row->image_url) }}', 'image', 'View Image')" style="width: 70px; cursor: pointer;">
                            @endif
                           {{-- @if ($row->video_url)
                                <button class="btn btn-primary" onclick="viewMedia('{{ asset('storage/' . $row->video_url) }}', 'video', 'View Video')">View Video</button>
                            @endif --}}
                            @if (!$row->image_url)
                                N/A
                            @endif
                        </td>
                        {{--<td>{{ $row->MediaType }}</td>--}}
                        <td onclick="smallModal('{{ url(route('post.likes_post',['id' => $row->id])) }}', 'Liked By')" style="cursor: pointer;">
                            {{ $row->likes_count }}
                        </td>
                        <td onclick="smallModal('{{ url(route('post.comments_post',['id' => $row->id])) }}', 'Post ID :{{$row->id}} - {!! \Illuminate\Support\Str::words($row->content, $words = 3, $end = '...') !!}')" style="cursor: pointer;">{{ $row->comments_count }}</td>
                        <td onclick="smallModal('{{ url(route('post.shared_post',['id' => $row->id])) }}', 'Shared By')" style="cursor: pointer;">{{ $row->shares_count }}</td>
                        <td>
                            @if($row->status)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inctive</span>
                            @endif
                        </td>
                        <td>{{ $row->created_at->format('d M, Y h:iA') }}</td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-info text-white action-icon"
                                onclick="largeModal('{{ url(route('post.edit_post',['id' => $row->id])) }}', 'Edit Post ID :{{$row->id}} - {!! \Illuminate\Support\Str::words($row->content, $words = 3, $end = '...') !!}')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-warning text-white action-icon"
                                onclick="largeModal('{{ url(route('post.view_post',['id' => $row->id])) }}', 'View Post ID :{{$row->id}} - {!! \Illuminate\Support\Str::words($row->content, $words = 3, $end = '...') !!}')">
                                <i class="mdi mdi-eye" title="View"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('post.delete_post', $row->id)) }}',
                            responseHandler)">
                                <i class="mdi mdi-delete" title="Delete"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("page.scripts")
<script>
function viewMedia(url, type, heading) {
    let modalBody = document.querySelector('#smallModal .modal-body');
    let modalTitle = document.querySelector('#smallModal-label'); // Corrected ID
    
    modalBody.innerHTML = ''; // Clear any previous content
    modalTitle.textContent = heading; // Set the heading

    if (type === 'image') {
        let img = document.createElement('img');
        img.src = url;
        img.className = 'img-fluid';
        modalBody.appendChild(img);
    } else if (type === 'video') {
        let video = document.createElement('video');
        video.src = url;
        video.controls = true;
        video.className = 'w-100';
        modalBody.appendChild(video);
    }

    // Show the modal
    $('#smallModal').modal('show');
}

$(document).ready(function() {
    var table = $('#basic-datatable5').DataTable();
});

var responseHandler = function(response) {
    location.reload();
}
</script>
@endsection
