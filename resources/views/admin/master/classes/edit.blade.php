@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Edit Jurusan</h4>
                    </div>
                    <div class="card-body">                  
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" >
                            </div>                            
                            <div class="form-group">
                                <button class="btn btn-info" id="sbmbtn" >Simpan</button>                                
                            </div>                        
                    </div>
                </div>
            </div>
            @include('admin.master.jurusan.scripteditdata')
        @endsection
