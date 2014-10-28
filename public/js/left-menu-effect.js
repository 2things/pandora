$(document).ready(function () {
    $('.left-menu-toggle').click(function() {
        $(this).parents('.left-menu').toggleClass('close');
        $('.main-container .main-content').toggleClass('adjust-left')
    });
});