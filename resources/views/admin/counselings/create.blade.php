@extends('layouts.app')
@section('title', 'Cunseling')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Tambah Jurusan</h4>
                    </div>
                    <div class="card-body">
                        <form id="counseling"></form>
                            @csrf
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="time" class="form-control" name="time" id="time" >
                            </div>                            
                            <div class="form-group">
                                <label>Metode</label>
                                <input type="text" class="form-control" name="method" id="method" >
                            </div>                            
                            <div class="form-group">
                                <label>Tanggal Konseling</label>
                                <input type="date" class="form-control" name="date_counseling" id="date_counseling" >
                            </div>                            
                            <div class="form-group">
                                <label>Nama Konselor</label>
                                <input type="text" class="form-control" name="counselor_id" id="counselor_id" >
                            </div>                            
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" id="status" >
                            </div>                            
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" >
                            </div>                            
                            <div class="form-group">
                                <button class="btn btn-info" id="sbmbtn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('admin.counselings.scriptcreatedata')
            {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript">
        $("#counseling").on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            

            $.ajax({
                url: "http://localhost/PA/backend-smk/public/api/counselings",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // $(".preloader").fadeOut();
                    if (response.success) {
                        document.cookie = "token=" + response.token;
                        sessionStorage.setItem('success', response.message);
                        window.location.href = "/counselings";
                    }
                },
                // error: function(response) {
                //     $(".preloader").fadeOut();
                //     $('#email-error').text(response.responseJSON.email);
                //     $('#password-error').text(response.responseJSON.password);
                //     $('#message-error').text(response.responseJSON.message);
                // },
            });
        });
    </script> --}}
        @endsection
