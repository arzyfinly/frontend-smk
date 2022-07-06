<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script>
        function getCookie(name){
            let cookie = {};
            deocument.cookie.split(';').forEach(function(el){
                let[k, v] = el.split('=');
                cookie[k.trim()]=v;
            })
            return cookie[name];
        }
</script>