$(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let routes = button.data('routes');
        let url = '/' + routes + '/' + id;
        document.deleteform.action = url;
    })
});