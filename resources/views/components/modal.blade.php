<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <p>Apa anda yakin ingin menghapus <strong id="nama"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
            <form id="delete-form" method="POST" style="display: none;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
