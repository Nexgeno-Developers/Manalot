<style>
    #likesTable_filter{
        margin-left:-10%;
        margin-bottom: 10%;
    }
</style>
<table id="likesTable" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Username</th>
            <th>Liked At</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp  
        @foreach ($likes as $like)
        <tr>
            <td style="width: 40px;">{{$i++}}</td>
            <td>{{ $like->username }}</td>
            <td>{{ \Carbon\Carbon::parse($like->created_at)->format('d M, Y h:iA') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#likesTable').DataTable({
        responsive: true,
        searching: true,
        paging: false,
        lengthChange: false,
        info: false
    });
});
</script>