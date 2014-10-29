$(document).ready(function () {
    $('a.btn').click(function() {
        if ($(this).attr('data-toggle') == 'dropdown' || $(this).attr('data-hover') == 'dropdown') {
            $(this).next('ul.dropdown-menu').toggleClass('visible');
        }
    })
});