<div class="modal fade" id="modalEditCounselor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Counselor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <i id="id"></i>
          <form id="editCounselor">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Konselor</label>
                <select name="teacher_id" id="teacher_id_edit" class="form-control teacher_id">
                  <option value="0" disabled="true" selected="true">Guru</option>
                </select>
            </div>
            <div class="form-group">
              <label>Pilih Kelas</label>
              <select name="classes_id" id="classes_id_edit" class="form-control kelas">
                  <option value="0" disabled="true" selected="true">Kelas</option>
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
@include('script.scriptgetguruedit')
@include('script.scriptgetkelasedit')
@include('admin.counselors.scripteditdata')