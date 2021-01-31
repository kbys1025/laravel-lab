$(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let url = 'todo-category/' + id;
        document.deleteform.action = url;
    })
});