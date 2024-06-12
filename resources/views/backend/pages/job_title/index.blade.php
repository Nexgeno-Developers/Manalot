@extends('backend.layouts.app')

@section('page.name', 'Job Title')

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
                        onclick="smallModal('{{ url(route('manage.add_job_title')) }}', 'Add Job Title')"><i
                            class="mdi mdi-plus-circle me-2"></i> Add Job Title</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp  
                    @foreach ($job_title as $status)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $status->name }}</td>
                        <td>
                            @if( $status->status == 1)
                                <span class="badge bg-success" title="Active">Active</span>
                            @else
                                <span class="badge bg-danger" title="Inactive">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-info text-white action-icon"
                                onclick="smallModal('{{ url(route('manage.edit_job_title',['id' => $status->id])) }}', 'Edit user')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                            </a>
                            {{-- <a href="javascript:void(0);" class="btn btn-danger text-white action-icon"
                                onclick="deleteExperienceStatus('{{ url(route('manage.delete_job_title', $status->id)) }}')">
                            <i class="mdi mdi-delete" title="Delete"></i>
                            </a> --}}
                            <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('manage.delete_job_title', $status->id)) }}',
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