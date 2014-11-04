$(document).ready(function () {
    $('.task-list').on('click', '.dropdown-toggler', function () {
        if ($(this).attr('data-toggle') == 'dropdown' || $(this).attr('data-hover') == 'dropdown') {
            $(this).next('ul.dropdown-menu').toggleClass('visible');
        }
    });
});