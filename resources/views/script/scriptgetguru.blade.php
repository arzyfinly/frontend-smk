{{-- <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            
<script>
    function getCookie(name){
        let cookie = {};
        document.cookie.split(';').forEach(function(el){
            let[k, v] = el.split('=');
            cookie[k.trim()]=v;
        })
        return cookie[name];
    }
</script>
<script>
    $(document).ready(function(){
        $.ajax({
            type:'GET',
            url:'http://localhost/PA/backend-smk/public/api/teachers',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+getCookie('token')
            },
            dataType: "json",
            data: 'classes',
            success:function(data){
                $("#teacher_id").empty();
                $("#teacher_id").append('<option value="0" disabled="true selected="true">Pilih Guru</option>');
                $.each(data,function(key, value){
                    $.each(this, function(k, value) {
                        $("#teacher_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                });
            }
        });
    });
</script>

