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
$(document).ready(function(){
	var id = {{ $id }};
	$.ajax({
			type:'GET',
			url:'http://localhost/pa/backend/public/api/majors/'+id,
			headers: {
            'Accept':'*/*',
            'Authorization':'Bearer '+ getCookie('token'),
        },
			dataType: "json",
			success: function(data){
				console.log(data);
					$("#name").val(data.name);
					$("#description").val(data.description);
			}
	});
		
	
	$("#sbmbtn").click(function(){
		event.preventDefault();
		var name = $("#name").val();
		var description = $("#description").val();
		var data = {
			name: name,
			description: description 
		};
	// 	var hasil = {
    //     name: name,
    //     description: description
    // };

		$.ajax({
			type: "PATCH",
			url: 'http://localhost/pa/backend/public/api/majors/'+{{$id}},
			headers: {
            'Accept':'*/*',
            'Authorization':'Bearer '+ getCookie('token'),
        },
			data: JSON.stringify(data),
			contentType: 'application/json',
		}).then((result) => {
        location.href = '/majors';
        Swal.fire({
            icon: 'success',
            title: "Update!",
            text: "Data berhasil di update",
            showConfirmButton: true,
        });
	});
	});
});
</script>