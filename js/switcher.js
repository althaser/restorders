$(function () {
    $(window).on('hashchange', function () {
        var tabContainers = $('.tabs > div'),
            hash = window.location.hash != '' ? window.location.hash : '#first';

        console.log(hash)
        
        tabContainers.hide();
        tabContainers.filter(hash).show();
        $('.ca-menu li a').removeClass('selected');
        $('a[href="' + hash + '"]', '.ca-menu').addClass('selected');
    }).trigger('hashchange');
});

