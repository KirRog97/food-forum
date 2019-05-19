$("img").mousedown(function () {
    return false;
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
    $('.dropdown-toggle').dropdown();
    $('.alert')
        .alert('dispose')
        .delay($(this).text().length * 2)
        .slideUp(800, function () {
            $(this).remove();
        });
});
