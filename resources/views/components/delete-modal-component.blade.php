<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="form-delete" data-id="" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Hapus data
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Apakah anda yakin akan menghapus data ini?  </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect" data-bs-dismiss="modal">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>