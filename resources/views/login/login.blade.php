@extends('layouts.main')
@section('title', 'Login')
@section('content')
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                <div class="card shadow-sm my-4">
                    <img class=" card-img-top" width="100" height="300"  src="{{ asset('/img/logo-smk.png') }}" alt="SMK" alt="Card image">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Login</h1>
                                        <small class="text-danger" id="message-error"></small>
                                    </div>
                                    <form class="user" id="login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="Email">
                                            <small class="text-danger" id="email-error"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password">
                                            <small class="text-danger" id="password-error"></small>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="submit"
                                                class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script type="text/javascript">
        $("#login").on('submit', function(event) {
            event.preventDefault();
            $(".preloader").fadeIn();
            let formData = new FormData(this);
            $('#email-error').text('');
            $('#password-error').text('');
            $('#message-error').text('');

            $.ajax({
                url: "http://localhost/PA/backend-smk/public/api/login",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".preloader").fadeOut();
                    if (response.success) {
                        document.cookie = "token=" + response.token;
                        sessionStorage.setItem('success', response.message);
                        window.location.href = "{{ route('home') }}";
                    }
                },
                error: function(response) {
                    $(".preloader").fadeOut();
                    $('#email-error').text(response.responseJSON.email);
                    $('#password-error').text(response.responseJSON.password);
                    $('#message-error').text(response.responseJSON.message);
                },
            });
        });
    </script>
@endsection
