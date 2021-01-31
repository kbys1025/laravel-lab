<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">削除</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>削除します。よろしいですか?</p>
        {{ $slot }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border" style="width:100px;" data-dismiss="modal">キャンセル</button>
        <form action="" method="POST" name="deleteform">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="width:100px;">削除</button>
        </form>
      </div>
    </div>
  </div>
</div>