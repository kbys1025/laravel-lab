<div class="modal fade" id="createTodoCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createTodoCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-light">
        <h5 class="modal-title" id="createTodoCategoryModalLabel">ToDoカテゴリ追加</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="todoCategoryForm" action="todo-category" method="POST">
            @csrf
            <div class="form-group">
                <label for="todoCategoryInput">ToDoカテゴリ</label>
                <input type="text" class="form-control" id="todoCategoryInput" name="name">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" data-dismiss="modal" style="width:100px;">キャンセル</button>
        <button class="btn btn-primary" type="submit" form="todoCategoryForm" style="width:100px;">追加</button>
      </div>
    </div>
  </div>
</div>