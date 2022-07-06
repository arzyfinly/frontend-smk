<script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
{{-- @include('admin.script.scriptcookie') --}}
<script>
    function getCookie(name){
        let cookie = {};
        document.cookie.split(';').forEach(function(el)
        {
            let[k, v] = el.split('=');
            cookie[k.trim()]=v;
        })
        
        return cookie[name];
    }
</script>
<script>

    function deleteData(e)
    {
        
            let id = e.getAttribute('data-id');
            Swal.fire({
            icon: 'error',
            title: 'Hapus Data!',
            text: "Apakah anda yakin ingin menghapus data ini??",
            showConfirmButton: true,
            showCancelButton: true
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: "http://localhost/pa/backend/public/api/majors/"+id,
                    type: "POST",
                    data: {"_method": "DELETE"},
                        headers: {
                            'Accept':'*/*',
                            'Authorization':'Bearer '+ getCookie('token'),
                        },
                    }).then((result) => {
                        location.reload();
                        Swal.fire({
                            icon: 'success',
                            title: "Deleted!",
                            text: "Data berhasil di hapus",
                            showConfirmButton: true,
                        });
                    });
            }else if(result.isDenied){
                Swal.fire({
                    icon: 'error',
                    title: "Cancelled",
                    text: "Menghapus data dibatalkan :)",
                });
            }
        });
    }
            //     });         
            // });
            // $.post("http://127.0.0.1:8000/api/majors",{
            //     name:jurusan,
            //     description:deskripsi
            // },function(response){
            //     location.reload(this);
            // });
</script>
