@extends('backend.layouts.app')

@section('page.name', 'Industry')

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
                        onclick="smallModal('{{ url(route('manage.add_industry')) }}', 'Add Industry')"><i
                            class="mdi mdi-plus-circle"></i> Add Industry</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <label for="rowsPerPage">Show</label>
                    <select id="rowsPerPage" onchange="updateRowsPerPage()" class="form-select form-select-sm">
                        <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request()->get('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span>entries</span>
                </div>
            </div>
            <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($industry->currentPage() - 1) * $industry->perPage() + 1;
                    @endphp
                    @foreach ($industry as $status)
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
                                onclick="smallModal('{{ url(route('manage.edit_industry',['id' => $status->id])) }}', 'Edit Industry')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                            </a>
                            {{-- <a href="javascript:void(0);" class="btn btn-danger text-white action-icon"
                                onclick="deleteExperienceStatus('{{ url(route('manage.delete_industry', $status->id)) }}')">
                            <i class="mdi mdi-delete" title="Delete"></i>
                            </a> --}}
                            <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('manage.delete_industry', $status->id)) }}',
                            responseHandler)">
                                <i class="mdi mdi-delete" title="Delete"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $industry->appends(['per_page' => request()->get('per_page')])->links('pagination::newbootstrap-6') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section("page.scripts")
<script>
$(document).ready(function() {
    var table = $('#basic-datatable5').DataTable({
        paging: false,
        info: false
    });
});
</script>

<script>

function updateRowsPerPage() {
    var rowsPerPage = document.getElementById('rowsPerPage').value;
    var url = new URL(window.location.href);
    url.searchParams.set('per_page', rowsPerPage);
    window.location.href = url.href;
}

var responseHandler = function(response) {
    location.reload();
}
</script>
@endsection