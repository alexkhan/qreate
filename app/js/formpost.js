$(document).ready(function() {



$('#formstyled').submit(function () {
    $.post('../process.php', $('#formstyled').serialize(), function (data, textStatus) {
        $('#form').html(data);
    });
    return false;
});



});