
<div class="modal fade" id="modalCreateVioaltion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createViolation">
            @csrf
            <div class="form-group">
                <label>Nama Siswa</label>
                <select name="student_id" id="student_id" class="form-control student_id">
                  <option value="0" disabled="true" selected="true">Student</option>
                </select>
            </div>
            <div class="form-group">
              <label>Point</label>
              <select name="point" id="point" class="form-control point">
                  <option value="0" disabled="true" selected="true">Point</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status" class="form-control status">
                  <option value="0" disabled="true" selected="true">Status</option>
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
{{-- @include('script.scriptgetguru') --}}
{{-- @include('script.scriptgetkelas') --}}
@include('admin.violations.scriptcreatedata')
                    