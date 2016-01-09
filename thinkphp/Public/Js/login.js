jQuery(document).ready(function($) {
    $('.loginform').change(function(evt) {
        var value = $(this).val();
        if (value == '') {
            $(this).next().addClass('glyphicon-remove');
        }
        $(this).next().addClass('glyphicon-ok');
    });
    $('#cgverify').bind('click', function() {
        $(this).prev().attr('src', '/thinkphp/index.php/Admin/Login/verify');
    });
});
