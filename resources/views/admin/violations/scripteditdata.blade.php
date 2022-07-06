<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
        $("#editCounselor").on('submit', function(event){
            let id = $('#id').val();
            // let id = e.getAttribute('data-id');
            let formData = new FormData(this);
                $.ajax({
                    url: "http://localhost/PA/backend-smk/public/api/counselors/"+id,
                    type: "POST",
                    headers: {
                        'Accept':'*/*',
                        'Authorization':'Bearer '+ getCookie('token'),
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).then((result) => {
                    // location.h1sref = '/counselors';
                    Swal.fire({
                        icon: 'success',
                        title: "Tersimpan!",
                        text: "Data berhasil di Edit",
                        showConfirmButton: true,
                    });
                });
            });
</script>
{{-- <script>
$('#editCounselor').on('submit', function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    let id = $('#id').val();
    console.log(id);
    $('#error_edit_brand').text('');
    $('#error_edit_description').text('');

    $.ajax({
        url: "http://localhost/PA/backend-smk/public/api/counselors/"+id,
        type: "POST",
        headers: {
            'Accept': '/',
            'Authorization': 'Bearer ' + getCookie('token'),
        },
        contentType: 'application/json',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        cors: true,
        success: function (response) {
            if (response.success == true) {
                toastr.success(response.message);
                $("#form-edit")[0].reset();
                $('#edit-modal').modal('hide'); //modal hide
                var oTable = $('#brand_table').DataTable(); //inialisasi datatable
                oTable.ajax.reload(); //reset datatable
            }
        },
        error: function (response) {
            $('#error_edit_brand').text(response.responseJSON.brand[0]);
            $('#error_edit_description').text(response.responseJSON.description[0]);
        },
    });
}) --}}

<script>
function updateItem(e) {

let id = e.getAttribute('data-id');
$.ajax({
    type: 'GET',
    url: "http://localhost/PA/backend-smk/public/api/counselors/"+id,
    headers: {
        'Authorization': 'Bearer ' + getCookie('token'),
        'Accept': 'application/json'
    },
    contentType: 'application/json',
    success: function (response) {
        $('#id').val(response.counselor.id);
        $('#teacher_id_edit').val(response.counselor.teacher.name);
        $('#classes_id_edit').val(response.counselor.class_school.name);
        $('#modalEditCounselor').modal('show');
    }
})
}
</script>