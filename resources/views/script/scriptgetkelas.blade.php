{{-- <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            
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

    // console.log(getCookie('token'));
</script>
<script>
    $(document).ready(function(){
        $.ajax({
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+getCookie('token')
            },
            type:'GET',
            url:'http://localhost/PA/backend-smk/public/api/classes',
            dataType: "json",
            contentType: 'application/json',
            success:function(data){
                $("#classes_id").empty();
                $("#classes_id").append('<option value="0" disabled="true selected="true">Pilih Kelas</option>');
                $.each(data, function(index, itemData){
                    $.each(this, function(k, value) {
                        $("#classes_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                });
            }
        });
    });
</script>

