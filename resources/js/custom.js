$("img").mousedown(function () {
    return false;
});

$(function () {
    // "Stop" func helps to create a "pendulum" of animation
    $('.dropdown')
        .on('show.bs.dropdown', function () {
            $(this).children('.dropdown-menu').stop().fadeIn(650);
            $(this).children('button').stop().css('color', '#b5904e');
        })
        .on('hide.bs.dropdown', function () {
            $(this).children('.dropdown-menu').stop().fadeOut(350);
            $(this).children('button').stop().css('color', '#212529');
        });

    $('[data-toggle="tooltip"]').tooltip();
    $('.dropdown-toggle').dropdown();

    $('.alert')
        .alert('dispose')
        .delay($(this).text().length * 2)
        .slideUp(800, function () {
            $(this).remove();
        });
});
