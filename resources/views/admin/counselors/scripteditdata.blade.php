<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
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
                    // location.href = '/counselors';
                    Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1250,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                },
                                toast: true,
                                position: 'top-right'
                            }).then((result) => {
                                // Reload the Page
                                location.reload();
                            })
                    });
                });
            });
</script>

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