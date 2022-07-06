
<div class="modal fade" id="modalCreateCounselor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Konselor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createCounselor">
            @csrf
            <div class="form-group">
                <label>Nama Konselor</label>
                <select name="teacher_id" id="teacher_id" class="form-control teacher_id">
                  <option value="" selected>Pilih Guru</option>
                  @foreach ($teachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->name }}
                      </option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label>Pilih Kelas</label>
              <select name="classes_id" id="classes_id" class="form-control kelas">
                  <option value="" selected>Pilih Kelas</option>
                  @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}
                    </option>
                @endforeach
              </select>
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
@include('admin.counselors.scriptcreatedata')
                    