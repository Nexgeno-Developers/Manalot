@extends('backend.layouts.app')

@section('page.name', 'Manage Users')

@section('page.content')
<div class="card">
    <form method="GET" action="{{url(route('users.list'))}}">
        <div class="card-header row gutters-5">

            <div class="col-sm-2">
                <h4>List</h4>
            </div>

            <div class="col">
                <div class="form-group mb-0">
                    <input type="text" name="user_name" value="{{ request('user_name') }}" class="form-control"
                        placeholder="Search by User Name">
                </div>
            </div>
        
            <div class="col">
                <div class="form-group mb-3">
                    <select name="approval_status" class="text-muted form-control">
                        <option value="">Select Approval Status</option>
                        <option value="1" {{ request('approval_status') == '1' ? 'selected' : '' }}>Approved</option>
                        <option value="0" {{ request('approval_status') == '0' ? 'selected' : '' }}>Not Approved</option>
                    </select>
                </div>
            </div>

            {{-- <div class="col">
                <div class="form-group mb-3">
                    <select name="status" class="text-muted form-control">
                        <option value="">Select Ban Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>
            </div> --}}

            <div class="col-md-auto d-flex justify-content-end">
                <div class="input-group-append mx-md-2">
                    <button type="submit" class="btn btn-outline-secondary"><i class="ri-search-line"></i></button>
                </div>
                <div class="resetbtn mx-md-2">
                    <a href="{{ route('users.list') }}" class="btn btn-outline-danger main_button">Reset</a>
                </div>
            </div>
    </form>
</div>
<div class="card">
<div class="card-body">
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
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Documents</th>
                <th>Account Status</th>
                {{-- <th>Ban Status</th> --}}
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $row)
            @if(request('user_name') && stripos($row->username, request('user_name')) === false)
            @continue
            @endif
            <tr>
                <td>{{ ($key+1) + ($users->currentPage() - 1)*$users->perPage() }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    @if(!is_null($row->resume_cv) && !empty($row->resume_cv))
                        @if (strpos($row->resume_cv, 'my.sharepoint.com') !== false)
                            <a href="{{ $row->resume_cv }}" target="_blank">Resume</a>
                        @else
                            <a href="{{ asset('storage/' . $row->resume_cv) }}" target="_blank">Resume</a>
                        @endif
                    @endif
                    <br>
                    @if(!is_null($row->experience_letter) && !empty($row->experience_letter))
                        @if (strpos($row->experience_letter, 'my.sharepoint.com') !== false)
                            <a href="{{ $row->experience_letter }}" target="_blank">Experience Letter</a>
                        @else
                            <a href="{{ asset('storage/' . $row->experience_letter) }}" target="_blank">Experience Letter</a>
                        @endif
                    @endif
                </td>           
                <td>
                    @if($row->approval == 1)
                    <span class="badge bg-success" title="Approved">Approved</span>
                    @else
                    <span class="badge bg-danger" title="Not Approved">Not Approved</span>
                    @endif
                </td>
                {{-- <td>
                    @if($row->status == 1)
                    <span class="badge bg-success" title="Active">Active</span>
                    @else
                    <span class="badge bg-danger" title="Suspended">Suspended</span>
                    @endif
                </td> --}}
                <td>{{ datetimeFormatter($row->created_at) }}</td>
                <td>
                    <a href="javascript:void(0);" class="btn @if($row->approval == 0) btn-success @else btn-warning @endif approveBtn text-white action-icon" onclick="confirmModal('{{ url(route('user.approvestatus', $row->id )) }}', responseHandler,'to Approve User')">
                        @if($row->approval == 1)
                            <i title="UnApprove" class="ri-eye-off-fill"></i>
                        @else
                            <i title="Approve" class="ri-eye-fill"></i>
                        @endif
                    </a>
                    <a href="javascript:void(0);" class="btn btn-info text-white action-icon" onclick="largeModal('{{ url(route('user.edit',['id' => $row->id])) }}', 'Edit User - {!! \Illuminate\Support\Str::words($row->username, $words = 3, $end = '...') !!}')">
                        <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('user.delete', $row->id)) }}', responseHandler,'to Delete User')">
                        <i class="mdi mdi-delete" title="Delete"></i>
                    </a>
                    <a href="javascript:void(0);" title="View" class="btn btn-info text-white action-icon" onclick="largeModal('{{ url(route('user.view',['id' => $row->id])) }}', 'View - {!! \Illuminate\Support\Str::words($row->username, $words = 3, $end = '...') !!}')">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $users->appends(['per_page' => request()->get('per_page')])->links('pagination::newbootstrap-6') }}
    </div>
</div>

@endsection

@section("page.scripts")
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
