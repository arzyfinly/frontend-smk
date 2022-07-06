<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        Swal.fire({
            title: 'Kamu yakin ?',
            text: "ingin menghapus data konselor ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/PA/backend-smk/public/api/counselors/"+id,
                    headers: {
                        'Accept':'*/*',
                        'Authorization':'Bearer '+ getCookie('token'),
                    },
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "DELETE",
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // console.log(response);
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
                            $("#" + id + "").remove(); // you can add name div to remove
                        },
                    error: function(response){   
                        // console.log(response.responseJSON);                     
                            Swal.fire({
                                icon: 'error',
                                title: response.responseJSON.message,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                },
                                toast: true,
                                position: 'top-right'
                            }).then((result) => {
                                // Reload the Page
                                // location.reload();
                            })
                            $("#" + id + "").remove();
                    }
                    });
                }
            })

        };
</script>
