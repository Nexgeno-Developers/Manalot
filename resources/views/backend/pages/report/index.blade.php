@extends('backend.layouts.app')

@section('page.content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">Logs</h1>
        </div>
    </div>
</div>


<div class="card">
    <form method="GET" action="{{url(route('reports.index'))}}">
        <div class="card-header row gutters-5">

            <div class="col-sm-2">
                <h4>List</h4>
            </div>

            <div class="col">
                <div class="form-group mb-0">
                    <input type="text" name="user_name" value="{{ request('user_name') }}" class="form-control"
                        placeholder="Search by Name">
                </div>
            </div>
        {{--
            <div class="col">
                <div class="form-group mb-3">
                    <select name="status" class="text-muted form-control">
                        <option value="">Select Employee Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                    <select name="approval_status" class="text-muted form-control">
                        <option value="">Select Approval Status</option>
                        <option value="1" {{ request('approval_status') == '1' ? 'selected' : '' }}>Activate</option>
                        <option value="0" {{ request('approval_status') == '0' ? 'selected' : '' }}>Deactivate</option>
                    </select>
                </div>
            </div>
            --}}
            <div class="col-md-auto d-flex justify-content-end">
                <div class="input-group-append mx-md-2">
                    <button type="submit" class="btn btn-outline-secondary"><i class="ri-search-line"></i></button>
                </div>
                <div class="resetbtn mx-md-2">
                    <a href="{{ route('reports.index') }}" class="btn btn-outline-danger">Reset</a>
                </div>
            </div>
    </form>



</div>
<div class="card-body">
    <table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Ip Info</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $key => $row)
            @if(request('user_name') && stripos($row->username, request('user_name')) === false)
            @continue
            @endif
            <tr>
                <td>{{ ($key+1) + ($logs->currentPage() - 1)*$logs->perPage() }}</td>
                <td>{{$row->username}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->ip_info}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $logs->links('pagination::newbootstrap-6') }}
    </div>
</div>


@endsection