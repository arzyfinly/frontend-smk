<script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
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

$("#sbmbtn").click(function( e){
    var jurusan = $("#jurusan").val();
    var deskripsi = $("#deskripsi").val();
    var hasil = {
        name: jurusan,
        description: deskripsi
    };

    $.ajax({
        type: 'POST',
        url: 'http://localhost/pa/backend/public/api/majors',
        headers: {
            'Accept':'*/*',
            'Authorization':'Bearer '+ getCookie('token'),
        },
        data: JSON.stringify(hasil),
        contentType: 'application/json'
    }).then((result) => {
        location.href = '/majors';
        Swal.fire({
            icon: 'success',
            title: "Tersimpan!",
            text: "Data berhasil di Simpan",
            showConfirmButton: true,
        });
    });
});

</script>