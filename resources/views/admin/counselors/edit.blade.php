@extends('layouts.app')
@section('title', 'Counselor')
@section('counselor-active', 'active')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{__('Konselor')}}</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">{{__('Home')}}</a></li>
      <li class="breadcrumb-item"><a href="/counselors">{{__('Konselor')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Edit')}}</li>
  </ol>
</div>
<div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Edit Konselor')}}</h6>
          </div>
          <div class="table-responsive p-3">
          <form id="editCounselor">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Konselor</label>
                <select class="form-control" name="teacher_id" id="teacher_id">
                  <option selected value="">--Pilih Guru--</option>
                  @foreach ($teachers as $teacher)
                      @if ($teacher->id == $counselor->teacher_id)
                          @php($select = 'selected')
                      @else
                          @php($select = '')
                      @endif
                      <option {{ $select }} value="{{ $teacher->id }}">{{ $teacher->name }}
                      </option>
                  @endforeach
              </select>
              <small class="text-danger" id="teacher_id-error"></small>
            </div>
            <div class="form-group">
              <label>Pilih Kelas</label>
              <select class="form-control" name="classes_id" id="classes_id">
                <option selected value="">--Pilih Kelas--</option>
                @foreach ($classes as $class)
                    @if ($class->id == $counselor->classes_id)
                        @php($select = 'selected')
                    @else
                        @php($select = '')
                    @endif
                    <option {{ $select }} value="{{ $class->id }}">{{ $class->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger" id="classes_id-error"></small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" id="submit" class="btn btn-primary">Buat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@include('admin.counselors.scripteditdata')