<style>
    #sharesTable_filter{
        margin-left:-10%;
        margin-bottom: 10%;
    }
</style>
<table id="sharesTable" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Username</th>
            <th>Shared At</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($shares as $share)
        <tr>
            <td style="width: 40px;">{{$i++}}</td>
            <td>{{ $share->username }}</td>
            <td>{{ \Carbon\Carbon::parse($share->created_at)->format('d M, Y h:iA') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#sharesTable').DataTable({
        responsive: true,
        searching: true,
        paging: false,
        lengthChange: false,
        info: false
    });
});
</script>