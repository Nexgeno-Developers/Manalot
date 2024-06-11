@extends('backend.layouts.app')

@section('page.name', 'Posts')

@section('page.content')
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-5">
                <h3>List</h3>
            </div>
            <div class="col-sm-7">
                <div class="text-sm-end">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2"
                        onclick="smallModal('{{ url(route('post.add_post')) }}', 'Add Posts')"><i
                            class="mdi mdi-plus-circle me-2"></i> Add Posts</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Event</th>
                        <th>Image</th>
                        <th>Video</th>
                        <th>MediaType</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp  
                    @foreach ($posts as $status)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $status->username }}</td>
                        <td>{{ $status->content }}</td>
                        <td>{{ $status->event }}</td>
                        <td>{{ $status->image_url }}</td>
                        <td>{{ $status->video_url }}</td>
                        <td>{{ $status->MediaType }}</td>
                        <td>{{ $status->created_at }}</td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-info text-white action-icon"
                                onclick="smallModal('{{ url(route('post.edit_post',['id' => $status->id])) }}', 'Edit user')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('post.delete_post', $status->id)) }}',
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
$(document).ready(function() {
    var table = $('#basic-datatable5').DataTable();
});
</script>

<script>
var responseHandler = function(response) {
    location.reload();
}
</script>
@endsection