$(document).ready(function () {
    var table = $('#table1').DataTable({
        paging: true,
        searching: false,
        responsive: true,
        order: [],
        "tabIndex": -1,
        columnDefs: [{ orderable: false, targets: [0] }],
        "initComplete": function (settings, json) {
            $('.table-wrapper').addClass('loaded');
        },
        dom: '<"table-top"t><"table-controls"flip>'
    });
    var previewTable = $('#previewTable').DataTable({
        paging: false,
        searching: false,
        sorting: false,
        ordering: false,
        responsive: false,
        info: false,
        scrollX: true,
        columnDefs: [{ orderable: false, targets: [0] }],
        "initComplete": function (settings, json) {
            $('.table-wrapper').addClass('loaded');
        },
    });
    $('.paginate_button').on('click', function (e) {
        $('.dataTables_processing').show()
        setTimeout(function () {
            $('.dataTables_processing').hide()
        }, 1000)
    });
});
