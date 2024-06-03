@extends('backend.layouts.app')

@section('page.name', 'Testimonial')

@section('page.content')
<div class="card">
   <div class="card-body">
      <div class="row mb-2">
         <div class="col-sm-5">
            <h3>List</h3>
         </div>
         <div class="col-sm-7">
            <div class="text-sm-end">
                <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="smallModal('{{ url(route('user.add')) }}', 'Add User')"><i class="mdi mdi-plus-circle me-2"></i> Add Testimonial</a>
            </div>
         </div>
      </div>
      <div class="row mb-2">
         <div class="col-sm-6">
            <select id="filter-approval" class="form-control">
                <option value="">All Approvals</option>
                <option value="1">Approved</option>
                <option value="0">Not Approved</option>
            </select>
         </div>
         <div class="col-sm-6">
            <select id="filter-status" class="form-control">
                <option value="">All Statuses</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
         </div>
      </div>
      <div class="table-responsive">
      <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Approval</th>
                <!-- <th>Status</th> -->
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1; @endphp                
            @foreach($users as $row)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->email }}</td>           
                <td>
                    @if($row->approval == 1)
                    <span class="badge bg-success" title="Approved">Approved</span>
                    @else
                    <span class="badge bg-danger" title="Not Approved">Not Approved</span>
                    @endif
                </td>

                <!-- @if($row->approval == 1)
                <td>
                    @if($row->status == 1)
                    <span class="badge bg-success" title="Active">Active</span>
                    @else
                    <span class="badge bg-danger" title="Inactive">Inactive</span>
                    @endif
                </td>
                @else
                    <td></td>
                @endif -->

                <td>{{ $row->created_at }}</td>

                
                    <td>
                        <a data-id="{{ $row->id }}" data-approval="{{ $row->approval }}" class="action-icon text-white btn @if($row->approval == 0) btn-success @else btn-warning @endif approveBtn">
                            @if($row->approval == 1)
                                <i title="Approve" class="ri-eye-off-fill"></i>
                            @else
                                <i title="UnApprove" class="ri-eye-fill"></i>
                            @endif
                        </a>
                        <a href="javascript:void(0);" class="btn btn-info text-white action-icon" onclick="smallModal('{{ url(route('user.edit',['id' => $row->id])) }}', 'Edit user')">
                            <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('user.delete', $row->id)) }}', responseHandler)">
                            <i class="mdi mdi-delete" title="Delete"></i>
                        </a>
                    </td>
                
                    <!-- <td>
                        <button class="btn btn-success approveBtn" data-id="{{ $row->id }}" data-approval="{{ $row->approval }}">
                            Approve User
                        </button>
                    </td> -->
            
                <!-- @if($row->approval == 1)
                    <td>
                        <a href="{{ url(route('user.status', ['id' => $row->id, 'status' => ($row->status == '1') ? '0' : '1'])) }}" class="action-icon">
                            @if ($row->status == '1')
                                <i class="ri-eye-off-fill"></i>
                            @else
                                <i class="ri-eye-fill"></i>
                            @endif
                        </a>
                        <a href="javascript:void(0);" class="action-icon" onclick="smallModal('{{ url(route('user.edit',['id' => $row->id])) }}', 'Edit user')">
                            <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                        </a>
                        <a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('user.delete', $row->id)) }}', responseHandler)">
                            <i class="mdi mdi-delete" title="Delete"></i>
                        </a>
                    </td>
                @else
                    <td>
                        <button class="btn btn-success approveBtn" data-id="{{ $row->id }}" data-approval="{{ $row->approval }}">
                            Approve User
                        </button>
                    </td>
                @endif -->
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
        $('.approveBtn').click(function() {
            var userId = $(this).data('id');
            var newApproval = $(this).data('approval') == 1 ? 0 : 1; // Toggle approval status
            var url = "{{ route('user.approvestatus', ['id' => ':id']) }}".replace(':id', userId);
            $.ajax({
                url: url,
                method: 'GET',
                data: { approval: newApproval },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        toastr.success('Approval status updated successfully');
                        location.reload();
                    } else {
                        toastr.error('User not found')
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle errors or display notifications if the AJAX request fails
                }
            });
        });
    });

    $(document).ready(function() {
        var table = $('#basic-datatable5').DataTable();
        
        // Filter by approval
        $('#filter-approval').on('change', function(){
            table.column(3).search(this.value).draw();
        });

        // Filter by status
        $('#filter-status').on('change', function(){
            table.column(4).search(this.value).draw();
        });
    });
</script>

<script>
    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection
