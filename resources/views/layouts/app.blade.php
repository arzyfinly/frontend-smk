<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="img/logo/logo.png" rel="icon">
        <title>BK | @yield('title')</title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/ruang-admin.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('nav.navside')
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                <!-- TopBar -->
                    @include('nav.navtop')
                    <!-- Topbar -->
                    <div class="container-fluid" id="container-wrapper">
                        @yield('content')
                        <!-- Modal Logout -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to logout?</p>
                                    </div>
                                    <form id="logout">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                            <a id="submit" type="submit" class="btn btn-primary">Logout</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
                                <b><a href="https://arzyfinly8.it.student.pens.ac.id" target="_blank">Arzyfinly</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>
        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        
        <script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        {{-- <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script> --}}
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('js/ruang-admin.min.js')}}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script>
            $(document).ready(function () {
              $('#dataTable').DataTable(); // ID From dataTable 
            });
        </script>
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
            $(document).ready(function (){
            $("#logout").on('submit', function(event) {
                event.preventDefault();
                $(".preloader").fadeIn();
                $.ajax({
                    url: "http://localhost/pa/backend/public/api/logout",
                    type: "POST",
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".preloader").fadeOut();
                        if (response.success) {
                            window.location.href = "/login";
                            document.cookie = "token=";
                        }
                    },
                });
            });
        });
        //     $("#logout").click(function(e){
        //     $.ajax({
        //         type: 'POST',
        //         url: 'http://localhost/pa/backend/public/api/logout',
        //         headers: {
        //                 'Authorization': 'Bearer ' + getCookie('token'),
        //                 'Content-Type': 'application/json',
        //                 'Accept': 'application/json',
        //         },
                
        //     }).then((result) => {
        //         location.href = "{{ route('login') }}";
        //     });
        // });
        </script>
          
</body>
</html>