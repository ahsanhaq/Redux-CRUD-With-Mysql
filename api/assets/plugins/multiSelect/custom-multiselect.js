$(document).ready(function ($) {
    $('#multiselect-user').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function (value) {
            return value.length > 1;
        },
        // To disable right or left arrow
        afterMoveToRight: function () {
            $('.js_arrowRight').attr('disabled', 'disabled')
        },
        afterMoveToLeft: function () {
            $('.js_arrowLeft').attr('disabled', 'disabled')
        }
    });

    $('#multiselect-devices').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function (value) {
            return value.length > 1;
        },
        // To disable right or left arrow
        afterMoveToRight: function () {
            $('.js_arrowRight').attr('disabled', 'disabled')
        },
        afterMoveToLeft: function () {
            $('.js_arrowLeft').attr('disabled', 'disabled')
        }
    });
});

// To enable right or left arrow
$('body').on('change', '.multiselect select', function (e) {
    if ($(this).hasClass('js_leftSelect')) {
        $(this).closest('.multiselect').find('.js_arrowRight').removeAttr('disabled')
    }
    else {
        $(this).closest('.multiselect').find('.js_arrowLeft').removeAttr('disabled')
    }
});
$('body').on('click', function (e) {
    // Disable group list transfer button if clicked outside of the plugin
    if (e.target.tagName != "OPTION" && e.target.tagName != "SELECT") {
        $('.multiselect-controls button').attr('disabled', 'disabled');
        // $("option:selected").prop("selected", false)
    }
});