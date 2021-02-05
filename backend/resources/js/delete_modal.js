$(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let controller = button.data('controller');
        let url = '/' + controller + '/' + id;
        document.deleteform.action = url;
    })
});