<script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script>

$(document).ready(function(){
    // var api = "{{env('API_URL')}}";

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('classes.index') }}",
            type: 'GET',
        },
        "responsive": true,
        "language": {
            "oPaginate": {
                "sNext": "<i class='fas fa-angle-right'>",
                "sPrevious": "<i class='fas fa-angle-left'>",
            },
            // processing: '<img src="{{ asset('image/loading2.gif') }}">',
        },
        columns: [{
                data: 'DT_RowIndex',
            },
            {
                data: 'name',
            },
            {
                data: 'major',
            },
            {
                data: 'description',
            },
            {
                data: 'action'
            },
        ],
    });
});
</script>