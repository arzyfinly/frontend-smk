<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
$(document).ready(function () {
$("#createViolation").on('submit', function(event){
    
    event.preventDefault();
    let formData = new FormData(this);
            $.ajax({
                url: "http://localhost/PA/backend-smk/public/api/violations",
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
        location.href = '/violations';
        Swal.fire({
            icon: 'success',
            title: "Tersimpan!",
            text: "Data berhasil di Simpan",
            showConfirmButton: true,
        });
    });
});
});
</script>