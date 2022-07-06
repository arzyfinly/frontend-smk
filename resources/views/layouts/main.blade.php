<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="img/logo/logo.png" rel="icon">
        <title>BK | @yield('title')</title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/ruang-admin.min.css')}}" rel="stylesheet">
    </head>
<body>
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
    @yield('content')
</body>
<script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
{{-- <script src="{{ asset('js/ruang-admin.js')}}"></script> --}}
{{-- <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>  --}}
</html>
