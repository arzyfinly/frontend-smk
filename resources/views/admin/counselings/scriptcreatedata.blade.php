<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
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
$("#counseling").click(function(e){
    let formData = new FormData(this);
            $.ajax({
                url: "http://localhost/PA/backend-smk/public/api/counselings",
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
        location.href = '/counselings';
        Swal.fire({
            icon: 'success',
            title: "Tersimpan!",
            text: "Data berhasil di Simpan",
            showConfirmButton: true,
        });
    });
});
</script>